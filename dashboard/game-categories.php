<?php

include('../common/dashboard_header.php');
include('d-header.php');
require '../common/conn.php';

$query = "SELECT * FROM game_categories";
$result = mysqli_query($conn, $query);
$game_cat = [];

while ($gamec = mysqli_fetch_array($result)) {
    $game_cat[] = array(
        'id' => $gamec['id'],
        'name' => $gamec['name'],
        'status' => $gamec['status'],
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
                        <li class="breadcrumb-item active" aria-current="page"> Games Categories</li>
                    </ol>
                </nav>
                <h4 class="page-title text-truncate text-dark font-weight-medium mbt-c-20"> Games Categories</h4>
                <button class="btn btn-outline-primary pull-right add-new-btn" data-toggle="modal" data-target="#createGameCategory"> <i class="fa fa-plus mr-i-5"></i> Add Category </button>
                <br>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_config" class="table no-wrap">
                                <thead>
                                    <tr>
                                        <th width="10px">Id</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th width="150px" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($game_cat as $key => $cat) {

                                        echo "<tr>
                                 <td id='user-id'>" .  $key + 1 . "</td>
                                 <td>" . $cat['name'] . "</td>
                                 <td>" . $cat['status'] . "</td>
                                 <td><button type='button' data-id='" . $cat['id'] . "' data-name='" . $cat['name'] . "' class='btn btn-info btn-sm edit-btn' data-dismiss='modal'>Edit</button>
                                 <button type='button'  data-id='" . $cat['id'] . "' class='btn btn-danger btn-sm remove-btn'>Remove</button></td>
                                 </tr>";
                                    } ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <!-- Primary Header Modal -->
        <div id="createGameCategory" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content ">
                    <div class="modal-header modal-colored-header bg-primary">
                        <h4 class="modal-title" id="primary-header-modalLabel">Add New Game Category
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form class="mt-2" action="category-process.php" method="POST">
                        <div class="modal-body cw">
                            <div class="form-group ">
                                <div class="row">
                                    <label class="col-sm-4"> Category Name </label>
                                    <div class="col-sm-8">
                                        <input type="hidden" name="create" value="1">
                                        <input type="text" class="form-control" id="catName" name="catName" placeholder="Category Name" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Primary Header Modal -->
        <div id="editGameCategory" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content ">
                    <div class="modal-header modal-colored-header bg-primary">
                        <h4 class="modal-title" id="primary-header-modalLabel">Edit Game Category
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form class="mt-2" action="category-process.php" method="POST">
                        <div class="modal-body cw">
                            <div class="form-group ">
                                <div class="row">
                                    <label class="col-sm-4"> Category Name </label>
                                    <div class="col-sm-8">
                                        <input type="hidden" name="edit" value="1">
                                        <input type="hidden" name="cat_id" id="cat_id" value="">
                                        <input type="text" class="form-control" id="edit_catName" name="catName" placeholder="Category Name" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Change Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="removeGameCat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content ">
                    <div class="modal-header modal-colored-header bg-danger">
                        <h4 class="modal-title" id="danger-header-modalLabel">Remove Game Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form class="mt-2 cw" action="remove_game_category.php" method="POST">
                        <input type="hidden" name="rem_cat_id" id="rem_cat_id" value="">
                        <div class="modal-body">
                            <h5 class="mt-0 text-center"> Do you Really want to remove this Category ?</h5>
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
        var cat_id = $(this).attr('data-id');
        $("#rem_cat_id").val(cat_id);

        $("#removeGameCat").modal('show');
    });


    $('.edit-btn').click(function() {
        var cat_id = $(this).attr('data-id');
        var cat_name = $(this).attr('data-name');

        $("#cat_id").val(cat_id);
        $("#edit_catName").val(cat_name);
        $("#editGameCategory").modal('show');
    });

    //
</script>