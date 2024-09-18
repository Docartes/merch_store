<?php
$root_dir = dirname(__DIR__);

include_once $root_dir . '/utils/uuid.php';
include "connection/connection.php";

function readOrderItem()
{
	global $conn;

	$query = "SELECT * FROM orderItem";

	$data = mysqli_query($conn, $query);

	return $data;
}

function getOrderItemById($userId)
{
	global $conn;

	$query = "SELECT * FROM orderItem WHERE userId = '$userId'";

	$data = mysqli_query($conn, $query);

	return $data;
}

function insertOrderItem($productId, $unitPrice, $quantity, $userId)
{
	global $conn;
	$id = generateUuid();
	$totalPrice = $unitPrice * $quantity;

	$query = "INSERT INTO orderItem (id, productId, unitPrice, quantity, userId, totalPrice) VALUES ('$id', '$productId', '$unitPrice', '$quantity', '$userId', $totalPrice)";

	return mysqli_query($conn, $query);
}

function updateOrderItem($id, $quantity, $unitPrice) {
	global $conn;

	$totalPrice = $unitPrice * $quantity;

	$query = "UPDATE orderItem SET quantity = '$quantity', totalPrice = '$totalPrice' WHERE id = '$id'";

	return mysqli_query($conn, $query);
}

function deleteOrderItem($id)
{
	global $conn;

	$query = "DELETE FROM orderItem WHERE id = '$id'";

	return mysqli_query($conn, $query);
}
