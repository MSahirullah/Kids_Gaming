<?php
// session_start();

require 'conn.php';
if (isset($_SESSION['login_user_email'])) {

    $total_price = 0;

    $user_id = $_SESSION['login_user_id'] ? $_SESSION['login_user_id'] : "";
    $query = "SELECT cart.id, games.image, cart.price, games.name FROM cart, games WHERE cart.game_id = games.id and cart.user_id = '$user_id'";

    $result = mysqli_query($conn, $query);

    $items = [];

    while ($item = mysqli_fetch_array($result)) {
        $items[] = array(
            'id' => $item['id'],
            'image' => $item['image'],
            'name' => $item['name'],
            'price' => $item['price'],
        );

        $float_value_of_var = floatval($item['price']);
        $total_price = $total_price + $float_value_of_var;
    }
    $count = mysqli_num_rows($result);
}

$query2 = "SELECT name, id FROM game_categories";
$result2 = mysqli_query($conn, $query2);

$catos = [];

while ($cato = mysqli_fetch_array($result2)) {
    $catos[] = array(
        'name' => $cato['name'],
        'id' => $cato['id'],
    );
}

?>

<style>
    .cart {
        padding-top: 10px;
        padding-bottom: 15px;
    }

    .cart-img-div,
    .cart-name-div {
        padding: 0px !important;
    }

    .cart-name {
        font-size: 14px;
        position: absolute;
        margin-left: 60px;
        margin-top: -33px;

    }

    .cart-price {
        font-size: 14px;
        position: absolute;
        margin-left: 60px;
        margin-top: -15px;
        font-weight: 700;
        color: red;
    }


    .cart-btn-div button {
        font-size: 12px;
        margin-top: -29px;
        float: right;
        margin-right: -240px;
    }
</style>

<link rel="stylesheet" href=" css/style.css">
<nav class="navbar navbar-expand-lg nav-bg-dark fixed-top">
    <a class="navbar-brand nav-wapper-1" href=" index.php">
        <img src="images/logo2.png" width="50px">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item <?php echo basename($_SERVER['REQUEST_URI']) == ' index.php' ? 'active' : '' ?> ">
                <a class="nav-link" href=" index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Game Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php foreach ($catos as $key => $cato) {
                        echo "<a class='dropdown-item' href='game_categories.php?data=" . $cato['id'] . "'>" . $cato['name'] . "</a>";
                    }
                    ?>
                </div>
            </li>
            <li class="nav-item <?php echo basename($_SERVER['REQUEST_URI']) == 'game_store.php' ? 'active' : '' ?>">
                <a class="nav-link" href="game_store.php">Game Store</a>
            </li>
            <?php if (isset($_SESSION['login_user_email'])) { ?>
                <li class="nav-item <?php echo basename($_SERVER['REQUEST_URI']) == 'my_games.php' ? 'active' : '' ?>">
                    <a class="nav-link" href="my_games.php">My Games</a>
                </li>
            <?php } ?>
            <li class="nav-item <?php echo basename($_SERVER['REQUEST_URI']) == 'contact_us.php' ? 'active' : '' ?>">
                <a class="nav-link" href="contact_us.php">Contact Us</a>
            </li>

        </ul>
        <ul class="navbar-nav ml-auto">
            <?php


            if (isset($_SESSION['login_user_email'])) {
            ?>
                <li class="nav-item">
                    <a data-toggle="modal" data-target="#cart" class="nav-link reg-btn btn-sm" style="cursor: pointer;">
                        <i class="fas fa-shopping-cart"></i>
                        Cart
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                        <?php echo $_SESSION['login_user_firstname'] ?></span>&nbsp<span><?php echo $_SESSION['login_user_lastname'] ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                        <?php
                        if ($_SESSION['login_user_role'] == 'ROLE_ADMIN') {
                            echo "<a class='dropdown-item' href=' dashboard/index.php'>Admin</a>";
                        }
                        ?>

                        <a class="dropdown-item" href="logout.php">Logout </a>
                    </div>
                </li>
            <?php
            } else {
            ?>
                <li class="nav-item">
                    <a href="register.php" class="nav-link reg-btn btn-sm">
                        Register
                    </a>
                </li>
                <li class="nav-item">
                    <a href="login.php" class="nav-link btn btn-dark login-btn btn-sm">
                        Login
                    </a>
                </li>
            <?php
            }
            ?>

        </ul>
    </div>
</nav>

<!-- Modal -->
<div class="modal right fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="cart">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header cb">
                <h4 class="modal-title text-left cb" id="myModalLabel2">Cart</h4>
                <button type="button" class="close text-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <?php

                    foreach ($items as $key => $item) {
                        echo "<div class='col-sm-12 cart cb'>
                                <div class='col-sm-3 cart-img-div'>
                                    <img src=' " . $item['image'] . "' alt='cart-image' width='50px'>
                                </div>
                                <div class='col-sm-7 cart-name-div'>
                                    <span class='cart-name'>" . $item['name'] . "</span>
                                    <span class='cart-price'>$" . $item['price'] . "</span>
                                </div>
                                <div class='col-sm-2 cart-btn-div'>
                                <form action='remove-cart.php' method='post'>
                                    <input type='hidden' name='cart_id' id='cart_id' value='" . $item['id'] . "'>
                                    <input type='hidden' name='url' id='url' value='" . basename($_SERVER['REQUEST_URI']) . "'>
                                    <button type='submit' class='btn btn-danger'><i class='fas fa-trash'></i></button>
                            </div></div>";
                    } ?>
                </div>

            </div>
            <div class="modal-footer" style="justify-content:space-around;">
                <div class="row total text-left cb">
                    <h5>Total</h5>

                </div>
                <div class="row total text-center crr">
                    <h5 style="font-weight: 700;">$ <?php echo $total_price ?></h5>

                </div>
            </div>
            <div class=" modal-footer">

                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                <a href="purchase.php"><button type="button" class="btn btn-primary add-btn" <?php echo $count > 0 ? "" : 'disabled' ?>>Purchase Now</button></a>

            </div>
        </div>
    </div>

</div>




<div id="successModal4" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-success text">
                <h4 class="modal-title" id="danger-header-modalLabel successModal">
                    Success!</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <h5 class="mt-0 text-center text-black">
                    <i class="fa fa-check"></i> The game has been successfully removed.
                </h5>
            </div>
            <div class="modal-footer text-center">
                <a href="game_store.php" type="submit" class="btn btn-success">Ok</a>
            </div>
        </div>
    </div>
</div>

<div id="successModal3" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-success text">
                <h4 class="modal-title" id="danger-header-modalLabel successModal">
                    Success!</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <h5 class="mt-0 text-center text-black">
                    <i class="fa fa-check"></i> Your Game has been added to cart successfully.
                </h5>
            </div>
            <div class="modal-footer text-center">
                <a href="game_store.php" type="submit" class="btn btn-success">Ok</a>
            </div>
        </div>
    </div>
</div>

<div id="successModal5" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-success text">
                <h4 class="modal-title" id="danger-header-modalLabel successModal">
                    Success!</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <h5 class="mt-0 text-center text-black">
                    <i class="fa fa-check"></i> Your payment is successed.
                </h5>
            </div>
            <div class="modal-footer text-center">
                <a href=" index.php" type="submit" class="btn btn-success">Ok</a>
            </div>
        </div>
    </div>
</div>

<div id="errorModal3" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-danger text">
                <h4 class="modal-title" id="danger-header-modalLabel dangerModal">
                    Already added!</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <h5 class="mt-0 text-center text-black">
                    <i class="fa fa-times"></i> This Game already in your cart.
                </h5>
            </div>
            <div class="modal-footer text-center">
                <a href="game_store.php" type="submit" class="btn btn-success">Ok</a>
            </div>
        </div>
    </div>
</div>

<div id="errorModal4" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-danger text">
                <h4 class="modal-title" id="danger-header-modalLabel dangerModal">
                    Error! </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <h5 class="mt-0 text-center text-black">
                    <i class="fa fa-times"></i> Something went wrong. Please try again later.
                </h5>
            </div>
            <div class="modal-footer text-center">
                <a href="game_store.php" type="submit" class="btn btn-success">Ok</a>
            </div>
        </div>
    </div>
</div>

<br><br>

<?php
if (isset($_GET['formsubmit']) && $_GET['formsubmit'] == 1) {
?>
    <script>
        $("#successModal3").modal('show');
    </script>
<?php
} else if (isset($_GET['formsubmit']) && $_GET['formsubmit'] == 2) {
?>
    <script>
        $("#errorModal3").modal('show');
    </script>
<?php
} else if (isset($_GET['formsubmit']) && $_GET['formsubmit'] == 3) {
?>
    <script>
        $("#successModal4").modal('show');
    </script>
<?php
} else if (isset($_GET['formsubmit']) && $_GET['formsubmit'] == 8) {
?>
    <script>
        $("#successModal5").modal('show');
    </script>
<?php
} else if (isset($_GET['formsubmit']) && $_GET['formsubmit'] == 9) {
?>
    <script>
        $("#errorModal4").modal('show');
    </script>
<?php
}
?>


<script>
    $('#navbarDropdownMenuLink').trigger('click');
</script>