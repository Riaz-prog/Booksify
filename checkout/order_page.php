<?php
session_start();
$con = new mysqli("localhost","root","","bookstore_project_books");

if($con){
    parse_str($_POST['form'], $form_data);
    $id = $_SESSION['id'];
    $phone=$form_data['phone'];
    $address=$form_data['address'];
    $sql = "SELECT * FROM basket WHERE customer_id = '$id'";
    $r = $con->query($sql);
    $output = "";
    $total_price = 0;
    $total_quantity = 0;
    $book_ids = "";
    $total_title="";
    if($r->num_rows > 0){
        while($row = $r->fetch_assoc()){
            $book_id = $row['book_id'];
            $quantity = $row['quantity'];
            $price = $row['price'];
            $total_title.=$row['title'].",";
            $total_quantity += $quantity;
            $total_price += $price;
            $book_ids .= $book_id . ":" . $quantity . ",";
        }
        $book_ids = rtrim($book_ids, ",");
        $sql1 = "INSERT INTO `checkout` (`book_id`, `customer_id`, `name`, `phone`, `quantity`, `price`, `address`, `order_date`, `status`) 
        VALUES ('$book_ids', '$id', '$total_title', '$phone', '$total_quantity', '$total_price', '$address', NOW(), 'pending')";
        
            if($con->query($sql1)){
                $output = "Order placed successfully!";
                echo $output;
            }else{
                $output = "Error placing the order, please try again later.";
                echo $output;
            }
        
    }else{
        $output = "No items in the basket!";
        echo $output;
    }
}
?>
