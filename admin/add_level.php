<?php include("includes/admin_header.php"); 
$levels = new Level();

if(isset($_POST['submit'])){
    // $secretKey = "6LfmbYsUAAAAACYBZ5gG0nD17a7tsfyUFtk6lJlC";
    // $userIp = $_SERVER['REMOTE_ADDR'];
    // $responsekey = 'g-recaptcha-response';
    // $url = "https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$responsekey}";
    // $reponse = file_get_contents($url);

    $levels->name = $_POST['name'];
    $levels->amount = $_POST['amount'];
        if($levels->create()){
            $session->message("New User Limit Added");
            redirect("viewlevel");
        }else {
            $session->message("user Limit not added");
            redirect("add_level");
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
            <h2 class="main-title-w3layouts mb-2 text-center">User Limit</h2>
            <!--// main-heading -->

            <!-- Tables content -->
            <section class="tables-section">
                <!-- table3 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Add New User limit </h4>
                    <p class="text-warning"><?php echo $message; ?></p>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="number" name="name" id="" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="amount">Email</label>
                            <input type="number" name="amount" id="" class="form-control" required>
                        </div>
                        
                        
                        <div class="form-group">
                            <input type="submit" name="submit" value="Submit" class="btn btn-success">
                        </div>
                    </form>
                   

            </section>

            <!--// Tables content -->

                      <?php include("includes/admin_footer.php")?>