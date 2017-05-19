<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccueilCtrl extends CI_Controller {

  public function __construct()
     {
             parent::__construct();
             $this->load->helper('url_helper');
             $this->load->database();
             $this->load->helper('cookie');
             $this->load->helper('security');
             $this->load->library('encryption');

     }

    public function accueil()
    {
      $data['title'] = 'KGE-Accueil'; // Capitalize the first letter
      $this->load->view('template/header', $data);
      $this->load->view('pages/accueil/navbar_accueil', $data);
      $this->load->view('pages/accueil/accueil', $data);
      $this->load->view('template/footer', $data);
    }

    public function connexion(){
      print($this->input->post('email', True));
        echo '<br>';
      print($this->input->post('password', True));
        echo '<br>';
      print($this->input->post('role', True));
        echo '<br>';

      if(($this->input->post('email', True)) && ($this->input->post('password', True)) && ($this->input->post('role', True))){
        $data['title']='Bienvenue dans votre espace personnel';
        $this->load->model('client_model');
        //$this->load->model('admin_model');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $this->security->xss_clean($email);
        $this->security->xss_clean($password);
        print($password);
        echo '<br>';
        print($email);
        echo '<br>';
          if($this->input->post('role')=='entreprise'){
            $clientlog= $this->client_model->get_client($email);
            print_r($clientlog);
            print(password_verify($password,$clientlog[0]["password_client"]));
            if(password_verify($password,$clientlog[0]['password_client'])){
              $cookie1 = array(
                'name'   => 'identifier_a',
                'value'  => $this->encryption->encrypt($clientlog[0]['id_client']),
                'expire' => '86500',
                'domain' => site_url(),
                'path'   => '/',
                'secure' => TRUE
              );
              $cookie2 = array(
                'name'   => 'email',
                'value'  => $this->encryption->encrypt($clientlog[0]['email_client']),
                'expire' => '86500',
                'domain' => site_url(),
                'path'   => '/',
                'secure' => TRUE
              );
              $cookie3 = array(
                'name'   => 'type_client',
                'value'  => $this->encryption->encrypt($clientlog[0]['type_client']),
                'expire' => '86500',
                'domain' => site_url(),
                'path'   => '/',
                'secure' => TRUE
              );

              $this->load->view('template/header', $data);
              $this->load->view('pages/client/navbar_client', $data);
              $this->load->view('pages/client/homeC', $data);
              $this->load->view('template/footer', $data);
          }else{
            //redirect("/","refresh");
          }
      }else{
          $isLogin= $this->admin_model->login_admin($email,$password);
          if(count($isLogin)>0){
            $cookie1 = array(
              'name'   => 'identifier_a',
              'value'  => $this->encryption->encrypt($isLogin['id_admin']),
              'expire' => '86500',
              'domain' => site_url(),
              'path'   => '/',
              'secure' => TRUE
            );
            $cookie2 = array(
              'name'   => 'email',
              'value'  => $this->encryption->encrypt($isLogin['email_admin']),
              'expire' => '86500',
              'domain' => site_url(),
              'path'   => '/',
              'secure' => TRUE
            );
            $cookie3 = array(
              'name'   => 'type_client',
              'value'  => $this->encryption->encrypt($isLogin['privilege_client']),
              'expire' => '86500',
              'domain' => site_url(),
              'path'   => '/',
              'secure' => TRUE
            );

            $this->load->view('template/header', $data);
            $this->load->view('pages/admin/navbar_admin', $data);
            $this->load->view('pages/admin/homeA', $data);
            $this->load->view('template/footer', $data);
        }else{
          //redirect("/","refresh");
        }
      }
    }else{
      echo 'probleme';
    }
  }
}
