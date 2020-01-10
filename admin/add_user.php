<?php 
require_once('private/init.php');
include('inc/header.php');




    $user = new User;

    if(isset($_POST['create'])) {
        $user->username = $_POST['username'];
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        $user->password = $_POST['password'];
        
        $user->set_file($_FILES['user_image']);
        $user->save_user_and_image();
    }






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
          <h1>Edit Photos</h1>
          <hr />
            
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8 mx-auto">

                            <div class="form-group">                                
                                <input type="file" name="user_image">
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username">
                            </div>
                            <div class="form-group">
                                <label for="first_name">Firt Name</label>
                                <input type="text" class="form-control" name="first_name">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" name="last_name">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <button type="submit" name="create" class="btn btn-primary d-flex justify-content-end ml-auto">Submit</button>
                        </div>                        
                    </div>
                </form>            
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
<?php include('inc/footer.php'); ?>