<<<<<<< HEAD
<?php  

include "connection/connection.php";

function readOrderItem() {
=======
<?php
$root_dir = dirname(__DIR__);

include "connection/connection.php";
include_once $root_dir . './../utils/uuid.php';

function readOrderItem()
{
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
	global $conn;

	$query = "SELECT * FROM orderItem";

	$data = mysqli_query($conn, $query);

	return $data;
}

<<<<<<< HEAD
function getOrderItemById($userId) {
=======
function getOrderItemById($userId)
{
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
	global $conn;

	$query = "SELECT * FROM orderItem WHERE userId = '$userId'";

	$data = mysqli_query($conn, $query);

	return $data;
}

<<<<<<< HEAD
function insertOrderItem($productId, $unitPrice, $quantity, $userId) {
	global $conn;

	$totalPrice = $unitPrice * $quantity;

	$query = "INSERT INTO orderItem (productId, unitPrice, quantity, userId, totalPrice) VALUES ('$productId', '$unitPrice', '$quantity', '$userId', $totalPrice)";
=======
function insertOrderItem($productId, $unitPrice, $quantity, $userId)
{
	global $conn;
	$id = generateUuid();
	$totalPrice = $unitPrice * $quantity;

	$query = "INSERT INTO orderItem (id, productId, unitPrice, quantity, userId, totalPrice) VALUES ('$id', '$productId', '$unitPrice', '$quantity', '$userId', $totalPrice)";
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912

	return mysqli_query($conn, $query);
}

<<<<<<< HEAD
function updateOrderItem($id, $productId, $unitPrice, $quantity, $userId) {
=======
function updateOrderItem($id, $productId, $unitPrice, $quantity, $userId)
{
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
	global $conn;

	$totalPrice = $unitPrice * $quantity;

	$query = "UPDATE orderItem SET productId = '$productId', unitPrice = '$unitPrice', quantity = '$quantity', userId = '$userId', totalPrice = '$totalPrice' WHERE id = '$id'";

	return mysqli_query($conn, $query);
}

<<<<<<< HEAD
function deleteOrderItem($id) {
=======
function deleteOrderItem($id)
{
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
	global $conn;

	$query = "DELETE FROM orderItem WHERE id = '$id'";

	return mysqli_query($conn, $query);
<<<<<<< HEAD
}
=======
}
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
