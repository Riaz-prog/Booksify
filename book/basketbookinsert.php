<?php
session_start();
$s_con = new mysqli("localhost", "root", "", "bookstore_project_books");

if(isset($_POST['id']) && isset($_POST['quantity']) && isset($_POST['price'])){
    $id=$_POST['id'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $customer_id = $_SESSION['id']; // get customer id from session
    $sql2="SELECT * FROM basket where book_id='$id' AND customer_id='$customer_id'";
    $result1=$s_con->query($sql2);
    if($result1->num_rows>0){
        $sql3 = "UPDATE basket SET quantity = '$quantity', price = '$price' WHERE book_id = '$id' AND customer_id='$customer_id'";
        if($s_con->query($sql3)){
            $response = array('status' => '1');
            echo json_encode($response);
        }
    }else{
        $id=$_POST['id'];
        $sql = "SELECT * FROM books WHERE id = '$id' AND NOT EXISTS (SELECT * FROM basket WHERE book_id = '$id' and customer_id='".$_SESSION['id']."')";
        $result = $s_con->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $sql1 = "INSERT INTO basket (id, book_id, title, author, image_filename, description, ISBN, price, quantity, customer_id) 
                 VALUES (NULL, '".$row['id']."', '".$row['title']."', '".$row['author']."', '".$row['image_filename']."', \"".$row['description']."\", '".$row['ISBN']."', '".$price."','".$quantity."', '".$customer_id."')";

            if($s_con->query($sql1)){
                $response = array('status' => 'success');
                echo json_encode($response);
            }else{
                echo $s_con->error;
            }
        } else {
            $response = array('status' => 'exists');
            echo json_encode($response);
        }
    }
}
else{
    $id=$_POST['id'];
    $sql = "SELECT * FROM books WHERE id = '$id' AND NOT EXISTS (SELECT * FROM basket WHERE book_id = '$id' and customer_id='".$_SESSION['id']."')";
    $result = $s_con->query($sql);
    $customer_id = $_SESSION['id'];
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $sql1 = "INSERT INTO basket (id, book_id, title, author, image_filename, description, ISBN, price, quantity, customer_id) 
             VALUES (NULL, '".$row['id']."', '".$row['title']."', '".$row['author']."', '".$row['image_filename']."', \"".$row['description']."\", '".$row['ISBN']."', '".$row['price']."', CAST('1' AS UNSIGNED), '".$customer_id."')";

        if($s_con->query($sql1)){
            $response = array('status' => 'success');
            echo json_encode($response);
        }else{
            echo $s_con->error;
        }
    } else {
        $response = array('status' => 'exists');
        echo json_encode($response);
    }
}

$s_con->close();
?>