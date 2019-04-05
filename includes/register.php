<?php ob_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>
<?php require_once("../admin/includes/init.php"); ?>

<?php 
    $user = new User();
    
if(isset($_POST['register'])){
  
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $user->username = $_POST['username'];
    $user->password = md5($_POST['password']);
    $user->email = $_POST['email'];
    $user->link = $_POST['link'];
    $user->dateJoined = date("Y-m-d");
    $user->status = "Active";
    $user->level = '1';     
   
    if($user->validateUser()){
        if($user->create()){
            $user_found = User::verify_user($username,$user->password );
            if($user_found){
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
                              <font style="font-family: Verdana, Geneva, sans-serif; color:#666766; font-size:13px; line-height:21px">You are welcome to SociaLoan.
            <br /><br/>
            <strong><em>Login Information:</em></strong>
            <ul style="list-style-type:disc">
              <li> Username: 	'.$username.' </li>
              <li>Password : '.$password.'</li>
              
              </ul>
              <p> <strong>keep the above information Safe</strong> </p>
              <p></p>
              <p>
              SociaLoan keep you the ability to get loan for being social  </p>
              <p>Benefits of SociaLoan</p>
                <ul>
                    <li>Interest Free</li>
                    <li>Collateral Free</li>
                    <li>Move from level to level as  you refund loans</li>
                    <li>Get endorsement from friends</li>
                    <li>Work with you phone</li>
                    <li>Earn points by coming back daily</li>
                    <li>Earn points by referring friends</li>
                </ul>
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
    $mail->Subject = 'Welcome to SociaLoan';
    $mail->Body = $body;
    $mail->send();
    $session->login($user_found);
    redirect("../index");
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    redirect("../index#exampleModal1");
}
}
        }
      }
    }
?>
