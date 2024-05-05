<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('userVerificationMail'))
{
    function userVerificationMail($data,$useremail)
    {
        $object =& get_instance();
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'jincysusanabraham01@gmail.com',
            'smtp_pass' => 'ayzf fsyl vtti kebl',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );
        $object->load->library('email', $config);
        $object->email->set_newline("\r\n");
        $object->email->initialize($config);
        $object->email->from('jincysusanabraham01@gmail.com', 'Your Name');
        $object->email->to($useremail);
        $object->email->subject('Your Email Subject');      

        //email template  formating
        // $data =[
        //     "username"=>"HH", 
        //     "verification_link"=>"http://localhost/shopping/success-Verify#"
        // ];
        $email_template = $object->load->view('Email/PasswordVerificationEmail', $data, TRUE);
        $email_message = sprintf($email_template);
        $object->email->message($email_template);

        //email send 
        if ($object->email->send()) {
            echo 'Email sent successfully.';
        } else {
            echo 'Unable to send email. Error: ' . $object->email->print_debugger();
        }
    }   
}