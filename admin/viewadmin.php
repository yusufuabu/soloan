<?php include("includes/admin_header.php"); 
$admins = Admin::find_all();

if(isset($_GET['delete'])){
    $admin = new Admin();
    $admin->id = $_GET['delete'];

    if($admin->delete()){
        $session->message('Admin deleted');
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
            <h2 class="main-title-w3layouts mb-2 text-center">Admin</h2>
            <!--// main-heading -->

            <!-- Tables content -->
            <section class="tables-section">
                <!-- table3 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Admin Information</h4>
                    <p class="text-danger text-center"><?php echo $message; ?></p>
                    <table class="table table-striped">
                        <a href="add_admin" class="btn btn-success">Add New Admin</a>
                        <thead>
                            <tr>
                               
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Options </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($admins as $admin) : ?>
                            <tr>
                                <td><?php echo $admin->username;?></td>
                                <td><?php echo $admin->email;?></td>
                                <td><?php echo $admin->role;?></td>
                                <td> <a href="view_admin_profile?id=<?php echo $admin->id;?>" class="btn btn-primary">View Details</a> </td>
                                <td> <a href="viewadmin?delete=<?php echo $admin->id;?>" onclick=" return deleted();" class="btn btn-danger">Delete Admin</a> </td>
                                
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


            </section>

            <!--// Tables content -->

                      <?php include("includes/admin_footer.php")?>