<?php 
require_once('private/init.php');
include('inc/header.php');



 ?>

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <?php include('inc/top_nav.php'); ?>
  </nav>

    <div id="wrapper">
      <!-- Sidebar -->
      <?php include('inc/side_nav.php'); ?>

      <div id="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Blank Page</li>
          </ol>

          <!-- Page Content -->
          <h1>Photos</h1>
          <hr />
          <a href="add_user.php" class="btn btn-primary">Add User</a>
          <div class="col-md-12">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Photo</th>
                  <th>Username</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                </tr>
              </thead>
              <tbody>
                <?php $users = User::find_all(); ?>
                <?php 
                  foreach($users as $user) {
                    echo "
                    <tr>
                      <td>{$user->id}</td>
                      <td><img src='".$user->image_path_and_placeholder()."' width='200'>
                      </td>                      
                      <td>{$user->username}
                        <div class='action_link'>
                          <a href='delete_user.php?id={$user->id}'>Delete</a>
                          <a href='edit_user.php?id={$user->id}'>Edit</a>
                        </div>
                      </td>
                      <td>{$user->first_name}</td>
                      <td>{$user->last_name}</td>
                    </tr>
                    ";
                  }
                  
                ?>
               
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
<?php include('inc/footer.php'); ?>