<?php include("includes/admin_header.php"); 
$users = User::find_by_id($_GET['id']);
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
            <h2 class="main-title-w3layouts mb-2 text-center">Users</h2>
            <!--// main-heading -->

                             <!-- Forms-1 -->
                             <div class="outer-w3-agile col-xl mt-3 mr-xl-3">
                            <h4 class="tittle-w3-agileits mb-4">User Details</h4>
                            <form action="#" method="post">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Full Name</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" value="<?php echo $users->fullName;?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" value="<?php echo $users->username;?>" readonly>
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" value="<?php echo $users->phone;?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" value="<?php echo $users->email;?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Date Joined</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" value="<?php echo $users->dateJoined;?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Bank Name</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" value="<?php echo $users->bankName;?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Bank Number</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" value="<?php echo $users->bankNumber;?>" readonly>
                                    </div>
                                </div>

                                  <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" value="<?php echo $users->status;?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Referral Link </label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" value="<?php echo $users->link;?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <textarea name="" class="form-control" id="" cols="70" rows="5" readonly>"<?php echo $users->address;?></textarea>
                                    </div>
                                </div>
                                
                              
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <a href="view_users" class="btn btn-primary">Back</a>
                                        <a href="blacklist" onclick=" return blacklist();" class="btn btn-danger">Blacklist</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--// Forms-1 -->


                      <?php include("includes/admin_footer.php")?>