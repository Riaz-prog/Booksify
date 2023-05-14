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
if(isset(($_GET['error']))){
  $error=$_GET['error'];
  echo "<script>alert('$error');</script>";
}
?>


<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include '../Front_page/header.php';
require_once('functions.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $r=Login($email, $password);
  if ($r) {
    $_SESSION['user_id'] = getName($email);
    $_SESSION['id']=getid($email);
    header('Location: ../Front_page/index.php?');
    exit;
  } else {
    $error = 'Invalid email or password';
    header('Location:../login_join/register.php?error='.$error);
  }
}
ob_end_flush();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>


<style>

body {
        font-size: 16px;
        overflow-x:hidden;
        }
        #square{
            width:20px;
            height:20px;
            text-align:left;
        }
        #showpass{
            position:relative;
            top:-3px;
        }
        input, #sub {
        width: 200px;
        }
        .logreg{
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
        .hidden2{
          display:none;
        }
        #search{
          display:none;
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
    #sub{
      background-color:rgb(193, 29, 243);
      
    }
    #sub:hover,
    #sub:focus{
      outline-offset:3px;
      background-color:rgb(77, 1, 113);
      color:White;
    }
    .hidden{
      display:none;
    }
    #hidden-link{
      display:block;
    }
  </style>
</head>
<body>

  <main id="main">
  <div class="logreg">
    <h1>Sign in</h1>
    <?php if (isset($error) || isset($_GET['error'])): ?>
      <p><?= $_GET['error'] ?></p>
    <?php endif ?>
    <form method="POST">
      <input type="hidden" name="login" value="1">
      <input type="email" name="email" placeholder="Email" id="email1" required><br><br>
      <input type="password" name="password" placeholder="Booksify Password" id="pass1" required><br><br>
      <label>
        <input type="checkbox" name="show_password" id="square">
        <span id="showpass"><label for="show_password" id="showpass">Show password</label></span>
      </label>
      <button type="submit" id="sub">Sign in</button>
    </form>
  </div>
    </main>
    <script>
    window.onload=function(){
        var pass=document.getElementById('pass1');
        var square=document.getElementById('square');
        var showpass=document.getElementById('showpass');
        square.addEventListener('click',function(){
            if(pass.type=="password"){
                pass.type="text";
                showpass.textContent="hide password";
            }else{
                pass.type="password";
                showpass.textContent="show password";
            }
        });
    };
  </script>

  <?php include "../Front_page/footer.php"?>
</body>
</html>
