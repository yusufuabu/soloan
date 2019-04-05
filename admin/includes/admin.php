<?php 


class Admin extends Db_object {
    protected static $db_table = "admin";
    protected static $db_table_fields = array('username','password','email','role');
    public $id;
    public $username;
    public $password;
    public $role;
    public $email;
    public $errorArray;
    public function __construct() {
        $this->errorArray = array();
    }
    // public $image_placeholder = "images/c3.jpg";

    public static function verify_user($username,$password){
    global $database;
    $username = $database->escape_string($username);
    $password = $database->escape_string($password);

    $sql = "SELECT * FROM  ".self::$db_table ." WHERE username = '{$username}' AND password = '{$password}' LIMIT 1";
    $the_result_array = self::find_this_query($sql);
        // return mysqli_fetch_array($result);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }




    public function delete_user() {

        if($this->delete()){
            $target_path = SITE_ROOT . DS . "admin" . DS . $this->picture_path();
            return unlink($target_path)? true :false; 
        } else {
            return false;
        }
    }

    public function find_by_username($username){
        global $database;
        $var;
        $sql = mysqli_query($database->conn, "SELECT * FROM admin WHERE username = '$username'");
        return mysqli_num_rows($sql);
    }

    public function find_by_email($email){
        global $database;
        $var;
        $sql = mysqli_query($database->conn, "SELECT * FROM admin WHERE email = '$email'");
        return mysqli_num_rows($sql);
    }


    public function validateUser() {
        global $session;
        $numEmail = $this->find_by_email($this->email);
        $numRows = $this->find_by_username($this->username);
        if (strlen($this->username)< 5) {
            array_push($this->errorArray, Constants::$userNameCharacters);
            $session->message("The Username cannot be less than five characters");
           redirect("add_admin");
           return false;
        } else if ($numRows > 0 ){
            
            array_push($this->errorArray, Constants::$userNameTaken);
            $session->message("The Username already exist");
            redirect("add_admin");
            return false;
           }  else if ($numEmail > 0 ){
            array_push($this->errorArray, Constants::$userNameTaken);
            $session->message("The Email already exist");
            redirect("add_admin");
            return false;
           }  else  if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $session->message("The Email is not valid");
            redirect("add_admin");
            return false;
           } else {
               return true;
           }
    }

    public function getError($error){
        if(!in_array($error, $this->errorArray)){
            $error ="";
        }
        return "<span class='bg-danger'>{$error}</span>";
    }

    public function showError() {
        foreach($this->errorArray as $error){
            echo $error;
        }
    }

}
?>

