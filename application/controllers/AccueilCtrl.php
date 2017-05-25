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
             $this->load->model('client_model');
             $this->load->model('admin_model');

     }

    public function accueil()
    {
      $data['title'] = 'KGE-Accueil'; // Capitalize the first letter
      $this->load->view('template/header', $data);
      $this->load->view('template/navbar_accueil', $data);
      $this->load->view('pages/accueil/accueil', $data);
      $this->load->view('template/footer', $data);
    }

    public function connexion(){
      $key=$this->config->item('key');
      if(($this->input->post('email', True)) && ($this->input->post('password', True)) && ($this->input->post('role', True))){
        $data['title']='Bienvenue dans votre espace personnel';
        $email = $this->input->post('email');
        $password =  $this->security->xss_clean($this->input->post('password'));
        $password = $key.$this->input->post('password');
        $this->security->xss_clean($email);
        $this->security->xss_clean($password);
        if($this->input->post('role')=='client'){

          $clientlog= $this->client_model->get_client($email);
          if((count($clientlog)>0) && password_verify($password,$clientlog[0]['password_client'])){
            $encryption_value = $key.'false'.$email;
            $encryption_value = hash("sha256",$encryption_value);
            $id = $clientlog[0]['id_client'];
            $time = $this->encryption->encrypt(time()+86000);
            set_cookie('the_good_one',$encryption_value,86000);
            set_cookie('validity',$time,86000);
            set_cookie('email',$email,86000);
            set_cookie('id',$id,86000);
            $data['id']=$id;
            $data['titre'] = "Page d'accueil Client";
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar_client', $data);
            $this->load->view('pages/client/homeC', $data);
            $this->load->view('template/footer', $data);

        }else{
          $data['connexion'] = "error";
          $data['error'] = "Verifiez vos identifiants";
          $this->load->view('template/header', $data);
          $this->load->view('template/error', $data);
          $this->load->view('template/navbar_accueil', $data);
          $this->load->view('pages/accueil/accueil', $data);
          $this->load->view('template/footer', $data);
        }
    }else{

        $adminLog= $this->admin_model->get_admin_by_mail($email);
        if((count($adminLog)>0) && password_verify($password,$adminLog[0]['password_admin'])){
          $encryption_value = $key.'true'.$email;
          $encryption_value = hash("sha256",$encryption_value);
          $time = $this->encryption->encrypt(time()+86000);
          set_cookie('the_good_one',$encryption_value,86000);
          set_cookie('validity',$time,86000);
          set_cookie('email',$email,86000);
          set_cookie('the_good_right',hash("sha256",$key).get_cookie('niveau'),86000);
          //set_cookie('niveau',hash("sha256",$adminLog[0]['privilege_admin']),86000);
          $data['titre'] = "Page Administrateurs";
          $this->load->view('template/header', $data);
          $this->load->view('template/navbar_admin', $data);
          $this->load->view('pages/admin/homeA', $data);
          $this->load->view('template/footer', $data);
      }else{
        $data['error'] = 'Veuillez verifier vos identifiants';
        $this->load->view('template/header', $data);
        $this->load->view('template/error', $data);
        $this->load->view('template/navbar_accueil', $data);
        $this->load->view('pages/accueil/accueil', $data);
        $this->load->view('template/footer', $data);

      }
    }
  }else{
    $data['error'] = 'Veuillez remplir tous les champs';
    $this->load->view('template/header', $data);
    $this->load->view('template/error', $data);
    $this->load->view('template/navbar_accueil', $data);
    $this->load->view('pages/accueil/accueil', $data);
    $this->load->view('template/footer', $data);

  }
}
}
