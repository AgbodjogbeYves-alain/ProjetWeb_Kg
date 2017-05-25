<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contrats_model extends CI_Model {

        public function __construct() {
                // Call the CI_Model constructor
                parent::__construct();


        }


        public function get_all_contrats($num)
        {
          $haute = ($num*10)+10;
          $basse = $num*10;
          $this->db->select('*');
          $this->db->from('Contrat');
          $this->db->join('Client', 'Client.id_client =Contrat.num_client');
          $this->db->join('Type_contrat', 'Type_contrat.id_type =Contrat.type_contrat');
          $this->db->limit($haute,$basse);
          $query = $this->db->get();
          return $query->result_array();
        }

        public function update_admins($newvalues,$id_administrateur)
        {
            $this->db->where('id_admin', $id_administrateur);
            $this->db->update('Administrateurs', $newvalues);
        }

        public function delete_admins($id_Administrateur)
        {
            $this->db->delete('Administrateurs',array('id_admin' => $id_Administrateur));
        }

        public function create_contrat($array){
           $this->db->insert('Contrat',$array);
        }

        public function get_somes_contrats($param)
        {
          $this->db->select('*');
          $this->db->from('Contrat');
          $this->db->join('Client', 'Client.id_client =Contrat.num_client');
          $this->db->join('Type_contrat', 'Type_contrat.id_type =Contrat.type_contrat');
          $this->db->like('nom_client',$param);
          $this->db->or_like('descriptif_type',$param);
          $this->db->or_like("email_client",$param);
          $this->db->or_like("representant",$param);
          $query = $this->db->get();
          return $query->result_array();
        }



}
