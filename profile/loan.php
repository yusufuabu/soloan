<?php include("includes/user_header.php")?>
<body>
    <?php 
$user = User::find_by_id($_SESSION['id']);
$loans = Loans::getLoan($_SESSION['id']);
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
                                <div class="col-md-4 bg-danger" style="height:100px ">
                                    <h1>Ads</h1>
                                </div>
                            <?php if($loans):?>
         <div class="col-md-4">
            <a href="pay?amount=<?php echo $loans->loanAmount?>&id=<?php echo $loans->id?>">
                <div class="text-center bg-success w-100">
                   <h1 class="p-3" style="color:#fff">Repay Loan <?php echo  $loans->loanAmount; ?></h1>
                </div>
                </a>
            
         </div>
<?php endif;?>
<?php if(!$loans):?>
         <div class="col-md-4">
            <a href="requestloan">
                <div class="text-center bg-primary w-100">
                   <h1 class="p-3" style="color:#fff">Request Loan </h1>
                </div>
                </a>
            
         </div>
<?php endif;?>  
<div class="col-md-4 bg-danger" style="height:100px ">
                                    <h1>Ads</h1>
                                </div>
                            </div>
                          

                        </div>
                    </section>

            </div>

	<!-- //gallery -->

</section>
 <!-- footer -->
 <?php include("includes/user_footer.php")?>