<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    //insert user into user table
    public function insert_user($data) {
        $this->db->insert('users', $data);
        return $this->db->insert_id(); 
    }


    //user registration verification
    public function registerUserVerification($user_id, $user_otp) {
        $this->db->where('user_otp', $user_otp );
        $this->db->where('user_id', $user_id);       
        $query = $this->db->get('users');
        return $query->result_array(); 
    }


    //user verification update
    public function updateUserData($user_id, $new_data) {
        $this->db->where('user_id', $user_id);
        $query =$this->db->update('users', $new_data);
        return $this->db->affected_rows() > 0;
    }


    //user existence check with useremail
    public function userLogin($user_email) {
        $this->db->where('user_email', $user_email);       
        $query = $this->db->get('users');
        return $query->result_array(); 
    }


    //single product fetch
    public function singleProductFetch($product_id) {
        $this->db->where('product_id ', $product_id );  
        $query = $this->db->get('products');
        return $query->result_array(); 
    }


    //allProductFetch
    public function allProductFetch($limit, $offset) {
        //$this->db->limit($limit, $offset);     
        $query = $this->db->get('products');
        return $query->result_array(); 
    }

    //product update
    public function updateProduct($product_id, $new_data) {
        $this->db->where('product_id', $product_id);
        $query =$this->db->update('products', $new_data);
        return $this->db->affected_rows() > 0;
    }
    //delet product
    public function deleteProduct($product_id) {
        $this->db->where('product_id', $product_id);
        $this->db->delete('products');
        return $this->db->affected_rows() > 0;
    }

    //product exist check
    public function productExist($product_name) {
        $this->db->where('product_name', $product_name);       
        $query = $this->db->get('products');
        return $query->result_array(); 
    }

    //product exist check by product_id
    public function productExistById($product_id) {
        $this->db->where('product_id', $product_id);       
        $query = $this->db->get('products');
        return $query->result_array(); 
    }

    
    //categorylisting
    public function categoryListing($limit, $offset) {
        //$this->db->limit($limit, $offset);     
        $query = $this->db->get('category');
        return $query->result_array(); 
    }

    public function insertCategory($data) {
        $this->db->insert('category', $data);
        return $this->db->insert_id(); 
    }

    //product exist check
    public function categoryExist($category_name) {
        $this->db->where('category_name', $category_name);       
        $query = $this->db->get('category');
        return $query->result_array(); 
    }


    //category exist check by category_id
    public function categoryExistById($category_id ) {
        $this->db->where('category_id ', $category_id );       
        $query = $this->db->get('category');
        return $query->result_array(); 
    }

    //single product fetch
    public function singleCategoryFetch($category_id) {
        $this->db->where('category_id ', $category_id );  
        $query = $this->db->get('category');
        return $query->result_array(); 
    }


    //category update
    public function updateCategory($category_id, $new_data) {
        $this->db->where('category_id', $category_id);
        $query =$this->db->update('category', $new_data);
        return $this->db->affected_rows() > 0;
    }
    //delet category
    public function deleteCategory($category_id) {
        $this->db->where('category_id', $category_id);
        $this->db->delete('category');
        return $this->db->affected_rows() > 0;
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