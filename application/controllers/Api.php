<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api  extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('email');


        $this->load->database();

        $this->load->model('User_model');
        // You can load libraries, models, helpers, etc. here
    }
    public function index()
	{
		$this->load->view('welcome_message');
	}
    public function set() {

        $raw_data = file_get_contents('php://input');
        if (empty($raw_data)){
            echo "empty";
        }else{
            echo "not empty";
        }
        $decoded_data = json_decode($raw_data, true);

        $data = array(
            'status' => true,
            'data' => $decoded_data,
            'typerawdata' => gettype($raw_data),
            'decoded_data' => gettype($decoded_data),
            'message' => "register sucessfully"
        );
        echo json_encode($data);
    }
}
