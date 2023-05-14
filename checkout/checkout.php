<?php 
ob_start();
require_once('../Front_page/header.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
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
    alert("You need to be logged in to checkout");
    window.location.href="../Basket/basket.php";
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
<html>
<head>
	<title>Order Page</title>
    <style>
            #hidden-link{
        display:block;
    }
    .hidden{
        display:none;
    }
    .hidden2{
      display:none;
    }
    #search{
      display:none;
    }
    body{
          background: linear-gradient(to right, rgb(77, 1, 113), rgb(193, 29, 243), #618dd4);

         }
         label{
            color: #fdfdfd;
         }
         form{
            margin-bottom:1rem;
         }
         #items2{
          padding-top:1rem;
            background-color:#fff;
            text-align:center;
         }
         #total-price{
          color:#FFDF00;
          font:16px;
         }
         #hidden{
          display:none;
         }
    </style>
    <script>
      $(document).ready(function(){
        $.ajax({
          url:"../checkout/basketdetailsfetch.php",
          type:"post",
          success:function(data){
            var result=JSON.parse(data);
            $('#items2').html(result.output);
            $('#total-price').html('₹'+result.sum);
          }
        });

        $('#order_form').submit(function(event){
          event.preventDefault();
          var formdata=$(this).serialize();
          $.ajax({
            url:"../checkout/order_page.php",
            type:"post",
            data:{form:formdata},
            success:function(data){
              alert(data);
              $('#order_form').trigger('reset');
              window.location.href="../checkout/order_status.php";
            }
          });
        });



      });
      </script>

</head>
<body>
	<div class="container">
		<h1 class="my-5 text-center" style="color:#fff;">Order Page</h1>
		<form id="order_form">
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" class="form-control" id="name" name="name" required>
			</div>
			<div class="form-group">
				<label for="address">Address:</label>
				<textarea class="form-control" id="address" name="address" required></textarea>
			</div>
			<div class="form-group">
				<label for="phone">Phone:</label>
				<input type="text" class="form-control" id="phone" name="phone" required>
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="text" class="form-control" id="email" name="email" required>
			</div>
            
            <div class="form-group" id="items" >
                    <label for="items">Items:</label>
                    <div id="items2"style="height: 90px; overflow-y: scroll;">
                        
                    </div>
            </div>


			<div class="form-group">
				<label for="total-price">Total Price:</label>
				<div class="price" id="total-price">$0</div>
			</div>
			<button type="submit" class="btn btn-primary" id="checkout">Submit Order</button>
		</form>
	</div>
<?php require_once('../Front_page/footer.php');?>
</body>
</html>

  