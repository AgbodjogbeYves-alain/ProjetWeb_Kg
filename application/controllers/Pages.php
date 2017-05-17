<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

  public function __construct()
     {
             parent::__construct();
             $this->load->helper('url_helper');
             $this->load->database();
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
      $this->load->model('entreprise_model');
      $data['nom_entreprise'] = $this->entreprise->get_name_entreprise(0);
      echo($data['nom_entreprise']);
      $this->load->view('template/header', $data);
      $this->load->view('pages/accueil/navbar_accueil', $data);
      $this->load->view('pages/accueil/accueil', $data);
      $this->load->view('template/footer', $data);

    }
}
