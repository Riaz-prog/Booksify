
<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['user_id'])) {
?>
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    window.location.href='../Front_page/index.php';
    $(document).ready(function() {
      var navlinkfir = $('#navlinkfir');
      if (navlinkfir.length > 0) {
        navlinkfir.html("<a class='nav-link fir' href='../login_join/logout.php' style='display: inline-block;'>Sign Out</a>");
      }
    });
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
require_once('functions.php');

$error = '';

// Form Login
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $r = Login($email, $password);
  if ($r) {
    $_SESSION['user_id'] = getName($email);
    $_SESSION['id'] = getId($email);
    header('Location: ../Front_page/index.php?');
    exit;
  } else {
    $error = 'Invalid email or password';
    header('Location:../login_join/login.php?error='.$error);
  }
}

// Form Register
if (isset($_POST['register'])) {
  $name = $_POST['name'];
  if(checkiftaken($name)==1){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $r = Register($name, $email, $password);
  if ($r==1) {
    header('Location: ../login_join/login.php');
    exit;
  } else if($r==0){
    $error = 'Registration failed';
  }else if($r==2){
    $error="Email already exists";
  }
}else{
  $error="name is taken";
}
}

ob_end_flush();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login / Register</title>

    <meta name="viewport" content="width=device-width, initial-scale:1.0">
    <script src="../Front_page/pagination2.js"></script>
  <style>

    /* screen sizes for different devices */

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





    /*-----------------------------------*/



    #main{
        display:flex;
        justify-content:space-evenly;
        align-items:center;
        flex-flow:row wrap;
        height:100vh;
        width:97vw;
        gap:1rem;;
        margin-top:20px;
        background-color:#fff;
        border-radius:5px;
        box-shadow:0 0 10px rgba(0, 0, 0, 0.3);
        flex-basis: 100%;
      margin-left:5px;

    }
    #main.disabled {
  display: block;
  height: auto;
  width: auto;
  background-color: rgba(216, 207, 207, 0.795);
  box-shadow: none;
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
    .hidden{
      display:none;
    }
  </style>

    
<script>
        $(document).ready(function(){

        $(window).on("load", function() {
      $("#preloader").fadeOut("fast");
      $('#loader').fadeOut("fast")
    });






  });


  </script>





</head>
<body>
<main id="main">
  <div class="logreg">
  
    <h1>Sign in</h1>
    <?php if (isset($error) && !isset($_POST['register'])): ?>
      <p style="color:red;"><?= $error ?></p>
    <?php endif ?>
    <form method="POST">
      <input type="hidden" name="login" value="1">
      <input type="email" name="email" placeholder="Email" id="email1" required><br><br>
      <input type="password" name="password" placeholder="Booksify Password" id="pass1" required><br><br>
      <label>
        <input type="checkbox" name="show_password" id="square">
        <span id="showpass"><label for="show_password" id="showpass">show password</label></span><br>
      </label>
      
      <button type="submit" id="sub">Sign in</button>
    </form>
  </div>
  <div class="logreg">
    <h1>Sign up</h1>
    <?php if (isset($error) && !isset($_POST['login'])): ?>
      <p style="color:red;"><?= $error ?></p>
    <?php endif ?>
    <form method="POST" id="rrg">
      <input type="hidden" name="register" value="1">
      <input type="text" name="name" placeholder="Name" required><br><br>
      <input type="email" name="email" placeholder="Email" required><br><br>
      <input type="password" id="password" name="password" placeholder="Booksify Password" required minlength="8" maxlength="20"><br><br>
      <button type="submit" id="sub">Create your account</button>
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

