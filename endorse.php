<?php ob_start(); ?>
<?php include('includes/header.php');
$link = $_GET['link'];?>

<body>
   
    <!-- Header Area -->
    <?php include("includes/nav.php")?>
    <!-- Header Area -->  
    <!-- login --->
    <div>
        <img src="images/419.png" class="img-responsive">
    </div>
    <section class="blog_posts_area"id="blog">
        <div class="mt-1 text-center">
        <div class="container">
        <div class="row">
        

            <div class="col-md-6 bg-light mt-2">
                    <div class="text-center pb-sm-3 py-3">
                        
                        <p style="font-weight:900">Kindly note that you do have any obligation to Repayment</p>
                    </div>
                    <div class="text-center py-2" >        
                        <form action="endorses" method="post" >
                            <input type="hidden" name="link" value="<?php echo $link ?>" >
                            <input type="submit" name="submit" value="Click Here To Endorse" class="btn btn-success" >
                        </form>
                    </div>
                   
            </div>


         
            <div class="col-md-5 bg-light m-2 " style="height:300px">
                    <div class="text-center pb-sm-3 py-3">
                        
                        <p>
                        <!-- Digital AdPlanet - Ad Display Code -->
                        <script type="text/javascript" src="//www.digitaladplanet.com/portal/display/js/ads.js?3221&614&320&50&0"></script>
<!-- Digital AdPlanet - Ad Display Code -->
                           
                            </p>
                    </div>                    
            </div>  
        </div>
     </div>   
        
    </div>             
</section>
        <!--end login login --->
    <!-- Footer Area -->  
    <?php include('includes/footer.php')?>