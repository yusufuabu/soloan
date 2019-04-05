<?php include("includes/admin_header.php"); 

$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

$item_per_page = 20;

$items_total_count = Iquote::count_all();

$paginate = new Paginate($page, $item_per_page,$items_total_count);
$sql = "SELECT * FROM iquotes LIMIT {$item_per_page} OFFSET {$paginate->Offset()}";
$quotes = Iquote::find_this_query($sql);

if(isset($_GET['delete'])){
    $quo = Iquote::find_by_id($_GET['delete']);

    if($quo){
        $quo->delete_photo();
        $session->message("The Quote has ben deleted");
        redirect("imagequotes");
    } else {
        $message = "image not Deleted";
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
                    <h4 class="tittle-w3-agileits mb-4">All Available image Business Quote </h4>
                    <p class="text-danger text-center"><?php echo $paginate->page_total()  ?></p>
                    <a href="addiquote" class="btn btn-success">Add New Quote</a>
                    <table class="table table-striped">

                        <thead>
                            <tr>
                            <th scope="col">Title</th>
                                <th scope="col">Quotes</th>
                                <th scope="col">Delete</th>
                            
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($quotes as $quote) : ?>
                            <tr>
                                <td><?php echo $quote->title; ?></td>
                                <td> <img width="100" src="images/quote/<?php echo $quote->filename; ?>" alt=""> </td>
                                <td> <a href="imagequotes?delete=<?php echo $quote->id?>" onclick=" return deleted();" class="btn btn-danger">Delete </a> </td>
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
                                    <a class='page-link' href='imagequotes?page={$paginate->previous()}'>Previous</a>
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
                                        echo "<li class='page-item'><a class='page-link' href='imagequotes?page={$i}'>{$i}</a></li>";
                                    }
                                }
                                if($paginate->has_next()){
                                    echo "<li class='page-item'>
                                    <a class='page-link' href='imagequotes?page={$paginate->next()}'>Next</a>
                                  </li>";
                                    
                                }
                              
                            }

                            ?>

                            
                            
                    </ul>
                    </nav>
            </section>
   
            <!--// Tables content -->

                      <?php include("includes/admin_footer.php")?>