<?php

include "conn.php";

$query = "SELECT * FROM country;";

$result = $conn->query($query);

$options = "<option 
            class='appearance-none text-sm text-gray-900 bg-gray-100/100' value=''>Select Country</option>";

while ($row = $result->fetch_assoc()) {
    $options .= "<option 
            class='appearance-none text-sm text-gray-900 bg-gray-100/100' value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
echo $options;

$conn->close();