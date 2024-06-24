<?php
// Function to connect to database
function connectToDatabase() {
    $servername = "localhost"; 
    $database   = "laundrofill_db";
    $username   = "root";
    $password   = "";
    
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Function to close database connection
function closeDatabaseConnection($conn) {
    $conn->close();
}

// Function to save transaction
function saveTransaction($conn, $service_type, $selected_volume, $selected_product, $total_price, $customer_payment, $laundry_load, $selected_fabric, $selected_stain) {
    // Generating transaction ID
    $result = $conn->query("SELECT MAX(TranID) AS max_id FROM transactions");
    $row = $result->fetch_assoc();
    $max_id = $row['max_id'];

    $num = $max_id ? (int) substr($max_id, 3) + 1 : 1;
    $tran_id = 'TNR' . str_pad($num, 6, '0', STR_PAD_LEFT);
    
    // Current date
    $tran_date = date('Y-m-d');

    // SQL query to insert data into transactions table
    $sql = "INSERT INTO transactions (TranID, TranDate, ProductName, Service, LaundryLoad, FabricType, StainLevel, Volume, Amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters to the prepared statement
    $stmt->bind_param("ssssssssd", $tran_id, $tran_date, $selected_product, $service_type,  $laundry_load, $selected_fabric, $selected_stain, $selected_volume,  $total_price);

    // Execute the statement
    if (!$stmt->execute()) {
        die("Query failed: " . $stmt->error);
    } else {
        echo "Transaction saved successfully.";
    }

    $stmt->close();
}

////////////////////////////////////////////////////////////////////// Main script
$conn = connectToDatabase();

$postData = file_get_contents('php://input');
$formData = json_decode($postData, true);

$tagged             = isset($formData['tagged']) ? $formData['tagged'] : null;
$service_type       = isset($formData['service_type']) ? $formData['service_type'] : null; 
$selected_volume    = isset($formData['selected_volume']) ? $formData['selected_volume'] : null;
$selected_product   = isset($formData['selected_product']) ? $formData['selected_product'] : null;
$total_price        = isset($formData['total_price']) ? $formData['total_price'] : null;
$customer_payment   = isset($formData['customer_payment']) ? $formData['customer_payment'] : null;
$laundry_load       = isset($formData['laundry_load']) ? $formData['laundry_load'] : null;
$selected_fabric    = isset($formData['selected_fabric']) ? $formData['selected_fabric'] : null;
$selected_stain     = isset($formData['selected_stain']) ? $formData['selected_stain'] : null;

if ($tagged === 'saveTransaction') {
    saveTransaction($conn, $service_type, $selected_volume, $selected_product, $total_price, $customer_payment, $laundry_load, $selected_fabric, $selected_stain);
}

closeDatabaseConnection($conn);
?>
