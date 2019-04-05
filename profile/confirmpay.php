<?php
ob_start();
require_once("../admin/includes/paystack/src/autoload.php");
require_once("../admin/includes/init.php");
$reference = isset($_GET['reference']) ? $_GET['reference'] : '';
if(!$reference){
  die('No reference supplied');
}

// initiate the Library's Paystack Object
$paystack = new Yabacon\Paystack("sk_test_6fce0eaa4e250f24c97952109cc17302fd98ee94");
try
{
  // verify using the library
  $tranx = $paystack->transaction->verify([
    'reference'=>$reference, // unique to transactions
  ]);
} catch(\Yabacon\Paystack\Exception\ApiException $e){
  print_r($e->getResponseObject());
  die($e->getMessage());
}

if ('success' === $tranx->data->status) {
    $ref = Loans::findByReference($reference);
    $repay = new Repay();
    $repay->id = $ref->id;
    $repay->userId = $ref->userId;
    $repay->loanAmount = $ref->loanAmount;
    $repay->endorsementCount = $ref->endorsementCount;
    $repay->loanStatus = "Loan Repaid";
    $repay->loanDate = $ref->loanDate;
    $repay->repaymentDate = date("Y-m-d");
    $repay->paystackRef = $ref->paystackRef;
    $repay->create();
    $ref->delete();
    $session->message("Loan has now been Repaid");
    redirect("profile");
  // transaction was successful...
  // please check other things like whether you already gave value for this ref
  // if the email matches the customer who owns the product etc
  // Give value
} else {
    $session->message("Payment Failed");
    redirect("profile");
}


?>