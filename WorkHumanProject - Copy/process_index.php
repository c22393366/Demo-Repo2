<?php

//process_index.php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "countriesDB";  //Connection to php localhost database (using xampp)

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$countryname = isset($_POST['country']) ? $_POST['country'] : "";  // Check for use of POST in form to prevent injecion. 

if (!empty($countryname)){
    $sql = "SELECT name FROM countries
    WHERE name LIKE ?";  //using a binding parameter to prevent injection and use abstraction
    $stmt = $conn->prepare($sql);
    
    $likecountryname = "%$countryname%";
    $stmt->bind_param("s", $likecountryname); //Country name uses type string and is then bound

    
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

    //store the results from the query
    $rows = [];
    while ($row = $result->fetch_assoc()) {
        array_push($rows, $row);
    }

 
    $stmt->close();

 
    $conn->close();

    // Check if there are matching rows and pass to display if so. Else, return to form submission
    if (!empty($rows)) {
        header("Location: display_countries.php?rows=" . urlencode(serialize($rows)));
        exit();
    } else {
        $_SESSION['error_message'] = "No countries found matching your search.";
        header("Location: index.php");
        exit();
    }
}

else{
    $_SESSION['error_message'] = "Please enter a country name.";
    header("Location: index.php");
    exit();
}