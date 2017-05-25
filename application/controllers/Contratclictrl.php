<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contratclictrl extends CI_Controller {

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

     }

     public function controlValidity(){
       $key=$this->config->item('key');
       $email = get_cookie('email');
       $id = get_cookie('id');
       $time = get_cookie('validity');
       $time = $this->encryption->decrypt($time);
       return ($this->client_model->isIn($email)>0 && hash("sha256",$key.'false'.$email)==get_cookie('the_good_one') && $time >=time());
     }


     public function getcontrats($num){
         if($this->controlValidity()){
           if($this->input->post("research")==null){
             $data['title'] = 'Liste des contrats';
             $data['listeC'] = $this->contrats_model->get_client_contrats($num);
             $this->load->view('template/header', $data);
             $this->load->view('template/navbar_client', $data);
             $this->load->view('pages/client/contrat', $data);
             $this->load->view('template/pagination',$data);
             $this->load->view('template/footer', $data);
           }else{
             $data['title'] = 'Liste des contrats';
             $research = $this->security->xss_clean($this->input->post('research'));
             $data['listeC'] = $this->contrats_model->get_somes_contrats($research);
             $this->load->view('template/header', $data);
             $this->load->view('template/navbar_client', $data);
             $this->load->view('pages/client/contrat', $data);
             $this->load->view('template/pagination',$data);
             $this->load->view('template/footer', $data);
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
         delete_cookie('id');
         redirect("/");
       }

}
