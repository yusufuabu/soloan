<?php ob_start(); ?>
<?php require_once("init.php"); ?>


<?php 
// if($session->is_signed_in()){
//     redirect("index.php");
// }

if(isset($_POST["login"])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $password = md5($password);
    $user_found = Admin::verify_user($username,$password);
    if($user_found){
        $adminsession->adminlogin($user_found);
        redirect("../index");
    } else {
        $session->message("The username and password do not match");
        redirect("../login");
    }
} else {

}