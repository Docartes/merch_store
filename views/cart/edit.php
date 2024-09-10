<?php  

include "../../controllers/orderItem.controller.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  updateOrderItem($_POST['id'], $_POST['quantity'], $_POST['unitPrice']);
  header("Location: index.php");
}


?>