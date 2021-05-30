<?php
include('session.php');
include('../common/header.php');
include('d-header.php');
require '../common/conn.php';

$query = "SELECT * FROM users WHERE role='ROLE_USER'";

$result = mysqli_query($conn, $query);

$users = [];

while ($user = mysqli_fetch_array($result)) {
   $users[] = array(
      'id' => $user['id'],
      'firstName' => $user['firstName'],
      'lastName' => $user['lastName'],
      'email' => $user['email'],
      'status' => $user['status'],
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
                  <li class="breadcrumb-item active" aria-current="page">Users</li>
               </ol>
            </nav>
            <h4 class="page-title text-truncate text-dark font-weight-medium mbt-c-20">Users</h4>
            <br>
                  <div class="card">
                     <div class="card-body">
                        <div class="table-responsive">
                           <table id="zero_config" class="table no-wrap">
                              <thead>
                                 <tr>
                                    <th width="10px">Id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>status</th>
                                    <th width="10px" class="text-center">Actions</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php foreach ($users as $key => $user) {

                                    echo "<tr>
                                 <td id='user-id'>" .  $key + 1 . "</td>
                                 <td>" . $user['firstName'] . "</td>
                                 <td>" . $user['lastName'] . "</td>
                                 <td>" . $user['email'] . "</td>
                                 <td >" . $user['status'] . "</td>
                                 <td><button type='button' data-id='" . $user['id'] . "' class='btn btn-danger btn-sm remove-user'>Remove</button><td>
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


      <div id="removeUser" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content ">
               <div class="modal-header modal-colored-header bg-danger">
                  <h4 class="modal-title" id="danger-header-modalLabel">Remove Unit</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
               </div>
               <form class="mt-2 cw" action="delete.php" method="POST">
                  <input type="hidden" name="t_id" id="t_id" value="">
                  <input type="hidden" name="table" id="table" value="users">
                  <div class="modal-body">useurlpurl
                     <h5 class="mt-0 text-center"> Do you Really want to remove this User ?</h5>
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
   $('.remove-user').click(function() {
      var user_id = $(this).attr('data-id');
      $("#t_id").val(user_id);

      $("#removeUser").modal('show');
   });
</script>