<?php 
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

class Repay extends Db_object {
    protected static $db_table = "repay";
    protected static $db_table_fields = array('userId','loanAmount','endorsementCount','loanStatus','repaymentDate','loanDate','paystackRef');
    public $id;
    public $userId;
    public $loanAmount;
    public $endorsementCount;
    public $loanStatus;
    public $loanDate;
    public $repaymentDate;
    public $paystackRef;


 

    public function sendMessage($userId) {
        global $database; 
        $user = User::find_by_id($userId);
  
               
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
                               <font style="font-family: Verdana, Geneva, sans-serif; color:#666766; font-size:13px; line-height:21px">Loan Has ben repaid.
             <br /><br/>
             <p>Your Loan of Has been fully Accomplished </p>
         
               
               
             
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

  
?>

