<?php
$con=new mysqli("localhost","root","","bookstore_project_books");
if($con){
    $id=$_POST['id'];
    $isbn=$_POST['isbn'];
    $author=$_POST['author'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $title=$_POST['title'];
    $sql="SELECT * FROM books where id='$id'";
    $r=$con->query($sql);
    if($r->num_rows>0){
        $result=$r->fetch_assoc();
        echo '<div id="modal">
        <br><br>
            author: <input type="text" value="'.$author.'"><br><br>
            title: <input type="text" value="'.$title.'"><br><br>
            description: <textarea rows="4" cols="40">'.$description.'</textarea><br><br>
            isbn: <input type="text" value="'.$isbn.'"><br><br>
            price: <input type="text" value="'.$price.'">
            <br><br>
        </div>';
    }
}



?>