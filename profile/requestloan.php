<?php include("includes/user_header.php")?>
<body>
    <?php 
$user = User::find_by_id($_SESSION['id']);

$levels = Level::getLimit($user->level);
$quotes = Quote::find_all();

$check = User::checkProfileDetails($_SESSION['id']);
if(!$check){
    $session->message("Complete Your Profile before Requesting for loan");
    redirect("profile");
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
                            <div class="position-center">
                            <div class="col-md-6">
                                <div class="p-3" style="background-color:#e1eef1;">
                                    <p class="text-center text-danger"><?php echo $message ?></p>
                                    <form action="confirmloan.php" method="post">
                                        <p class="text-center">Current Limit: ₦<?php echo $levels->amount ?></p>
                                        <div class="form-group">
                                            <label for="loanamount">loan Amount</label>
                                            <input type="number" name="loanAmount" id="" class="form-control">
                                            <input type="hidden" name="limit" value="<?php echo $levels->amount?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="submit" name="submit" class="form-control    btn btn-success">
                                        </div>

                                    </form>
                                </div>
        </div>

            <div class="col-md-6">
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