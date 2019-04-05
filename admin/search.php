<?php include("includes/admin_header.php"); 
$search_id = $_POST['search'];
if(!isset($_POST['search'])){
    redirect("index");
}
$sql = "SELECT * FROM users WHERE username like '%$search_id%' OR fullName like '%$search_id%'";
$users = User::find_this_query($sql);


if(isset($_GET['blacklist'])){
    $id = $_GET['blacklist'];
    $user = User::find_by_id($id);
    if($user->blacklist()){
        $session->message("User has been Blacklisted");
        redirect("view_users");
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
                    <p class="text-danger"><?php echo $message; ?></p>
                    <table class="table table-striped">
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
                                <td> <a href="view_user_details?id=<?php echo $user->id;?>" class="btn btn-primary">View Details</a> </td>
                                <td> <a href="view_users?blacklist=<?php echo $user->id;?>" onclick="return blacklist();" class="btn btn-danger">Blacklist </a> </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


            </section>

            <!--// Tables content -->

                      <?php include("includes/admin_footer.php")?>