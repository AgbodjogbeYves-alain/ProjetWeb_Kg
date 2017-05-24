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
    $time = $this->encryption->decrypt(get_cookie('validity'));
    return hash("sha256",$key.'true'.$email)==get_cookie('the_good_one') and $time >=time();
  }
  public function getadmins($num){
    $controlValidity = $this->controlValidity();
    echo $controlValidity;
    // if($this->controlValidity()){
    //   $this->load->model('admin_model');
    //   if($this->input->post("research")==null){
    //     $data['title'] = 'Liste des admins';
    //     $data['listeC'] = $this->admin_model->get_all_admins($num);
    //     $this->load->view('template/header', $data);
    //     $this->load->view('template/navbar_admin', $data);
    //     $this->load->view('pages/admin/admins', $data);
    //     $this->load->view('template/pagination',$data);
    //     $this->load->view('template/footer', $data);
    //   }else{
    //     $data['title'] = 'Liste des admins';
    //     $research = $this->security->xss_clean($this->input->post('research'));
    //     $data['listeC'] = $this->admin_model->get_somes_admins($research);
    //     $this->load->view('template/header', $data);
    //     $this->load->view('template/navbar_admin', $data);
    //     $this->load->view('pages/admin/admins', $data);
    //     $this->load->view('template/pagination',$data);
    //     $this->load->view('template/footer', $data);
    //   }
    //
    // }else{
    //   delete_cookie('validity');
    //   delete_cookie('the_good_one');
    //   delete_cookie('the_good_right');
    //   delete_cookie('email');
    //   delete_cookie('niveau');
    //   redirect("/");
    // }
  }

    public function supadmin($id_admin){
      if($this->controlValidity()){
        $data['tite'] = 'Liste des admins';
        $this->load->model("admin_model");
        $this->admin_model->delete_admin($id_admin);
        redirect('admins/get/0');
      }else{
          delete_cookie('validity');
          delete_cookie('the_good_one');
          delete_cookie('the_good_right');
          delete_cookie('email');
          delete_cookie('niveau');
          redirect("/");
        }
      }


    public function selecteur($id_admin){
      if($this->input->post('selectButton')=='Mise a jour'){
        $this->editadmin($id_admin);
      }else if($this->input->post('selectButton')=='Supprimer'){
        $this->supadmin($id_admin);
      }
    }

    public function createadmin(){
      if($this->controlValidity()){
          $key=$this->config->item('key');
          $data['title'] = 'Liste des admins';
          $this->load->model("admin_model");
            if($this->input->post('nom_admin')!==null && $this->input->post('prenom')!==null && $this->input->post('email')!==null && $this->input->post('privilege')!==null ){
              $nom = $this->security->xss_clean($this->input->post('nom_admin'));
              $prenom = $this->security->xss_clean($this->input->post('prenom_admin'));
              $email = $this->security->xss_clean($this->input->post('email_admin'));
              $password =  $this->security->xss_clean($this->input->post('password_admin'));
              if($this->input->post('privilege_admin')=='all'){
                $privilege = 0;
              }else if($this->input->post('privilege_admin')=='commerciaux'){
                $privilege = 1;
              }else if($this->input->post('privilege_admin')=='autre'){
                $privilege = 2;
              }
              $password = $key.$password.$email;
              $password = password_hash($password,PASSWORD_BCRYPT);
              $newadmin =array(
                'nom_admin'=> $nom,
                'prenom_admin' => $prenom,
                'email_admin' => $email,
                'privilege_admin' => $privilege,
                'password_admin' => $password
              );
              $this->load->model('admin_model');
              $this->admin_model->create_admin($newadmin);
              redirect("admins/get/0");

            }else{
              redirect("admins/get/0");
            }
        }else{
          delete_cookie('the_good_one');
          delete_cookie('the_good_right');
          delete_cookie('email');
          delete_cookie('validity');
          delete_cookie('niveau');
          redirect("/");
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
      if($this->controlValidity()){
        if($this->input->post('descriptif_admin')!==null || $this->input->post('nom_admin')!==null || $this->input->post('email_admin')!==null || $this->input->post('type_admin')!==null ){
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
          if($this->input->post('privilege_admin')!==null){
            if($this->input->post('privilege_admin')=='all'){
              // $this->load->model('type_entreprise');
              // $id_type = $this->type_entreprise->get_id_by_libelle('Entreprise');
              //$newvalues['type_entreprise'] = $id_type;
              $newvalues['privilege_admin'] = 0;

            }else if($this->input->post('privilege_admin')=='commerciaux'){
              // $id_type = $this->type_entreprise->get_id_by_libelle('Particulier');
              // $newvalues['type_entreprise'] = $id_type;
              $newvalues['privilege_admin'] = 1;

            }else{
                //$newvalues['type_entreprise'] = 0;
                $newvalues['privilege_admin'] = 2;

            }
          }

          $this->admin_model->update_admin($newvalues,$id_admin);
          redirect('admins/get/0');
        }else{
          redirect('admins/get/0');
        }
        }else{
          delete_cookie('validity');
          delete_cookie('the_good_one');
          delete_cookie('the_good_right');
          delete_cookie('email');
          delete_cookie('niveau');
          redirect("/");
        }
      }
    }
