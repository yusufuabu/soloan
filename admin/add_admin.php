<?php include("includes/admin_header.php"); 
$admins = new Admin();

if(isset($_POST['submit'])){
    // $secretKey = "6LfmbYsUAAAAACYBZ5gG0nD17a7tsfyUFtk6lJlC";
    // $userIp = $_SERVER['REMOTE_ADDR'];
    // $responsekey = 'g-recaptcha-response';
    // $url = "https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$responsekey}";
    // $reponse = file_get_contents($url);
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $admins->username = $_POST['username'];
    $admins->password = md5($_POST['password']);
    $admins->email = $_POST['email'];
    $admins->role = $_POST['role'];
  
   
    if($admins->validateUser()){
        


        if($admins->create()){
            $session->message("Admin has been added");
            redirect("viewadmin");
        }else {
            $session->message("Admin has not been added");
            redirect("add_admin");
            }
    } else { 
        
        redirect("add_admin");
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
            <h2 class="main-title-w3layouts mb-2 text-center">Admin</h2>
            <!--// main-heading -->

            <!-- Tables content -->
            <section class="tables-section">
                <!-- table3 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Add New Admin </h4>
                    <p class="text-warning"><?php echo $message; ?></p>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="quote">Username</label>
                            <input type="text" name="username" id="" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="quote">Email</label>
                            <input type="email" name="email" id="" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="quote">Password</label>
                            <input type="password" name="password" id="" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Admin role</label>
                            <select name="role" id="" class="form-control" >
                                <option value="admin">Admin</option>
                                <option value="super">Super</option>
                            </select>
                        </div>
                        
                        
                        <div class="form-group">
                            <input type="submit" name="submit" value="Submit" class="btn btn-success">
                        </div>
                    </form>
                   

            </section>

            <!--// Tables content -->

                      <?php include("includes/admin_footer.php")?>