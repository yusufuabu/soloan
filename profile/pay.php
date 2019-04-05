<?php  ob_start();
require_once("../admin/includes/paystack/src/autoload.php");
require_once("../admin/includes/init.php");
// $conn = mysqli_connect("localhost","afriteri_soc","Wisdom99@@","afriteri_socialoan");
$user = User::find_by_id($_SESSION['id']);
$id = $_GET['id'];
$amount = $_GET['amount'];
$amount = $amount . "00";
$amount = (int)$amount;
$id = $_GET['id'];
$email= $user->email;
$fee = new Yabacon\Paystack\Fee();
$charge = $fee->calculateFor($amount);
$amount = $charge + $amount;
$reference = uniqid().time();   

$paystack = new Yabacon\Paystack("sk_test_6fce0eaa4e250f24c97952109cc17302fd98ee94");
try  
{
  $tranx = $paystack->transaction->initialize([
    'amount'=>$amount,       // in kobo
    'email'=>$email,         // unique to customers
    'reference'=>$reference, // unique to transactions
  ]);
} catch(\Yabacon\Paystack\Exception\ApiException $e){
  print_r($e->getResponseObject());
  die($e->getMessage());
}

$addReference = Loans::find_by_id($id);

$addReference->paystackRef = $reference;
$addReference->update();

// store transaction reference so we can query in case user never comes back
// perhaps due to network issue
// save_last_transaction_reference($tranx->data->reference);

// redirect to page so User can pay
header('Location: ' . $tranx->data->authorization_url);




?>

