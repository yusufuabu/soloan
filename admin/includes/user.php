<?php 


class User extends Db_object {
    protected static $db_table = "users";
    protected static $db_table_fields = array('username','password','fullName','address','email', 'link','phone','dateJoined','status','bankName','bankNumber','level','user_image','temp');
    public $id;
    public $username;
    public $password;
    public $fullName;
    public $address;
    public $email;
    public $link;
    public $phone;
    public $status;
    public $dateJoined;
    public $bankName;
    public $level;
    public $bankNumber;
    public $user_image;
    public $temp;
    public $errorArray;
    public function __construct() {
        $this->errorArray = array();
    }
    // public $image_placeholder = "images/c3.jpg";
   
    public $upload_directory = "images/userimage";
    public $tmp_path;

    public function picture_path(){
        return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory .DS. $this->user_image;
    }

    public function set_file($file){
        if(empty($file) || !$file || !is_array($file)){
            $this->errors[] = "There was no file uploaded";
            return false;   
        } else if ($file['error'] != 0){
            $this->errors[] = $file['error'];
        } else {
            $this->user_image = uniqid(basename($file['name']));
            $this->tmp_path = $file['tmp_name'];
        }
    }

    public function save_file_image() {
        $target_path = $this->upload_directory .DS. $this->user_image ;
            $this->update();  
            move_uploaded_file($this->tmp_path, $target_path);
    }


    public static function verify_user($username,$password){
    global $database;
    $username = $database->escape_string($username);
    $password = $database->escape_string($password);

    $sql = "SELECT * FROM  ".self::$db_table ." WHERE (username = '{$username}' AND password = '{$password}') OR (email = '{$username}' AND password = '{$password}')  LIMIT 1";
    $the_result_array = self::find_this_query($sql);
        // return mysqli_fetch_array($result);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }


    public function ajax_save($user_image, $id){
        global $database;
        $user_image = $database->escape_string($user_image);
        $id = $database->escape_string($id);
        $this->user_image = $user_image;
        $this->id = $id;

        $sql = "UPDATE ". self::$db_table . " SET user_image = '{$this->user_image}' WHERE id = {$this->id}";
        $update_query = $database->query($sql);

        echo $this->picture_path();  
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
        $sql = mysqli_query($database->conn, "SELECT * FROM users WHERE username = '$username'");
        return mysqli_num_rows($sql);
    }

    public function find_by_email($email){
        global $database;
        $var;
        $sql = mysqli_query($database->conn, "SELECT * FROM users WHERE email = '$email'");
        return mysqli_num_rows($sql);
    }

    public static function find_by_email_values($email){
        global $database;
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $the_result_array = self::find_this_query($sql);
         return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public static function find_by_temp($temp){
        global $database;
         $sql = "SELECT * FROM users WHERE temp = '$temp'";
         $the_result_array = self::find_this_query($sql);
         return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }


    public function validateUser() {
        global $session;
        $numEmail = $this->find_by_email($this->email);
        $numRows = $this->find_by_username($this->username);
        if (strlen($this->username)< 5) {
            array_push($this->errorArray, Constants::$userNameCharacters);
            $session->message("The User cannot be less than five characters");
           redirect("../index#exampleModal1");
           return false;
        } else if ($numRows > 0 ){
            
            array_push($this->errorArray, Constants::$userNameTaken);
            $session->message("The Username already exist");
            redirect("../index#exampleModal1");
            return false;
           }  else if ($numEmail > 0 ){
            array_push($this->errorArray, Constants::$userNameTaken);
            $session->message("The Email already exist");
            redirect("../index#exampleModal1");
            return false;
           }  else  if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $session->message("The Email is not valid");
            redirect("../index#exampleModal1");
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
    public static function find_by_link($link) {
        $sql = "SELECT * FROM  ".self::$db_table ." WHERE link = '{$link}'";
        $the_result_array = self::find_this_query($sql);
            // return mysqli_fetch_array($result);
            return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public static function checkProfileDetails($id){
        global $database;;
        $test = $id;
        $sql = mysqli_query($database->conn, "SELECT * FROM users WHERE id = '$id'");
        while($row = mysqli_fetch_array($sql)){
        
        $username = $row['username'];
        $fullName = $row['fullName'];
        $address = $row['address'];
        $email = $row['email'];
       $phone = $row['phone'];
       $user_image = $row['user_image']; 

            if($username == "" || $fullName == "" || $address == "" || $email == "" || $phone == "" || $user_image == ""){
                return false;
            } else {
                return true;
            }

        }
    }

    public function blacklist() {
        $this->status = "Blacklisted";
        $this->update();
        return true;
    }

    public function active() {
        $this->status = "Active";
        $this->update();
        return true;
    }

    public static function find_blacklisted(){
        return static::find_this_query("SELECT * FROM  ".static::$db_table ." WHERE status = 'Blacklisted'");
         
     }

     public static function countStatus($status) {
        global $database;

        $sql = "SELECT COUNT(*) FROM " . static::$db_table . " WHERE status = '$status'";
        $result_set = $database->query($sql);
        $row = mysqli_fetch_array($result_set);

        return array_shift($row);
    }
}
?>
