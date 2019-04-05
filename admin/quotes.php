<?php include("includes/admin_header.php"); 
$quotes = Quote::find_all();
if(isset($_GET['delete'])){
    $quote = new Quote();
    $quote->id = $_GET['delete'];
    if($quote->delete()){
        $session->message('Quote deleted');
        redirect("quotes");
    } else {
        $message = "Not deleted";
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
                    <h4 class="tittle-w3-agileits mb-4">All Available Text Business Quote </h4>
                    <p class="text-danger text-center"><?php echo $message; ?></p>
                    <a href="addquote" class="btn btn-success">Add New Quote</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                               
                                <th scope="col">Quotes</th>
                                <th scope="col">Delete</th>
                            
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($quotes as $quote) : ?>
                            <tr>
                                <td><?php echo $quote->quotes;?></td>
                                <td> <a href="quote?delete-<?php echo $quote->id?>" onclick=" return deleted();" class="btn btn-danger">Delete </a> </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

            </section>

            <!--// Tables content -->

            <?php include("includes/admin_footer.php")?>