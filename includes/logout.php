<?php ob_start(); ?>
<?php require_once("../admin/includes/init.php"); ?>


<?php 
$session->logout();
redirect("../index");
?>
