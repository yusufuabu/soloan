<?php


class Adminsession {
    private $admin_signed_in;
    public $id;
    function __construct() {
        $this->check_the_admin_login();
    }


    public function is_admin_signed_in(){
        return $this->admin_signed_in;
    }

    public function adminlogin($user){
        if($user){
            $this->id = $_SESSION['id'] = $user->id;
            $this->admin_signed_in = true;
        }
    }

    public function adminlogout(){
        unset($this->id);
        unset($_SESSION['id']);
        $this->admin_signed_in = false;
    }
    private function check_the_admin_login(){
        if(isset($_SESSION['id'])){
            $this->id = $_SESSION['id'];
            $this->admin_signed_in = true;
        } else {
            unset($this->id);
            $this->admin_signed_in = false;
        }
    }




}

    


$adminsession = new Adminsession();

?>