<?php 
require_once('private/init.php');
include('inc/header.php');

if(empty($_GET['id'])) {
    redirect_to('photos.php');
} 

$user = User::find_by_id($_GET['id']);
if(isset($_POST['update'])) {
        if($user) {
            $user->username = $_POST['username'];
            $user->first_name = $_POST['first_name'];
            $user->last_name = $_POST['last_name'];
            $user->password = $_POST['password'];

            $user->set_file($_FILES['user_image']);
            $user->save_user_and_image();
    }
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
        <div class="row">
            <div class="col-md-6">
                <img class="img-responsive" src="<?php echo $user->image_path_and_placeholder(); ?>" alt="">
            </div>

            <div class="col-md-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    
                        <div class="form-group">                                
                            <input type="file" name="user_image">
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $user->username; ?>">
                        </div>
                        <div class="form-group">
                            <label for="first_name">Firt Name</label>
                            <input type="text" class="form-control" name="first_name" value="<?php echo $user->first_name; ?>">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="<?php echo $user->last_name; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button type="submit" name="update" class="btn btn-primary d-flex justify-content-end ml-auto">Update</button>                    
                    
                </form>            
            </div> 
        
        </div>





        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
<?php include('inc/footer.php'); ?>