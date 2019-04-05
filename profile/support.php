<?php include("includes/user_header.php")?>
<body>
<?php 

$messages = new Message();

if(isset($_POST['submit'])){
    $messages->userId = $_SESSION['id'];
    $messages->subject = $_POST['subject'];
    $messages->message = $_POST['message'];
    $messages->status = 'unread';
    $messages->datesent = date('Y-m-d H:i:s');

    if($messages->create()){
        $session->message('Message sent');
        redirect('support');
    } else {
        $message = 'message not sent';
    }
}

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
	<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-md-6">
                    <section class="panel">
                        <header class="panel-heading">
                          Send Message 
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                            <form action="" method="post">
                        <div class="form-group">
                        <p class="text-success"><?php echo $message; ?></p>
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" id="" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" id="" cols="30" rows="4"  class="form-control"></textarea>
                        </div>
                        <input type="submit" name="submit" value="Send Message" class="btn btn-primary">
                        
                        
                    </form>
                            </div>

                        </div>
                    </section>

            </div>
         
        </div>
		<!-- //calendar -->

			<!-- tasks -->

		<!-- //tasks -->

					<div class="clearfix"> </div>
				</div>
</section>
 <!-- footer -->
<?php include("includes/user_footer.php")?>