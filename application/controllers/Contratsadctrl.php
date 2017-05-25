<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contratsadctrl extends CI_Controller {

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
    $time = get_cookie('validity');
    $time = $this->encryption->decrypt($time);
    return (hash("sha256",$key.'true'.$email)==get_cookie('the_good_one') && $time >=time());
  }


  public function getcontrats($num){
    if($this->estAdmin()){
      if($this->controlValidity()){
        $this->load->model('contrats_model');
        if($this->input->post("research")==null){
          $data['title'] = 'Liste des contrats';
          $data['listeC'] = $this->contrats_model->get_all_contrats($num);
          $this->load->view('template/header', $data);
          $this->load->view('template/navbar_admin', $data);
          $this->load->view('pages/admin/contrats', $data);
          $this->load->view('template/pagination',$data);
          $this->load->view('template/footer', $data);
        }else{
          $data['title'] = 'Liste des contrats';
          $research = $this->security->xss_clean($this->input->post('research'));
          $data['listeC'] = $this->contrats_model->get_somes_contrats($research);
          $this->load->view('template/header', $data);
          $this->load->view('template/navbar_admin', $data);
          $this->load->view('pages/admin/contrats', $data);
          $this->load->view('template/pagination',$data);
          $this->load->view('template/footer', $data);
        }

      }else{
        $this->deconnexion();
      }
    }else{
      $this->deconnexion();
    }

  }

      public function estAdmin(){
        $email = get_cookie('email');
        print($email);
        $this->load->model("admin_model");
        return  $this->admin_model->isIn($email)>0;
      }

    public function createcontrat(){
      if($this->estAdmin()){
        if($this->controlValidity()){
            $key=$this->config->item('key');
            $data['title'] = 'Liste des contrats';
            $this->load->model("contrats_model");
            $this->load->model("client_model");
            if($this->input->post('email')!==null && $this->input->post('type_contrat')!==null && isset($_FILES['upload'])){
              $email = $this->security->xss_clean($this->input->post('email'));
              if($this->client_model->isIn($email)>0){
                $type = $this->security->xss_clean($this->input->post('type_contrat'));
                $lien = base_url('contrats_upload/'.$this->upload_contrat($type,$email));
                $num = $this->client_model->get_clientid_by_mail($email)[0]['id_client'];
                $newcontrat =array(
                  'num_client'=> $num,
                  'type_contrat' => $type,
                  'liens_contrat' => $lien,
                );
                $this->contrats_model->create_contrat($newcontrat);
                redirect("contrats/get/0");

              }else{
                $data['error'] = "Veuillez creer d'abord ce client via le gestionnaire de client avant l'ajout du contrat";
                $this->load->view('template/header', $data);
                $this->load->view('template/error',$data);
                $this->load->view('template/navbar_admin', $data);
                $this->load->view('pages/admin/contrats', $data);
                $this->load->view('template/pagination',$data);
                $this->load->view('template/footer', $data);
              }
            }else{
              $data['error'] = "Veuillez entrer toute les informations demandées";
              redirect("contrats/get/0");
            }
          }else{
            $data['error'] = "Veuillez vous reconnecter";
            $this->deconnexion();
          }
        }else{
          $data['error'] = "Problème de droits";
          $this->deconnexion();
      }
    }

    public function upload_contrat($type,$mail){
        $dossier = $_SERVER["DOCUMENT_ROOT"].'/ProjetWeb_Kg/contrats_upload/';
        $key=$this->config->item('key');
        $fichier = $type.$mail;
        $taille_maxi = 100000000000000;
        $taille = filesize($_FILES['upload']['tmp_name']);
        $extensions = array('.png', '.gif', '.jpg', '.jpeg');
        $extension = strrchr($_FILES['upload']['name'], '.');
        //Début des vérifications de sécurité...
        if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
        {
             $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
        }
        if($taille>$taille_maxi)
        {
             $erreur = 'Le fichier est trop gros...';
        }
        if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
        {
           if(move_uploaded_file($_FILES['upload']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
           {
                echo 'Upload effectué avec succès !';
                return $fichier;
           }
           else //Sinon (la fonction renvoie FALSE).
           {
                echo 'Echec de l\'upload !';

           }
        }
        else
        {
             echo $erreur;
        }
    }


    public function deconnexion(){
      delete_cookie('the_good_one');
      delete_cookie('the_good_right');
      delete_cookie('email');
      delete_cookie('validity');
      delete_cookie('niveau');
      if(isset($data['error'])){
        $data['error']=$data['error'];
      }
      redirect("/");
  }


}
