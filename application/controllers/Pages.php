<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function accueil()
    {
      $data['title'] = ucfirst('KGE-Accueil'); // Capitalize the first letter
      $this->load->view('template/header', $data);
      $this->load->view('pages/navbar_accueil', $data);
      $this->load->view('pages/accueil', $data);
      $this->load->view('template/footer', $data);
    }
}
?>
