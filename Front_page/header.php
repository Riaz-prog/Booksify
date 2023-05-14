<?php
 if (isset($_COOKIE['guest_id'])) {
  $guest_id = $_COOKIE['guest_id'];
} else {
  $expiration_time = time() + (10 * 365 * 24 * 60 * 60); 
  $guest_id = bin2hex(random_bytes(16));
  setcookie('guest_id', $guest_id, $expiration_time);
}

if(!isset($_SESSION['id'])){
  $_SESSION['id']=$guest_id;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <title>Booksify</title>
    <style>


#main {
  width: auto;
  height: auto;
}

@media only screen and (max-width: 576px) {
  #main {
    min-width: 100%;
    min-height: 200px;
    font-size: 16px;
  }
}


@media only screen and (min-width: 577px) and (max-width: 768px) {
  #main {
    min-width: 100%;
    min-height: 250px;
    font-size: 18px;
  }
}


@media only screen and (min-width: 769px) and (max-width: 992px) {
  #main {
    min-width: 80%;
    min-height: 300px;
    font-size: 20px;
  }
}


@media only screen and (min-width: 993px) {
  #main {
    min-width: 70%;
    min-height: 450px;
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
        #hidden-link{
          display:none;
        }





    header {
  -webkit-user-drag: none;
  -khtml-user-drag: none;
  -moz-user-drag: none;
  -ms-user-drag: none; 
  }



        /* Custom styles */
        body{
          background-color:rgba(216, 207, 207, 0.795);
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
                width: 43%;
            }
        }
        /* .secondnav{
          z-index:100;
        } */
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
        #message{
          color:Yellow;
        }
        #price{
  font-size:2rem;
  color:red;
}
.add-basket-btn{
  background-color: #FFDF00;
  color:Dark !important;
}
.add-basket-btn:hover{
  background: linear-gradient(#FFDF00, #4CAF50);
  color:black !important;
}

#user_id{
  color:#f5d107;
}



    </style>


<script>
   $(window).on("load", function() {
      $("#preloader").fadeOut("slow");
      $('#loader').fadeOut("slow");
    });
        $(document).ready(function(){

       

                //search button 
                $('#firstform').on('submit',function(event){
            event.preventDefault();
            var value = $('#search').val();
            value = value.replace(/\s+$/, '');
            if(value) {
              setTimeout(function(){
                $.ajax({
                    url:"../book/bookfetch2.php",
                    type:"POST",
                    data:{val:value},
                    success:function(data){
                        if (data.length > 0) {
                            $('#main').html(data);
                            showNoResultsMessage();
                        } else { 
                          showNoResultsMessage();
                        }
                    }
                });
              },3000)
                
            } else {
                $.ajax({
                    url:"../book/bookfetch.php",
                    type:"POST",
                    success:function(data){
                        if (data.length > 0) {
                            $('#main').html(data);
                            showNoResultsMessage();
                        } else { 
                          showNoResultsMessage();
                        }
                    }
                });
            }
            $('#message').html('Searching... Please wait.').fadeIn();
              setTimeout(function() {
                $('#message').fadeOut().html('');
              }, 3000); // hide message after 3 seconds
                    });

                    



  });
  </script>
        
</head>
<body>
<div id="preloader">
        <img src="../Front_page/gif/536B.gif" alt="preloader image" id="loader">
    </div>

  <header>
    
    <!-- First navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light firstnav">
      <div class="container-fluid">
        
        
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a href="../Front_page/index.php" class="nav-link fir" id="hidden-link"><img src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-home-512.png" alt="Home icon" width="30" height="25" style="filter: invert(1);"/></a>
          </li>
          <li class="nav-item">
            <a class="nav-link fir " id="hov" href="../Front_page/contact.php">Contact us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fir" id="hov" href="#">Help</a>
          </li>
          
        </ul>
        
        
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link fir" id="hov" href="../checkout/order_status.php" style="display: inline-block;">Order Status</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fir" id="hov" href="../Basket/basket.php" style="display: inline-block;">Basket</a>
          </li>
          <li class="nav-item" id="navlinkfir">
            <a class="nav-link fir" id="hov" href="../login_join/log_reg.php" style="display: inline-block;">Sign In/Join</a>
          </li>
        </ul>
        
      </div> 
    </nav>

    <!-- Second navigation bar -->
    <nav class="navbar  secondnav hidden" id="firstform">
        <a class="navbar-brand" href="../Front_page/index.php">Booksify <span id="user_id"><?=isset($_SESSION['user_id']) ? $_SESSION['user_id']: "" ?></span></a>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2 searchbtn" type="search" placeholder="Search for books by keyword / title / author / ISBN" aria-label="Search" id="search" required>
            <button class="btn btn-outline-primary hidden2" type="submit" id="search1">Search</button>
            <div id="message"></div>
        </form>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light thirdnav">
      <div class="container-fluid">
        
      
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" id="hov" href="../Bestsellers/bestseller.php">Bestsellers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="hov" href="#">Closure FAQs</a>
          </li>
        </ul>
        
        
      </div>
    </nav>
    
</header>



    
    </body>
    </html>