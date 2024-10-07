<?php
// Display_Books.php

session_start();

$rows = unserialize(urldecode($_GET['rows'])); // Fetch the rows
    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "countriesDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->close();


// Display the results
echo "<html><html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <link rel=\"stylesheet\" href=\"style.css\">
    <title>Countries Display</title>
</head>";

echo "
<div class=\"container\">
<table border='1' background-color: white>
<tr>
<th>Name</th>
</tr>";


foreach ($rows as $row) {
    echo "<tr>";
    echo "<td>" . (isset($row['name']) ? $row['name'] : '') . "</td>";  //Ternary operator deals with data that was meant to be passed but was lost
    echo "</tr>";
}

echo "</table></div></body></html>";
?>