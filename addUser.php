<?php

include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = mysqli_real_escape_string($conn, trim($_POST["fname"]));
    $lname = mysqli_real_escape_string($conn, trim($_POST["lname"]));
    $email = mysqli_real_escape_string($conn, trim($_POST["email"]));
    $phone = mysqli_real_escape_string($conn, trim($_POST["phone"]));
    $address = mysqli_real_escape_string($conn, trim($_POST["address"]));
    $city = mysqli_real_escape_string($conn, trim($_POST["city"]));

    $stmt = $conn->prepare("INSERT INTO employee (first_name, last_name, email, phone, address, city) VALUES(?,?,?,?,?,?)");

    $stmt->bind_param("sssisi", $fname, $lname, $email, $phone, $address, $city);

    $result = $stmt->execute();

    if ($result) {
        header("location: index.html");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

}