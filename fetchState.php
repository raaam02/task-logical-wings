<?php

include "conn.php";

$countryId = $_GET["countryId"];

$query = "SELECT * FROM state WHERE countryId = '$countryId'";

$result = $conn->query($query);

$options = "<option 
            class='appearance-none text-sm text-gray-900 bg-gray-100/100' value=''>Select State</option>";

while ($row = $result->fetch_assoc()) {
    $options .= "<option 
            class='appearance-none text-sm text-gray-900 bg-gray-100/100' value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
echo $options;

$conn->close();