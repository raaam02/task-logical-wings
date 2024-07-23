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


    try {
        if ($stmt->execute()) {

            header("Location: success.html");
            $stmt->close();
            $conn->close();
            exit();
        } else {

            error_log("Error executing statement: " . print_r($stmt->error, true));
            header("Location: error.html");
            $stmt->close();
            $conn->close();
            exit();
        }
    } catch (Exception $e) {
        error_log("Exception caught: " . $e->getMessage());
        header("Location: error.html");
        exit();
    }

}