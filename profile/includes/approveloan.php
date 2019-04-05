<?php ob_start(); 

?>

<?php require_once("../../admin/includes/init.php");
if(!$session->is_signed_in()){redirect("index");}
$id = $_SESSION['id'];
$user = User::find_by_id($id);
$loans = new Loans();
$loan = '';
$date = date("Y-m-d");
$date = strtotime(date("Y-m-d", strtotime($date)) . " +1 month");
$date = date("Y-m-d",$date);

if (isset($_POST['confirm'])){
    $loans->loanAmount = $_POST['loanAmount'];
    $loans->endorsementCount = '0';
    $loans->userId = (int)$id;
    $loans->repaymentDate = '1970-01-01';
    $loans->loanStatus = 'Awaiting complete Endorsement';
    $loans->loanDate = '1970-01-01';

    $loans->create();
   redirect("../pendingloan?loan=". $loans->loanAmount);
}
?>


