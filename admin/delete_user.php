<?php 
require_once('private/init.php');


if(empty($_GET['id'])) {
    redirect_to('users.php');
}


$user = User::find_by_id($_GET['id']);

if($user) {
    $user->delete();
    redirect_to('users.php');
} else {
    redirect_to('users.php');
}