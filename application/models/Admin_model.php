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
            $query = $this->db->get_where('Administrateurs',array('email_client' => $email,'password_admin' => $password ));
            return $query->result_array();
        }
}
