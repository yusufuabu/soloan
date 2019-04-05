<?php include("includes/user_header.php")?>
<body>
    <?php
    $user = User::find_by_id($_SESSION['id']);
    $loanCcount = "0";
    $loanAmount = "0";
    $repayementDate = "0";
    $endorsementCount = "0";
    $loanDate = "0";
    $loanStatus = "0";
    
    
    $loans = Loans::getLoan($_SESSION['id']);
    if($loans){
    $loanCcount = "1";
    $loanAmount = $loans->loanAmount;
    $repayementDate = $loans->checkDate($loans->repaymentDate);
    $endorsementCount = $loans->endorsementCount;
    $loanDate = $loans->checkDate($loans->loanDate);
    $loanStatus = $loans->loanStatus;
    }
    
    if(isset($_GET['claim'])){
        $claims = new Claims();
        $claimloan = new Loans();
        $userId = $_SESSION['id'];
        $claims->userId = $userId;
        $claims->dateclaimed = date('Y-m-d');
    
        $claims->saveClaims($userId);
        $claimloan->claimbonus($userId);
        $claimloan->updateClaimCount($userId);
        $session->message("Bonus Claimed Come back tomorrow for more");
        redirect("profile");
    }
    
    if(isset($_POST['update'])){
        $user->fullName= $_POST['fullName'];
        $user->username  = $_POST['username'];
        $user->phone = $_POST['phone'];
        $user->address = $_POST['address'];
        $user->email = $_POST['email'];
        $user->bankName = $_POST['bankName'];
        $user->bankNumber = $_POST['bankNumber'];
        
        // $user->validateUser();
        if(empty($user->errorArray)){
            if($_FILES['userImage']['error'] == 0){
                $user->user_image = uniqid().$_FILES['userImage']['name'];
                $user->tmp_path = $_FILES['userImage']['tmp_name'];
                $user->save_file_image();
                    $session->message("Records Updated");
                    redirect("profile");
            } else {
                
                $user->update();
                $session->message("Records Updated");
                redirect("profile");
            }
        } else {
        }
    }
    if(isset($_POST['change_password'])){
        $user->password= md5($_POST['password']);
 
        // $user->validateUser();
        if(empty($user->errorArray)){
            if($user->update()){
                $session->message("Password Updated");
                redirect("profile");
            } else {
            }
        } else {
        }
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
	<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-md-6">
                    <section class="panel">
                        <header class="panel-heading">
                           Profile
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                            <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <p class="text-success"><?php echo $message; ?></p>
                        <label for="imgae">Upload Image</label>
                        <?php if ($user->user_image != ""):?>
                        <img src="images/userimage/<?php echo $user->user_image ?>" alt="" class="text-center img-thumbnail">
                        <?php endif; ?>
                        <?php if ($user->user_image == ""):?>
                        <img src="https://place-hold.it/300" alt="" class="text-center img-thumbnail">
                        <?php endif; ?>
                        <input type="file" name="userImage" value="<?php echo $user->user_image ?>" id="">
                            <label for="FullName">Full Name</label>
                            <input type="text" name="fullName" id="" class="form-control"  value="<?php echo $user->fullName;?>">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="" class="form-control" value="<?php echo $user->username;?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" id="" value="<?php echo $user->phone;?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="FullName">Email</label>
                            <input type="email" name="email" id="" value="<?php echo $user->email;?>"  class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="FullName">Level</label>
                            <input type="number" id="" value="<?php echo $user->level;?>"  class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="FullName">Bank Name</label>
                            <input type="text" name="bankName" id="" value="<?php echo $user->bankName;?>"  class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="bankNumber">Account Number</label>
                            <input type="number" name="bankNumber" id="" value="<?php echo $user->bankNumber;?>"  class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" id="" cols="30" rows="4" value="<?php echo $user->address;?>"  class="form-control"><?php echo $user->address;?> </textarea>
                        </div>
                        <input type="submit" name="update" value="Update" class="btn btn-primary">
                        
                        
                    </form>
                            </div>

                        </div>
                    </section>
                    <section class="panel">
                        <header class="panel-heading">
                          Change password
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                            <form action="" method="post">
                        <div class="form-group">
                        
                            <label for="FullName">New Password</label>
                            <input type="password" name="password" id="" class="form-control">
                        </div>
          
                        <input type="submit" name="change_password" value="Change Password" class="btn btn-danger">
                        
                        
                    </form>
                            </div>

                        </div>
                    </section>
            </div>
            <div class="col-md-6">
                <section class="panel">
                    <header class="panel-heading">
                        Loan Information
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                        <?php if(Loans::checkLoanExist($_SESSION['id'])):?>
                        <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>Loans</td>
                            <td><?php echo $loanCcount;?></td>
                        </tr>
                        <tr>
                            <td>Loan Amount</td>
                            <td><?php echo $loanAmount;?></td>
                        </tr>
                        <tr>
                            <td>Endorsement Reached</td>
                            <td><?php echo $endorsementCount;?></td>
                        </tr>
                        <tr>
                            <td>Loans Repaid</td>
                            <td><?php echo $loanStatus;?></td>
                        </tr>
                        <tr>
                            <td>Loan Date</td>
                            <td><?php echo $loanDate;?></td>
                        </tr>
                        <tr>
                            <td>Repayment Date</td>
                            <td><?php echo $repayementDate;?></td>
                        </tr>
                        <tr>
                            <td>Share Link</td>
                            <td><a href="pendingloan?loan=<?php echo $loanAmount;?>" class="btn btn-primary">Share</a></td>
                        </tr>
                    </tbody>
                </table>
                <?php 
                $claim = new Claims();
                $checkloan = new Loans();
                if(!$checkloan->checkClaimCount($_SESSION['id'])):
                if($claim->checkdate($_SESSION['id'])):
                ?>
                <a href="profile?claim=1" class="btn btn-success btn-block">Claim Bonus</a>
                <?php endif;?>
                <?php endif;?>
                <?php 
                if(!$checkloan->checkClaimCount($_SESSION['id'])):
                if(!$claim->checkdate($_SESSION['id'])):
                ?>
                <a href="" class="btn btn-danger btn-block">Come back tomorrow to claim bonus</a>
                <?php endif;?>
                <?php endif;?>
                <?php endif;?>
                        </div>
                    </div>
                </section>

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