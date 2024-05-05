<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function insert_user($data) {
        // Insert data into 'users' table
        $this->db->insert('users', $data);
        return $this->db->insert_id(); // Return the ID of the inserted row
    }
    public function get_users() {
        // Fetch data from 'your_table' table with WHERE condition
        //$this->db->where($condition);
        $v = 10;
        $query = $this->db->get('users');
        return $query->result(); // Return the result as an array of objects
        //return $v;
    }

}