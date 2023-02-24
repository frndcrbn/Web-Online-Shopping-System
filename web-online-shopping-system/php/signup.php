<?php
    if (isset($_POST['signup'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];

        include 'database.php';

        $query = "INSERT INTO customers (customer_name, customer_email, customer_password, customer_address) VALUES ('$name', '$email', '$password', '$address')";
        mysqli_query($conn, $query);

        echo '<p>Thank you for signing up!</p>';
    }
?>