<?php


class Session {
    private $signed_in;
    public $id;
    public $message;
    
    function __construct() {
        session_start();
        $this->check_the_login();
        $this->check_message();
    }
// Return User SignIn Status
    public function is_signed_in(){
        return $this->signed_in;
    }
    // Login User
    public function login($user){
        if($user){
            $this->id = $_SESSION['id'] = $user->id;
            $this->signed_in = true;
        }
    }
// Logout User
    public function logout(){
        unset($this->id);
        unset($_SESSION['id']);
        $this->signed_in = false;
    }
    // Check if user is logged in 
    private function check_the_login(){
        if(isset($_SESSION['id'])){
            $this->id = $_SESSION['id'];
            $this->signed_in = true;
        } else {
            unset($this->id);
            $this->signed_in = false;
        }
    }
    // Sesion messages between pages
    public function message($msg=""){
        if(!empty($msg)){
            $_SESSION['message'] = $msg;
        } else {
            return $this->message;
        }
    }
    // Check Message
    public function check_message() {
        if(isset($_SESSION['message'])){
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = "";
        }
    }
}

    


$session = new Session();
$message = $session->message();
?>