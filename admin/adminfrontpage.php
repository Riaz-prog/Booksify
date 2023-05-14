<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['is_admin'])) {
?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    alert("HELLO <?=$_SESSION['is_admin']?>");
    
    $(document).ready(function() {
      var navlinkfir = $('#navlinkfir');
      if (navlinkfir.length > 0) {
        navlinkfir.html("<a class='nav-link fir' href='../admin/adminlogout.php' style='display: inline-block;'>Sign Out</a>");
      }
    });
  </script>
<?php
} else {
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    window.location.href='../adminlogin/adminlogin.php';
  </script>
<?php
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/js/bootstrap.min.js"></script>

<style>
    
    .navbar {
        background-color: rgb(77, 1, 113);
        width:100%;
    }
    .navbar-brand {
        color: #fff;
    }
    .navbar-brand:hover{
        color:#fff;
    }
    .navbar-toggler-icon {
        background-color: YELLOW;
        border-radius: 2px;
    }
    .navbar-nav .nav-link.active {
        background-color: #fff;
        color: black !important;
    }
    .navbar-nav .nav-link {
        color: #fff  !important;
    }

    h2 {
        color: #333;
    }
    #dash{
        cursor:pointer;
    }
    
    .container{
        display:flex;
        flex-direction:row;
        justify-content:space-between;
        margin-top:100px;
    }
    @media only screen and (max-width:520px){
        .nav{
            width:600px !important;
        }
    }
    #search{
        margin-left:5rem;
        display:none;
    }
    #search1{
        display:none;
    }
    .msg3{
  background-color: red;
  color: white;
  padding: 10px;
  width: 50%;
  margin: 0 auto;
  text-align: center;
  margin-top:1rem;
}
@media only screen and (min-width:290px) and (max-width:559px){
  .msgcon{
    width:100%; 
    height:350px;
  }
}
@media only screen and (min-width:560px){
  .msgcon{
    width:100%; 
    height:670px;
  }
}
@media only screen and (min-height:1150px){
  .msgcon{
    width:100%; 
    height:800px;
  }
}
#mod{
    margin-top:1rem;
    display:none;
    position:relative;
    width:100vw;
    
}
#modal{
    position:absolute;
    transform: translateY(20%);
    left:20%;
    width:70%;
    text-align:center;
    background-color:#fff;
    border:1px solid black;
}

</style>


<script>
    $(document).ready(function(){
        $('.navbar-nav .nav-link').on('click', function() {
            $('.navbar-nav').find('.active').removeClass('active');
            $(this).addClass('active');
        });
        function dash(){
        $.ajax({
                url:"../admin/admindashboard.php",
                type:"post",
                success:function(data){
                    $('#mod').hide();
                    $('#main').html(data);
                }
            });
        }
        dash();
        $('#dash').on('click',function(event){
            $('#mod').hide();
            event.preventDefault();
            dash();
        });

        $('#user').on('click',function(event){
            event.preventDefault();
            $.ajax({
                url:"../admin/adminusers.php",
                type:"post",
                success:function(data){
                    $('#mod').hide();
                    $('#main').html(data);
                }
            });
        });
        
        $('#product').on('click',function(event){
            event.preventDefault();
            $.ajax({
                url:"../admin/adminproducts.php",
                type:"post",
                success:function(data){
                    $('#mod').hide();
                    $('#main').html(data);
                }
            });
        });



        $('#search1').on('click', function(event) {
        event.preventDefault();
        if ($('#product').hasClass('active')) {
            var searchdata = $('#search').val().trim();
            $.ajax({
                url: "../admin/adminproductsfind.php",
                type: "post",
                data: { search: searchdata },
                success: function(data) {
                    $('#mod').hide();
                    $('#main').html(data);
                    $('#frontpageform').trigger('reset');

                }
            });
        } else if ($('#user').hasClass('active')) {
            var searchdata = $('#search').val().trim();
            $.ajax({
                url: "../admin/adminuserfind.php",
                type: "post",
                data: { search: searchdata },
                success: function(data) {
                    $('#mod').hide();
                    $('#main').html(data);
                    $('#frontpageform').trigger('reset');
                }
            });
        }
    });

    $(document).on('click','#user-success',function(){
        var id=$(this).data('id');
        var isbn=$(this).data('isbn');
        var author=$(this).data('author');
        var price=$(this).data('price');
        var description=$(this).data('description');
        var title=$(this).data('title');
        $.ajax({
            url:"../admin/bookmodal.php",
            type:"post",
            data:{id:id,isbn:isbn,author:author,price:price,description:description,title:title},
            success:function(data){
                $('#mod').show();
                $('#mod').html(data);
            }
        });
    });
        

        
    });
</script>
</head>
<body>
    <nav class="navbar navbar-expand-lg nav">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="background-color:yellow;"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" id="dash">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="user">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Orders</a>
                    </li>
                    <li class="nav-item" id="navlinkfir">
                        <a class="nav-link" id="navlinkfir2" href="#">Logout</a>
                    </li>
                    <form class="form-inline my-2 my-lg-0" id="frontpageform">
            <input class="form-control mr-sm-2 searchbtn" type="search" placeholder="Search" aria-label="Search" id="search" required>
            <button class="btn btn-outline-primary hidden2" id="search1">Search</button>
            <div id="message"></div>
        </form>
                </ul>
            </div>
        </div>
    </nav>
    <div id="mod">
</div>
    <div id="main">


</div>
</body>
</html>

