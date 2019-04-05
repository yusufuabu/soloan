<?php 
$admins = Admin::find_by_id($_SESSION['id']);

?>

<nav id="sidebar">
            <div class="sidebar-header">
                <h1>
                    <a href="index.html">Admin</a>
                </h1>
                <span>S</span>
            </div>
            <div class="profile-bg"></div>
            <ul class="list-unstyled components">
                <li class="">
                    <a href="index">
                        <i class="fas fa-th-large"></i>
                        Dashboard <?php ?>
                    </a>
                </li>
                <li>
                    <a href="#users" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        Users
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="users">
                        <li>
                            <a href="view_users">View Users</a>
                        </li>
                        <li>
                            <a href="blacklisteduser">Blacklisted Users</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#loans" data-toggle="collapse" aria-expanded="false">
                        <i class="far fa-money-bill-alt"></i>
                        Loans
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="loans">
                        <li>
                            <a href="viewloans">Loan Requested</a>
                        </li>
                        <li>
                            <a href="#">Pending Repayment</a>
                        </li>
                        <li>
                            <a href="viewrepaidloans">Loans Repaid</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="viewmessages">
                        <i class="far fa-envelope"></i>
                        Mailbox
                        
                    </a>
                </li>


                <li>
                    <a href="#quotes" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-book"></i>
                        Business Quotes
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="quotes">
                        <li>
                            <a href="quotes">Text Quotes</a>
                        </li>
                        <li>
                            <a href="imagequotes">Image Quotes</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="viewlevel">
                        <i class="fa fa-bolt"></i>
                        User Limit
                    </a>
                </li>
                <?php if($admins->role == 'super'): ?>
                <li>
                    <a href="viewadmin">
                        <i class="fas fa-lock"></i>
                        Admin
                    </a>
                </li>
<?php endif;?>
                <!-- <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-laptop"></i>
                        Components
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="cards.html">Cards</a>
                        </li>
                        <li>
                            <a href="carousels.html">Carousels</a>
                        </li>
                        <li>
                            <a href="forms.html">Forms</a>
                        </li>
                        <li>
                            <a href="modals.html">Modals</a>
                        </li>
                        <li>
                            <a href="tables.html">Tables</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="charts.html">
                        <i class="fas fa-chart-pie"></i>
                        Charts
                    </a>
                </li>
                <li>
                    <a href="grids.html">
                        <i class="fas fa-th"></i>
                        Grid Layouts
                    </a>
                </li>
                <li>
                    <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false">
                        <i class="far fa-file"></i>
                        Pages
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu1">
                        <li>
                            <a href="404.html">404</a>
                        </li>
                        <li>
                            <a href="500.html">500</a>
                        </li>
                        <li>
                            <a href="blank.html">Blank</a>
                        </li>
                    </ul>
                </li>
               
                <li>
                    <a href="widgets.html">
                        <i class="far fa-window-restore"></i>
                        Widgets
                    </a>
                </li>
                <li>
                    <a href="pricing.html">
                        <i class="fas fa-table"></i>
                        Pricing Tables
                    </a>
                </li>
                <li>
                    <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        User
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu3">
                        <li>
                            <a href="login.html">Login</a>
                        </li>
                        <li>
                            <a href="register.html">Register</a>
                        </li>
                        <li>
                            <a href="forgot.html">Forgot password</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="far fa-map"></i>
                        Maps
                    </a>
                </li> -->
            </ul>
        </nav>