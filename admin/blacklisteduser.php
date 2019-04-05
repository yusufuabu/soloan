<?php include("includes/admin_header.php"); 
$users = User::find_blacklisted();

if(isset($_GET['active'])){
    $id = $_GET['active'];
    $user = User::find_by_id($id);
    if($user->Active()){
        $session->message("User is now Active");
        redirect("blacklisteduser.php");
    } else {

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
            <h2 class="main-title-w3layouts mb-2 text-center">Users</h2>
            <!--// main-heading -->

            <!-- Tables content -->
            <section class="tables-section">
                <!-- table3 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">User Information</h4>
                    <table class="table table-striped">
                    <p class="text-success"><?php echo $message; ?></p>
                        <thead>
                            <tr>
                               
                                <th scope="col">Full Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Date Joined</th>
                                <th scope="col">Options</th>
                                <th scope="col">Status</th>
                                <th scope="col">Status</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?php echo $user->fullName;?></td>
                                <td><?php echo $user->email;?></td>
                                <td><?php echo $user->phone;?></td>
                                <td><?php echo $user->status;?></td>
                                <td><?php echo $user->dateJoined;?></td>
                                <td> <a href="view_user_details?id=<?php echo $user->id;?>"  class="btn btn-primary">View Details</a> </td>
                                <td> <a href="blacklisteduser?active=<?php echo $user->id;?>" onclick=" return active();" class="btn btn-success">Active </a> </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


            </section>

            <!--// Tables content -->

                      <?php include("includes/admin_footer.php")?>