<?php include("includes/admin_header.php");
$messages = Message::find_by_id($_GET['id']);
$users = User::find_by_id($messages->userId);
$messages->status = 'read';
$messages->update();
If(!isset($_GET['id'])){
    redirect('viewmessages');
}

if(isset($_POST['submit'])){
    $msg = Message::find_by_id($_GET['id']);
    $msg->reply = $_POST['reply'];
    $messages->status = 'Replied';
    $messages->update();
    $session->message("Message Replied");
redirect('viewmessages');
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
            <h2 class="main-title-w3layouts mb-2 text-center">Message</h2>
            <!--// main-heading -->

                             <!-- Forms-1 -->
                             <div class="outer-w3-agile col-xl mt-3 mr-xl-3">
                            <h4 class="tittle-w3-agileits mb-4">Message Details</h4>
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
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" value="<?php echo $users->status;?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Message Subject</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" value="<?php echo $messages->subject;?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Message</label>
                                    <div class="col-sm-10">
                                        <textarea name="" class="form-control" id="" cols="70" rows="5" readonly>"<?php echo $messages->message;?></textarea>
                                    </div>
                                </div>

                                    <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Reply</label>
                                    <div class="col-sm-10">
                                        <textarea name="reply" class="form-control" id="" cols="70" rows="5" ></textarea>
                                    </div>
                                </div>
                                
                              
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <a href="viewmessages" class="btn btn-primary">Back</a>
                                        <input type="submit" name="submit" value="Reply" class="btn btn-success">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--// Forms-1 -->


                      <?php include("includes/admin_footer.php")?>