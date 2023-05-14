<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['user_id'])) {
?>
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    alert("you are already logged in");
    window.location.href='../Front_page/index.php';
  </script>
<?php
} else {
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var navlinkfir = $('#navlinkfir');
      if (navlinkfir !== null) {
        navlinkfir.html("<a class='nav-link fir' href='../login_join/log_reg.php' style='display: inline-block;'>Sign In/Join</a>");
      }
    });
  </script>
<?php
}
?>
<?php
include '../Front_page/header.php';
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $r = Register1($name, $email, $password);

  if ($r) {
    header('Location: ../login_join/login.php');
    exit;
  } else {
    $error = 'Registration failed';
    echo $r;
  }
}
ob_end_flush();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <style>
    body {
        font-size: 16px;
        overflow-x:hidden;
        }
        input, #sub {
        width: 200px;
        }
        .logreg{
          margin-bottom: 80px;
        height:50%;
        width:40%;
        }
        @media only screen and (max-width: 480px) {
        body {
            font-size: 14px;
        }
        input, #sub {
            width: 100%;
            max-width: 250px;
        }
        .logreg {
            width: 80%;
        }
        }

        @media only screen and (min-width: 481px) and (max-width: 768px) {
        body {
            font-size: 14px;
        }
        input, #sub {
            width: 100%;
            max-width: 300px;
        }
        .logreg {
            width: 60%;
        }
        }

        @media only screen and (min-width: 769px) {
        body {
            font-size: 16px;
        }
        input, #sub {
            width: 100%;
            max-width: 400px;
        }
        .logreg {
            width: 40%;
        }
        }


#main{
        display:flex;
        justify-content:space-evenly;
        align-items:center;
        flex-flow:row wrap;
        margin-left:10px;
        height:80vh;
        width:97vw;
        gap:1rem;;
        margin-top:20px;
        background-color:#fff;
        border-radius:5px;
        box-shadow:0 0 10px rgba(0, 0, 0, 0.3);
        flex-basis: 100%;


    }
    .hidden{
          display:none;
        }
    #sub{
      background-color:rgb(193, 29, 243);
      
    }
    #sub:hover,
    #sub:focus{
      outline-offset:3px;
      background-color:rgb(77, 1, 113);
      color:White;
    }
    #hidden-link{
      display:block;
    }

  </style>
</head>
<body>
  <main id="main">
  <div class="logreg">
    <h1>Register</h1>
    <?php if (isset($error) || isset($_GET['error'])): ?>
      <p><?= $_GET['error'] ?></p>
    <?php endif ?>
    <form method="POST">
      <input type="hidden" name="register" value="1">
      <input type="text" name="name" placeholder="Name" required><br><br>
      <input type="email" name="email" placeholder="Email" required><br><br>
      <input type="password" name="password" placeholder="Booksify Password" required><br><br>
      <button type="submit" id="sub">Create your account</button>
    </form>
  </div>
    </main>

  <?php include "../Front_page/footer.php"?>
</body>
</html>
