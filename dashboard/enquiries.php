<?php

include('../common/dashboard_header.php');
include('d-header.php');
require '../common/conn.php';

$query = "SELECT * FROM messages ORDER BY send_on DESC";

$result = mysqli_query($conn, $query);

$messages = [];

while ($message = mysqli_fetch_array($result)) {
    $messages[] = array(
        'id' => $message['id'],
        'firstName' => $message['firstName'],
        'lastName' => $message['lastName'],
        'email' => $message['email'],
        'message' => $message['message'],
        'sendon' => $message['send_on'],
        'status' => $message['status'],
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
                        <li class="breadcrumb-item active" aria-current="page"> Enquiries</li>
                    </ol>
                </nav>
                <h4 class="page-title text-truncate text-dark font-weight-medium mbt-c-20"> Enquiries</h4>
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
                                        <th>Message</th>
                                        <th>Send On</th>
                                        <th>status</th>
                                        <th width="50px" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($messages as $key => $message) {

                                        echo "<tr>
                                        <td id='user-id'>" .  $key + 1 . "</td>
                                        <td>" . $message['firstName'] . " " .  $message['lastName'] . "</td>
                                        <td>" . $message['email'] . "</td>
                                        <td>" . $message['message'] . "</td>
                                        <td>" . $message['sendon'] . "</td>
                                        <td >" . $message['status'] . "</td>
                                 <td><button type='button'  data-id='" . $message['id'] . "' class='btn btn-danger btn-sm remove-btn'>Remove</button></td>
                                 </tr>";
                                    } ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>


        <div id="removeMSG" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content ">
                    <div class="modal-header modal-colored-header bg-danger">
                        <h4 class="modal-title" id="danger-header-modalLabel">Remove Enquiry</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form class="mt-2 cw" action="delete.php" method="POST">
                        <input type="hidden" name="t_id" id="t_id" value="">
                        <input type="hidden" name="table" id="table" value="messages">
                        <input type="hidden" name="url" id="url" value="enquiries.php">
                        <div class="modal-body">
                            <h5 class="mt-0 text-center"> Do you Really want to remove this Enquiry?</h5>
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
        var t_id = $(this).attr('data-id');
        $("#removeMSG #t_id").val(t_id);

        $("#removeMSG").modal('show');
    });


    //
</script>