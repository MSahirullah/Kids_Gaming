<?php

include 'common/header.php';
if (isset($_SESSION['login_user_email'])) {
    header('Location:index.php');
}

?>


<style>
    .container-login100 {
        background: #000000;
    }

    .wrap-login100 {
        padding: 43px 35px 29px 35px;
        background: #303030;
    }

    .login100-form-title {
        color: #ffffff;
    }

    .focus-input100::after {
        color: #888888;
    }

    .input100 {
        color: #ffffff;
    }
</style>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" action="login-process.php" method="POST">
                <span class="login100-form-title p-b-26">
                    Welcome
                </span>
                <span class="login100-form-title">
                    <img src=" images/logo2.png" alt="logo" width="150" style="margin-left:-25px;padding-bottom: 30px;">
                </span>
                <?php
                if (isset($_GET['error'])) {
                ?>
                    <div class="text-center text-danger">
                        <label class="label label-danger">
                            Your Email or Password is invalid
                        </label>
                    </div>
                <?php
                }
                ?>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="email" required>
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>

                <div class="wrap-input100 validate-input" style="margin-bottom:30px;">
                    <input class="input100" type="password" name="password">
                    <span class="focus-input100" data-placeholder="Password" required></span>
                </div>
                <div class="text-center">
                    <a href="forgot-password.php" lass="link-light cp">Forgot Password? <i class="fas fa-arrow-right cp" style="margin-left:5px;margin-bottom:15px"></i></a>
                </div>
                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </div>
                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn" style="border: 1px solid #6a7dfe;">
                        <div class="login100-form-bgbtn" style="    background-color: transparent;"></div>
                        <a href="register.php" class="login100-form-btn">
                            Register
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>
<script src=" vendor/jquery/jquery-3.2.1.min.js"></script>
<script src=" vendor/animsition/js/animsition.min.js"></script>
<script src=" vendor/bootstrap/js/popper.js"></script>
<script src=" vendor/select2/select2.min.js"></script>
<script src=" vendor/daterangepicker/moment.min.js"></script>
<script src=" vendor/daterangepicker/daterangepicker.js"></script>
<script src=" vendor/countdowntime/countdowntime.js"></script>
<script src=" js/main.js"></script>

</body>

</html>