<?php 

session_start();
require_once('../login_join/functions.php');
if(isset($_SESSION['user_id'])){
  if(isset($_POST['form'])) {
    parse_str($_POST['form'], $form_data);
    $name = $form_data['name'];
    $email=$form_data['email'];
    if(postcommnetId($_SESSION['id'])==$email){

    
    $message=$form_data['message'];
    $id=$form_data['book_id'];
    $con=new mysqli("localhost","root","","bookstore_project_bookreviews");
    if($con){
      $sql="INSERT INTO comments (book_id,name, email, comment) VALUES ('$id','$name', '$email', '$message')";
      if($con->query($sql)){
        echo "Data inserted successfully.";
      }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
      }
    }else{
      echo "Error: Could not connect to database.";
    }
  }else{
    echo 2;
  }
}
}else{
  echo 1;
}

?>
