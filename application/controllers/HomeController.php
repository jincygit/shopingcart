<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->library('session');

        $this->load->helper('common');


        $this->load->database();

        $this->load->model('User_model');
        // You can load libraries, models, helpers, etc. here
    }


    /////////USER SECTIONS/////////
    public function index(){
        //restrict user to enter dome page, only after login
	    $responseData= $this->userValidate();
        if ($responseData["status"]===true){
            $this->load->view('Common/Header');
            $this->load->view('Home');
            $this->load->view('Common/Footer');
        }else{
            redirect('login');
        }
	}

    /////////USER FUNCTIONS/////////
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
    

    public function login()
	{   //testingdata
        // $user_id = $this->session->userdata('USER_EMAIL');
        // $user_role = $this->session->userdata('USER_ROLE');
        // echo $user_id;echo "<br>";
        // echo $user_role;echo "<br>";die;

        $this->load->view('Common/Header');
		$this->load->view('User/Login');
        $this->load->view('Common/Footer');
	}


    public function logout()
	{
        //$this->session->unset_userdata('user_id');
        $this->session->sess_destroy();
        redirect('login');

	}


    public function forgotPassword()
	{
        $this->load->view('Common/Header');
		$this->load->view('User/ForgotPassword');
        $this->load->view('Common/Footer');
	}

    
    public function updatePassword()
	{   //restrict user to enter dome page, only after forgot password
        if ($this->session->has_userdata('FORGOT_PASSWORD_EMAIL')) {
            $this->load->view('Common/Header');
            $this->load->view('User/UpdatePassword');
            $this->load->view('Common/Footer');
        }else{
            redirect('forgotPassword');
        }
	}

    //registered user verify
    public function successUserVerify($user,$user_otp){
        if(!empty($user) && !empty($user_otp)){
            //check user existence with otp
            $user_data_exist = $this->User_model->registerUserVerification($user,$user_otp);
            
            if (count($user_data_exist) == 0) {
                //No user exist
                $this->load->view('Email/failedUserVerify');
            } else {


                if ($user_data_exist[0]['user_verify_flag']==1){
                    //Already verified
                    $this->load->view('Email/alreadyVerified');
                }else{
                    //checking otp expirytime using gmt timestamp
                    if((strtotime(gmdate('Y-m-d H:i:s', time()))<=strtotime($user_data_exist[0]['user_session_expiry']))){
                        //verifing 
                        $update_verify_flag = array('user_verify_flag' => 1);
                        //update user_verify_flag
                        $this->User_model->updateUserData($user_data_exist[0]['user_id'], $update_verify_flag);
                        $this->load->view('Email/successUserVerify');
                
                    }else{
                        //otpexpired
                        $this->load->view('Email/otpExpired');
                    }
                    
                }
                
            }       
        }else{
            //verification failed 
            $this->load->view('Email/failedUserVerify');
        }
    }


    /////////PRODUCT FUNCTIONS/////////
    public function createProduct()
	{
        //only admin can enter this page
        if ($this->session->has_userdata('USER_ROLE')==="admin") {
            $this->load->view('Common/Header');
		    $this->load->view('Product/CreateProduct');
            $this->load->view('Common/Footer');
        }else{
            redirect('login');
        }
	}

    
    public function editProduct()
	{
        //only admin can enter this page
        if ($this->session->has_userdata('USER_ROLE')==="admin") {
            $this->load->view('Common/Header');
		    $this->load->view('Product/EditProduct');
            $this->load->view('Common/Footer');
        }else{
            redirect('login');
        }
        
	}

    /////////CATEGORY FUNCTIONS/////////
    public function createCategory()
	{
        //only admin can enter this page
        if ($this->session->has_userdata('USER_ROLE')==="admin") {
            $this->load->view('Common/Header');
		    $this->load->view('Category/CreateCategory');
            $this->load->view('Common/Footer');
        }else{
            redirect('login');
        }
        
	}

    
    public function editCategory()
	{
        //only admin can enter this page
        if ($this->session->has_userdata('USER_ROLE')==="admin") {
            $this->load->view('Common/Header');
		    $this->load->view('Category/EditCategory');
            $this->load->view('Common/Footer');
        }else{
            redirect('login');
        }
        
	}


    /////////API SECTIONS/////////

    /////////USER API/////////

    //API for register submission 
    public function registerSubmissionAPI()
	{
        
        $raw_data = file_get_contents('php://input');
        $decoded_data = json_decode($raw_data, true);
        $responseData = array(
            'status' => false,
            'message' => "Registeration failed"
        );


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
                'errors' => $validation_errors,
                'message' => "Registeration failed"
            );
        } else {
            //form validation passed, checking  useremail existance
            $data_exist = $this->User_model->userLogin($_POST['user_email']);
            if (count($data_exist) !== 0) {
                //user exist, 


                //check user verified or not
                if($data_exist[0]["user_verify_flag"]===1){
                    //verified user exist
                    $responseData["message"]="User already verified,please login";
                }else{
                    //non verified user exist,send user  verification email
                    $verification_otp = rand(100000, 999999);
                    $maildata =[
                        "username"=>$data_exist[0]["user_name"], 
                        "useremail"=>$data_exist[0]["user_email"],
                        "userotp"=>$verification_otp,  
                        "verification_link"=>base_url('')."successUserVerify/".$decoded_data["signup"]["user_id"]."/".$verification_otp
                    ];
                    userVerificationMail($maildata,$data_exist[0]["user_email"]);  
                    $responseData["message"]="User exist,user verification email send,please verify";
                }
                

            } else {
                //user not exist,so we can insert
                $verification_otp = rand(100000, 999999);
                $hash_otp = md5($verification_otp);
                //add 30 minutes to the current time in UTC for otp expiry
                $currentTime = time();
                $otp_expiry = gmdate('Y-m-d H:i:s', $currentTime + 1800);


                //insert userdata
                $data = array(
                    'user_otp' => $verification_otp,
                    'user_session_expiry' => $otp_expiry,
                    'user_role' => "customer",
                    'user_name' => $decoded_data["signup"]["userName"],
                    'user_email' => $decoded_data["signup"]["userEmail"],
                    'user_password' => password_hash($decoded_data["signup"]["userPassword"], PASSWORD_BCRYPT),
                );
                $inserted_user_id= $this->User_model->insert_user($data);


                //customhelper for sending user  verification email
                $maildata =[
                    "username"=>$data["user_name"], 
                    "useremail"=>$decoded_data["signup"]["userEmail"],
                    "userotp"=>$verification_otp,  
                    "verification_link"=>base_url('')."/successUserVerify/".$inserted_user_id."/".$verification_otp
                ];
                userVerificationMail($maildata,$data["user_email"]);

                
                //success response
                $responseData = array(
                    'status' => true,
                    'data' => $decoded_data,
                    'typerawdata' => gettype($raw_data),
                    'otp_expiry' => $otp_expiry,
                    'time' => time() + (30 * 60),
                    'dt' => date('m/d/Y H:i:s', time() + (30 * 60)),
                    'message' => "register sucessfully,verification email is send to your email,please check"
                );
            }
                     
        }
        echo json_encode($responseData); 
	}


    //API for login submission 
    public function loginSubmissionAPI()
	{
        $raw_data = file_get_contents('php://input');
        $decoded_data = json_decode($raw_data, true);
        //servervalidation
        if(!empty($raw_data)){
            $_POST['user_email'] = $decoded_data["login"]["loginEmail"];
            $_POST['user_password'] = $decoded_data["login"]["loginPassword"];
        }
        //validation rules
        $this->form_validation->set_rules('user_email', 'Your Email', 'required|valid_email');
        $this->form_validation->set_rules('user_password', 'Your Password', 'required');


        if ($this->form_validation->run() == FALSE) {
            //form validation failed
            $validation_errors = validation_errors();
            $responseData = array(
                'status' => false,
                'errors' => $validation_errors,
                'message' => "Validation error"
            );
     

        } else {
            //form validation passed
            $responseData = array(
                'status' => false,
                'message' => "login sucessfully"
            );
            //checking user existence
            $user_data_exist = $this->User_model->userLogin($_POST['user_email']);
            if (count($user_data_exist) === 0) {
                //No user exist                
                $responseData["message"]="No such user exist";
            } else {


                //passwordmatch checking 
                if (password_verify($_POST['user_password'], $user_data_exist[0]['user_password'])) {
                    //Password is valid,then add user in sessions
                    $this->session->set_userdata('USER_EMAIL', $_POST['user_email']);
                    $this->session->set_userdata('USER_ROLE', $user_data_exist[0]['user_role']);
                    $responseData = array(
                        'status' => true,
                        'message' => "login successfully"
                    );
                } else {
                    //Invalid password
                    $responseData["message"]="Invalid password";
                }
            }  
        }
        echo json_encode($responseData);
	}


    //API for login submission 
    public function forgotSubmissionAPI()
	{
        $raw_data = file_get_contents('php://input');
        $decoded_data = json_decode($raw_data, true);
        $responseData = array(
            'status' => false,
            'message' => ""
        );


        //servervalidation
        if(!empty($raw_data)){
            $_POST['user_email'] = $decoded_data["forgot"]["forgotPasswordEmail"];
        }
        //validation rules
        $this->form_validation->set_rules('user_email', 'Your Email', 'required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            //form validation failed
            $validation_errors = validation_errors();
            $responseData = array(
                'status' => false,
                'errors' => $validation_errors,
                'message' => "Validation error"
            );
        } else {
            //form validation passed 
            

            //checking user existence
            $user_data_exist = $this->User_model->userLogin($_POST['user_email']);
            if (count($user_data_exist) === 0) {
                //No user exist                
                $responseData["message"]="No such user exist";
            } else {
                //user exist then add user in sessions
                $this->session->set_userdata('FORGOT_PASSWORD_EMAIL', $_POST['user_email']);
                $responseData = array(
                    'status' => true,
                    'data' => array('redirect_url' => "update_password"),
                    'message' => "User crosschecking finish successfully"
                );
                
            }  
        }
        echo json_encode($responseData);
	}


    //API for login submission 
    public function changePasswordAPI()
	{
        $raw_data = file_get_contents('php://input');
        $decoded_data = json_decode($raw_data, true);
        $responseData = array(
            'status' => false,
            'message' => ""
        );


        //servervalidation
        if(!empty($raw_data)){
            $_POST['user_email'] = $decoded_data["changePassword"]["userEmail"];
            $_POST['user_password'] = $decoded_data["changePassword"]["updateNewPassword"];
            $_POST['user_confirm_password'] = $decoded_data["changePassword"]["updateNewConfirmPassword"];
        }
        //validation rules
        $this->form_validation->set_rules('user_email', 'Your Email', 'required|valid_email');
        $this->form_validation->set_rules('user_password', 'Your Password', 'required');
        $this->form_validation->set_rules('user_confirm_password', 'Confirm Password', 'required|matches[user_password]');


        if ($this->form_validation->run() == FALSE) {
            //form validation failed
            $validation_errors = validation_errors();
            $responseData = array(
                'status' => false,
                'errors' => $validation_errors,
                'message' => "Validation error"
            );
            echo json_encode($responseData);         
        } else {
            //form validation passed

            
            //checking user existence
            $forgot_user_email = $this->session->userdata('FORGOT_PASSWORD_EMAIL');
            $user_data_exist = $this->User_model->userLogin($forgot_user_email);
            if (count($user_data_exist) === 0) {
                //No user exist                
                $responseData["message"]="No such user exist";
            } else {


                //update hashed password
                $update_verify_flag = array('user_password' => password_hash($_POST['user_password'], PASSWORD_BCRYPT),);
                $this->User_model->updateUserData($user_data_exist[0]['user_id'], $update_verify_flag);
                $this->session->unset_userdata('FORGOT_PASSWORD_EMAIL');
                $responseData = array(
                    'status' => true,
                    'data' => array('redirect_url' => "login"),
                    'message' => "change password successfully"
                ); 
            }
        }
            echo json_encode($responseData);  
        
        
	}


    /////////PRODUCT API/////////

    //API for addProduct submission 
    public function addProductAPI()
	{
        //check  user logged or not
        //check user permission
        $raw_data = file_get_contents('php://input');
        $decoded_data = json_decode($raw_data, true);
        $responseData = array(
            'status' => false,
            'message' => "Validation failed"
        );


        //servervalidation
        if(!empty($raw_data)){
            $_POST['product_name'] = $decoded_data["addProduct"]["addProductName"];
            $_POST['product_price'] = $decoded_data["addProduct"]["addProductPrice"];
            $_POST['product_description'] = $decoded_data["addProduct"]["addProductDescription"];
            $_POST['category_id'] = $decoded_data["addProduct"]["addProductCategory"];
        }
        //validation rules
        $this->form_validation->set_rules('product_name', 'Your Producct Name', 'required');
        $this->form_validation->set_rules('product_price', 'Your Producct Price', 'required');
        $this->form_validation->set_rules('product_description', 'Your Producct Description', 'required');
        

        if ($this->form_validation->run() == FALSE) {
            // if form validation failed
            $validation_errors = validation_errors();
            $responseData = array(
                'status' => false,
                'errors' => $validation_errors,
                'message' => "Validation failed"
            );
        } else {
            //form validation passed


            //userValidate
            $responseData= $this->userValidate();
            if ($responseData["status"]===true){
                //check product already exist or not  
                $user_data_exist = $this->User_model->productExist(strtolower($decoded_data["addProduct"]["addProductName"]));
                if (count($user_data_exist) === 0) {
                    //product name not exist  ,then insertion possible   
                    $data = array(
                        'product_name' => strtolower($decoded_data["addProduct"]["addProductName"]),
                        'product_price' => $decoded_data["addProduct"]["addProductPrice"],
                        'product_description' => $decoded_data["addProduct"]["addProductDescription"],
                        'category_id' => json_encode($decoded_data["addProduct"]["addProductCategory"]),  
                    );
                    $this->db->insert('products', $data);
                    $responseData["status"] = true;          
                    $responseData["message"]="Product added successfully";
                } else {
                    //Product name exist, then cannot insert
                    $responseData["status"]=false;
                    $responseData["message"]="Product name exist";            
                } 
                
            }
                    
        }
        echo json_encode($responseData); 
	}


    //API for editProduct submission 
    public function editProductAPI()
	{
        //check  user logged or not
        //check user permission
        $raw_data = file_get_contents('php://input');
        $decoded_data = json_decode($raw_data, true);
        $responseData = array(
            'status' => false,
            'message' => "Validation failed"
        );


        //servervalidation
        if(!empty($raw_data)){
            $_POST['product_name'] = $decoded_data["editProduct"]["editProductName"];
            $_POST['product_price'] = $decoded_data["editProduct"]["editProductPrice"];
            $_POST['product_description'] = $decoded_data["editProduct"]["editProductDescription"];
            $_POST['category_id'] = $decoded_data["editProduct"]["editProductCategory"];
        }
        //validation rules
        $this->form_validation->set_rules('product_name', 'Your Producct Name', 'required');
        $this->form_validation->set_rules('product_price', 'Your Producct Price', 'required');
        $this->form_validation->set_rules('product_description', 'Your Producct Description', 'required');
        

        if ($this->form_validation->run() == FALSE) {
            // if form validation failed
            $validation_errors = validation_errors();
            $responseData = array(
                'status' => false,
                'errors' => $validation_errors,
                'message' => "Validation failed"
            );
        } else {
            //form validation passed


            //userValidate
            $responseData= $this->userValidate();
            if ($responseData["status"]===true){
                //check product already exist or not  
                $product_id = $this->session->userdata('PRODUCT_ID');
                $user_data_exist = $this->User_model->productExistById(strtolower($product_id));
                

                
                if (count($user_data_exist) !== 0) {
                    //product  exist  ,then updation possible   
                    $newdata = array(
                        'product_name' => strtolower($decoded_data["editProduct"]["editProductName"]),
                        'product_price' => $decoded_data["editProduct"]["editProductPrice"],
                        'product_description' => $decoded_data["editProduct"]["editProductDescription"],
                        'category_id' => json_encode($decoded_data["editProduct"]["editProductCategory"]),  
                    );
                    $this->User_model->updateProduct($product_id,$newdata);
                    $responseData["status"] = true;          
                    $responseData["message"]="Product edited successfully";
                } else {
                    //Product not exist, then cannot update
                    $responseData["status"]=false;
                    $responseData["message"]="Product not exist";            
                }        
            }           
        }
        echo json_encode($responseData); 
	}


    //API for deleteProduct submission 
    public function deleteProductAPI()
	{
        //check user permission
        $raw_data = file_get_contents('php://input');
        $decoded_data = json_decode($raw_data, true);
        $responseData = array(
            'status' => false,
            'message' => "Validation failed"
        );


        //userValidate
        $responseData= $this->userValidate();
        if ($responseData["status"]===true){
            //check product validity  
            $responseData["status"] = false; 
            $responseData= $this->productValidate();
            if ($responseData["status"]===true){
                //product  exist  ,then delete possible 
                $product_id = $this->session->userdata('PRODUCT_ID');  
                $this->User_model->deleteProduct($product_id);
                $responseData["status"] = true;          
                $responseData["message"]="Product deleted successfully";
            } else {
                //Product not exist, then cannot delete
                $responseData["message"]="Product not deleted";            
            }  
        }
        echo json_encode($responseData); 
	}


    //API for cfetch single product 
    public function singleProductDataAPI()
	{
        $responseData = array(
            'status' => false,
            'message' => ""
        );
        $raw_data = file_get_contents('php://input');
        $decoded_data = json_decode($raw_data, true);
        $this->session->set_userdata('PRODUCT_ID', $decoded_data["product_id"]);
        //checking user existence  in session and validity
        $responseData= $this->userValidate();
        if ($responseData["status"]===true){
            
            //user validated
            $product_id = $decoded_data["product_id"];
            //get Product data
            $data_exist = $this->User_model->singleProductFetch($product_id);
            if (count($data_exist) === 0) {
                //No Product data              
                $responseData["message"]="No Product data";
            } else {
                $responseData["status"]=true;
                $responseData["data"]=$data_exist;
                $responseData["data"]["category_id"]= json_decode($data_exist[0]["category_id"]);
                //$responseData["test"]= json_decode($data_exist[0]["category_id"]);
                //json_encode(
                $responseData["message"]="Product data found"; 
            }       
        }else{
            $responseData["message"]="User not logged"; 
        }
        echo json_encode($responseData);
        
    }


    //API for cfetch single product 
    public function allProductDataAPI()
	{
        $responseData = array(
            'status' => false,
            'message' => ""
        );
        $raw_data = file_get_contents('php://input');
        $decoded_data = json_decode($raw_data, true);
        //checking user existence  in session and validity
        $responseData= $this->userValidate();
        if ($responseData["status"]===true){

            //user validated
            $limit = $decoded_data["limit"];
            $offset = $decoded_data["offset"];
            //get  all Product data
            $data_exist = $this->User_model->allProductFetch($limit, $offset);
            if (count($data_exist) === 0) {
                //No Product data              
                $responseData["message"]="No Product data";
            } else {
                $responseData["status"]=true;
                $responseData["data"]=$data_exist;
                $responseData["message"]="Product data found"; 
            }       
        }else{
            $responseData["message"]="User not logged"; 
        }
        echo json_encode($responseData);
        
    }


    /////////CATEGORY API/////////

    //API for categoryListing 
    public function categoryListingAPI()
	{
        $responseData = array(
            'status' => false,
            'message' => ""
        );
        $raw_data = file_get_contents('php://input');
        $decoded_data = json_decode($raw_data, true);
        //checking user existence in session
        if ($this->session->has_userdata('USER_EMAIL')) {
            $user_email = $this->session->userdata('USER_EMAIL');
            //checking valid user
            $user_data_exist = $this->User_model->userLogin($user_email);
            if (count($user_data_exist) === 0) {
                //No user exist                
                $responseData["message"]="No such user exist";
            } else {
                //user exist
                $limit = $decoded_data["limit"];
                $offset = $decoded_data["offset"];
                //get category data
                $category_data_exist = $this->User_model->categoryListing($limit, $offset);
                if (count($category_data_exist) === 0) {
                    //No Category data              
                    $responseData["message"]="No Category";
                } else {
                    $responseData["status"]=true;
                    $responseData["data"]=$category_data_exist;
                    $responseData["message"]="Category data found"; 
                }
            }
            
        }else{
            //$responseData["status"]=true;
            $responseData["message"]="User not logged"; 
        }
        echo json_encode($responseData);
        
    }


    //API for addCategory submission 
    public function addCategoryAPI()
	{
        //check  user logged or not
        //check user permission
        $raw_data = file_get_contents('php://input');
        $decoded_data = json_decode($raw_data, true);
        $responseData = array(
            'status' => false,
            'message' => "Validation failed"
        );

        //servervalidation
        if(!empty($raw_data)){
            $_POST['category_name'] = $decoded_data["addCategory"]["addCategoryName"];
        }
        //validation rules
        $this->form_validation->set_rules('category_name', 'Your Producct Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            // if form validation failed
            $validation_errors = validation_errors();
            $responseData = array(
                'status' => false,
                'errors' => $validation_errors,
                'message' => "Validation failed"
            );
        } else {
            //form validation passed
            //userValidate
            $responseData= $this->userValidate();
            if ($responseData["status"]===true){
                //check Category already exist or not  
                $user_data_exist = $this->User_model->categoryExist(strtolower($decoded_data["addCategory"]["addCategoryName"]));
                if (count($user_data_exist) === 0) {
                    //Category name not exist  ,then insertion possible   
                    $data = array(
                        'category_name' => strtolower($decoded_data["addCategory"]["addCategoryName"]), 
                    );
                    $this->User_model->insertCategory($data);
                    $responseData["status"] = true;          
                    $responseData["message"]="Category added successfully";
                } else {
                    //Category name exist, then cannot insert
                    $responseData["status"]=false;
                    $responseData["message"]="Category name already exist";            
                } 
                
            }       
        }
        echo json_encode($responseData); 
	}


    //API for editCategory submission 
    public function editCategoryAPI()
	{
        //check  user logged or not
        //check user permission
        $raw_data = file_get_contents('php://input');
        $decoded_data = json_decode($raw_data, true);
        $responseData = array(
            'status' => false,
            'message' => "Validation failed"
        );

        //servervalidation
        if(!empty($raw_data)){
            $_POST['category_name'] = $decoded_data["editCategory"]["editCategoryName"];
            
        }
        //validation rules
        $this->form_validation->set_rules('category_name', 'Your Category Name', 'required');
        

        if ($this->form_validation->run() == FALSE) {
            // if form validation failed
            $validation_errors = validation_errors();
            $responseData = array(
                'status' => false,
                'errors' => $validation_errors,
                'message' => "Validation failed"
            );
        } else {
            //form validation passed

            //userValidate
            $responseData= $this->userValidate();
            if ($responseData["status"]===true){
                $responseData["status"] = false; 
                //validate category
                $responseData= $this->categoryValidate();
                if ($responseData["status"]===true){

                    $responseData["status"] = false; 
                    $category_id = $this->session->userdata('CATEGORY_ID');
                    //check Categoryname duplication already exist or not  
                    $data_exist = $this->User_model->categoryExist(strtolower($decoded_data["editCategory"]["editCategoryName"]));
                    if (count($data_exist) === 0) {
                        //Category name not exist  ,then updation possible
                        $newdata = array(
                            'category_name' => strtolower($decoded_data["editCategory"]["editCategoryName"]), 
                        );
                        $this->User_model->updateCategory($category_id,$newdata);
                        $responseData["status"] = true;          
                        $responseData["message"]="Category edited successfully";   
                    }else{
                        $responseData["message"]="Categoryname repetation is not allowed";      
                    }
 
                     
                }
                
            }
                    
        }
        echo json_encode($responseData); 
	}


    //API for deleteCategory submission 
    public function deleteCategoryAPI()
	{
        //check user permission
        $raw_data = file_get_contents('php://input');
        $decoded_data = json_decode($raw_data, true);
        $responseData = array(
            'status' => false,
            'message' => "Validation failed"
        );
        
        //userValidate
        $responseData= $this->userValidate();
        if ($responseData["status"]===true){
            //check Category validity  
            $responseData["status"] = false;      
            $responseData= $this->categoryValidate();
            
            if ($responseData["status"]===true){
                //Category  exist  ,then delete possible 
                $category_id = $this->session->userdata('CATEGORY_ID');  
                $this->User_model->deleteCategory($category_id);
                $responseData["status"] = true;          
                $responseData["message"]="Category deleted successfully";
            } else {
                //Category not exist, then cannot delete
                $responseData["message"]="Category not deleted";            
            }  
            
        }
        echo json_encode($responseData); 
	}


    //API for cfetch single product 
    public function singleCategoryDataAPI()
	{
        $responseData = array(
            'status' => false,
            'message' => ""
        );
        $raw_data = file_get_contents('php://input');
        $decoded_data = json_decode($raw_data, true);
        $this->session->set_userdata('CATEGORY_ID', $decoded_data["category_id"]);
        //checking user existence  in session and validity
        $responseData= $this->userValidate();
        if ($responseData["status"]===true){
            
            //user validated
            $category_id = $decoded_data["category_id"];
            //get Product data
            $data_exist = $this->User_model->singleCategoryFetch($category_id);
            if (count($data_exist) === 0) {
                //No Product data              
                $responseData["message"]="No Category data";
            } else {
                $responseData["status"]=true;
                $responseData["data"]=$data_exist;
                $responseData["data"]["category_id"]= json_decode($data_exist[0]["category_id"]);
                //$responseData["test"]= json_decode($data_exist[0]["category_id"]);
                //json_encode(
                $responseData["message"]="Category data found"; 
            }       
        }else{
            $responseData["message"]="User not logged"; 
        }
        echo json_encode($responseData);
        
    }


    /////////COMMON FUNCTIONS/////////

    //to validate user
    public function userValidate()
	{
        $responseData["status"]=false;
        //checking user existence in session
        if ($this->session->has_userdata('USER_EMAIL')) {
            $user_email = $this->session->userdata('USER_EMAIL');
            //validate user
            $user_data_exist = $this->User_model->userLogin($user_email);
            if (count($user_data_exist) === 0) {
                //No user exist                
                $responseData["message"]="No such user exist";
            } else {
                //user exist
                $responseData["status"]=true;
                $responseData["message"]="User validated";            
            } 
        }else{
            //$responseData["status"]=true;
            $responseData["message"]="User not logged"; 
        }
        return $responseData;
    }

    //to validate product
    public function productValidate()
	{
        $responseData["status"]=false;
        //checking product existence in session
        if ($this->session->has_userdata('PRODUCT_ID')) {
            $product_id = $this->session->userdata('PRODUCT_ID');
            //validate product
            $user_data_exist = $this->User_model->productExistById($product_id);
            if (count($user_data_exist) === 0) {
                //No product exist                
                $responseData["message"]="No such product exist";
            } else {
                //product exist
                $responseData["status"]=true;
                $responseData["message"]="Product validated";            
            } 
        }else{
            $responseData["message"]="Product not exist"; 
        }
        return $responseData;
    }

    //to validate category
    public function categoryValidate()
	{
        $responseData["status"]=false;
        //checking data existence in session
        if ($this->session->has_userdata('CATEGORY_ID')) {
            $category_id = $this->session->userdata('CATEGORY_ID');
            //validate category
            $data_exist = $this->User_model->categoryExistById($category_id);
            if (count($data_exist) === 0) {
                //No category exist   
                $responseData["message"]="No such category exist";
            } else {
                //category exist
                $responseData["status"]=true;
                $responseData["message"]="category validated";            
            } 
        }else{
            $responseData["message"]="user not exist"; 
        }
        //$responseData["CATEGORY_ID"]=$this->session->has_userdata('CATEGORY_ID');
        return $responseData;
    }


    
    public function samplemydebuggingcode()
	{


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
        
        
	}
}
