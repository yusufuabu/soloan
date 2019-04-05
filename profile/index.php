<?php include("includes/user_header.php")?>
<?php 
$loanAmount = "0";
$endorsementCount = "0";
$loanDate = "0";
$repaymentDate = "0";


if ($loan = Loans::getLoan($_SESSION['id'])){
	$loanAmount = $loan->loanAmount;
$endorsementCount = $loan->endorsementCount;
$loanDate =	$loan->checkDate($loan->loanDate);
$repaymentDate = $loan->checkDate($loan->repaymentDate);

}


?>
<body>
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
		<!-- //market-->
		<div class="market-updates">
            <?php if(!$loan):?>
			<div class="col-md-3 market-update-gd">
				<a href="loan"><div class="market-update-block clr-block-5">
					 <div class="col-md-12 market-update-left">
					 <h4>Apply For Loan</h4>
					
				  </div>
				  <div class="clearfix"> </div>
				</div> </a>
            </div>
<?php endif;?>
<?php if($loan):?>
            <div class="col-md-3 market-update-gd">
				<a href="loan"><div class="market-update-block clr-block-5">
					 <div class="col-md-12 market-update-left">
					 <h4>Repay Loan</h4>
					
				  </div>
				  <div class="clearfix"> </div>
				</div> </a>
			</div>
			<?php endif;?>
			<div class="col-md-3 market-update-gd">
            <a href="profile"><div class="market-update-block clr-block-6">
					<div class="col-md-12 market-update-left">
					<h4>Profile</h4>	
					</div>
				  <div class="clearfix"> </div>
				</div></a>
			</div>
			<div class="col-md-3 market-update-gd">
            <a href="quotes"><div class="market-update-block clr-block-7">
					<div class="col-md-12 market-update-left">
						<h4>Business Quotes</h4>
					</div>
				  <div class="clearfix"> </div>
				</div></a>
			</div>
			<div class="col-md-3 market-update-gd">
            <a href="shame"><div class="market-update-block clr-block-8">
					<div class="col-md-12 market-update-left">
						<h4>Hall of Shame</h4>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
            
		   <div class="clearfix"> </div>
		</div>	</a>

        <div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-usd"> </i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>Loan Amount</h4>
					<h3><?php echo $loanAmount;?></h3>
					
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-eye" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Endorsement</h4>
						<h3><?php echo $endorsementCount;?></h3>
						
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-calendar"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Loan Date</h4>
						<h5><?php echo $loanDate; ?></h5>
						
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-calendar" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Repayment</h4>
						<h5><?php echo $repaymentDate; ?></h5>
						
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>	
		<!-- //market-->

		<div class="agil-info-calendar">
		<!-- calendar -->
		<div class="col-md-6 agile-calendar">
			<div class="calendar-widget">
                <div class="panel-heading ui-sortable-handle">
					<span class="panel-icon">
                      <i class="fa fa-calendar-o"></i>
                    </span>
                    <span class="panel-title"> ADS</span>
                </div>
				<!-- grids -->
					<h1 class="text-center text-danger">
						ADS
					</h1>
			</div>
		</div>
		<div class="col-md-6 agile-calendar">
			<div class="calendar-widget">
                <div class="panel-heading ui-sortable-handle">
					<span class="panel-icon">
                      <i class="fa fa-calendar-o"></i>
                    </span>
                    <span class="panel-title"> Calendar Widget</span>
                </div>
				<!-- grids -->
					<div class="agile-calendar-grid">
						<div class="page">
							
							<div class="w3l-calendar-left">
								<div class="calendar-heading">
									
								</div>
								<div class="monthly" id="mycalendar"></div>
							</div>
							
							<div class="clearfix"> </div>
						</div>
					</div>
			</div>
		</div>

		
		<!-- //calendar -->

			<!-- tasks -->

		<!-- //tasks -->

					<div class="clearfix"> </div>
				</div>
</section>
 <!-- footer -->
<?php include("includes/user_footer.php")?>