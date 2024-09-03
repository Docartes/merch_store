<?php

include "../model/connection/connection.php";

$account_management_table = "
CREATE TABLE account_management (
	id CHAR(36) NOT NULL PRIMARY KEY,
	name VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	role ENUM('admin', 'user') DEFAULT 'user' NOT NULL,
	created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);";

$category_table = "
CREATE TABLE category (
	id CHAR(36) NOT NULL PRIMARY KEY,
	name VARCHAR(255) NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
	updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL ON UPDATE CURRENT_TIMESTAMP
);";

$product_table = "
CREATE TABLE products (
	id CHAR(36) NOT NULL PRIMARY KEY,
	name TEXT NOT NULL,
	images TEXT NOT NULL,
	price DOUBLE NOT NULL,
	quantity_in_stock INT NOT NULL DEFAULT 0,
	categoryId CHAR(36) NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
	updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL ON UPDATE CURRENT_TIMESTAMP,
	FOREIGN KEY (categoryId) REFERENCES category(id) ON DELETE CASCADE
);";

$blogs_table = "
CREATE TABLE blogs (
	id CHAR(36) NOT NULL PRIMARY KEY,
	image TEXT NOT NULL,
	title VARCHAR(255) NOT NULL,
	content TEXT NOT NULL,
	userId CHAR(36) NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
	updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL ON UPDATE CURRENT_TIMESTAMP,
	FOREIGN KEY (userId) REFERENCES account_management(id)
);";

$order_item_table = "
CREATE TABLE orderItem (
	id CHAR(36) NOT NULL PRIMARY KEY,
	productId CHAR(36) NOT NULL,
	unitPrice FLOAT NOT NULL,
	quantity INT NOT NULL,
	totalPrice FLOAT NOT NULL,
	userId CHAR(36) NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
	updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL ON UPDATE CURRENT_TIMESTAMP,
	FOREIGN KEY (productId) REFERENCES products(id) ON DELETE CASCADE,
	FOREIGN KEY (userId) REFERENCES account_management(id) ON DELETE CASCADE
);
";

mysqli_query($conn, $category_table);
mysqli_query($conn, $product_table);
mysqli_query($conn, $blogs_table);
mysqli_query($conn, $order_item_table);
