<?php include("includes/admin_header.php"); 

$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

$item_per_page = 60;

$items_total_count = User::count_all();

$paginate = new Paginate($page, $item_per_page,$items_total_count);
$sql = "SELECT * FROM users LIMIT {$item_per_page} OFFSET {$paginate->Offset()}";
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
                    <nav aria-label="...">
                        <ul class="pagination">
                            <!-- <li class='active'><a href=''></a></li> -->
                            <?php
                            if ($paginate->page_total() > 1){
                                if($paginate->has_previous()){
                                    echo "<li class='page-item'>
                                    <a class='page-link' href='view_users?page={$paginate->previous()}'>Previous</a>
                                  </li>";
                                }
                                

                                for ($i=1; $i <= $paginate->page_total(); $i++) { 
                                    if($i == $paginate->current_page){
                                      echo   "<li class='page-item active'>
                                                <span class='page-link'>
                                                {$i}
                                                    <span class='sr-only'>(current)</span>
                                                </span>
                                                </li>";
                                    
                                    } else {
                                        echo "<li class='page-item'><a class='page-link' href='view_users?page={$i}'>{$i}</a></li>";
                                    }
                                }
                                if($paginate->has_next()){
                                    echo "<li class='page-item'>
                                    <a class='page-link' href='view_users?page={$paginate->next()}'>Next</a>
                                  </li>";
                                    
                                }
                              
                            }

                            ?>

                            
                            
                    </ul>
                    </nav>

            </section>

            <!--// Tables content -->

                      <?php include("includes/admin_footer.php")?>