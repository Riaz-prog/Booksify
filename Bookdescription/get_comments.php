<style>

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
  }
}
@media only screen and (min-width:560px){
  .msgcon{
    width:100%; 
  }
}
@media only screen and (min-height:1150px){
  .msgcon{
    width:100%; 
  }
}
</style>
<?php 
$con=new mysqli("localhost","root","","bookstore_project_bookreviews");
if($con){
    $sql = "SELECT * FROM comments WHERE book_id={$_POST['book_id']} ORDER BY timestamp DESC";

    $r=$con->query($sql);
    $output="";
    if($r->num_rows >0){
        while ($row=$r->fetch_assoc()){
            $output.="<div class='comm'>".$row['name']." created at ".$row['timestamp']."<button class='dustbin' data-book='".$row['book_id']."' data-id='".$row['id']."'>🗑️</button><br>".$row['comment']."</div><br><br>";
        }
        echo $output;
    }else{
        echo '
        <div class="msgcon"><div class="msg3">
           No Reviews Yet
          </div></div>';
    }
}else{
    echo "no";
}
?>