<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class accueilCtrl extends CI_Controller {

  public function __construct()
     {
             parent::__construct();
             $this->load->helper('url_helper');
             $this->load->database();
             $this->load->helper('cookie');

     }

    public function accueil()
    {
      $data['title'] = ucfirst('KGE-Accueil'); // Capitalize the first letter
      $this->load->view('template/header', $data);
      $this->load->view('pages/accueil/navbar_accueil', $data);
      $this->load->view('pages/accueil/accueil', $data);
      $this->load->view('template/footer', $data);
    }

    public function test(){
      $this->load->model('client_model');
      $data['valeur'] = $this->client_model->isIn(0);
      print_r($data);
      $this->load->view('template/header', $data);
      $this->load->view('pages/accueil/navbar_accueil', $data);
      $this->load->view('pages/accueil/accueil', $data);
      $this->load->view('template/footer', $data);
    }

    public function connexion(){
      if($this->input->post('email', True) && $this->input->post('password', True) && $this->input->post('role', True)){
        $data['title']='Bienvenue dans votre espace personnel';
        $this->load->model('client_model');
        $this->load->model('admin_model');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $this->security->escape($email);
        $this->security->escape($password);
        $password = $this->encryption->encrypt($password);
          if($this->input->post('role')=='Client'){
            $isLogin= $this->client_model->login($email,$password);
            if(count($isLogin)>0){
              $cookie1 = array(
                'name'   => 'identifier_a',
                'value'  => $this->encryption->encrypt($client['num_client']),
                'expire' => '86500',
                'domain' => site_url(),
                'path'   => '/',
                'secure' => TRUE
              );
              $cookie2 = array(
                'name'   => 'email',
                'value'  => $this->encryption->encrypt($client['email_client']),
                'expire' => '86500',
                'domain' => site_url(),
                'path'   => '/',
                'secure' => TRUE
              );
              $cookie3 = array(
                'name'   => 'type_client',
                'value'  => $this->encryption->encrypt($client['type_client']),
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
            $data['title'] = ucfirst('KGE-Accueil'); // Capitalize the first letter
            $this->load->view('template/header', $data);
            //$this->load->view('pages/accueil/error_view', $data);
            $this->load->view('pages/accueil/navbar_accueil', $data);
            $this->load->view('pages/accueil/accueil', $data);
            $this->load->view('template/footer', $data);
          }
      }else{
          $isLogin= $this->admin_model->loginAdmin($email,$password);
          if(count($isLogin)>0){
            $cookie1 = array(
              'name'   => 'identifier_e',
              'value'  => $this->encryption->encrypt($client['id_admin']),
              'expire' => '86500',
              'domain' => site_url(),
              'path'   => '/',
              'secure' => TRUE
            );
            $cookie2 = array(
              'name'   => 'email',
              'value'  => $this->encryption->encrypt($client['email_admin']),
              'expire' => '86500',
              'domain' => site_url(),
              'path'   => '/',
              'secure' => TRUE
            );
            $cookie3 = array(
              'name'   => 'type_client',
              'value'  => $this->encryption->encrypt($client['privilege_client']),
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
          /*$data['title'] = ucfirst('KGE-Accueil'); // Capitalize the first letter
          $this->load->view('template/header', $data);
          //$this->load->view('pages/accueil/error_view', $data);
          $this->load->view('pages/accueil/navbar_accueil', $data);
          $this->load->view('pages/accueil/accueil', $data);
          $this->load->view('template/footer', $data);*/

          echo '<script type="text/javascript">
            alert('Password ou mot de passe incorrect');
          </script>'
        }
      }
    }
  }
}
