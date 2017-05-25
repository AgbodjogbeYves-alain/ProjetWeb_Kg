<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type_entreprise extends CI_Model {

        public function __construct() {
                // Call the CI_Model constructor
                parent::__construct();


        }
        public function get_id_by_libelle($libelle){
          $query = $this->db->select('id_type')->get_where("type_client",array('libelle',$libelle));
          return $query->resut();
        }

}
