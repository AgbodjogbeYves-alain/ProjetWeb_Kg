<?php
class Pages extends CI_Controller {

    public function view($page = 'accueil')
    {
      if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')){
                // Whoops, we don't have a page for that!
                echo('Whoops');
                show_404();
        }
      $data['title'] = ucfirst($page); // Capitalize the first letter
      $this->load->view('templates/header', $data);
      $this->load->view('pages/navbar_'.$page, $data);
      $this->load->view('pages/'.$page, $data);
      $this->load->view('templates/footer', $data);
    }
}
?>
