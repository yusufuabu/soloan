<?php include("includes/admin_header.php"); 
$levels = Level::find_by_id($_GET['id']);

if(isset($_POST['update'])){
    $levels->id = $_GET['id'];
    $levels->name = $_POST['name'];
    $levels->amount = $_POST['amount'];

    if($levels->update()){
        $session->message('User Limit Updated');
        redirect("editlevel?id={$_GET['id']}");  
    } else {
        $message = "Failed to update";
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

                             <!-- Forms-1 -->
                             <div class="outer-w3-agile col-xl mt-3 mr-xl-3">
                            <h4 class="tittle-w3-agileits mb-4">User Limit</h4>
                            <p class="text-center text-success"><?php echo $message ?></p>
                            <form action="" method="post">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="name" class="form-control" id="inputEmail3" required  value="<?php echo $levels->name;?>" readonly>
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Amount</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="amount" class="form-control" id="inputEmail3" required value="<?php echo $levels->amount;?>">
                                    </div>
                                </div>

                                <input type="submit" name="update" value="Update" class="btn btn-warning">
                            </form>

                            
                        </div>
                        <!--// Forms-1 -->


                      <?php include("includes/admin_footer.php")?>