<?php include 'common/header.php';
?>
<?php include 'common/top_navbar.php';
$fname =  "";
$lname = "";
$email = "";



if (isset($_SESSION['login_user_email'])) {
    $fname =  $_SESSION['login_user_firstname'];
    $lname = $_SESSION['login_user_lastname'];
    $email = $_SESSION['login_user_email'];
}
?>
<style>
    body {
        background-color: black;
    }

    .card {
        background-color: #0f0f0f;
        margin-bottom: 30px;
        border-radius: 7px;
        color: white;
        padding-bottom: 15px;
        padding: 32px;
    }

    .form-control {
        color: #fff;
        background-color: #090909;
        background-clip: padding-box;
        border: 1px solid #454545;
    }

    .form-control:focus {
        color: #fff;
        background-color: #090909;
    }
</style>

<div class="container">
<br>
<br>
<br>
    <div class="row">

        <div class="col-sm-5">
            <br>
            <h1>Contact Us</h1>
            <hr>
            <p style="color:white">
                <i class="fa fa-phone"></i> Genaral line : +94783732961<br>
                <i class="fa fa-phone"></i> Customer service : +94754343377/+94763612980<br>
                <i class="fa fa-address-card"></i> Address : No 134 Madawala Kandy,Srilanka<br>
                <i class="fa fa-envelope"></i> Email : CKIkidsgames@gmail.com
            </p>
            <br>
            <br>
            <br>
            <h1>Follow on</h1>
            <hr>
            <p style="color:white">
                <i class="fab fa-facebook-f"></i> www.facebook.com/CKIkidsgaming <br>
                <i class="fab fa-youtube-square"></i> www.youtube.com/CKIkidsgaming<br>
                <i class="fab fa-instagram "></i> www.instagram.com/CKIkidsgaming<br>
            </p>
            <br>
            <br>
            <br>
            <h1>Subscribe us</h1>
            <hr>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Your Email" aria-label="Your Email" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-warning" type="button">Subscribe</button>
                </div>
            </div>
        </div>

        <br>
        <div class="col-sm-7">
            <div class="card">
                <h1>Message us</h1>
                <hr>
                <form action="contact-process.php" method="POST">
                    <label for="fname">First name:</label><br>
                    <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $fname ?>" required><br>
                    <label for="lname">Last name:</label><br>
                    <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $lname ?>" required><br>
                    <label for="email">Email:</label><br>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>" required><br>
                    <label for="message">Message:</label><br>
                    <textarea rows="4" class="form-control" id="message" name="message" required></textarea>
                    <br><br>
                    <input type="submit" class="btn btn-warning pull-right" value="Submit">
                </form>
            </div>
        </div>
    </div>


    <div id="successModal1" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-success text">
                    <h4 class="modal-title" id="danger-header-modalLabel successModal">
                        Thanks You !</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <h5 class="mt-0 text-center text-black">
                        <i class="fa fa-check"></i> Your Message has been send successfully.
                    </h5>
                </div>
                <div class="modal-footer text-center">
                    <a href="contact_us.php" type="submit" class="btn btn-success">Ok</a>
                </div>
            </div>
        </div>
    </div>

    <br><br>

    <?php
    if (isset($_GET['formsubmit']) && $_GET['formsubmit'] == 10) {
    ?>
        <script>
            $("#successModal1").modal('show');
        </script>
    <?php
    }

    ?>