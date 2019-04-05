<?php include("includes/admin_header.php"); 
$quotes = new Quote();

if(isset($_POST['submit'])){
    $quotes->quotes = $_POST['quote'];
    if($quotes->create()){
        redirect("quotes");
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
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="quote">Quote</label>
                            <input type="text" name="quote" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Submit" class="btn btn-success">
                        </div>
                    </form>
                   

            </section>

            <!--// Tables content -->

                      <?php include("includes/admin_footer.php")?>