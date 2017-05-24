<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

        public function __construct() {
                // Call the CI_Model constructor
                parent::__construct();


        }

        public function isIn($email){
          $this->db->get_where('Administrateurs',array('email_admin'=>$email));
          return $this->db->count_all_results()===0;
        }

        public function get_admin_by_mail($email){
          $query = $this->db->get_where('Administrateurs',array('email_admin'=>$email));
          return $query->result_array();
        }

        public function get_admin_by_id($idadmin){
          $query = $this->db->get_where('Administrateurs',array('id_admin'=>$idadmin));
          return $query->result_array();
        }

        public function login_admin($email,$password){
            $query = $this->db->get_where('Administrateurs',array('email_administrateur' => $email,'password_admin' => $password ));
            return $query->result_array();
        }

        public function get_all_admins($num)
        {
          $haute = ($num*10)+10;
          $basse = $num*10;
          $this->db->select('*');
          $this->db->from('Administrateurs');
          $this->db->join('Privileges', 'Administrateurs.privilege_admin =Privileges.id_privilege');
          $this->db->limit($haute,$basse);
          $query = $this->db->get();
          return $query->result_array();
        }

        public function update_admins($newvalues,$id_Administrateur)
        {
            $this->db->where('id_Administrateur', $id_Administrateur);
            $this->db->update('Administrateur', $newvalues);
        }

        public function delete_admins($id_Administrateur)
        {
            $this->db->delete('Administrateur',array('id_Administrateur' => $id_Administrateur));
        }

        public function create_admins($array){
           $this->db->insert('Administrateur',$array);
        }

        public function get_somes_admins($param)
        {
          $this->db->select('*');
          $this->db->from('Administrateurs');
          $this->db->join('Privileges', 'Administrateurs.privilege_admin =Privileges.id_privilege');
          $this->db->like('nom_admin',$param);
          $this->db->or_like('libelle',$param);
          $this->db->or_like("prenom_admin",$param);
          $this->db->or_like("email_admin",$param);
          $query = $this->db->get();
          return $query->result_array();
        }



}
