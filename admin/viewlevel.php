<?php include("includes/admin_header.php"); 
$levels = Level::find_all();

if(isset($_GET['delete'])){
    $level = new Admin();
    $level->id = $_GET['delete'];

    if($level->delete()){
        $session->message('Level deleted');
        redirect("viewadmin");
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
            <h2 class="main-title-w3layouts mb-2 text-center">User Limit</h2>
            <!--// main-heading -->

            <!-- Tables content -->
            <section class="tables-section">
                <!-- table3 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">User Limit</h4>
                    <p class="text-danger text-center"><?php echo $message; ?></p>
                    <table class="table table-striped">
                        <a href="add_level" class="btn btn-success">Add New Limit</a>
                        <thead>
                            <tr>
                               
                                <th scope="col">Name</th>
                                <th scope="col">Limit</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($levels as $level) : ?>
                            <tr>
                                <td><?php echo $level->name;?></td>
                                <td><?php echo $level->amount;?></td>

                                <td> <a href="editlevel?id=<?php echo $level->id;?>"  class="btn btn-primary">Edit</a> </td>
                                <td> <a href="viewlevel?delete=<?php echo $level->id;?>" onclick=" return deleted();" class="btn btn-danger">Delete Admin</a> </td>
                                
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


            </section>

            <!--// Tables content -->

                      <?php include("includes/admin_footer.php")?>