<?php ob_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>
<?php require_once("../admin/includes/init.php"); ?>

<?php 
    
if(isset($_POST['forget'])){
  
    $email = $_POST['email'];
    $user = User::find_by_email_values($email);
    if(!$user){
        $session->message("The Email address is not available");
        redirect("../index#exampleModal2");
    } else {
        $password = sha1(md5(time().uniqid()));
        $user->temp = $password;
        $username = $user->username;

        if($user->update()){

      

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
                            <td width="80%" align="left" valign="top"><font style="font-family: Verdana, Geneva, sans-serif; color:#666766; font-size:13px; "><strong><em>Hello '.$username.',</em></strong></font><br /><br />
                              <font style="font-family: Verdana, Geneva, sans-serif; color:#666766; font-size:13px; line-height:21px">You Forgot you password and need to retrieve
            <br /><br/>
            <strong><em>step:</em></strong>
            <ul style="list-style-type:disc">
              <p><a style="color:white;background-color:green;" href="https://socialoan.net/forget?id='.$password.' ">Click here</a> to change your password</p>
              <p>or copy the link below into your browser</p>
              <p>https://socialoan.net/forget?id='.$password.'</p>
              
              </ul>
  
              <p></p>
              <p>
              if the password change was not requested by you kindly contact support immediately </p>
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
    $mail->addAddress($email);     // Add a recipient
    $mail->addBCC('yusufuabu@yahoo.com');
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Password Change';
    $mail->Body = $body;
    $mail->send();
    $session->message("Check your email for instructions");
    redirect("../index#exampleModal2");
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    redirect("../index#exampleModal2");
}
}
}
}
?>
