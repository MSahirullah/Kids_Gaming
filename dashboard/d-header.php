<?php
if (!isset($_SESSION['login_user_firstname'])) {
    header('Location:login.php');
    exit();
}

?>

<link rel="stylesheet" type="text/css" href="css/dashboard.css">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top " id="mainNav">
    <img src="../images/logo2.png" alt="logo" class="bxsd-1 logo-img">
    <a class="navbar-brand" href="index.html">Kids Gaming</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="dashboard">
            <div class="hr-line"></div>
            <div class="user-name">
                <span><?php echo $_SESSION['login_user_firstname'] ?></span>&nbsp<span><?php echo $_SESSION['login_user_lastname'] ?></span>
                <div class="role-div"><span class="green-circle"></span><span class="role">Admin</span></div>
            </div>
            </li>
            <div class="hr-line"></div>
            <li class="nav-item <?php echo basename($_SERVER['REQUEST_URI']) == 'index.php' ? 'disabled disabled-c disabled disabled-c-c' : '' ?>" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link <?php echo basename($_SERVER['REQUEST_URI']) == 'index.php' ? 'disabled disabled-c disabled-c' : '' ?>" href="index.php" style="color:#adb5bd;">
                    <i class="fa fa-fw fa-dashboard" style="margin-right: 5px;"></i>
                    <span class="nav-link-text">Dashboard </span>
                </a>
            </li>

            <li class="nav-item <?php echo basename($_SERVER['REQUEST_URI']) == 'users.php' ? 'disabled disabled-c' : '' ?>" data-toggle="tooltip" data-placement="right" title="Users">
                <a class="nav-link <?php echo basename($_SERVER['REQUEST_URI']) == 'users.php' ? 'disabled disabled-c' : '' ?>" href="users.php" style="color:#adb5bd;">
                    <i class="fas fa-users" style="margin-right: 5px;"></i>
                    <span class="nav-link-text">Users</span>
                </a>
            </li>


            <li class="nav-item <?php echo basename($_SERVER['REQUEST_URI']) == 'game-categories.php' ? 'disabled disabled-c' : '' ?>" data-toggle="tooltip" data-placement="right" title="Games Categories">
                <a class="nav-link <?php echo basename($_SERVER['REQUEST_URI']) == 'game-categories.php' ? 'disabled disabled-c' : '' ?>" href="game-categories.php" style="color:#adb5bd;">
                    <i class="fas fa-cubes" style="margin-right: 5px;"></i>
                    <span class="nav-link-text">Games Categories</span>
                </a>
            </li>

            <li class="nav-item <?php echo basename($_SERVER['REQUEST_URI']) == 'games.php' ? 'disabled disabled-c' : '' ?>" data-toggle="tooltip" data-placement="right" title="Games">
                <a class="nav-link <?php echo basename($_SERVER['REQUEST_URI']) == 'games.php' ? 'disabled disabled-c' : '' ?>" href="games.php" style="color:#adb5bd;">
                    <i class="fas fa-gamepad" style="margin-right: 5px;"></i>
                    <span class="nav-link-text">Games</span>
                </a>
            </li>


            <li class="nav-item <?php echo basename($_SERVER['REQUEST_URI']) == 'payments.php' ? 'disabled disabled-c' : '' ?>" data-toggle="tooltip" data-placement="right" title="Payments">
                <a class="nav-link <?php echo basename($_SERVER['REQUEST_URI']) == 'payments.php' ? 'disabled disabled-c' : '' ?>" href="payments.php" style="color:#adb5bd;">
                    <i class="fas fa-file-invoice-dollar" style="margin-right: 5px;"></i>
                    <span class="nav-link-text">Payments</span>
                </a>
            </li>

            <li class="nav-item <?php echo basename($_SERVER['REQUEST_URI']) == 'enquiries.php' ? 'disabled disabled-c' : '' ?>" data-toggle="tooltip" data-placement="right" title="Enquiries">
                <a class="nav-link <?php echo basename($_SERVER['REQUEST_URI']) == 'enquiries.php' ? 'disabled disabled-c' : '' ?>" href="enquiries.php" style="color:#adb5bd;">
                    <i class="fas fa-envelope-open-text" style=" margin-right: 5px;"></i>
                    <span class="nav-link-text">Enquiries</span>
                </a>
            </li>

            <li class="nav-item <?php echo basename($_SERVER['REQUEST_URI']) == 'admin.php' ? 'disabled disabled-c' : '' ?>" data-toggle="tooltip" data-placement="right" title="Administrators">
                <a class="nav-link <?php echo basename($_SERVER['REQUEST_URI']) == 'admin.php' ? 'disabled disabled-c' : '' ?>" href="admin.php" style="color:#adb5bd;">
                    <i class="fas fa-users-cog" style="margin-right: 5px;"></i>
                    <span class="nav-link-text">Administrators</span>
                </a>
            </li>
        </ul>


        <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item">
               <form class="form-inline my-2 my-lg-0 mr-lg-2">
                  <div class="input-group">
                     <input class="form-control" type="text" placeholder="Search for...">
                     <span class="input-group-append">
                        <button class="btn btn-primary" type="button">
                           <i class="fa fa-search"></i>
                        </button>
                     </span>
                  </div>
               </form>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out" style="margin-right:5px;"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Logout Modal-->
<div class="modal fade cw" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>