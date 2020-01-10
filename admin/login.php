<?php 

require_once('private/init.php');
// include('inc/header.php');
if($session->is_signed_in()) { 
    redirect_to('index.php'); 
} 

if( isset($_POST['submit'])  ) { 
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Method to check database user
    $user_found = User::verify_user($username, $password);

    if($user_found) {
        $session->login($user_found);
        redirect_to('index.php'); 
    } else {
        $the_message = "<p class='alert alert-danger'>Your password or username are incorrect</p>";
    }
}  else {
    $the_message = "";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Login</title>

  
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
          <?php echo $the_message ?> 
        <form method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputEmail" class="form-control" placeholder="Username" name="username">
              <label for="inputEmail">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <!-- <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div> -->
          <!-- <button type="submit"></button> -->
          <button type="submit" class="btn btn-primary btn-block" name="submit">Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
