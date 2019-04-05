<?php include("includes/user_header.php")?>
<body>
    <?php
$user = User::find_by_id($_SESSION['id']);
$levels = Level::getLimit($user->level);
$loan = '';


if (isset($_POST['submit'])){
    $loan = $_POST['loanAmount'];
    $limit = $_POST['limit'];
    if($loan > $levels->amount){
        $session->message("You cannot request for a loan more than your limit");
        redirect("requestloan");
    } else {
        if($loan == ''){
            redirect("requestloan");
        }
    }
    } else {
        redirect("requestloan");
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
                                    <form action="includes/approveloan" method="post"> 
                                        <p class="text-center" style="font-weight:900;">Dear <?php echo $user->username;?>, You are about the request a loan of ₦<?php echo $loan;?>, Kindly make confirmation</p>
                                        <input type="hidden" name="loanAmount" value="<?php echo $loan?>">
                                        <div class="form-group text-center">
                                            <input type="submit" value="Confirm Request" name ="confirm" class="btn btn-success">
                                        <a href="requestloan" class="btn btn-primary">Back</a>
                                        </div>
                                    
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
 <?php include("includes/user_footer.php")?>