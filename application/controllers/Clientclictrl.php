<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientclictrl extends CI_Controller {

  public function __construct()
     {
             parent::__construct();
             $this->load->helper('url_helper');
             $this->load->database();
             $this->load->helper('cookie');
             $this->load->helper('security');
             $this->load->library('encryption');
             $this->load->model('client_model');
             $this->load->model('contrats_model');
             $this->load->model('type_entreprise');
     }

     public function controlValidity(){
       $key=$this->config->item('key');
       $email = get_cookie('email');
       $id = get_cookie('id');
       $time = get_cookie('validity');
       $time = $this->encryption->decrypt($time);
       return ($this->client_model->isIn($email)>0 && hash("sha256",$key.'false'.$email)==get_cookie('the_good_one') && $time >=time());
     }



  public function getclient($num){
      $id = get_cookie('id');
      $count = $this->contrats_model->nb_contrat($id);
      $data['count'] = $count;
      $data['id']=$id;
      $data['listeC'] = $this->client_model->get_client_by_id($id);
    if($this->controlValidity()){
      $this->load->model('client_model');
      $data['title'] = 'Infos entreprise';
      $data['listeC'] = $this->client_model->get_client_by_id($num);
      $this->load->view('template/header', $data);
      $this->load->view('template/navbar_client', $data);
      $this->load->view('pages/client/clientinfo', $data);
      $this->load->view('template/footer', $data);
    }else{
      delete_cookie('validity');
      delete_cookie('the_good_one');
      delete_cookie('email');
      delete_cookie('id');
      redirect("/");
    }
  }

    public function deconnexion(){
      delete_cookie('the_good_one');
      delete_cookie('the_good_right');
      delete_cookie('email');
      delete_cookie('validity');
      delete_cookie('id');
      redirect("/");
    }

    public function editclient(){
      if($this->controlValidity()){
        $id_client = get_cookie('id');
        $key = $this->config->item('key');
        if($this->input->post('descriptif_client')!==null || $this->input->post('old')!==null || $this->input->post('representant')!==null || $this->input->post('new') || $this->input->post('nom_client')!==null || $this->input->post('email_client')!==null || $this->input->post('type_client')!==null ){
          if($this->input->post('nom_client')!==null){
              $newvalues['nom_client'] = $this->input->post('nom_client');
          }
          if($this->input->post('old')!==null && $this->input->post('new')!==null){
            $old = $this->input->post('old');
            $old = $key.$old;
            if(password_verify($old,$this->client_model->getpass($id_client)[0]['password_client'])){
                $new = password_hash($key.$this->input->post('new'),PASSWORD_BCRYPT);
                $newvalues['password_client'] = $new;
            }
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
          redirect('client/get/'.$id_client);
        }else{
          redirect('client/get/'.$id_client);
        }
        }else{
          delete_cookie('validity');
          delete_cookie('the_good_one');
          delete_cookie('email');
          delete_cookie('id');
          redirect("/");
        }
      }
    }
