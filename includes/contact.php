<section class="get_touch_area"id="contact">
        <div class="container">
            <h2>Get In Touch With Us</h2>
            <div class="row">
                <div class="col-lg-6 map_area">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11210.075111349577!2d3.345169093566646!3d6.602098034410698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b9228fa2a3999%3A0xd7a8324bddbba1f0!2sIkeja!5e0!3m2!1sen!2sng!4v1550794198317" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="col-lg-6"> 
                    <form class="from_main" action="php/contact.php" method="post" id="phpcontactform" novalidate="novalidate"> 
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                        </div>  
                        <div class="row"> 
                            <div class="form-group col-lg-6">
                                <input type="email" class="form-control col-md-6" id="email" name="email" placeholder="Email"> 
                            </div>
                            <div class="form-group col-lg-6">   
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Phone"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="message" name="message" placeholder="Your Message"></textarea>
                        </div>
                        <div class="form-group m-0">
                            <button class="theme_btn btn" id="js-contact-btn" type="submit">Send</button> 
                            <div id="js-contact-result" data-success-msg="Form submitted successfully." data-error-msg="Messages Successfully"></div>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </section>
    <!-- Get In Touch With Us Area -->   
    
    <!-- Contact Us Area --> 
    <section class="contact_us">
        <div class="container">
            <div class="contact_inner">
                <h2>We are available to answer any questions</h2>
                <p>Send us a direct message and customer service representative will get back to you shortly</p>
                <a href="#contact" class="theme_btn">Contact us</a>
            </div>
        </div>
    </section> 