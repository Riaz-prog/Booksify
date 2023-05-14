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
<style>
   body{
          background: linear-gradient(to right, rgb(77, 1, 113), rgb(193, 29, 243), #618dd4);

         }
    .hidden{
        display:none;
    }
    #hidden-link{
        display:block;
    }
    #price{
  font-size:2rem;
  color:rgb(49, 160, 59);
}
</style>
<script>
    $(document).ready(function(){
        $(document).on('click', '#pagi a', function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            loadable(id);
          });
            
          function showNoResultsMessage() {
          if ($('#main').children().length == 0) {
            $('#main').html('<div><p>Loading</p></div>');
          }
        }

          loadable(1);

          function loadable(page){
            $.ajax({
              url:"../Bestsellers/bestsellerbookfetch.php",
              type:"post",
              data:{page:page},
              success:function(data){
                $('#main').html(data);
              }
            });
          }

          $(document).on('click', '.prev-btn', function(e) {
            e.preventDefault();
            var page=$(this).data('id');
            if (page > 5) {
              page-=5;
              loadable(page);
            }else if(page>1){
              page-=1;
              loadable(page);
            }
          });


          $(document).on('click', '.next-btn', function(e) {
              e.preventDefault();
              var page=$(this).data('id');
              var totalpage=$(this).data('eid');
              if (page < totalpage) {
                loadable(page);
              }
            });

        $.ajax({
            url:"../Bestsellers/bestsellerbookfetch.php",
            type:"post",
            success:function(data){
                $('#main').html(data);
            }
        });

        $(document).on('click','.add-basket-btn',function(event){
                    var id=$(this).data('id');
                    $.ajax({
                      url:"../book/basketbookinsert.php",
                      type:"post",
                      data:{id:id},
                      dataType: 'json',
                      success:function(response){
                        if(response.status == 'success') {
                            alert("Book is added");
                        } else if(response.status == 'exists') {
                            alert("Book has already been added");
                        } 
                      }
                    });
                  });



    })
</script>
<html>

</body>
<div id="main">
</div>
<?php require_once('../Front_page/footer.php');?>
</body>
    </html>