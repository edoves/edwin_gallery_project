<?php 
require_once('private/init.php');


if(empty($_GET['id'])) {
    redirect_to('photos.php');
}


$photo = Photo::find_by_id($_GET['id']);

if($photo) {
    $photo->delete_photo();
    redirect_to('photos.php');
} else {
    redirect_to('photos.php');
}