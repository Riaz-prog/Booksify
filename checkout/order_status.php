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




<html>
    <head>
    <style>
      body{
        background: linear-gradient(to right, rgb(77, 1, 113), rgb(193, 29, 243), #618dd4);
      }
    .books-slider {
        display: flex;
        background-color:#F8F8FF;
        margin-top:10px;
        border:1px solid black;
    }

    .price{
  font-size:1rem;
  color:rgb(49, 160, 59);
}   
    #hidden-link{
        display:block;
    }
    .hidden{
        display:none;
    }
    .hidden2{
      display:none;
    }
    .thirdnav{
      margin-bottom:1rem;
    }
    #search{
      display:none;
    }
    .msg3{
  background-color: red;
  color: white;
  padding: 10px;
  width: 50%;
  margin: 0 auto;
  text-align: center;
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
</style>
<script>
$(document).ready(function() {

            $(document).on('click','.add-basket-btn',function(event){
                    var id=$(this).data('id');
                    var price=$(this).data('price');
                    var quantity=$(this).data('quan');
                    $.ajax({
                      url:"../checkout/orderdelete.php",
                      type:"post",
                      data:{id:id,quantity:quantity,price:price},
                      dataType: 'json',
                      success:function(response){
                        if(response.status==1){
                          alert("Book quantity has been updated");
                        }else{
                        alert("Book is added");
                        }
                      }
                    });
                  });
    

            });
    
</script>

</head>
    <body>
    <div id="main">
  <?php 
    if(isset($_SESSION['id'])){

    
    $id = $_SESSION['id'];
    
    $con = new mysqli("localhost", "root", "", "bookstore_project_books");

    if ($con) {
      $sql = "SELECT * FROM checkout WHERE customer_id='$id'";
      $r = $con->query($sql);

      if ($r->num_rows > 0) {
        while ($row = $r->fetch_assoc()) {
          ?>
          <div class="books-slider">
            <div class="mt-2 mb-2 ml-4 mr-3"> 
              <?php
                $book_array = explode(",", $row['book_id']); 

                foreach ($book_array as $book_entry) {
                  list($book_id, $quantity) = explode(":", $book_entry); 
                  $book_query = "SELECT * FROM books WHERE id='$book_id'";
                  $book_result = $con->query($book_query);

                  if ($book_result->num_rows > 0) {
                    while ($book_row = $book_result->fetch_assoc()) {
                      ?>
                      <div class="book-details">
                        <a href="../Bookdescription/book_description.php?id=<?=$book_id?>">Book Name: <?= $book_row['title'] ?></a>
                        <p>Author: <?= $book_row['author'] ?></p>
                        <p>Quantity: <?= $quantity ?></p>
                        <p>Price: &#8377;<?= $book_row['price'] ?></p>
                        <hr style="width: 100%;">
                      </div>
                      <?php
                    }
                  }
                }
              ?>
              <p style="font-weight:bold;">Total: &#8377;<?=$row['price']?></p>
              <p style="font-weight:bold;">Address: <?=$row['address']?></p>
              <p style="font-weight:bold;">Order Date: <?=$row['order_date']?></p>
              <p style="font-weight:bold;">Order Status: <?=$row['status']?></p>
              <button type="button" class="btn btn-danger cancel-order-btn" data-order-id="<?=$row['id']?>">Cancel Order</button>
            </div>
          </div>
          <?php
        }
      }else{
        echo '
      <div class="msgcon"><div class="msg3">
         No Orders found
        </div></div>';
      }
    }
  }else{
    echo '
      <div class="msgcon"><div class="msg3">
         No Orders found
        </div></div>';
  }
  ?>
</div>





    
    <?php require_once('../Front_page/footer.php')?>
    </body>
    </html>



    