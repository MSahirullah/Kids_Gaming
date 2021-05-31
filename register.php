<?php include 'common/header.php';

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

    .wrap-login100-form-btn {
        cursor: pointer;
    }
</style>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" action="register-process.php" method="POST">
                <span class="login100-form-title p-b-26">
                    Register
                </span>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="firstName" required>
                    <span class="focus-input100" data-placeholder="First Name"></span>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="lastName" required>
                    <span class="focus-input100" data-placeholder="Fast Name"></span>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="email" name="email">
                    <span class="focus-input100" data-placeholder="Email" required></span>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" id="password1" type="password" name="password">
                    <span class="focus-input100" data-placeholder="Password" required></span>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" id="password2" type="password" name="password">
                    <span class="focus-input100" data-placeholder="Repeat Password" required></span>
                </div>
                <div class="container-login100-form-btn text-center">
                    <p>
                        By creating an account you agree to our <a href="#" class="text-primary"> Terms & Privacy. </a>
                    </p>
                </div>
                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <span class="login100-form-btn">
                            Register
                        </span>
                    </div>
                </div>
                <div class="container-login100-form-btn">
                    <p>
                        Already have an account? <a href="login.php" class="text-primary"> Sign in. </a>
                    </p>
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


<script>
    $('.wrap-login100-form-btn').click(function() {
        var password1 = $('#password1').val();
        var password2 = $('#password2').val();

        if (password1 == password2) {
            $('form').submit();
        } else {
            alert('Passwords not matching');
        }
    });
</script>

<?php
if (isset($_GET['formsubmit']) && $_GET['formsubmit'] == 13) {
?>
    <script>
        alert("Email address alreay registered. Please login.");
        window.location = 'login.php';
    </script>
<?php
}
?>


</body>



</html>