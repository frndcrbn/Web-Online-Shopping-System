<?php
session_start();

if (isset($_SESSION['customer_id'])) {
	header('Location: home.php');
	exit();
}

if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	include 'database.php';

	$query = "SELECT * FROM customers WHERE customer_email = '$email' AND customer_password = '$password'";
	$result = mysqli_query($conn, $query);

	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['customer_id'] = $row['customer_id'];
		header('Location: home.php');
		exit();
	} else {
		echo '<p>Invalid email or password.</p>';
	}
}
