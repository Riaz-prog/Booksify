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
    .books-slider {
        display: flex;
        background-color:#F8F8FF;
        margin-top:10px;
    }

    .book-card {
        display:flex;
        flex-wrap:wrap;
        width: 100%;
        margin: 10px;
        border: 1px solid #ccc;
        box-shadow: 2px 2px 6px #ddd;
        padding: 10px;
        position: relative;
    }
    #image{
      min-width:200px;
      min-height:300px;
    }

    @media screen and (min-width: 995px) {
    .book-card {
        height:600px;
        margin: 10px auto;
    }


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
      background-color: #ff2e2e;
        color: #fff;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        font-size: 14px;
        font-weight: bold;
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
    #search{
      display:none;
    }
    .comm{
      margin:3px;
      background-color:#fff;
      
    }
    #subb{
      background-color:#fff;
      width:100%;
    }
    .form-group{
      max-width:90%;
      margin-left:1.5rem;
    }
    #sub{
      background:linear-gradient(#4CAF50, #2E8B57);
      margin-left:1.5rem;
      margin-bottom:5px;
    }
    #sub:hover{
      background: linear-gradient(#2E8B57, #4CAF50);
    }
    #getcomment{
      background-color: #4CAF50;
      border-radius:5px;
      color:white;
      cursor:pointer;
      margin:1rem;
    }
    #getcomment:active{
      background-color: #1c6387;
      color:white;
    }
    #hide{
      background-color: #2196F3;
      color:white;
      border-radius:5px;
      cursor:pointer;
    }
    #hide:active {
  background-color: #33147d;
}
.dustbin{
  float:right;
  background-color:red;
  cursor:pointer;
}
</style>
<script>
    function increase(quantity_id, price_id) {
        var val = parseInt($('#' + quantity_id).text());
        var val1 = parseFloat($('#' + price_id).text());
        if (val >= 1 && val<=17) {
            val++;
            $('#' + quantity_id).text(val);
            $('#' + quantity_id).attr('value', val);
            val1 = parseFloat(val1 / (val - 1) * val).toFixed(2);
            $('#' + price_id).text(val1);
            $('#' + price_id).attr('value', val1);
            $('#basket1').attr('data-quan',val);
            $('#basket1').attr('data-price',val1);
        }
    }

    function decrease(quantity_id, price_id) {
        var val = parseInt($('#' + quantity_id).text());
        var val1 = parseFloat($('#' + price_id).text());
        if (val > 1) {
            val--;
            $('#' + quantity_id).text(val);
            $('#' + quantity_id).attr('value', val);
            val1 = parseFloat(val1 / (val + 1) * val).toFixed(2);
            $('#' + price_id).text(val1);
            $('#' + price_id).attr('value', val1);
            $('#basket1').attr('data-quan',val);
            $('#basket1').attr('data-price',val1);
        }
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
$(document).ready(function() {
          function commentdata(book_id){
                  $.ajax({
                      url:"../Bookdescription/get_comments.php",
                      type:"post",
                      data:{book_id:book_id},
                      success:function(data){
                        $('#display').show();
                          $('#display').html(data);
                      }
                  });
          
                }
                  
              $('#subb').submit(function(event) {
                event.preventDefault();
                var form = $(this).serialize();
                var book_id = $('#subb input[name="book_id"]').val();
                $.ajax({
                    url: "../Bookdescription/post_comment.php",
                    type: "post",
                    data: {
                        form: form,
                        book_id: book_id,
                    },
                    success: function(data) {
                      if(data==1){
                        alert('You need to login');
                        $('#subb').trigger('reset');
                      }else if(data==2){
                        alert("Not Registered Email");
                        $('#subb').trigger('reset');
                      }
                      else{
                        commentdata(book_id);
                        $('#subb').trigger('reset');
                      }
                    }
                });
            });
            $('#getcomment').on('click',function() {
                var book_id = $(this).val();
                commentdata(book_id)
            });

            $('#hide').on('click',function(){
              $('#display').hide();
            });



            $(document).on('click','.add-basket-btn',function(event){
                    var id=$(this).data('id');
                    var price=$(this).data('price');
                    var quantity=$(this).data('quan');
                    $.ajax({
                      url:"../book/basketbookinsert.php",
                      type:"post",
                      data:{id:id,quantity:quantity,price:price},
                      dataType: 'json',
                      success:function(response){
                        if(response.status==1){
                          alert("Book quantity has been updated");
                          location.reload();
                        }else{
                        alert("Book is added");
                        location.reload();
                        }
                      }
                    });
                  });


            $(document).on('click','.dustbin',function(){
              var id=$(this).data('id');
              var book_id=$(this).data('book');
              $.ajax({
                url:"../bookdescription/commentdelete.php",
                type:"post",
                data:{id:id},
                success:function(){
                  commentdata(book_id);
                }
              });
            });
    

            });


                  

    
</script>

</head>
    <body>
    <div id="main">
    <div class='books-slider'>
    <?php 
    $id=$_GET['id'];
    $con = new mysqli("localhost", "root", "", "bookstore_project_books");
    if($con){
        $sql="SELECT * From books WHERE id='$id'";
        $r=$con->query($sql);
    }
    
    if ($r->num_rows > 0) {
        while ($row = $r->fetch_assoc()) {
          $quantity_id = 'quantity_' . $row['id'];
          $price_id = 'price_' . $row['id'];
          $delete_id='delete_'.$row['id'];
          $id=$row['id'];
            ?>
            <div class="book-card mt-2 mb-2 ml-4 mr-3">
              <div id="image">
                <img src="<?= $row['image_filename'] ?>" alt="Book Cover">
              </div>
                <div class="book-img">
                    <h5><?= $row['title'] ?></h5>
                    <p>author : <?=$row['author']?></p>
            <p><?= $row['description'] ?></p>
            <p>Genre : <?=$row['genre']?></p>
                    <p>Quantity: <span id="<?= $quantity_id ?>" value="1">1</span></p>
                    <p>Price: &#8377;<span id="<?= $price_id ?>" class="price"><?= $row['price'] ?></span></p>
                <button id="idr" onclick="decrease('<?= $quantity_id ?>', '<?= $price_id ?>')">-</button>
            <button id="idr" onclick="increase('<?= $quantity_id ?>', '<?= $price_id ?>')">+</button>
            <a data-id="<?=$id?>" data-quan="1" data-price="<?= $row['price'] ?>" class="btn btn-primary add-basket-btn" id="basket1">Add to basket</a>
            </div>
                  </div>
                <!-- <button class="del" id="<?= $delete_id?>" value="<?=$row['id']?>"onclick="delete1('<?= $delete_id?>')">DELETE</button> -->
        </div>
                <form method="post" id="subb">
                <div class="form-group">
                      <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" name="message" rows="5" placeholder="Give a Review" required></textarea>
                    </div>
                    <input type="hidden" name="book_id" value="<?= $row['id'] ?>">
                    <button type="submit" class="btn btn-primary" id="sub">Submit</button>
                  </form>
                </div>
                <button id="getcomment" value="<?= $row['id'] ?>">Load Comments</button><button id="hide"style="margin-left:1em; margin-bottom:1rem;">hide comments</button>

                <div class="container-md" id="display"></div>
            <?php
        }
    } else {
        echo "No books found.";
    }
    ?>
  </div>
  
    <?php require_once('../Front_page/footer.php')?>
    </body>
    </html>



    