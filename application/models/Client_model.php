<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends CI_Model {

        public function __construct() {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();

        }

        public function isIn($idClient){
          $this->db->get_where('Client',array('num_client'=>$idClient));
          $query = $this->db->count_all_results();
          return $query==0;
        }

        public function get_first_ten_clients()
        {
                $query = $this->db->get('Client',10);
                return $query->result_array();
        }

        public function get_password_by_num($numClient)
        {
                $query = $this->db->select('password_client')->get_where('Client',array('num_client'=>$numClient));
                return $query->result();
        }

        public function get_typeclient_by_num($numClient)
        {
                $query = $this->db->select('type_client')->get_where('Client',array('num_client'=>$numClient));
                return $query->result();
        }

        public function get_email_by_num($numClient)
        {
                $query = $this->db->select('email_client')->get_where('Client',array('email_client'=>$numClient));
                return $query->result();
        }

}
