<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

  public function __construct()
     {
             parent::__construct();
             $this->load->helper('url_helper');

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
      $data = $this->client_model->isIn(0);
      echo($data);

    }
}
