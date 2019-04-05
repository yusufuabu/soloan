<?php ob_start(); ?>
<?php include('includes/header.php');?>
<?php $quotes = new Quote();
$link;
if(!isset($_POST['submit'])){
    redirect("index");
}
$link = $_POST['link'];

$user = User::find_by_link($link);

$ip = '';
if(isset($_COOKIE["user"])){
    $ip = $_COOKIE["user"];
}
if($ip != ''){
$findIp = Endorsements::getIp($ip);
$nextTime = $findIp->nextTime;    
$timeClocked = strtotime($findIp->timeClocked);
// $date = date("Y-m-d H:i:s", $timeClocked);
$date = date("Y-m-d H:i:s", $timeClocked );
$datetostr = strtotime(date("Y-m-d H:i:s", strtotime($date)) . " +10 hours");
$datecheck = strtotime(date("Y-m-d H:i:s", strtotime($date)) . " +3 hours");
$date = date("Y-m-d H:i:s",$datetostr);
$now = date("Y-m-d H:i:s");
// $now = strtotime($now);
  
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
        

        <?php if(!isset($_COOKIE["user"])) :?>
            <div class="col-md-6 bg-light mt-2">
                    <div class="text-center pb-sm-3 py-3">
                        
                        <p style="font-weight:900">You are about to Endorse <?php echo $user->username;"<br>"; ?>
                        
                            </p>
                            <p><?php   ?>
                    </div>
                    <div class="text-center py-2" >        
                        <form action="endorsed" method="post" >
                        
                            <input type="hidden" name="userId" value="<?php echo $user->id  ;?>">
                            <input type="hidden" name="username" value="<?php echo $user->username; ?>">
                            <input type="hidden" name="link" value="<?php echo $link ?>" >
                           
                            
                            <div style="width: 304px;margin: 0 auto;max-height:78px"><div class="g-recaptcha"  data-callback="enableBtn" data-sitekey="6Lfe8I0UAAAAAGYINyYz2cuZvLQs8t81Wrr9Sh8r"></div></div>
                            <input type="submit" style="position:relative;z-index:9999;" id="submitBtn" disabled  name="submit" value="Endorse" class="btn btn-success" >
                        </form>
                    </div>
               
            </div>
         <?php endif;?>
         
         <?php if(isset($_COOKIE["user"])) :?>
             <div class="col-md-6 bg-light mt-2 py-2">
             <p class="text-success text-center" style="font-weight:800">Endorsement done, come back in 
             <div class="countdown text-center" id="countdown"></div>    
            </div>

         <?php endif;?>
         
            <div class="col-md-5 bg-light m-2 " style="height:120px">
                    <div class="text-center pb-sm-3 py-3">
                        
                        <p style="font-weight:900">Ads
                        
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