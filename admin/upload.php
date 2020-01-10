<?php
require_once('private/init.php');
include('inc/header.php');
// if(!$session->is_signed_in()) { redirect_to('login.php'); }

if(isset($_POST['submit'])) {
  $photo = new Photo;
  $photo->title = $_POST['title'];
  $photo->set_file($_FILES['image_upload']);

  if($photo->save()) {
    $message = "Photo uploaded successfully";
  } else {
    $message = join("<br>", $photo->errors);
  }
} else {
  $message = "";
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
          <h1>Upload</h1>
          <hr />
          <div class="col-md-6">
          <?php echo  $message; ?>
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
              <input type="file" name="image_upload">
            </div>
            <button type="submit" name="submit">Submit</button>
          </form>
          </div>
          
        </div>
        <!-- /.container-fluid -->

    <!-- Sticky Footer -->
<?php include('inc/footer.php'); ?>