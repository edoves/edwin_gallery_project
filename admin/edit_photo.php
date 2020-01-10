<?php 
require_once('private/init.php');
include('inc/header.php');

if(empty($_GET['id'])) {
    redirect_to('photos.php');
} else {
    
    $photo = Photo::find_by_id($_GET['id']);
    if(isset($_POST['update'])) {
         if($photo) {
            $photo->title = $_POST['title'];
            $photo->caption = $_POST['caption'];
            $photo->alternate_text = $_POST['alternate_text'];
            $photo->description = $_POST['description'];
            $photo->save();
        }
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
            
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" value="<?php echo $photo->title ?>">
                            </div>
                            <div class="form-group">
                               <a class="thumbnail" href="#"><img src="<?php echo $photo->picture_path(); ?>" alt=""></a>
                            </div>
                            <div class="form-group">
                                <label for="caption">Caption</label>
                                <input type="text" class="form-control" name="caption" value="<?php echo $photo->caption ?>">
                            </div>
                            <div class="form-group">
                                <label for="alternate_text">Alternate Text</label>
                                <input type="text" class="form-control" name="alternate_text" value="<?php echo $photo->alternate_text ?>">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10"><?php echo $photo->description; ?></textarea>
                            </div>
                        </div>
                     <div class="col-md-4">
                        <div class="photo-info-box">
                            <div class="info-box-header">
                                <h4 class="d-flex justify-content-between align-items-center">Save <span id="toggle" class="fas fa-fw fa-arrow-alt-circle-down"></span></h4>
                            </div>
                            <div class="inside">
                                <div class="box-inner">
                                    <p class="text">
                                        <i class="fas fa-fw fa-calendar-alt"></i> Uploaded on:
                                    </p>
                                    <p class="text">
                                        Photo Id: <span class="data photo_id_box">34</span>
                                    </p>
                                    <p class="text">
                                        Filename: <span class="data photo_id_box"></span>
                                    </p>
                                    <p class="text">
                                        File Type: <span class="data photo_id_box">JPG</span>
                                    </p>
                                    <p class="text">
                                        File Size: <span class="data photo_id_box">215454</span>
                                    </p>
                                </div>
                                <div class="indo-box-footer d-flex">
                                    <div class="info-box-delete mr-3">
                                        <a href="delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-danger btn-lg">Delete</a>
                                    </div>
                                    <div class="info-box-update">
                                        <button type="submit" name="update" class="btn btn-primary btn-lg">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </form>            
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
<?php include('inc/footer.php'); ?>