<?php  

require_once('private/init.php');

$session->logout();
redirect_to('login.php');