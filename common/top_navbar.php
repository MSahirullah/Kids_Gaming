<?php
session_start();
?>
<nav class="navbar navbar-expand-lg nav-bg-dark fixed-top">
    <a class="navbar-brand nav-wapper-1" href="#">
        <img src="images/logo2.png" width="50px">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item <?php echo basename($_SERVER['REQUEST_URI']) == 'index.php' ? 'active' : '' ?> ">
                <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php echo basename($_SERVER['REQUEST_URI']) == 'game_categories.php' ? 'active' : '' ?>">
                <a class="nav-link" href="../game_categories.php">Game Categories</a>
            </li>
            <li class="nav-item <?php echo basename($_SERVER['REQUEST_URI']) == 'game_store.php' ? 'active' : '' ?>">
                <a class="nav-link" href="../game_store.php">Game Store</a>
            </li>
            <li class="nav-item <?php echo basename($_SERVER['REQUEST_URI']) == 'contact_us.php' ? 'active' : '' ?>">
                <a class="nav-link" href="../contact_us.php">Contact Us</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="#" class="nav-link reg-btn btn-sm">
                    <i class="fas fa-shopping-cart"></i>
                    Cart
                </a>
            </li>

            <?php


            if (isset($_SESSION['login_user_email'])) {
            ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                        <?php echo $_SESSION['login_user_firstname'] ?></span>&nbsp<span><?php echo $_SESSION['login_user_lastname'] ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Admin</a>
                        <a class="dropdown-item" href="#">Logout</a>
                    </div>
                </li>
            <?php
            } else {
            ?>
                <li class="nav-item">
                    <a href="#" class="nav-link reg-btn btn-sm">
                        Register
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link btn btn-dark login-btn btn-sm">
                        Login
                    </a>
                </li>
            <?php
            }
            ?>

        </ul>
    </div>
</nav>


https://codepen.io/bootpen/pen/jbbaRa

<script>
    $('#navbarDropdownMenuLink').trigger('click');
</script>

git remote add origin https://github.com/MSahirullah/Kids_Gaming.git
git branch -M main
git branch -M main
