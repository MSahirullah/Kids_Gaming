<?php

include('../common/dashboard_header.php');
include('d-header.php');
require '../common/conn.php';

$query = "SELECT gms.*, gc.name as gcname FROM games as gms INNER JOIN game_categories as gc ON gms.game_cato_id=gc.id";

$result = mysqli_query($conn, $query);

$games = [];

while ($game = mysqli_fetch_array($result)) {
    $games[] = array(
        'id' => $game['id'],
        'price' => $game['price'],
        'name' => $game['name'],
        'image' => $game['image'],
        'description' => $game['description'],
        'company' => $game['company'],
        'cato_name' => $game['gcname'],
        'status' => $game['status'],
    );
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

<body class="fixed-nav sticky-footer bg-dark">
    <!-- Navigation-->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="cw" href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Games</li>
                    </ol>
                </nav>
                <h4 class="page-title text-truncate text-dark font-weight-medium mbt-c-20">Games</h4>
                <button class="btn btn-outline-primary pull-right add-new-btn" data-toggle="modal"> <i class="fa fa-plus mr-i-5"></i> Add Games </button>
                <br>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_config" class="table no-wrap">
                                <thead>
                                    <tr>
                                        <th width="10px">Id</th>
                                        <th>Name</th>
                                        <th>Company</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>status</th>
                                        <th>Price <small>(Rs.)</small></th>
                                        <th width="150px" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($games as $key => $game) {

                                        echo "<tr>
                                 <td id='user-id'>" .  $key + 1 . "</td>
                                 <td>" . $game['name'] . "</td>
                                 <td>" . $game['company'] . "</td>
                                 <td>" . $game['cato_name'] . "</td>
                                 <td><img src=../" . $game['image'] . " alt='game image' width='100px'</td>
                                 <td >" . $game['description'] . "</td>
                                 <td >" . $game['status'] . "</td>
                                 <td >" . $game['price'] . "</td>
                                 <td><button type='button' data-id='" . $game['id'] . "' class='btn btn-info btn-sm edit-btn' data-dismiss='modal'>Edit</button>
                                 <button type='button'  data-id='" . $game['id'] . "' class='btn btn-danger btn-sm remove-btn'>Remove</button></td>
                                
                                 </tr>";
                                    } ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

    <!-- Primary Header Modal -->
    <div id="GamesModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header modal-colored-header bg-primary">
                    <h4 class="modal-title" id="gameModelLabel">Add New Games
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form class="mt-2" action="add-new-games.php" enctype='multipart/form-data' method="POST">
                    <div class="modal-body cw">
                        <div class="form-group ">
                            <div class="row">
                                <input type="hidden" name="t_id" id="t_id" value="">

                                <label class="col-sm-4"> Game Category </label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="cato" required id="cato">
                                        <?php foreach ($catos as $key => $cato) {
                                            echo "<option value=" . $cato['id'] . "> " . $cato['name'] . " </option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <label class="col-sm-4"> Name </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="gameName" name="gameName" placeholder="Game Name" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="row">
                                <label class="col-sm-4"> Company </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="company" name="company" placeholder="Company" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="row">
                                <label class="col-sm-4"> Image </label>
                                <div class="col-sm-8">
                                    <input type="file" name="image" class="form-control-file" id="image" accept="image/*">
                                    <div class=" col-sm-8 url-path"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="row">
                                <label class="col-sm-4"> Description </label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <label class="col-sm-4"> Price </label>
                                <div class="col-sm-8">
                                    <input name="price" required type="text" class="form-control p-input validate-input" id="price" maxlength="15" />

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary add-btn">Add Game</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="removeGame" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header modal-colored-header bg-danger">
                    <h4 class="modal-title" id="danger-header-modalLabel">Remove Game</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form class="mt-2 cw" action="remove_game.php" method="POST">
                    <input type="hidden" name="t_id" id="t_id" value="">
                    <div class="modal-body">
                        <h5 class="mt-0 text-center"> Do you Really want to remove this Game ?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Remove</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
<script>
    $('.remove-btn').click(function() {
        var game_id = $(this).attr('data-id');
        $("#removeGame #t_id").val(game_id);

        $("#removeGame").modal('show');
    });


    $('.edit-btn').click(function() {
        var game_id = $(this).attr('data-id');

        $.post("games-data.php", {
                id: game_id,
            },
            function(data) {
                var data = JSON.parse(data);

                $('#GamesModal .modal-title').text('Edit Game');
                $('#GamesModal .add-btn').text('Edit Game');
                $('#GamesModal form').attr('action', 'edit-games.php');

                $('#cato').val(data.cato_id);
                $('#gameName').val(data.name);
                $('#company').val(data.company);
                $('#description').val(data.description);
                $('#price').val(data.price);
                $('.url-path').show();
                $('.url-path').text(data.path);

                var game_id = $('.remove-btn').attr('data-id');
                $(".GamesModal #t_id").val(game_id);
            });
        $("#GamesModal").modal('show');
    });

    $('.add-new-btn').click(function() {
        $('#GamesModal .modal-title').text('Add New Game');
        $('#GamesModal .add-btn').text('Add Game');
        $('#GamesModal form').attr('action', 'add-new-games.php');
        $('.url-path').hide();
        $("#GamesModal #t_id").val('');
        $("#GamesModal").modal('show');
    });

    $('input[type="file"]').change(function() {
        $('.url-path').hide();
    });

    //
</script>