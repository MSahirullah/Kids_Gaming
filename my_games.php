<?php include 'common/header.php'; ?>
<?php include 'common/top_navbar.php';



$user_id = $_SESSION['login_user_id'];

$query2 = "SELECT games.* FROM games, payments WHERE games.id = payments.game_id AND payments.user_id='$user_id'";

$result2 = mysqli_query($conn, $query2);

$count = mysqli_num_rows($result2);


$games = [];

if ($count > 0) {
    while ($game = mysqli_fetch_array($result2)) {
        $games[] = array(
            'id' => $game['id'],
            'price' => $game['price'],
            'name' => $game['name'],
            'image' => $game['image'],
        );
    }
}



?>
<style>
    body {
        background-color: black;
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

    .hr-line {
        border-bottom: 2px solid #6f6f6f;
        margin-top: 10px;
        margin-bottom: 40px;
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
</style>

<div>
    <!--Content-->

    <div class="container">
        <h3>My Games</h3>
        <div class="hr-line"></div>
        <div class="row">
            <?php
            for ($x = 0; $x < $count; $x++) {

                echo "<div class='col-sm-4'>
                <div class='card'>
                    <div class='game-image' style='background-image: url(../" . $games[$x]['image'] . ");'></div>
                    <h1>" . $games[$x]['name'] . "</h1>
                    <h5 class='text-center text-success'> FREE </h5><br>
                    <div class='col-md-12'>
                        <a href='../sample-game/' class='btn btn-success btn-block'> <i class='fa fa-gamepad'></i> Play Now</a>
                    </div>
                    <br>
                </div>
            </div>";
            }
            ?>
        </div>
    </div>

</div>
<!-- //" . $games[$x]['image'] . " -->
</div>
<div></div>
<table width="100%">
    <tr>
        <td colspan="4" align="center">
            <div class="pagination">
                <a href="#">&laquo;</a>
                <a href="#" class="active">1</a>
                <a href="#">2</a>
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