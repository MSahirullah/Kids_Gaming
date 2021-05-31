<?php

include('../common/header.php');
include('d-header.php');
require '../common/conn.php';

$query = "SELECT payments.*, users.firstName, users.email, users.lastName, games.name FROM payments, games, users WHERE payments.user_id = users.id AND games.id = payments.game_id ORDER BY payments.paid_at DESC";

$result = mysqli_query($conn, $query);

$payments = [];

while ($payment = mysqli_fetch_array($result)) {
    $payments[] = array(
        'firstname' => $payment['firstName'],
        'lastname' => $payment['lastName'],
        'gamename' => $payment['name'],
        'email' => $payment['email'],
        'mobile' => $payment['mobile_number'],
        'paidat' => $payment['paid_at'],
        'method' => $payment['payment_method'],
        'amount' => $payment['price'],
        'status' => $payment['status'],
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
                        <li class="breadcrumb-item active" aria-current="page"> Payments</li>
                    </ol>
                </nav>
                <h4 class="page-title text-truncate text-dark font-weight-medium mbt-c-20"> Payments</h4>
                <br>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_config" class="table no-wrap">
                                <thead>
                                    <tr>
                                        <th width="10px">Id</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Game Name</th>
                                        <th>Mobile Number</th>
                                        <th>Payment Method</th>
                                        <th>Amount</th>
                                        <th>Paid At</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($payments as $key => $payment) {
                                        echo "<tr>
                                        <td id='user-id'>" . $key + 1 . "</td>
                                        <td>" . $payment['firstname'] . "&nbsp;" . $payment['lastname'] . "</td>
                                        <td>" . $payment['email'] . "</td>
                                        <td>" . $payment['gamename'] . "</td>
                                        <td >" . $payment['mobile'] . "</td>
                                        <td >" . $payment['method'] . "</td>
                                        <td >" . $payment['amount'] . "</td>
                                        <td >" . $payment['paidat'] . "</td>
                                        <td >" . $payment['status'] . "</td>
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
        <div id="adminModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content ">
                    <div class="modal-header modal-colored-header bg-primary">
                        <h4 class="modal-title" id="primary-header-modalLabel">Add New Administrator
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form class="mt-2" action="add-new-admin.php" method="POST">
                        <div class="modal-body cw">
                            <div class="form-group ">
                                <div class="row">
                                    <label class="col-sm-4"> First Name </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="adminFName" name="adminFName" placeholder="First Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <label class="col-sm-4"> Last Name </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="adminLName" name="adminLName" placeholder="Last Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <label class="col-sm-4"> Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="adminEmail" name="adminEmail" placeholder="Email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <label class="col-sm-4"> Password </label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="adminPass" name="adminPass" placeholder="Password" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Administrator</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="removeAdmin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content ">
                    <div class="modal-header modal-colored-header bg-danger">
                        <h4 class="modal-title" id="danger-header-modalLabel">Remove Administrator</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form class="mt-2 cw" action="delete.php" method="POST">
                        <input type="hidden" name="t_id" id="t_id" value="">
                        <input type="hidden" name="table" id="table" value="users">
                        <input type="hidden" name="url" id="url" value="admin.php">
                        <div class="modal-body">
                            <h5 class="mt-0 text-center"> Do you Really want to remove this Administrator ?</h5>
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
        var admin_id = $(this).attr('data-id');
        $("#removeAdmin #t_id").val(admin_id);

        $("#removeAdmin").modal('show');
    });


    //
</script>