<?php include 'common/header.php'; ?>
<?php include 'common/top_navbar.php';

require 'common/conn.php';
$user_id = 0;
if (isset($_SESSION['login_user_id'])) {
    $user_id = $_SESSION['login_user_id'];
}

$query = "SELECT games.* from games where not exists(SELECT null FROM payments WHERE payments.game_id = games.id AND payments.user_id = '$user_id') LIMIT 12";
$result = mysqli_query($conn, $query);



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
            foreach ($games as $game) {
                $price = $game['price'] == '0.00' ? '<h5 class="text-center text-success"> FREE </h5><br>
                <div class="col-md-12">
                    <a href="../sample-game/" class="btn btn-success btn-block"> <i class="fa fa-gamepad"></i> Play Now</a>
                </div>' : '<h5 class="text-center text-danger"> $ ' . $game['price'] . ' </h5><br>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="../sample-game/" class="btn btn-dark btn-block"> <i class="fa fa-gamepad"></i> Play Demo </a>
                        </div>
                        <div class="col-md-6 pl-0" data-gameid="' . $game['id'] . '" data-url="game_store.php" data-price="' . $game['price'] . '">
                            <button type="button" class="btn btn-warning btn-block add-to-cart"> <i class="fa fa-shopping-cart" style="padding-left: 8px;margin-right: 4px;"></i> Add to Cart</button>
                        </div>
                    </div>
                </div>';

                echo "<div class='col-sm-4'>
                    <div class='card'>
                        <div class='game-image' style='background-image: url(../" . $game['image'] . ");'></div>
                        <h1>" . $game['name'] . "</h1>
                        " . $price . "
                        <br>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>
    <div></div>
    <table width="100%">
        <tr>
            <td colspan="4" align="center">
                <div class="pagination">
                    <a href="#">&laquo;</a>
                    <a href="#" class="active">1</a>
                    <a href="game_store2.php">2</a>
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
