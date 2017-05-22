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
          $this->db->select('*');
          $this->db->from('Client');
          $this->db->join('Type_client', 'Client.id_client = Type_client.id_type');
          $query = $this->db->get();
          return $query->result_array();
        }

        public function update_client($newvalues,$id_client)
        {
            $this->db->where('id_client', $id_client);
            $this->db->update('Client', $newvalues);
        }

        public function delete_client($id_client)
        {
            $this->db->delete('Client',array('id_client' => $id_client));
        }

        public function create_client($array){
           $this->db->create('Client',$array);
        }


}
