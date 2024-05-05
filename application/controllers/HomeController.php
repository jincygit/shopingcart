<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->helper('common');


        $this->load->database();

        $this->load->model('User_model');
        // You can load libraries, models, helpers, etc. here
    }
    public function index()
	{
        $this->load->view('Common/Header');
		$this->load->view('Home');
        $this->load->view('Common/Footer');
	}
    public function createProduct()
	{
        $this->load->view('Common/Header');
		$this->load->view('Product/CreateProduct');
        $this->load->view('Common/Footer');
	}
    public function register(){
        $this->form_validation->set_rules('user_name', 'Your Name', 'required');
        $this->form_validation->set_rules('user_email', 'Your Email', 'required|valid_email');
        $this->form_validation->set_rules('user_password', 'Your Password', 'required');
        $this->form_validation->set_rules('user_confirm_password', 'Confirm Password', 'required|matches[user_password]');

        if ($this->form_validation->run() == FALSE) {
            // if form validation failed
            $validation_errors = validation_errors();
            $this->load->view('Common/Header');
            $this->load->view('User/Register');
            $this->load->view('Common/Footer');
        }  
    }
    public function registerSubmissionAPI()
	{//it act as normal function and as API
        $raw_data = file_get_contents('php://input');
        $decoded_data = json_decode($raw_data, true);
        // $responseData = array(
        //     'status' => true,
        //     'data' => $raw_data,
        //     'typerawdata' => gettype($raw_data),
        //     'message' => "register sucessfully"
        // );
        // echo json_encode($responseData);die;

        //servervalidation
        if(!empty($raw_data)){
            $_POST['user_name'] = $decoded_data["signup"]["userName"];
            $_POST['user_email'] = $decoded_data["signup"]["userEmail"];
            $_POST['user_password'] = $decoded_data["signup"]["userPassword"];
            $_POST['user_confirm_password'] = $decoded_data["signup"]["userConfirmPassword"];
        }
        //validation rules
        $this->form_validation->set_rules('user_name', 'Your Name', 'required');
        $this->form_validation->set_rules('user_email', 'Your Email', 'required|valid_email');
        $this->form_validation->set_rules('user_password', 'Your Password', 'required');
        $this->form_validation->set_rules('user_confirm_password', 'Confirm Password', 'required|matches[user_password]');

        if ($this->form_validation->run() == FALSE) {
            // if form validation failed
            $validation_errors = validation_errors();
            $responseData = array(
                'status' => false,
                'error' => $validation_errors,
                'message' => "Registeration failed"
            );
            echo json_encode($responseData);
        } else {
            //if form validation passed
            //insert userdata
            $verification_otp = rand(100000, 999999);
            $hash_otp = md5($verification_otp);
            // $current_timestamp = time();

            //add 30 minutes for otp expiry
            $otp_expiry = time() + (30 * 60);
            $data = array(
                'user_otp' => $verification_otp,
                'user_session_expiry' => $otp_expiry,
                'user_role' => "customer",
                'user_name' => $decoded_data["signup"]["userName"],
                'user_email' => $decoded_data["signup"]["userEmail"],
                'user_password' => password_hash($decoded_data["signup"]["userPassword"], PASSWORD_BCRYPT),
            );
            $this->db->insert('users', $data);

            //customhelper for sending user  verification email
            $maildata =[
                "username"=>$data["user_name"], 
                "verification_link"=>"http://localhost/shopping/success-Verify/".$hash_otp
            ];
            userVerificationMail($maildata,$data["user_email"]);
              
            //responsedata
            $responseData = array(
                'status' => true,
                'data' => $decoded_data,
                'typerawdata' => gettype($raw_data),
                'message' => "register sucessfully"
            );
            echo json_encode($responseData);        
        }
	}
    public function login()
	{
        $this->load->view('Common/Header');
		$this->load->view('User/Login');
        $this->load->view('Common/Footer');
	}
    public function forgotPassword()
	{
        $this->load->view('Common/Header');
		$this->load->view('User/ForgotPassword');
        $this->load->view('Common/Footer');
	}
    public function updatePassword()
	{
        $this->load->view('Common/Header');
		$this->load->view('User/UpdatePassword');
        $this->load->view('Common/Footer');
	}
    public function successUserVerify($hashed_otp)
    {
        
        $this->load->view('Email/successUserVerify');
    }
    public function samplemydebuggingcode()
	{//it act as normal function and as API


        //print_r($this->input->post());die;
        //echo json_encode(array('success' => false, 'message' => 'Failed to register user'));die;
        

        // $data = $this->User_model->get_users();

        // $password = "GeeksforGeeks";
        // $newpassword = "GeeksforGeeks";

        // $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        // // Verify password
        // if (password_verify($newpassword, $hashed_password)) {
        //     echo 'Password is valid!';
        // } else {
        //     echo 'Invalid password.';
        // }
        
        //die;
        // if(!empty($raw_data)){
        //     $existing data= array(
        //     'name' => "qwe",
        //     'email' => "qwe@gmail.com",
        //    'age' => 20
        // );
        // $_POST['name'] = $existing["name"];
        // $_POST['email'] = $existing["email"];
        // $_POST['age'] = $existing["age"];
        // }

        // Set validation rules
        $this->form_validation->set_rules('user_name', 'Your Name', 'required');
        $this->form_validation->set_rules('user_email', 'Your Email', 'required|valid_email');
        $this->form_validation->set_rules('user_password', 'Your Password', 'required');
        $this->form_validation->set_rules('user_confirm_password', 'Confirm Password', 'required|matches[user_password]');

        if ($this->form_validation->run() == FALSE) {
            // if form validation failed
            $validation_errors = validation_errors();
            $this->load->view('Common/Header');
            $this->load->view('User/Register');
            $this->load->view('Common/Footer');
        } else {
            //if form validation passed
            //insert userdata
            $data = array(
                'user_name' => $this->input->post('user_name'),
                'user_email' => $this->input->post('user_email'),
                'user_password' => password_hash($this->input->post('user_password'), PASSWORD_BCRYPT),
            );
            //$this->db->insert('users', $data);

            //customhelper for sending user  verification email
            $maildata =[
                "username"=>$data["user_name"], 
                "verification_link"=>"http://localhost/shopping/success-Verify"
            ];
            userVerificationMail($maildata,$data["user_email"]);
            $raw_data = file_get_contents('php://input');
        //provide responsedata for API
        if(!empty($raw_data)){
            
            $decoded_data = json_decode($raw_data, true);
            $data = array(
                'status' => true,
                'data' => $decoded_data,
                'typerawdata' => gettype($raw_data),
                'message' => "register sucessfully"
            );
            echo json_encode($data);die;
        }
            //redirect('login');
        }
	}
}
