      <!-- Login modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="includes/login.php" method="post">
                <div class="form-group">
                <p class="text-danger"><?php echo $message; ?></p>
                  <label for="recipient-name" class="col-form-label">Username / Email</label>
                  <input type="text" class="form-control border" placeholder=" " name="username" id="recipient-name" required="">
                </div>
                <div class="form-group">
                  <label for="password" class="col-form-label">Password</label>
                  <input type="password" class="form-control border" placeholder=" " name="password" id="password" required="">
                </div>
                <div class="right-w3l">
                  <input type="submit" class="btn btn-success btn-block" name="login" value="Login">
                </div>
                <div class="row sub-w3l my-3">
                  <div class="col sub-agile">
                    <input type="checkbox" id="brand1" value="">
                    <label for="brand1" class="text-muted">
                      <span></span>Remember me?</label>
                  </div>
                  <div class="col forgot-w3l text-right text-dark">
                    <a href="index?#exampleModal2" class="text-secondary font-weight-bold">Forgot Password?</a>
                  </div>
                </div>
                <p class="text-center">Don't have an account?
                  <a href=""  data-toggle="modal" data-target="#exampleModal1" class="text-secondary font-weight-bold">
                    Register Now</a>
                </p>
              </form>
            </div>
          </div>
        </div>
      </div>
  <!-- //Login modal -->
  <!-- Register modal -->
  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Register</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="includes/register.php" method="post">
         
            <div class="form-group">
              <p class="text-danger"><?php echo $message; ?></p>
              <label for="recipient-name" class="col-form-label">Username</label>
              <input type="text" class="form-control border" placeholder=" " name="username" id="recipient-rname" required="">
            </div>
            <div class="form-group">
              <label for="recipient-email" class="col-form-label">Email</label>
              <input type="email" class="form-control border" placeholder=" " name="email" id="recipient-email" required="">
            </div>
            <div class="form-group">
              <label for="password1" class="col-form-label">Password</label>
              <input type="password" class="form-control border" placeholder=" " name="password" id="password1" required="">
            </div>
            <div class="form-group">
              <label for="password2" class="col-form-label">Confirm Password</label>
              <input type="password" class="form-control border" placeholder=" " name="Confirm Password" id="password2" required="">
              <input type="hidden" name="link" value= "<?php echo time().uniqid() ?>">
            </div>
            
            <div class="sub-w3l">
      <div class="sub-agile">
                <input type="checkbox" id="brand2" value="" required ="">
                <label for="brand2" class="mb-3">
                  <span></span>I Accept to the <a href="terms">Terms & Conditions</a></label>
              </div>
            </div>
            <div class="right-w3l">
              <input type="submit" class="btn btn-success btn-block" name="register" value="Register">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- // Register modal -->
  <!-- Forget Modal --->
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Forget Password</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="includes/forget_script.php" method="post">
                <div class="form-group">
                <p class="text-danger"><?php echo $message; ?></p>
                  <label for="recipient-name" class="col-form-label">Input Email address</label>
                  <input type="email" name="email" class="form-control border" placeholder="" name="email" id="recipient-name" required="">
                </div>
           
                <div class="right-w3l">
                  <input type="submit" name="forget" class="btn btn-success btn-block" name="forget" value="Retrieve">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    <!-- //Forget Modal --->
<footer class="footer_area"> 
        <img src="images/footer-shap.png" alt="" class="shap">
        <div class="round_shap"></div>
        <div class="footer_inner row">   
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 footer_logo wow fadeIn">
                <a href="index.html"><img src="images/logo.png" alt=""></a> 
                
                
                <ul class="footer_social"> 
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li> 
                </ul>
            </div>
            
            <div class="footer_widget fw_2 col-xl-2 col-lg-3 col-md-3 col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                <h4>Information</h4>
                <address>
                    Lagos, Nigeria. <br>LG 100242
                    <a href="#" class="email">info@socialoan.net</a>
                    <a href="#" class="phone">+88 (0) 29292162</a>
                </address>
            </div>   
            <div class="footer_widget fw_3 col-xl-3 col-lg-3 col-md-4 col-sm-6 wow fadeIn" data-wow-delay="0.6s">
                <h4>Stay In  Loop</h4>
                <p>Subscribe to receive updates about our services</p>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="What’s Your email">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-caret-right"></i></span>
                    </div>
                </div>
            </div>   
            <div class="footer_widget fw_4 col-xl-2 col-lg-3 col-md-4 col-sm-6 wow fadeIn" data-wow-delay="0.8s">
                <h4>Quick Links</h4>
                <ul class="footer_nav">  
                    <li><a href="index#vision">Our Vision</a></li>
                    <li><a href="index#about">Our Mission </a></li>
                    <li><a href="index#service">Services</a></li>
                    
                   
                </ul>
            </div>   
        </div> 
        <div class="container btn_container">
                <p>Mobile APP Coming soon.</p><br>
            <a href="#" class="theme_btn apple"><i class="fab fa-apple"></i>App Store</a>
            <a href="#" class="theme_btn"><i class="fab fa-google-play"></i>Play Store</a>
            
        </div>
        <p class="copy_right">© <?php echo date("Y")?> All rights reserved</p>
    </footer>
    <!-- End Footer Area --> 
    
    <!-- Scroll Top Button -->
    <button class="scroll-top">
        <i class="fa fa-angle-double-up"></i>
    </button>
    
    <!-- Preloader -->  
    <div class="preloader"></div>
    
    <!-- jQuery v3.3.1 -->
    <script src="js/jquery-3.3.1.min.js"></script>    
    <!-- Bootstrap v4.0.0 -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>  
    <!-- Extra Plugin -->
    
    <script src="vendors/animate-css/wow.min.js"></script> 
    <script src="vendors/parallaxmouse/parallax.min.js"></script> 
    <script src="vendors/counterup/jquery.waypoints.min.js"></script> 
    <script src="vendors/counterup/jquery.counterup.min.js"></script>  
    <script src="vendors/parallaxmouse/jquery.jqlouds.min.js"></script>  
    <script src="vendors/magnify-popup/jquery.magnific-popup.min.js"></script> 
    <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="vendors/isotope/isotope.pkgd.min.js"></script>     
    <script src="vendors/bootstrap-selector/jquery.nice-select.min.js"></script>  
    <!-- Theme js / Custom js -->
    <script src="js/theme.js"></script> 
    <script src="js/jquery.time-to.js"></script>
    <script>
    var datech = 'Wed Jan 30 2019 09:00:00 GMT+0100 (West Africa Standard Time)';
    var datecheck = new Date('<?php echo $date;?>');
    datechec = '' + datecheck +  ''
   console.log(datecheck);
    $('#countdown').timeTo({
    timeTo: new Date(new Date('' + datechec + '')),
    displayDays: 2,
    theme: "black",
    displayCaptions: true,
    fontSize: 30,
    captionSize: 14,
    languages: {
        pl: {days: 'Days', hours: 'Hours', min: 'minutes', sec: 'seconds'}
    },
    lang: 'pl'
});
    </script> 
    <script>
            $(window).on('load',function(){
               
         var hash = window.location.hash;
        if (hash == "#exampleModal"){
        $('#exampleModal').modal('show'); 
       }
        if (hash == "#exampleModal1"){
        $('#exampleModal1').modal('show'); 
        }
        if (hash == "#exampleModal2"){
        $('#exampleModal2').modal('show'); 
        }
      });

      var enableBtn = function(){
    document.getElementById("submitBtn").disabled = false;
   }
    </script>
</body>
</html>