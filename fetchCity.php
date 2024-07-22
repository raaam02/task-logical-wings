<?php

include "conn.php";

$stateId = $_GET["stateId"];

$query = "SELECT * FROM city WHERE stateId = '$stateId'";

$result = $conn->query($query);

$options = "<option 
            class='appearance-none text-sm text-gray-900 bg-gray-100/100' value=''>Select City</option>";

while ($row = $result->fetch_assoc()) {
    $options .= "<option 
            class='appearance-none text-sm text-gray-900 bg-gray-100/100' value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
echo $options;

$conn->close();