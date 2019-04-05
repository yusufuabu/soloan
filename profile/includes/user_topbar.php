<header class="header fixed-top clearfix">
<?php $user = User::find_by_id($_SESSION['id']); ?>
<!--logo start-->
<div class="brand">
    <a href="index" class="logo">
       Welcome
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <?php 
              $claim = new Claims();
              $checkloan = new Loans();
              if(!$checkloan->checkClaimCount($_SESSION['id'])):
              if($claim->checkdate($_SESSION['id'])):
              ?>
              <span style="margin-left: 20px;"><a href="profile?claim=1" class="btn btn-success">Claim Bonus</a></span>
              <?php endif;?>
              <?php endif;?>
              <?php 
              if(!$checkloan->checkClaimCount($_SESSION['id'])):
              if(!$claim->checkdate($_SESSION['id'])):
              ?>
              <span style="margin-left: 20px;"><a href="" class=" btn btn-danger">Come back tomorrow</a></span>
              <?php endif;?>
              <?php endif;?>
    <ul class="nav pull-right top-menu">
  
        <!-- user login dropdown start-->
        <li>
      
        </li>
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/userimage/<?php echo $user->user_image?>">
                <span class="username"><?php echo $user->username?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="profile"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="support"><i class=" fa fa-info"></i>Support</a></li>
                
                <li><a href="../includes/logout"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>