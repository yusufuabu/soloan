<?php include("includes/user_header.php")?>
<body>
    <?php 
    $quote = new Quote();
    $id = $_SESSION['id'];
$user = User::find_by_id($id);
$ref;
$link = "http://www.socialoan.net/endorse?link=$user->link";
$result = file_get_contents("http://thelink.la/api-shorten.php?url=$link");

$mail = urldecode("subject= Socialoan: Kindly endorse me &body= Hello %0A%0A Kindly Endorse me on the below so as to achieve my dreams {$result}");
if(!$session->is_signed_in()){redirect("index");}

$loan = '';

if(isset($_GET['loan'])){
    $loan = $_GET['loan'];
}
    ?>
<section id="container">
<!--header start-->
<?php include("includes/user_topbar.php")?>
<!--header end-->
<!--sidebar start-->
<?php include("includes/user_sidebar.php")?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- gallery -->
		<!-- gallery -->
        <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Loans
                        </header>
                        <div class="panel-body">
                            <div class="">
                            <div class="col-md-12">
            <div class="p-3" style="background-color:#e1eef1;">
                <form action="pendingLoan.php" method="post"> 
                    <p class="text-center" style="font-weight:700;">Loan requested for ₦<?php echo $loan?> is awaiting for <?php echo $loan?> endorsements, kindly share the below link to friends and family so your payment can be quick</p>
                    <p class="text-center" style="font-weight:700;"><span style="font-weight:900">Link to share: <input type="text" value="<?php echo $link;?>" name="" id="myInput" readonly=""> </p>
                    <div class="social text-center">
                                <span class="social-icons-text">Share on </span>
                                <a href="#" onclick="copyInput()" class="btn btn-primary">Copy</a>
                                <span data-sharer="facebook" data-url="<?php echo $link;?>" class="social-icons"><i  class="fa fa-facebook-f" style="color:#3C5A99;"></i></span>
                                <span data-sharer="twitter" data-title="SociaLoan:Help me achieve my dream | <?php echo $quote->getQuote(); ?>" data-hashtags="sociaLoan" data-url="<?php echo $result;?>" class="social-icons"><i  class="fa fa-twitter" style="color:#38A1F3;"></i></span>
                                <span  data-sharer="linkedin" data-url="<?php echo $result;?>" class="social-icons"><i  class="fa fa-linkedin" style="color:#0077B5;"></i></span>
                                
                                <span class="social-icons"><a href="mailto:?<?php echo $mail;?>&body=I'm%20interested%20in%20booking%20a%20party%20of:%0A%0AThe%20dates%20I'm%20looking%20for%20are:%0A%0AThe%20best%20times%20for%20dinner%20are:%20"><i  class="fa fa-envelope-square text-danger"></i></a></span>
                                <span class="social-icons"><a href="http://whatsapp://send?text= Kindly endorse me for a loan on <?php echo $link?>" data-action="share/whatsapp/share"><i  class="fa fa-whatsapp" style="color:#25D366;"></i></a></span>
                 
                  </div>
              </div>
                    <a href="profile" class="btn btn-success">Back to profile</a>
                   
                </form>
            </div>
        </div>

            <div class="col-md-12">
             <div class="p-3" style="background-color:#e1eef1; height:100px;">
                <h4>Ads</h4>
            </div>
        </div>
                            </div>

                        </div>
                    </section>

            </div>

	<!-- //gallery -->

</section>
 <!-- footer -->
 <script>
    function copyInput() {
        // e.preventDefault;
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("link copied to clipboard");
}
 </script>
 <?php include("includes/user_footer.php")?>