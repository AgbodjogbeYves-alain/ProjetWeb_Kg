<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientsadctrl extends CI_Controller {

  public function __construct()
     {
             parent::__construct();
             $this->load->helper('url_helper');
             $this->load->database();
             $this->load->helper('cookie');
             $this->load->helper('security');
             $this->load->library('encryption');
             $this->load->model('admin_model');
               $this->load->model('client_model');

     }

     public function controlValidity(){
       $key=$this->config->item('key');
       $email = get_cookie('email');
       $time = get_cookie('validity');
       $time = $this->encryption->decrypt($time);
       return ($this->admin_model->isIn($email)>0 && hash("sha256",$key.'true'.$email)==get_cookie('the_good_one') && $time >=time());
     }

  public function getclients($num){
    if($this->controlValidity()){

      if($this->input->post("research")==null){
        $data['title'] = 'Liste des clients';
        $data['listeC'] = $this->client_model->get_all_clients($num);
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar_admin', $data);
        $this->load->view('pages/admin/clients', $data);
        $this->load->view('template/pagination',$data);
        $this->load->view('template/footer', $data);
      }else{
        $data['title'] = 'Liste des clients';
        $research = $this->security->xss_clean($this->input->post('research'));
        $data['listeC'] = $this->client_model->get_somes_clients($research);
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar_admin', $data);
        $this->load->view('pages/admin/clients', $data);
        $this->load->view('template/pagination',$data);
        $this->load->view('template/footer', $data);
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

    public function supclient($id_client){
      if($this->controlValidity()){
        $data['tite'] = 'Liste des clients';
        $this->client_model->delete_client($id_client);
        redirect('clients/get/0');
      }else{
          delete_cookie('validity');
          delete_cookie('the_good_one');
          delete_cookie('the_good_right');
          delete_cookie('email');
          delete_cookie('niveau');
          redirect("/");
        }
      }


    public function selecteur($id_client){
      if($this->input->post('selectButton')=='Mise a jour'){
        $this->editclient($id_client);
      }else if($this->input->post('selectButton')=='Supprimer'){
        $this->supclient($id_client);
      }
    }

    public function createclient(){
      $key=$this->config->item('key');
      if($this->controlValidity()){
          $data['title'] = 'Liste des clients';
            if($this->input->post('nom')!==null && $this->input->post('descriptif')!==null && $this->input->post('email')!==null && $this->input->post('password')!==null ){
              $nom = $this->security->xss_clean($this->input->post('nom'));
              $email = $this->security->xss_clean($this->input->post('email'));
              $type = $this->security->xss_clean($this->input->post('type'));
              $password =  $this->security->xss_clean($this->input->post('password'));
              if($this->input->post('entreprise')!==null){
                $role = 0;
              }else{
                $role = 1;
              }
              $password = $key.$password;
              $descrip = $this->security->xss_clean($this->input->post('descriptif'));
              $representant = $this->security->xss_clean($this->input->post('representant'));
              $password = password_hash($password,PASSWORD_BCRYPT);
              if($this->client_model->isIn($email)==0){
                $newClient =array(
                  'nom_client'=> $nom,
                  'descriptif_client' => $descrip,
                  'email_client' => $email,
                  'representant' => $representant,
                  'type_client' => $role,
                  'password_client' => $password
                );
                $this->load->model('Client_model');
                $this->client_model->create_client($newClient);
                redirect("clients/get/0");
              }else{
                $data['title'] = 'Liste des clients';
                $data['listeC'] = $this->client_model->get_all_clients(0);
                $data['error'] = "Cet email est déja présent";
                $this->load->view('template/header', $data);
                $this->load->view("template/error",$data);
                $this->load->view('template/navbar_admin', $data);
                $this->load->view('pages/admin/clients', $data);
                $this->load->view('template/pagination',$data);
                $this->load->view('template/footer', $data);
              }


            }else{
              $data['title'] = 'Liste des clients';
              $data['listeC'] = $this->client_model->get_all_clients(0);
              $data['error'] = "Veuillez renseigner tout les champs";
              $this->load->view('template/header', $data);
              $this->load->view("template/error",$data);
              $this->load->view('template/navbar_admin', $data);
              $this->load->view('pages/admin/clients', $data);
              $this->load->view('template/pagination',$data);
              $this->load->view('template/footer', $data);
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

    public function editclient($id_client){
      if($this->controlValidity()){
        if($this->input->post('descriptif_client')!==null || $this->input->post('representant')!==null || $this->input->post('nom_client')!==null || $this->input->post('email_client')!==null || $this->input->post('type_client')!==null ){
          $data['tite'] = 'Liste des clients';
          if($this->input->post('nom_client')!==null){
              $newvalues['nom_client'] = $this->input->post('nom_client');
          }
          if($this->input->post('descriptif_client')!==null){
              $newvalues['descriptif_client'] = $this->input->post('descriptif_client');
          }
          if($this->input->post('email_client')!==null){
            $newvalues['email_client'] = $this->input->post('email_client');
          }
          if($this->input->post('representant')!==null){
            $newvalues['representant'] = $this->input->post('representant');
          }
          if($this->input->post('type_client')!==null){
            if($this->input->post('type_client')=='Entreprise'){
              $this->load->model('type_entreprise');
              $id_type = $this->type_entreprise->get_id_by_libelle('Entreprise');
              $newvalues['type_entreprise'] = $id_type;
            }else if($this->input->post('type_client')=='Particulier'){
              $id_type = $this->type_entreprise->get_id_by_libelle('Particulier');
              $newvalues['type_entreprise'] = $id_type;
            }else{
                $newvalues['type_entreprise'] = 0;
            }
          }

          $this->client_model->update_client($newvalues,$id_client);
          $data['error']="Votre modification à bien été prise en compte";
          redirect('clients/get/0');
        }else{
          $data['error']="Aucunes informations a modifier";
          redirect('clients/get/0');
        }
        }else{
          redirect("admin/deconnexion");
        }
      }
    }
