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
      $data['connexion'] = '';
      $this->load->view('template/header', $data);
      $this->load->view('template/navbar_accueil', $data);
      $this->load->view('pages/accueil/accueil', $data);
      $this->load->view('template/footer', $data);
    }

    public function connexion(){
    if(($this->input->post('email', True)) && ($this->input->post('password', True)) && ($this->input->post('role', True))){
      $data['title']='Bienvenue dans votre espace personnel';
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      $this->security->xss_clean($email);
      $key = "Gogeta2000.";
      $this->security->xss_clean($password);
        if($this->input->post('role')=='client'){
          $this->load->model('client_model');
          $clientlog= $this->client_model->get_client($email);
          if((count($clientlog)>0) && password_verify($password,$clientlog[0]['password_client'])){
            $encryption_value = $key.'false'.$email;
            $encryption_value = hash("sha256",$encryption_value);
            set_cookie('the_good_one',$encryption_value,86000);
            set_cookie('email',$email,86000);
            set_cookie('type',hash("sha256",$this->input->post('role')),86000);
            $data['titre'] = "Page Administrateurs";
            $data['key'] = $key;
            $data['key2'] = get_cookie('email',true);
            $this->load->view('template/header', $data);
            $this->load->view('pages/admin/homeC', $data);
            $this->load->view('template/footer', $data);

        }else{
          $data['connexion'] = "error";
          $this->load->view('template/header', $data);
          $this->load->view('pages/accueil/navbar_accueil', $data);
          $this->load->view('pages/accueil/accueil', $data);
          $this->load->view('template/footer', $data);
        }
    }else{
        $this->load->model('admin_model');
        $adminLog= $this->admin_model->get_admin_by_mail($email);
        if((count($adminLog)>0) && password_verify($password,$adminLog[0]['password_admin'])){
          $encryption_value = $key.'true'.$email;
          $encryption_value = hash("sha256",$encryption_value);
          set_cookie('the_good_one',$encryption_value,86000);
          set_cookie('email',$email,86000);
          set_cookie('the_good_right',hash("sha256",$key).get_cookie('niveau'),86000);
          set_cookie('niveau',hash("sha256",$adminLog[0]['privilege_admin']),86000);
          $data['titre'] = "Page Administrateurs";
          $data['key'] = $key;
          $data['key2'] = get_cookie('email',true);
          $this->load->view('template/header', $data);
          $this->load->view('template/navbar_admin', $data);
          $this->load->view('template/footer', $data);
      }else{
        $data['connexion'] = 'error';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar_accueil', $data);
        $this->load->view('pages/accueil/accueil', $data);
        $this->load->view('template/footer', $data);

      }
    }
  }else{
    $data['connexion'] = 'error';
    $this->load->view('template/header', $data);
    $this->load->view('template/navbar_accueil', $data);
    $this->load->view('pages/accueil/accueil', $data);
    $this->load->view('template/footer', $data);

  }
}
}
