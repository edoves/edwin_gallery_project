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
          <div class="col-md-12">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Photo</th>
                  <th>Id</th>
                  <th>File Name</th>
                  <th>Title</th>
                  <th>Size</th>
                </tr>
              </thead>
              <tbody>
                <?php $photos_data = Photo::find_all(); ?>
                <?php 
                  foreach($photos_data as $data) {
                    echo "
                    <tr>
                      <td><img src='".$data->picture_path()."' width='200'>
                        <div class='pictures_link'>
                          <a href='delete_photo.php?id={$data->id}'>Delete</a>
                          <a href='edit_photo.php?id={$data->id}'>Edit</a>
                          <a href='#'>View</a>
                        </div>
                      </td>
                      <td>{$data->id}</td>
                      <td>{$data->filename}</td>
                      <td>{$data->title}</td>
                      <td>{$data->size}</td>
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