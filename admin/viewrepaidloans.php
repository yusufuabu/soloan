<?php include("includes/admin_header.php"); 

$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

$item_per_page = 60;

$items_total_count = Repay::count_all();

$paginate = new Paginate($page, $item_per_page,$items_total_count);
$sql = "SELECT * FROM repay LIMIT {$item_per_page} OFFSET {$paginate->Offset()}";
$loans = Repay::find_this_query($sql);



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
            <h2 class="main-title-w3layouts mb-2 text-center">Loans</h2>
            <!--// main-heading -->

            <!-- Tables content -->
            <section class="tables-section">
                <!-- table3 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Requested Loans</h4>
                    <p class="text-center text-success"><?php echo $message; ?></p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                               
                                <th scope="col">Username</th>
                                <th scope="col">loan Amount</th>
                                <th scope="col">Endorsement Count</th>
                                <th scope="col">Loan Status</th>
                                <th scope="col">Loan Date</th>
                                <th scope="col">Repayment Date</th>

                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($loans as $loan) : ?>
                            <tr>
                                <td><?php $user = User::find_by_id($loan->userId); 
                                echo "<a class='text-primary  ' href='view_user_details?id={$loan->userId}'>{$user->username}</a>" ;
                                ?></td>
                                <td><?php echo $loan->loanAmount;?></td>
                                <td><?php echo $loan->endorsementCount;?></td>
                                <td><?php echo $loan->loanStatus;?></td>
                                <td><?php echo $loan->loanDate;?></td>
                                <td><?php echo $loan->repaymentDate;?></td>

                                
                               
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
                                    <a class='page-link' href='viewloans?page={$paginate->previous()}'>Previous</a>
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
                                        echo "<li class='page-item'><a class='page-link' href='viewloans?page={$i}'>{$i}</a></li>";
                                    }
                                }
                                if($paginate->has_next()){
                                    echo "<li class='page-item'>
                                    <a class='page-link' href='viewloans?page={$paginate->next()}'>Next</a>
                                  </li>";
                                    
                                }
                              
                            }

                            ?>

                            
                            
                    </ul>
                    </nav>

            </section>

            <!--// Tables content -->

                      <?php include("includes/admin_footer.php")?>