<?php
session_start();

if (!isset($_SESSION['customer_id'])) {
	header('Location: program.php');
	exit();
}

include 'database.php';

$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

echo '<h2>Products</h2>';

while ($row = mysqli_fetch_assoc($result)) {
	echo '<div class="product">';
	echo '<h3>' . $row['name'] . '</h3>';
	echo '<p>' . $row['description'] . '</p>';
	echo '<p>Price: $' . $row['price'] . '</p>';
	echo '<form method="post">';
	echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
	echo '<input type="submit" name="add_to_cart" value="Add to cart">';
	echo '</form>';
	echo '</div>';
}

if (isset($_POST['add_to_cart'])) {
	$product_id = $_POST['product_id'];
	$customer_id = $_SESSION['customer_id'];

	$query = "INSERT INTO orders (product_id, customer_id) VALUES ('$product_id', '$customer_id')";
	mysqli_query($conn, $query);

	echo '<p>Product added to cart.</p>';
}

echo '<p><a href="logout.php">Logout</a></p>';
