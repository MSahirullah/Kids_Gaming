<?php

include 'common/header.php';

if (isset($_SESSION['login_user_email'])) {
    $fname =  $_SESSION['login_user_firstname'];
    $lname = $_SESSION['login_user_lastname'];
    $email = $_SESSION['login_user_email'];
}

?>


<style>
    .container-login100 {
        background-image: url(' images/bg-img.png');
        background-repeat: no-repeat;
        background-size: cover;
        height: 100%;
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

    label {
        margin: 0px !important;
        color: #888888;
    }

    .wrap-login100 {
        width: 75%;
    }

    .wrap-input100 {
        margin-bottom: 25px;
    }

    .select-p-option {
        padding-left: 24px;

    }

    .select-p-option img {
        margin: 0px 30px;
        margin-top: 20px;
    }

    .select-p-option input {
        margin-top: 30px;
        margin-left: 5px;
    }

    .cx {
        border-right: 1px solid white;
    }

    .col-md-6 {
        padding-left: 25px;
        padding-right: 25px;
    }

    .cp {
        margin-bottom: 30px;

    }

    .wrap-login100 {
        padding: 20px 35px 30px 35px;
        background: #303030;
    }
</style>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" action="purchase-process.php" method="POST">
                <span class="login100-form-title">
                    <img src=" images/logo2.png" alt="logo" width="100" style="margin-left:-25px;padding-bottom: 20px;">
                </span>
                <span class="login100-form-title p-b-26">
                    Payment
                </span>

                <div class="row">

                    <div class="col-md-6 cx">
                        <div class="text-center" style="margin-bottom:25px;">
                            <h5>Account Information</h5>
                        </div>
                        <div class="wrap-input100 validate-input">
                            <label for="fname">First Name</label>
                            <input class="input100" type="text" name="fname" id="fname" value="<?php echo $fname ?>" required disabled>

                        </div>

                        <div class="wrap-input100 validate-input">
                            <label for="fname">Last Name</label>
                            <input class="input100" type="text" name="lname" id="lname" value="<?php echo $lname ?>" required disabled>
                        </div>

                        <div class="wrap-input100 validate-input">
                            <label for="fname">Email</label>
                            <input class="input100" type="text" name="email" id="email" value="<?php echo $email ?>" required disabled>
                        </div>

                        <div class="wrap-input100 validate-input">
                            <label for="fname">Mobile Number <small>(07XXXXXXXX)</small></label>
                            <input class="input100" maxlength="10" type="tel" name="mobNo" id="mobNo" required pattern="07[1,2,5,6,7,8][0-9]+">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="text-center">
                            <h5>Payment Information</h5>
                        </div>
                        <div class="text-center select-p-option">

                            <input class="form-check-input r-1" type="radio" name="p-option" id="p-option" value="visa" required>
                            <label for="p-option"><img src=" images/card-1.png" alt="c1" width="75px"></label>

                            <input class="form-check-input r-1" type="radio" name="p-option" id="p-option1" value="master" required>
                            <label for="p-option1"><img src=" images/cade-2.png" alt="c2" width="75px"></label>
                        </div>
                        <div class="wrap-input100 validate-input">
                            <label for="card_no">Card Number</label>
                            <input class="input100" type="text" maxlength="12" name="card_no" id="card_no" required placeholder="Card number" required>

                        </div>

                        <div class="wrap-input100 validate-input">
                            <label for="cvc">CVV</label>
                            <input class="input100" type="text" maxlength="3" name="cvc" id="cvc" required placeholder="CVV" required>
                        </div>

                        <div class="wrap-input100 validate-input">
                            <label for="dateexp">Expire Date</label>
                            <input class="input100" type="date" name="dateexp" id="dateexp" required placeholder="CVV" required>
                        </div>

                        <a href="https://www.paypal.com/lk/home" lass="link-light cp">Other Payment Options <i class="fas fa-arrow-right cp" style="margin-left:5px"></i></a>

                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" class="login100-form-btn">
                                Submit
                            </button>
                        </div>

                    </div>

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