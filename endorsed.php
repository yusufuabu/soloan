<?php ob_start(); ?>
<?php include('includes/header.php');?>
<?php $quotes = new Quote();
if(!isset($_POST['submit'])){
    redirect("index");
    $address = $_SERVER['HTTP_REFERER'];
} else {
    $currentTime = date("Y-m-d H:i:s");;
    $datecheck = strtotime(date("Y-m-d H:i:s", strtotime($currentTime)) . " +3 hours");
    $username = $_POST['username'];
    $userId = $_POST['userId'];
    $link = $_POST['link'];
    $endorsement = new Endorsements();  
    $endorsement->nextTime = date("Y-m-d H:i:s", $datecheck );
    $cookie_name = "user";
    $cookie_value = uniqid();;
    setcookie($cookie_name, $cookie_value, time() + 10800, "/");
    $endorsement->ip = $cookie_value;
    $endorsement->timeClocked = $currentTime;
    $endorsement->saveIp();
    $loans = Loans::endorseloan($userId);
    $loan = new Loans();
    $loan->updateCount($userId);
}
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
                        
                        <p style="font-weight:900"> <p class="text-success" style="font-weight:900">You Have Endorsed <?php echo $username; ?> come back in 3hrs to endorse again </p> <?php ?>
                        
                            </p>
                    </div>
                 
               
            </div>
            <div class="col-md-5 bg-light m-2 " style="height:120px">
                    <div class="text-center pb-sm-3 py-3">
                        
                        <p style="font-weight:900">Add <?php ?>
                        
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