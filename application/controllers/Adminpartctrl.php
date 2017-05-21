<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpartctrl extends CI_Controller {

  public function getclients(){
    $this->load->model("client_model");
    $data['title'] = 'Liste des clients';
    $data['listeC'] = $this->client_model->get_all_clients();
    $this->load->view('template/header', $data);
    $this->load->view('template/navbar_admin', $data);
    $this->load->view('pages/admin/clients', $data);
    $this->load->view('template/footer', $data);

    }
}
