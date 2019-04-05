<?php include("includes/admin_header.php"); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

$item_per_page = 60;

$items_total_count = Loans::count_all();

$paginate = new Paginate($page, $item_per_page,$items_total_count);
$sql = "SELECT * FROM loans LIMIT {$item_per_page} OFFSET {$paginate->Offset()}";
$loans = Loans::find_this_query($sql);


if(isset($_GET['approve'])){
    $loan = Loans::find_by_id($_GET['approve']);
    $user = User::find_by_id($_GET['user']);    
    
    $loan->loanStatus = 'Approved';
    $date = date("Y-m-d");
    $loan->loanDate = $date;
   
    $repay = strtotime(date("Y-m-d H:i:s", strtotime($date)) . " +1 months");
    $loan->repaymentDate = date("Y-m-d", $repay);

    if($loan->update()){
        $session->message('loan has been Approved');
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
                        <font style="font-family: Verdana, Geneva, sans-serif; color:#666766; font-size:13px; line-height:21px">Your Loan has Approved
      <br /><br/>
      <p>Your Loan of &#8358;'.$loan->loanAmount.' has received complete Endorsement and approval </p>
       <p>Loan Date: '.$loan->loanDate.'</p> 
       <p>Repayment Date: '.$loan->repaymentDate.'</p> 

        
    
      
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

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'SociaLoan: Loan Approved';
            $mail->Body = $body;
            $mail->send();
            } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            $session->message('Message could not be sent. Mailer Error: ', $mail->ErrorInfo);

            }
        redirect("viewloans");
    } else {
        $message = "loan not approved";
    }
}
?>


<body>
    <div class="se-pre-con"></div>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php include("includes/admin_nav.php")?>

        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->

                <?php include("includes/admin_topbar.php")?>
            <!-- main-heading -->
            <h2 class="main-title-w3layouts mb-2 text-center">Loans</h2>
            <!--// main-heading -->

            <!-- Tables content -->
            <section class="tables-section">
                <!-- table3 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Requested Loans</h4>
                    <p class="text-center text-success"><?php echo $message; ?></p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                               
                                <th scope="col">Username</th>
                                <th scope="col">loan Amount</th>
                                <th scope="col">Endorsement Count</th>
                                <th scope="col">Loan Status</th>
                                <th scope="col">Loan Date</th>
                                <th scope="col">Repayment Date</th>

                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($loans as $loan) : ?>
                            <tr>
                                <td><?php $user = User::find_by_id($loan->userId); 
                                echo "<a class='text-primary  ' href='view_user_details?id={$loan->userId}'>{$user->username}</a>" ;
                                ?></td>
                                <td><?php echo $loan->loanAmount;?></td>
                                <td><?php echo $loan->endorsementCount;?></td>
                                <td><?php echo $loan->loanStatus;?></td>
                                <td><?php echo $loan->checkDate($loan->loanDate);?></td>
                                <td><?php echo $loan->checkDate($loan->repaymentDate);?></td>

                                <td> <a href="viewloans?approve=<?php echo $loan->id;?>&user=<?php echo $loan->userId;?>" class="btn btn-primary">Approve Loan</a> </td>
                               <!--  <td> <a href="blacklist.php?id=<?php echo $user->id;?>" class="btn btn-danger">Blacklist </a> </td> -->
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <nav aria-label="...">
                        <ul class="pagination">
                            <!-- <li class='active'><a href=''></a></li> -->
                            <?php
                            if ($paginate->page_total() > 1){
                                if($paginate->has_previous()){
                                    echo "<li class='page-item'>
                                    <a class='page-link' href='viewloans?page={$paginate->previous()}'>Previous</a>
                                  </li>";
                                }
                                

                                for ($i=1; $i <= $paginate->page_total(); $i++) { 
                                    if($i == $paginate->current_page){
                                      echo   "<li class='page-item active'>
                                                <span class='page-link'>
                                                {$i}
                                                    <span class='sr-only'>(current)</span>
                                                </span>
                                                </li>";
                                    
                                    } else {
                                        echo "<li class='page-item'><a class='page-link' href='viewloans?page={$i}'>{$i}</a></li>";
                                    }
                                }
                                if($paginate->has_next()){
                                    echo "<li class='page-item'>
                                    <a class='page-link' href='viewloans?page={$paginate->next()}'>Next</a>
                                  </li>";
                                    
                                }
                              
                            }

                            ?>

                            
                            
                    </ul>
                    </nav>

            </section>

            <!--// Tables content -->

                      <?php include("includes/admin_footer.php")?>