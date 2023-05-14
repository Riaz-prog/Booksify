<?php
require_once('../login_join/functions.php');
if (session_status() == PHP_SESSION_NONE) {
	session_start();
  }
?>
<?php


if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $r=Admin($email, $password);
  if ($r) {
    $_SESSION['is_admin'] = getAdminName($email);
	header('Location:../admin/adminfrontpage.php');
    exit;
  } else {
    echo "<script>alert('Invalid email or password')</script>";
  }
}
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<style>
        body, html {
            height: 100%;
			background:url('../adminlogin/images/bg-01.jpg');
        }
        
        .login-form {
            height: 100vh;
            display: flex;
			justify-content:center;
            align-items: center;
        }
	</style>
</head>
<body>
	
<div class="container login-form">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header bg-primary text-white">
          <h4 class="card-title mb-0">Account Login</h4>
        </div>
        <div class="card-body">
          <form method="post" class="needs-validation" novalidate>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
              <div class="invalid-feedback">
                Please enter a valid email address.
              </div>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
              <div class="invalid-feedback">
                Please enter your password.
              </div>
            </div>
            <div class="d-grid gap-2 mt-4">
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
