<?php include("includes/admin_header.php"); 
$admins = Admin::find_by_id($_GET['id']);

if(isset($_POST['update'])){
    $admins->id = $_GET['id'];
    $admins->email = $_POST['email'];
    $admins->role = $_POST['role'];

    if($admins->update()){
        $session->message('Record Updated');
        redirect("view_admin_profile?id={$_GET['id']}");  
    } else {
        $message = "Failed to update";
    }
}

if(isset($_POST['change'])){
    $admins->id = $_GET['id'];
    $admins->password = md5($_POST['password']);

    if($admins->update()){
        $session->message('Password Changed');
        redirect("view_admin_profile?id={$_GET['id']}");  
    } else {
        $message = "Failed to change password";
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
            <h2 class="main-title-w3layouts mb-2 text-center">Profile</h2>
            <!--// main-heading -->

                             <!-- Forms-1 -->
                             <div class="outer-w3-agile col-xl mt-3 mr-xl-3">
                            <h4 class="tittle-w3-agileits mb-4">Admin Profile</h4>
                            <p class="text-center text-success"><?php echo $message ?></p>
                            <form action="" method="post">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="username" class="form-control" id="inputEmail3" required  value="<?php echo $admins->username;?>" readonly>
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" id="inputEmail3" required value="<?php echo $admins->email;?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Admin Role</label>
                                    <div class="col-sm-10">
                                        <select name="role" id="" class="form-control">
                                            <option value="<?php echo $admins->role ?>"><?php echo $admins->role ?></option>
                                            <option value="admin">Admin</option>
                                            <option value="super">Super</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="submit" name="update" value="Update" class="btn btn-warning">
                            </form>

                            <form action="" method="post">
                                <div class="form-group pt-5">
                                    <label for="password">Change Password</label>
                                    <input type="password" name="password" required  class="form-control">
                                </div>
                                <input type="submit" name="change" value="Change Password" class="btn btn-danger">
                            </form>
                            
                        </div>
                        <!--// Forms-1 -->


                      <?php include("includes/admin_footer.php")?>