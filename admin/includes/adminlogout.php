<?php ob_start(); ?>
<?php require_once("init.php"); ?>


<?php 
$adminsession->adminlogout();
redirect("../login");
?>