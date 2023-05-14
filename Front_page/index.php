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
<script src="pagination2.js"></script>
    <title>Booksify</title>
    <style>
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



    header {
  -webkit-user-drag: none;
  -khtml-user-drag: none;
  -moz-user-drag: none;
  -ms-user-drag: none; 
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
        @media only screen and (min-width:480px) and (max-width:576px) {
  #search {
    width: 65% !important;
    margin-right: 5px;
  }
  #search1 {
    width: 30% !important;
    margin-top:-2.5px;
  }
}
@media only screen and (min-width:576px) and (max-width:768px) {
  #search {
    max-width: 55% !important;
    margin-right: 5px;
  }
  #search1 {
    width: 25% !important;
    margin-top:-2.5px;
  }
}
@media only screen and (min-width:200px) and (max-width:484px) {
  #search {
    width: 55% !important;
    margin-right: 5px;
  }
  #search1 {
    width: 35% !important;
    margin-top:-2.5px;
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

#message{
          color:Yellow;
        }
        #price{
  font-size:2rem;
  color:rgb(49, 160, 59);
}


        /*image */
        img{
        overflow-clip-margin: content-box;
        overflow: clip;
        overflow-x: ;
        overflow-y: ;
      }

      .foot{
  color:#fff;
}


        /*    footer  */
        .nav-link.foot{
          color:#fff;
        }


        .error-msg1 {
  text-align: center;
  margin-top: 50px;
}
.user-id {
  color: #FFDF00;
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
#bookcard {
  position: relative;
}

#bookimg a {
  display: block;
  position: relative;
}
#bookimg a:hover::after {
  content: "Click";
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  background-color: #ffcc00;
  color: dark;
  text-align: center;
  padding: 10px;
  opacity: 0.9;
}
    </style>
      <script>
         $(window).on("load", function() {
            $("#preloader").fadeOut("slow");
            $('#loader').fadeOut("slow");
          });
        $(document).ready(function(){

         

          $(document).on('click', '#pagi a', function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            loadable(id);
          });
          $(document).on('click', '#pagi2 a', function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            $.ajax({
              url:"../book/bookfetch2.php",
              type:"post",
              data:{page:page},
              success:function(data){
                $('#main').html(data);
              }
            });
          });
          $(document).on('click', '#pagi3 a', function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            $.ajax({
              url:"../book/bookfetch3.php",
              type:"post",
              data:{page:page},
              success:function(data){
                $('#main').html(data);
              }
            });
          });
          function showNoResultsMessage() {
          if ($('#main').children().length == 0) {
            $('#main').html('<div><p>Loading</p></div>');
          }
        }

          loadable(1);

          function loadable(page){
            $.ajax({
              url:"../book/bookfetch.php",
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


            $('#search').on('keyup',function(){
                var value=$(this).val();   
                value = value.replace(/\s+$/, '');
                if(value.substr(value.length-1)==" "){
                  value=value.slice(0,-1);
                }

                if(value) {
                  $.ajax({
                    url:"../book/bookfetch3.php",
                    type:"POST",
                    data:{val:value},
                    success:function(data){
                    if (data.length > 0) {
                    $('#main').html(data);
                    showNoResultsMessage();
                }else{
                  showNoResultsMessage();
                }
            }
                });
                }else if(!value){
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
                
            });

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




          });

      </script>
        
</head>
<body>



<div id="main">
      </div>
      

    <?php include "../Front_page/footer.php"?>

</body>
</html>




