<?php ob_start(); ?>
<?php include('includes/header.php');?>
<?php $quotes = new Quote();
$link=$_GET['link'];
$address = $_SERVER['HTTP_REFERER'];
?>
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
                        
                        <p style="font-weight:900"> <p class="text-success" style="font-weight:900">Thanks for your Endorsement. </p>
                        <p class="text-success">You can also create an account and also request a loan</p>
                        <a href="endorse?link=<?php echo $link;?>" class="btn btn-success">Back to Endorse</a>
                        
                            </p>
                    </div>
                 
               
            </div>
            <div class="col-md-5 bg-light m-2 " style="height:120px">
                    <div class="text-center pb-sm-3 py-3">
                        
                        <p style="font-weight:900">Ads <?php ?>
                        
                            </p>
                    </div>
                   
            </div>
        </div>
     </div>   
        
    </div>             
</section>
        <!--end login login --->
    <!-- Footer Area -->  
    <script>
       setTimeout(function(){
        // var x = document.referrer;
window.location.href = "thank_you.php?link=<?php echo $link?>";
         }, 4000);
        </script>
    <?php include('includes/footer.php')?>