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
            <span class="login100-form-title">
                <img src="../images/logo2.png" alt="logo" width="100" style="margin-left:-25px;padding-bottom: 20px;">
            </span>
            <span class="login100-form-title p-b-26">
                Reset Password
            </span>
            <form class="login100-form validate-form" action="login-process.php" method="POST">
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="email" required>
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn">
                            Reset
                        </button>
                    </div>
                </div>
                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn" style="border: 1px solid #6a7dfe;">
                        <div class="login100-form-bgbtn" style="    background-color: transparent;"></div>
                        <a href="login.php" class="login100-form-btn">
                            Back to login
                        </a>
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