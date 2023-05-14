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
        flex-wrap: wrap;
        justify-content: center;
        background: linear-gradient(to right, rgb(77, 1, 113), rgb(193, 29, 243), #618dd4);
        margin-top:10px;
    }

    .book-card {
        width: 300px;
        margin: 10px;
        border: 1px solid #ccc;
        box-shadow: 2px 2px 6px #ddd;
        padding: 10px;
        position: relative;
    }

    .book-card img {
        width: 100%;
        object-fit: cover;
    }

    .book-img {
        padding: 10px;
    }

    .book-img h5 {
        margin: 0;
        font-size: 18px;
        font-weight: bold;
    }

    .book-img p {
        margin: 0;
        font-size: 14px;
        line-height: 1.5;
        color:#fff;
    }
    .del {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: #ff2e2e;
        color: #fff;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        font-size: 14px;
        font-weight: bold;
    }

    #del:hover {
        background-color: #ff4c4c;
    }
    #idr{
      background-color: #ffc107 ;
        color: #fff;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        font-size: 14px;
        font-weight: bold;
    }
    .price{
  font-size:1rem;
  color:#ffc107 ;
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
    #search{
      display:none;
    }
    #buy{
      background: linear-gradient(to right, rgb(77, 1, 113), rgb(193, 29, 243), #618dd4);
      display:flex;
      justify-content:center;
      align-items: center;
      height:200px;
      
    }
    #idr1{
      background:#FFDF00;
      color:dark;
      border-radius:5px;
    }

    #idr1:active{
      background: linear-gradient(#FFDF00, #4CAF50);
  color:black;
    }
    
    #idr{
      margin-top:1.5rem;
    }
    .msg3{
      width:100%;
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

</style>
<script>
    function increase(quantity_id, price_id,id) {
        var val = parseInt($('#' + quantity_id).text());
        var val1 = parseFloat($('#' + price_id).text());
        if (val >= 1 && val<=17) {
            val++;
            $('#' + quantity_id).text(val);
            $('#' + quantity_id).attr('value', val);
            val1 = parseFloat(val1 / (val - 1) * val).toFixed(2);
            $('#' + price_id).text(val1);
            $('#' + price_id).attr('value', val1);
        }
        $.ajax({
          url:"../Basket/basketbookupdate.php",
          type:"post",
          data:{id:id,price:val1,quantity:val},
          success:function(){
            window.reload();
          }
        });
    }

    function decrease(quantity_id, price_id,id) {
        var val = parseInt($('#' + quantity_id).text());
        var val1 = parseFloat($('#' + price_id).text());
        if (val > 1) {
            val--;
            $('#' + quantity_id).text(val);
            $('#' + quantity_id).attr('value', val);
            val1 = parseFloat(val1 / (val + 1) * val).toFixed(2);
            $('#' + price_id).text(val1);
            $('#' + price_id).attr('value', val1);
        }
        $.ajax({
          url:"../Basket/basketbookupdate.php",
          type:"post",
          data:{id:id,price:val1,quantity:val},
          success:function(){
            window.reload();
          }
        });
    }
    function delete1(delete_id){
        var id='#'+delete_id;
        var val = parseInt(delete_id.replace('delete_', ''));
        $.ajax({
            url:"../Basket/basketbookdelete.php",
            type:"post",
            data:{val:val},
            success:function(){
                location.reload();
            }
        });
}
$.ajax({
    url:"../Basket/basketbookpresent.php",
    type:"post",
    success:function(data){
      $('#buy1').html(data);
    }
});


</script>

</head>
    <body>
    <div id="main">
    <div class='books-slider'>
    <?php 
    $con = new mysqli("localhost", "root", "", "bookstore_project_books");
    if($con){
        $sql="SELECT * From basket where customer_id='".$_SESSION['id']."'";
        $r=$con->query($sql);
    
    }
    
    if ($r->num_rows > 0) {
        while ($row = $r->fetch_assoc()) {
          $quantity_id = 'quantity_' . $row['id'];
          $price_id = 'price_' . $row['id'];
          $delete_id='delete_'.$row['id'];
          $num_row=$r->num_rows;
            ?>
            <div class="book-card mt-2 mb-2 ml-4 mr-3">
                <img src="<?= $row['image_filename'] ?>" alt="Book Cover">
                <div class="book-img">
                    <h5 style="color: #fff;"><?= $row['title'] ?></h5>
                    <p>author : <?=$row['author']?></p>
                    <p><?= $row['description'] ?></p>
                    <p>Quantity: <span id="<?= $quantity_id ?>" value="1"><?=isset( $row['quantity'])? $row['quantity']:1 ?></span></p>
                    <p>Price: ₹<span id="<?= $price_id ?>" class="price"><?= $row['price'] ?></span></p>
                </div>
                <button class="del" id="<?= $delete_id?>" value="<?=$row['id']?>"onclick="delete1('<?= $delete_id?>')">DELETE</button>
                <button id="idr" class="dec" value="<?=$row['id']?>" onclick="decrease('<?= $quantity_id ?>', '<?= $price_id ?>','<?=$row['id']?>')">-</button>
            <button id="idr" class="inc" value="<?=$row['id']?>" onclick="increase('<?= $quantity_id ?>', '<?= $price_id ?>','<?=$row['id']?>')">+</button>
            
            </div>
            

            <?php
        }
    } else {
      echo '
      <div class="msgcon"><div class="msg3">
         No books found
        </div></div>';
    }
    ?>
    
</div>
<div id="buy"><div id="buy1"></div></div>
  </div>

    <?php require_once('../Front_page/footer.php')?>
    </body>
    </html>




    