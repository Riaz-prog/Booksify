<?php
session_start();
$con = new mysqli("localhost", "root", "", "bookstore_project_books");
if ($con) {
  $sql = "SELECT id FROM basket where customer_id='".$_SESSION['id']."'";
  $r = $con->query($sql);
  if ($r->num_rows > 0) {
    echo '<a href="../checkout/checkout.php"><button id="idr1" onclick="Buy()" autofocus>Checkout</button></a>';
  } else {
    echo "";
  }
}
?>
