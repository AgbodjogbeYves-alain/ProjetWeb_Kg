<?php
class Pages extends CI_Controller {

    public function accueil()
    {
      $data['title'] = ucfirst('KGE-Accueil'); // Capitalize the first letter
      $this->load->view('templates/header', $data);
      $this->load->view('pages/navbar_'.$page, $data);
      $this->load->view('pages/'.$page, $data);
      $this->load->view('templates/footer', $data);
    }
}
?>
