<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends CI_Model {

        public function __construct() {
                // Call the CI_Model constructor
                parent::__construct();


        }

        public function isIn($email){
          $query = $this->db->get_where('Client',array('email_client'=>$email));
          $query = $query->result_array();
          return count($query);
        }

        public function get_client_by_id($id){
          $this->db->select('nom_client,descriptif_client,representant,email_client,libelle');
          $this->db->join('Type_client', 'Client.type_client = Type_client.id_type');
          $query=$this->db->get_where('Client',array('id_client'=>$id));
          return $query->result_array();
        }

        public function get_clientid_by_mail($email){
          $query = $this->db->select('id_client')->get_where('Client',array('email_client'=>$email));
          return $query->result_array();
        }

        public function get_client($email){
          $query = $this->db->get_where('Client',array('email_client'=>$email));
          return $query->result_array();
        }

        public function getpass($id){
          $query = $this->db->select('password_client')->get_where('Client',array('id_client'=>$id));
          return $query->result_array();
        }

        public function login_client($email,$password){
            $query = $this->db->get_where('Client',array('email_client' => $email,'password_client' => $password ));
            return $query->result_array();
        }

        public function get_all_clients($num)
        {
          $haute = ($num*10)+10;
          $basse = $num*10;
          $this->db->select('*');
          $this->db->from('Client');
          $this->db->join('Type_client', 'Client.type_client = Type_client.id_type');
          $this->db->limit($haute,$basse);
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
           $this->db->insert('Client',$array);
        }

        public function get_somes_clients($param)
        {
          $this->db->select('*');
          $this->db->from('Client');
          $this->db->join('Type_client', 'Client.type_client = Type_client.id_type');
          $this->db->like('nom_client',$param);
          $this->db->or_like('libelle',$param);
          $this->db->or_like("descriptif_client",$param);
          $this->db->or_like("representant",$param);
          $this->db->or_like("email_client",$param);
          $query = $this->db->get();
          return $query->result_array();
        }


}
