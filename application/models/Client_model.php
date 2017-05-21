<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends CI_Model {

        public function __construct() {
                // Call the CI_Model constructor
                parent::__construct();


        }


        public function get_client($email){
          $query = $this->db->get_where('Client',array('email_client'=>$email));
          return $query->result_array();
        }

        public function get_first_ten_clients()
        {
                $query = $this->db->get('Client',10);
                return $query->result_array();
        }

        public function login_client($email,$password){
            $query = $this->db->get_where('Client',array('email_client' => $email,'password_client' => $password ));
            return $query->result_array();
        }

        public function get_all_clients()
        {
                $query = $this->db->get('Client');
                return $query->result_array();
        }

}
