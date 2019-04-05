<?php include('includes/header.php');
if($session->is_signed_in()){redirect("profile");}
?>
<body>
   
    <!-- Header Area -->
    <?php include("includes/nav.php")?>
    <!-- Header Area -->  
    
    <!-- Banner Area -->   
    <?php include('includes/banner.php')?>
    <!-- End Banner Area -->  
    
    <!-- Fantasy Area -->   
    <section class="fantasy_area"> 
        <div class="row fantasy_inner">
            <div class="col-xl-5 col-lg-12 fantasy_tittle">
                <br>
                <br>
                <br>
                <br>
                <h3>Get your Loan with these</h3>
                <h1>2 Easy steps</h1><br>
                <a href="#" class="theme_btn">Learn  more</a>
            </div>
            <div class="col-xl-7 col-lg-12 row fantasy_items"> 
                <div class="col-md-6 wow fadeIn">
                    <div class="fantasy">  
                        <span class="icons"><i class="far fa-clone"></i></span>
                        <a href="#">Get Endorsed</a>
                        <p>To get the social loan each users must invite people to endorse them on the platform.</p>
                        <ul class="fantasy_list">
                            <li>Register Free</li>
                            <li>Get a unique endorsement link</li>
                            <li>Invite Friends via endorse link</li>                             
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="fantasy fantasy_2">  
                        <span class="icons"><i class="fa fa-moon-o"></i></span>
                        <a href="#">Earn Points </a>
                        <p>You can also qualify for loans<br> by earning points from daily activities.</p>
                        <ul class="fantasy_list">
                            <li>Carry Out Daily Tasks</li>
                            <li>Earn Points By Logging in Daily </li>
                            <li>Higher Points Means Higher Loan</li> 
                        </ul>
                    </div>
                </div> 
            </div>
        </div>
    </section>
    <!-- Fantasy Area -->  
     
    <!-- Countarup Area -->
<center><div class="col-xl-5 col-lg-12 fantasy_tittle">                
                        <h4>How It's So Easy To Get</h4>
                        <h1>Paid Quickly</h1><br>
                    </div></center>
            <section class="countarup_area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="countraup_item mt">
                                <h4>Get up to</h4>
                                <h3>₦<b class="counter">200</b>k</h3>
                                <h6>& payback on due date</h6>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="countraup_item">
                                <h4>Reffer & Earn</h4>
                                <h3><b class="counter">10</b>%</h3>
                                <h6>When your referee<br>pays back</h6>   
                                
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="countraup_item mt_2">
                                <h4>You Qualify To Get</h4>
                                <h3><b>5</b><b class="counter">0</b>%</h3>
                                <h6>More Loan In Your <br>Next Application</h6>
                            </div>
                        </div>                      
                   
                        <div class="col-lg-3 col-md-6">
                            <div class="countraup_item mt_3">
                                <h4>You Also <br>Earn Daily</h4>
                                <h3>POINTS</h3>
                                <h6>By Logging Into <br>Account Regularly</h6>
                            </div>
                        </div>                        
                        <h5 class="col-lg-2 col-md-4 col-sm-6">Apply in <span><b class="counter">5</b></span> Minutes</h5>
                        <h5 class="col-lg-5 col-md-4 col-sm-6">Get Loan Within <span><b class="counter">12</b>Hours</span> Of Approval</h5>
                        <h5 class="col-lg-5 col-md-4 col-sm-6">You Can Convert Points to get upto <span><b class="counter">20</b>K</span> Cash</h5>
                    </div>
                </div>
            </section>
            <!-- End Countarup Area -->  
    
    <!-- About the Agency Area -->  
<?php include('includes/about.php')?>
    <!-- End About the Agency Area --> 
    
    <!-- Service Area -->   
<?php include('includes/services.php')?>
    <!-- Service Area -->  
    
    <!-- Our Vision Area --> 
    <?php include('includes/vision.php')?>
    <!-- End Our vision Area -->  
    
    
    <!-- Our blog posts Area --> 
    <?php include('includes/blog.php')?>
    <!-- End Our blog posts Area -->  
    <!-- Contact Us Area  --> 
        <?php include("includes/contact.php") ?>
    <!-- End Contact Us Area -->  
    
    <!-- Footer Area -->  
    <?php include('includes/footer.php')?>