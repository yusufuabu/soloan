<?php include("includes/user_header.php")?>
<body>
<?php 
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

$item_per_page = 10;

$items_total_count = iquote::count_all();

$paginate = new Paginate($page, $item_per_page,$items_total_count);
$sql = "SELECT * FROM iquotes ORDER BY id DESC LIMIT   {$item_per_page} OFFSET {$paginate->Offset()}";
$quotes = iquote::find_this_query($sql);

?>
<section id="container">
<!--header start-->
<?php include("includes/user_topbar.php")?>
<!--header end-->
<!--sidebar start-->
<?php include("includes/user_sidebar.php")?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- gallery -->
		<!-- gallery -->
        <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Quotes 
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                            <div class="row">
     <?php foreach ($quotes  as $quote) :?>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body" style="">
                     <img src="../admin/images/quote/<?php echo $quote->filename;?>" alt="" class="img-responsive" style="width:100%; min-height:400px;">
                </div>
            </div>

        </div>
        <?php endforeach;?>
        </div>
                            </div>

                        </div>
                    </section>
                    <nav aria-label="...">
                        <ul class="pagination">
                            <!-- <li class='active'><a href=''></a></li> -->
                            <?php
                            if ($paginate->page_total() > 1){
                                if($paginate->has_previous()){
                                    echo "<li class='page-item'>
                                    <a class='page-link' href='quotes?page={$paginate->previous()}'>Previous</a>
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
                                        echo "<li class='page-item'><a class='page-link' href='quotes?page={$i}'>{$i}</a></li>";
                                    }
                                }
                                if($paginate->has_next()){
                                    echo "<li class='page-item'>
                                    <a class='page-link' href='quotes?page={$paginate->next()}'>Next</a>
                                  </li>";
                                    
                                }
                              
                            }

                            ?>

                            
                            
                    </ul>
                    </nav>
            </div>

	<!-- //gallery -->

</section>
 <!-- footer -->
 <?php include("includes/user_footer.php")?>