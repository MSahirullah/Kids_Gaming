<?php include 'common/header.php'; ?>
<?php include 'common/top_navbar.php';

require 'common/conn.php';

$user_id = $_SESSION['login_user_id'];

$query = "SELECT games.* from games where not exists(SELECT null FROM payments WHERE payments.game_id = games.id AND payments.user_id = '$user_id')";

$result = mysqli_query($conn, $query);

$count = mysqli_num_rows($result);

$games = [];

while ($game = mysqli_fetch_array($result)) {
    $games[] = array(
        'id' => $game['id'],
        'price' => $game['price'],
        'name' => $game['name'],
        'image' => $game['image'],
    );
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
    }

    .card h1 {
        text-align: center;
        font-size: 32px;
        padding: 12px 0px;
    }

    .card i {
        margin-right: 7px;
    }

    .game-image {
        height: 160px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        border-radius: 5px 5px 0px 0px;
    }

    .pagination {
        display: inline-block;
        float: none;
        margin-top: 30px;
        margin-bottom: 20px;
    }

    .pagination a {
        color: white;
        float: left;
        padding: 5px 16px;
        text-decoration: none;
        transition: background-color .3s;
        border: 2px solid #292929;
        margin: 0 4px;
        /* font-weight: bold; */
        font-size: 16px;
    }

    .pagination a.active {
        background-color: #436ff6;
        color: white;
        border: 2px solid #436ff6;
    }
</style>
<div>
    <br>
    <br>
    <br>
    <!--Content-->

    <div class="container">
        <div class="row">
            <?php
            for ($x = 12; $x < $count; $x++) {

                $price = $games[$x]['price'] == '0.00' ?
                    '<h5 class="text-center text-success"> FREE </h5><br>
                    <div class="col-md-12">
                        <a href=" sample-game/" class="btn btn-success btn-block"> <i class="fa fa-gamepad"></i> Play Now</a>
                    </div>' :
                    '<h5 class="text-center text-danger"> $ ' . $games[$x]['price'] . ' </h5><br>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-md-6">
                                <a href=" sample-game/" class="btn btn-dark btn-block"> <i class="fa fa-gamepad"></i> Play Demo </a>
                            </div>
                            <div class="col-md-6 pl-0">
                                <form action="add-to-cart.php" method="POST">
                                <input type="hidden" name="game_id" id="game_id" value="' . $games[$x]['id'] . '">
                                <input type="hidden" name="url" id="url" value="game_store2.php">
                                <input type="hidden" name="price" id="price" value="' . $games[$x]['price'] . '">
                                <button type="submit" class="btn btn-warning btn-block "> <i class="fa fa-shopping-cart" style="padding-left: 8px;margin-right: 4px;"></i> Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>';

                echo "<div class='col-sm-4'>
                <div class='card'>
                    <div class='game-image' style='background-image: url( " . $games[$x]['image'] . ");'></div>
                    <h1>" . $games[$x]['name'] . "</h1>
                    " . $price . "
                    <br>
                    
                </div>
            </div>";
            }
            ?>
        </div>
    </div>

    <div>
        <table width="100%">
            <tr>
                <td colspan="4" align="center">
                    <div class="pagination">
                        <a href="#">&laquo;</a>
                        <a href="game_store.php">1</a>
                        <a href="#" class="active">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#">6</a>
                        <a href="#">&raquo;</a>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <?php include 'common/footer.php'; ?>
    <div id="successModal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
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
                    <a href="game_store2.php" type="submit" class="btn btn-success">Ok</a>
                </div>
            </div>
        </div>
    </div>

    <div id="errorModal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
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
                    <a href="game_store2.php" type="submit" class="btn btn-success">Ok</a>
                </div>
            </div>
        </div>
    </div>

    <br><br>

    <?php
    if (isset($_GET['message-send']) && $_GET['message-send'] == '1') {
    ?>
        <script>
            $("#successModal").modal('show');
        </script>
    <?php
    }

    ?>

    <?php
    if (isset($_GET['message-send']) && $_GET['message-send'] == '2') {
    ?>
        <script>
            $("#errorModal").modal('show');
        </script>
    <?php
    }

    ?>