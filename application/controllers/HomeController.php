<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
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
    public function register()
	{
        $this->load->view('Common/Header');
		$this->load->view('User/Register');
        $this->load->view('Common/Footer');
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
}
