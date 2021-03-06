<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

        public function __construct() {
                // Call the CI_Model constructor
                parent::__construct();


        }

        public function isIn($email){
          $query = $this->db->get_where('Administrateurs',array('email_admin'=>$email));
          $query = $query->result_array();
          return  count($query);
        }

        public function get_admin_by_mail($email){
          $query = $this->db->get_where('Administrateurs',array('email_admin'=>$email));
          return $query->result_array();
        }

        public function get_admin_by_id($idadmin){
          $query = $this->db->get_where('Administrateurs',array('id_admin'=>$idadmin));
          return $query->result_array();
        }

        public function get_all_admins($num)
        {
          $haute = ($num*10)+10;
          $basse = $num*10;
          $this->db->select('id_admin,nom_admin,prenom_admin,numero_admin,email_admin,libelle');
          $this->db->from('Administrateurs');
          $this->db->join('Privileges', 'Administrateurs.privilege_admin =Privileges.id_privilege');
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

        public function create_admin($array){
           $this->db->insert('Administrateurs',$array);
        }

        public function get_somes_admins($param)
        {
          $this->db->select('id_admin,nom_admin,prenom_admin,numero_admin,email_admin,libelle');
          $this->db->from('Administrateurs');
          $this->db->join('Privileges', 'Administrateurs.privilege_admin =Privileges.id_privilege');
          $this->db->like('LOWER(nom_admin)',strtolower($param));
          $this->db->or_like('LOWER(libelle)',strtolower($param));
          $this->db->or_like('LOWER(prenom_admin)',strtolower($param));
          $this->db->or_like('LOWER(email_admin)',strtolower($param));
          $query = $this->db->get();
          return $query->result_array();
        }


}
