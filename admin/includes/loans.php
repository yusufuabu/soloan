<?php 
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

class Loans extends Db_object {
    protected static $db_table = "loans";
    protected static $db_table_fields = array('userId','loanAmount','endorsementCount','loanStatus','repaymentDate','loanDate','paystackRef');
    public $id;
    public $userId;
    public $loanAmount;
    public $endorsementCount;
    public $loanStatus;
    public $loanDate;
    public $repaymentDate;
    public $paystackRef;
     
    public function checkDate($date) {
        $repay = $date;
        if($repay == "1970-01-01"){
            $repay = "";
        }
        return $repay; 
    }

    public static function getLoan($userId) {
        $sql = "SELECT * FROM  ".self::$db_table ." WHERE userId = '{$userId}'";
        $the_result_array = self::find_this_query($sql);
            // return mysqli_fetch_array($result);
            return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }
    
    public static function findByReference($reference) {
        $sql = "SELECT * FROM  ".self::$db_table ." WHERE paystackRef = '{$reference}'";
        $the_result_array = self::find_this_query($sql);
            // return mysqli_fetch_array($result);
            return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public static function endorseloan($userId){
        global $database; 

        $result = mysqli_query($database->conn, "UPDATE loans SET 	endorsementCount = 	endorsementCount + 1 WHERE userId = '$userId'");
        if($result){
            return true;
        } else {
            return false;
        }
    }

    public function claimbonus($userId){
        global $database; 

        $result = mysqli_query($database->conn, "UPDATE loans SET 	endorsementCount = 	endorsementCount + 5 WHERE userId = '$userId'");
        if($result){
            return true;
        } else {
            return false;
        }
    }

    public function updateClaimCount($userId) {
        global $database; 
        $user = User::find_by_id($userId);
        $countQuery = mysqli_query($database->conn, "SELECT * FROM loans WHERE userId = '$userId'");
        while($row = mysqli_fetch_array($countQuery)){
            $count = $row['endorsementCount'];
            $loanAmount = $row['loanAmount'];
            if($count >= $loanAmount){
               mysqli_query($database->conn, "UPDATE loans SET 	loanStatus = 'Endorsement Complete'  WHERE userId = '$userId'");
               $body = '<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#8d8e90">
               <tr>
                 <td><table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center" style="border-bottom: 12px solid #535353; border-radius: 6px ">
                     <tr>
                       <td align="center">&nbsp;</td>
                     </tr>
                     <tr>
                       <td>&nbsp;</td>
                     </tr>
                     <tr>
                       <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                             <td width="10%">&nbsp;</td>
                             <td width="80%" align="left" valign="top"><font style="font-family: Verdana, Geneva, sans-serif; color:#666766; font-size:13px; "><strong><em>Hello '.$user->username.',</em></strong></font><br /><br />
                               <font style="font-family: Verdana, Geneva, sans-serif; color:#666766; font-size:13px; line-height:21px">Your Endorsement is complete.
             <br /><br/>
             <p>Your Loan of &#8358;'.$loanAmount.' has received complete Endorsement awaiting approval </p>
         
               
               
             
               <em>-Your friends at SociaLoan</em></p>
             <br>
               <br>
             
             
             </font></td>
                             <td width="10%">&nbsp;</td>
                           </tr>
                           <tr>
                             <td>&nbsp;</td>
                             <td align="right" valign="top"><table width="108" border="0" cellspacing="0" cellpadding="0">
                            
                               
                             </table></td>
                             <td>&nbsp;</td>
                           </tr>
                         </table></td>
                     </tr>
                     <tr>
                       <td>&nbsp;</td>
                     </tr>
                    
                   </table></td>
               </tr>
             </table>
             <div style="font-family: Verdana, Geneva, sans-serif; color:#062446; font-weight: bold; font-size:13px; margin: 0 auto; width: 80%;text-align: center; padding-top: 10px">Questions? Visit the <a href="http://SociaLoan.net/profile/support">Support centre</a></div>';
 
               $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
 try {
 
 
     //Recipients
     $mail->setFrom('noreply@sociaLoan.net', 'SociaLoan');
     $mail->addAddress($user->email);     // Add a recipient
     $mail->addBcc("admin@socialoan.net");

     //Content
     $mail->isHTML(true);                                  // Set email format to HTML
     $mail->Subject = 'SociaLoan';
     $mail->Body = $body;
     $mail->send();
 } catch (Exception $e) {
     echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;

 }
            }
        }
    }

    public function checkClaimCount($userId) {
        global $database; 

        $countQuery = mysqli_query($database->conn, "SELECT * FROM loans WHERE userId = '$userId'");
        while($row = mysqli_fetch_array($countQuery)){
            $count = $row['endorsementCount'];
            $loanAmount = $row['loanAmount'];
            if($count >= $loanAmount){
                return true;
            }
        }
    }
    public static function checkLoanExist($userId) {
        global $database; 

        $countQuery = mysqli_query($database->conn, "SELECT * FROM loans WHERE userId = '$userId'");
        $numRows3 = mysqli_num_rows($countQuery);
        if($numRows3 == 0){
            return false;
        } else {
            return true;
        }
    }
    public function updateCount($userId) {
        global $database; 
        $user = User::find_by_id($userId);
        $countQuery = mysqli_query($database->conn, "SELECT * FROM loans WHERE userId = '$userId'");
        while($row = mysqli_fetch_array($countQuery)){
            $count = $row['endorsementCount'];
            $loanAmount = $row['loanAmount'];
            if($count == $loanAmount){
               mysqli_query($database->conn, "UPDATE loans SET 	loanStatus = 'Endorsement Complete'  WHERE userId = '$userId'");
               $body = '<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#8d8e90">
               <tr>
                 <td><table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center" style="border-bottom: 12px solid #535353; border-radius: 6px ">
                     <tr>
                       <td align="center">&nbsp;</td>
                     </tr>
                     <tr>
                       <td>&nbsp;</td>
                     </tr>
                     <tr>
                       <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                             <td width="10%">&nbsp;</td>
                             <td width="80%" align="left" valign="top"><font style="font-family: Verdana, Geneva, sans-serif; color:#666766; font-size:13px; "><strong><em>Hello '.$user->username.',</em></strong></font><br /><br />
                               <font style="font-family: Verdana, Geneva, sans-serif; color:#666766; font-size:13px; line-height:21px">Your Endorsement is complete.
             <br /><br/>
             <p>Your Loan of &#8358;'.$loanAmount.' has received complete Endorsement awaiting approval </p>
         
               
               
             
               <em>-Your friends at SociaLoan</em></p>
             <br>
               <br>
             
             
             </font></td>
                             <td width="10%">&nbsp;</td>
                           </tr>
                           <tr>
                             <td>&nbsp;</td>
                             <td align="right" valign="top"><table width="108" border="0" cellspacing="0" cellpadding="0">
                            
                               
                             </table></td>
                             <td>&nbsp;</td>
                           </tr>
                         </table></td>
                     </tr>
                     <tr>
                       <td>&nbsp;</td>
                     </tr>
                    
                   </table></td>
               </tr>
             </table>
             <div style="font-family: Verdana, Geneva, sans-serif; color:#062446; font-weight: bold; font-size:13px; margin: 0 auto; width: 80%;text-align: center; padding-top: 10px">Questions? Visit the <a href="http://SociaLoan.net/profile/support">Support centre</a></div>';
 
               $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
 try {
 
 
     //Recipients
     $mail->setFrom('noreply@sociaLoan.net', 'SociaLoan');
     $mail->addAddress($user->email);     // Add a recipient
     $mail->addBcc("admin@socialoan.net");

     //Content
     $mail->isHTML(true);                                  // Set email format to HTML
     $mail->Subject = 'SociaLoan: Endorsement Complete';
     $mail->Body = $body;
     $mail->send();
 } catch (Exception $e) {
     echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;

 }
            }
        }
    }


}    

  
?>

