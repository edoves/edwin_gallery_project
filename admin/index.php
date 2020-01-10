<?php 
require_once('private/init.php');
include('inc/header.php');
if(!$session->is_signed_in()) { redirect_to('login.php'); }

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
          <h1>Blank Page</h1>
          <hr />
          <p>This is a great starting point for new custom pages.</p>

          <?php 

          // $user = User::find_by_id(5);
          // echo $user->username;

          // $photo = Photo::find_by_id(1);
          // echo "<pre>";
          // echo print_r($photo);
          // echo "</pre>";
  
          // $photos = Photo::find_all();
          // // echo $users;
          // foreach($photos as $photo) {
          //   echo $photo->title . "<br>";
          // }

          // $photos = new Photo;
          // $photos->title = "My pogi photo";
          // $photos->size = 20;
          // $photos->save();

          // $users = new User;
          // $users->username = "thenewpogi";
          // $users->create();
          ?>
          
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php include('inc/footer.php'); ?>