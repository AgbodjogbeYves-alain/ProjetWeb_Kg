<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminsadctrl extends CI_Controller {

  public function __construct()
     {
             parent::__construct();
             $this->load->helper('url_helper');
             $this->load->database();
             $this->load->helper('cookie');
             $this->load->helper('security');
             $this->load->library('encryption');

     }

  public function controlValidity(){
    $key=$this->config->item('key');
    $email = get_cookie('email');
    $time = get_cookie('validity');
    $time = $this->encryption->decrypt($time);
    return (hash("sha256",$key.'true'.$email)==get_cookie('the_good_one') && $time >=time());
  }


  public function getadmins($num){
    print_r($this->estAdmin());
    if($this->estAdmin()){
      if($this->controlValidity()){
        $this->load->model('admin_model');
        if($this->input->post("research")==null){
          $data['title'] = 'Liste des admins';
          $data['listeC'] = $this->admin_model->get_all_admins($num);
          $this->load->view('template/header', $data);
          $this->load->view('template/navbar_admin', $data);
          $this->load->view('pages/admin/admins', $data);
          $this->load->view('template/pagination',$data);
          $this->load->view('template/footer', $data);
        }else{
          $data['title'] = 'Liste des admins';
          $research = $this->security->xss_clean($this->input->post('research'));
          $data['listeC'] = $this->admin_model->get_somes_admins($research);
          $this->load->view('template/header', $data);
          $this->load->view('template/navbar_admin', $data);
          $this->load->view('pages/admin/admins', $data);
          $this->load->view('template/pagination',$data);
          $this->load->view('template/footer', $data);
        }

      }else{
        $this->deconnexion();
      }
    }else{
      $this->deconnexion();
    }

  }

    public function supadmin($id_admin){
        if($this->estAdmin()){
      if($this->controlValidity()){
        $data['tite'] = 'Liste des admins';
        $this->load->model("admin_model");
        $this->admin_model->delete_admins($id_admin);
        redirect('admins/get/0');
        }else{
          $this->deconnexion();
          }
      }else{
        $this->deconnexion();
      }
    }

      public function estAdmin(){
        $email = get_cookie('email');
        print($email);
        $this->load->model("admin_model");
        return  $this->admin_model->isIn($email)>0;
      }

    public function selecteur($id_admin){
      if($this->input->post('selectButton')=='Mise a jour'){
        $this->editadmin($id_admin);
      }else if($this->input->post('selectButton')=='Supprimer'){
        $this->supadmin($id_admin);
      }
    }

    public function createadmin(){
      if($this->estAdmin()){
        if($this->controlValidity()){
            $key=$this->config->item('key');
            $data['title'] = 'Liste des admins';
            $this->load->model("admin_model");
            if($this->input->post('nom')!==null && $this->input->post('prenom')!==null && $this->input->post('email')!==null &&  $this->input->post('password')!==null && $this->input->post('privilege')!==null && $this->input->post('numero')!==null ){
                $nom = $this->security->xss_clean($this->input->post('nom'));
                $prenom = $this->security->xss_clean($this->input->post('prenom'));
                $email = $this->security->xss_clean($this->input->post('email'));
                $password =  $this->security->xss_clean($this->input->post('password'));
                $numero = $this->security->xss_clean($this->input->post('numero'));
                $privilege = $this->security->xss_clean($this->input->post('privilege'));
                $password = $key.$password;
                $password = password_hash($password,PASSWORD_BCRYPT);
                $newadmin =array(
                  'nom_admin'=> $nom,
                  'prenom_admin' => $prenom,
                  'email_admin' => $email,
                  'privilege_admin' => $privilege,
                  'password_admin' => $password,
                  'numero_admin'=> $nom,
                );
                $this->load->model('admin_model');
                $this->admin_model->create_admin($newadmin);
                redirect("admins/get/0");

              }else{
                redirect("admins/get/0");
              }
          }else{
            $this->deconnexion();
          }
        }else{
        $this->deconnexion();
      }
}

    public function deconnexion(){
      delete_cookie('the_good_one');
      delete_cookie('the_good_right');
      delete_cookie('email');
      delete_cookie('validity');
      delete_cookie('niveau');
      redirect("/");
    }

    public function editadmin($id_admin){
      if($this->estAdmin()){
        if($this->controlValidity()){
          if($this->input->post('numero_admin')!==null || $this->input->post('nom_admin')!==null || $this->input->post('email_admin')!==null || $this->input->post('privilege_admin')!==null ){
            $data['tite'] = 'Liste des admins';
            $this->load->model("admin_model");
            if($this->input->post('nom_admin')!==null){
                $newvalues['nom_admin'] = $this->input->post('nom_admin');
            }
            if($this->input->post('prenom_admin')!==null){
                $newvalues['prenom_admin'] = $this->input->post('descriptif_admin');
            }
            if($this->input->post('email_admin')!==null){
              $newvalues['email_admin'] = $this->input->post('email_admin');
            }
            if($this->input->post('password_admin')!==null){
              $newvalues['password_admin'] = $this->input->post('password_admin');
            }
            if($this->input->post('numero_admin')!==null){
              $newvalues['numero_admin'] = $this->input->post('numero_admin');
            }
            if($this->input->post('privilege_admin')=='All'){
                $newvalues['privilege_admin'] = 0;
            }else if($this->input->post('privilege_admin')=='Commerciaux'){
                $newvalues['privilege_admin'] = 1;
            }else if($this->input->post('privilege_admin')=='Autre'){
                  $newvalues['privilege_admin'] = 2;
            }

            $this->admin_model->update_admins($newvalues,$id_admin);
            redirect('admins/get/0');
          }else{
            redirect('admins/get/0');
          }
        }else{
            $this->deconnexion();
        }
      }
    }
}
