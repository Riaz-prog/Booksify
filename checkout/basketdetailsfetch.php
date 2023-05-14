<?php
session_start();
$con=new mysqli("localhost","root","","bookstore_project_books");
if($con){
    $sql="SELECT title,price FROM basket where customer_id='" . $_SESSION['id'] . "'";
    $r=$con->query($sql);
    $output="";
    $sum=0;
    if($r->num_rows>0){
        while($row = $r->fetch_assoc()){
            $output.="<p>".$row['title']." - ₹".$row['price']."</p>";
            $sum+=$row['price'];
        }
    }
    $result=array("output"=>$output,"sum"=>$sum);
    echo json_encode($result);

}

?>