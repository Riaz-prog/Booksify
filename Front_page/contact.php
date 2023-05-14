<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
require_once('../Front_page/header.php');
if (isset($_SESSION['user_id'])) {
?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
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




<!DOCTYPE html>
<html lang="en">
<head>
    <script src="../Front_page/pagination2.js"></script>
    <title>Booksify</title>
    <style>

      
/* Default styles */
#main {
  width: auto;
  height: auto;
}

/* Styles for small screens */
@media only screen and (max-width: 576px) {
  #main {
    min-width: 100%;
    min-height: 200px;
    font-size: 16px;
  }
}

/* Styles for medium screens */
@media only screen and (min-width: 577px) and (max-width: 768px) {
  #main {
    min-width: 100%;
    min-height: 250px;
    font-size: 18px;
  }
}

/* Styles for large screens */
@media only screen and (min-width: 769px) and (max-width: 992px) {
  #main {
    min-width: 80%;
    min-height: 300px;
    font-size: 20px;
  }
}

/* Styles for extra large screens */
@media only screen and (min-width: 993px) {
  #main {
    min-width: 70%;
    min-height: 350px;
    font-size: 22px;
  }
}


        
  
#preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #000;
            z-index: 100;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #loader{
            width: 20%;
        }






        /* Custom styles */
        body{
          background: linear-gradient(to right, rgb(77, 1, 113), rgb(193, 29, 243), #618dd4);

         }
        .btn-outline-primary {
            background-color: white;
            color: black;
        }
        .firstnav {
            background-color: rgb(77, 1, 113);
        }
        .firstnav .nav-link.fir {
            margin: 10px;
            color:#fff;
        }
        .secondnav {
            background-color: rgb(193, 29, 243);
            z-index:99;
        }
        .secondnav .navbar-brand {
            margin-left: 10px;
            color:#fff;
        }
        .secondnav .searchbtn {
            width: 400px;
            margin-right: 10px;
        }
        .secondnav .btn-outline-primary {
            margin-right: 10px;
        }
        /* Media queries for responsive design */
        @media (max-width: 768px) {
            .secondnav .searchbtn {
                width: 200px;
            }
        }
        @media (max-width: 576px) {
            .firstnav .nav-link.fir1 {
                display: none;
            }
            .secondnav .navbar-brand {
                margin: 0;
            }
            .secondnav .searchbtn {
                width: 100%;
                margin-right: 0;
            }
            .secondnav .btn-outline-primary {
                margin-right: 0;
                margin-top: 10px;
                width: 100%;
            }
        }
        .thirdnav{
          background-color:#fff;
        }
        #hov:hover {
            color: rgb(193, 29, 243) !important;
          }
          
          #navlinkfir:hover a {
  color: rgb(193, 29, 243) !important;
}
        /*    footer  */
        .nav-link.foot{
          color:#fff;
        }

        #message1{
          color:Yellow;
        }
        #message123{
          color:black;
        }

        #price{
  font-size:2rem;
  color:red;
}
#hidden-link{
        display:block;
    }
    .hidden{
      display:none;
    }
    label{
      color:#FFDF00;
    }
    </style>


        
<script>

        $(window).on("load", function() {
      $("#preloader").fadeOut("slow");
      $('#loader').fadeOut("slow");
    });

  </script>



</head>
<body>
    <div id="main">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="text-center mb-4" style="color:#FFDF00;">Contact Us</h2>
        <form method="post" action="contact1.php">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" required>
          </div>
          <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" name="subject" id="subject" required>
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" name="message" id="message123" rows="5" required></textarea>
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-primary"id="sub">Send Message</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

	<!-- Bootstrap JS -->
	
        <?php include "../Front_page/footer.php"?>
</body>
</html>

