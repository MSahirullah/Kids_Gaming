<?php include 'common/header.php'; ?>
<?php include 'common/top_navbar.php';
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
    <br>
    <!--Content-->

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="game-image" style="background-image: url('images/games/15c.jpg');"></div>
                    <h1>Getway Blastf</h1>
                    <h5 class="text-center text-danger"> $1.78 </h5>
                    <br>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="sample-game/" class="btn btn-dark btn-block"> <i class="fa fa-gamepad"></i> Play Demo </a>
                            </div>
                            <div class="col-md-6 pl-0">
                                <button class="btn btn-warning btn-block "> <i class="fa fa-shopping-cart" style="padding-left: 8px;margin-right: 4px;"></i> Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="game-image" style="background-image: url('images/games/20.jpg');"></div>
                    <h1>Skate O Rama</h1>
                    <h5 class="text-center text-success"> FREE </h5>
                    <br>
                    <div class="col-md-12">
                        <a href="sample-game/" class="btn btn-success btn-block"> <i class="fa fa-gamepad"></i> Play Now</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="game-image" style="background-image: url('images/games/17c.jpg');"></div>
                    <h1>Minecraft</h1>
                    <h5 class="text-center text-success"> FREE </h5>
                    <br>
                    <div class="col-md-12">
                        <a href="sample-game/" class="btn btn-success btn-block"> <i class="fa fa-gamepad"></i> Play Now</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="game-image" style="background-image: url('images/games/16c.jpg');"></div>
                    <h1>Infinity</h1>
                    <h5 class="text-center text-success"> FREE </h5>
                    <br>
                    <div class="col-md-12">
                        <a href="sample-game/" class="btn btn-success btn-block"> <i class="fa fa-gamepad"></i> Play Now</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="game-image" style="background-image: url('images/games/23.jpg');"></div>
                    <h1>Peg + Cat</h1>
                    <h5 class="text-center text-success"> FREE </h5>
                    <br>
                    <div class="col-md-12">
                        <a href="sample-game/" class="btn btn-success btn-block"> <i class="fa fa-gamepad"></i> Play Now</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="game-image" style="background-image: url('images/games/27.jpg');"></div>
                    <h1>Rayman</h1>
                    <h5 class="text-center text-danger"> $0.79 </h5>
                    <br>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="sample-game/" class="btn btn-dark btn-block"> <i class="fa fa-gamepad"></i> Play Demo </a>
                            </div>
                            <div class="col-md-6 pl-0">
                                <button class="btn btn-warning btn-block "> <i class="fa fa-shopping-cart" style="padding-left: 8px;margin-right: 4px;"></i> Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="game-image" style="background-image: url('images/games/56.jpg');"></div>
                    <h1>Poptropica</h1>
                    <h5 class="text-center text-danger"> $2.00 </h5>
                    <br>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="sample-game/" class="btn btn-dark btn-block"> <i class="fa fa-gamepad"></i> Play Demo </a>
                            </div>
                            <div class="col-md-6 pl-0">
                                <button class="btn btn-warning btn-block "> <i class="fa fa-shopping-cart" style="padding-left: 8px;margin-right: 4px;"></i> Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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