<?php 

class UserController extends Controller{
    public function __construct()
    {
        
    }

    public function register(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = [
                "name"=> $_POST['name'],
                "email"=> $_POST['email'],
                "phone"=> $_POST['phone'],
                "password"=> $_POST['password'],
                "name_err" => '',
                "email_err" => '',
                "phone_err" => '',
                "password_err" => '',
            ];
            $this->view("user/register",$data);
        }else{
            $this->view("user/register");
        }
    }
    public function login(){
        $this->view("user/login");
    }
}