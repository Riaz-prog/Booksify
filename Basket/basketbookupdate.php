<?php
$s_con = new mysqli("localhost", "root", "", "project_books");
if(isset($_POST['id']) && isset($_POST['quantity']) && isset($_POST['price'])){
    $id=$_POST['id'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];

$sql2="SELECT * FROM basket where id='$id'";
$result1=$s_con->query($sql2);
if($result1->num_rows>0){
    $sql3 = "UPDATE basket SET quantity = '$quantity', price = '$price' WHERE id = '$id'";
    if($s_con->query($sql3)){
        $response = array('status' => '1');
        echo json_encode($response);
    }
}else{
    echo "NO";
}
}
?>