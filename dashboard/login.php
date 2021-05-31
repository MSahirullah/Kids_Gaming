<?php include '../common/header.php';

if (isset($_SESSION['login_user_email'])) {
    header('Location:index.php');
}
?>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" action="loginprocess.php" method="POST">
                <span class="login100-form-title p-b-26">
                    Welcome
                </span>
                <span class="login100-form-title">
                    <img src="../images/logo2.png" alt="logo" width="150" style="margin-left:-25px;padding-bottom: 30px;">
                </span>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="email" required>
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="password" name="password">
                    <span class="focus-input100" data-placeholder="Password" required></span>
                </div>
                
                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>
<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="../vendor/animsition/js/animsition.min.js"></script>
<script src="../vendor/bootstrap/js/popper.js"></script>
<script src="../vendor/select2/select2.min.js"></script>
<script src="../vendor/daterangepicker/moment.min.js"></script>
<script src="../vendor/daterangepicker/daterangepicker.js"></script>
<script src="../vendor/countdowntime/countdowntime.js"></script>
<script src="../js/main.js"></script>

</body>

</html>