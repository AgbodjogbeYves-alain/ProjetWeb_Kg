<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entreprise_model extends CI_Model {

        public function __construct() {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();

        }

        public function isIn($idEntreprise){
          $query = $this->db->get_where('Entreprise',array('id_entreprise'=>$idEntreprise))->count_all_result();
          return $query==0;
        }

        public function get_first_ten_enterprises()
        {
                $query = $this->db->get('Entreprise',10);
                return $query->result_array();
        }

        public function get_name_entreprise($idEntreprise)
        {
                $query = $this->db->select('nom_entreprise')->get_where('Entreprise',array('id_entreprise'=>$idEntreprise));
                return $query->result_array();
        }

        public function get_id_entreprise($nomEntreprise)
        {
                $query = $this->db->select('email_entreprise')->get_where('Entreprise',array('nom_entreprise'=>$nomEntreprise));
                return $query->result_array();
        }

        public function get_email_enterprises($idEntreprise)
        {
                $query = $this->db->select('email_entreprise')->get_where('Entreprise',array('id_entreprise'=>$idEntreprise));
                return $query->result_array();
        }

        public function get_representant_by_name($nomEntreprise)
        {
                $query = $this->db->select('representant')->get_where('Entreprise',array('nom_entreprise'=>$nomEntreprise));
                return $query->result();
        }

        public function get_representant_by_id($idEntreprise)
        {
                $query = $this->db->select('representant')->get_where('Entreprise',array('id_entreprise'=>$idEntreprise));
                return $query->result();
        }

        public function get_like_by_name($nomEntreprise)
        {
                $query = $this->db->like('nom_entreprise', $nomEntreprise)->from('Entreprise');
                return $query->result_array();
        }

        public function insert_entreprise()
        {
                $data = array(
                        'nom_entreprise' => $_POST['n_entreprise'],
                        'descriptif_entreprise' => $_POST['d_entreprise'],
                        'representant' => $_POST['r_entreprise'],
                        'email_entreprise' => $_POST['em_entreprise']
                        );
                $this->db->insert('Entreprise', $data);
        }

        public function update_entreprise($array,$idEntreprise)
        {
                $data = array(
                  'nom_entreprise' => $array[0],
                  'descriptif_entreprise' => $array[1],
                  'representant' => $array[2],
                  'email_entreprise' => $array[3]
                  );
                $this->db->update('Entreprise', $data,array('id_entreprise' => $idEntreprise));
        }

}
