<?php
$value=$_POST['val'];
$con=new mysqli("localhost","root","","bookstore_project_books");
if($con){
    $sql="DELETE FROM basket WHERE id='$value'";
    if($con->query($sql)){
        echo "deleted";
    }
    else{
        echo "Error deleting record: " . mysqli_error($con);
    }
}
$con->close();

?>