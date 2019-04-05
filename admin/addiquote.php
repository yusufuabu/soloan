<?php include("includes/admin_header.php"); 
$quotes = new Iquote();

if(isset($_POST['submit'])){
    $quotes->title = $_POST['title'];
    echo $_FILES['image_upload']['name'];
    $quotes->set_file($_FILES['image_upload']);

    if($quotes->save()){
        $session->message("New Image quote added successfully");
        redirect("imagequotes.php");
    } else {
        $message = join("<br>", $quotes->errors);
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
            <h2 class="main-title-w3layouts mb-2 text-center">Business Quote</h2>
            <!--// main-heading -->

            <!-- Tables content -->
            <section class="tables-section">
                <!-- table3 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Add New Quote </h4>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <p class="text-warning"><?php echo $message; ?></p>
                            <label for="quote">title</label>
                            <input type="text" name="title" id="" class="form-control" required>
                        </div>
                        <input type="file" name="image_upload" id="" class="form-control">
                        <div class="form-group">
                            <input type="submit" name="submit" value="Submit" class="btn btn-success">
                        </div>
                    </form>
                   

            </section>

            <!--// Tables content -->

                      <?php include("includes/admin_footer.php")?>