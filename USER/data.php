<?php


//CONNECTING TO DATABASE
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

//CLOSING THE CONNECTION
function closeDatabaseConnection($conn) {
    $conn->close();
}


////////////////////////////////////////////////// FUNCTIONS /////////////////////////////////////////////////

function saveTransaction($conn) {
    
        // Generate the TranID
    $result = $conn->query("SELECT MAX(TranID) AS max_id FROM transactions");
    $row = $result->fetch_assoc();
    $max_id = $row['max_id'];

    if ($max_id) {
        // Extract the number part and increment it
        $num = (int)substr($max_id, 2) + 1;
    } else {
        // Start with the first ID if no rows are present
        $num = 1;
    }

    // Format the new TranID
    $tran_id = 'TNR' . str_pad($num, 6, '0', STR_PAD_LEFT);

    // Get the current date
    $tran_date = date('Y-m-d'); // Format: YYYY-MM-DDTranDate

    // Get the parameters from the GET request
    $service_type       = isset($_POST['service_type']) ? $_POST['service_type'] : null;
    $selected_volume    = isset($_POST['selected_volume']) ? $_POST['selected_volume'] : null;
    $selected_product   = isset($_POST['selected_product']) ? $_POST['selected_product'] : null;
$total_price            = isset($_POST['total_price']) ? $_POST['total_price'] : null;
    $customer_payment   = isset($_POST['customer_payment']) ? $_POST['customer_payment'] : null;
    $laundry_load       = isset($_POST['laundry_load']) ? $_POST['laundry_load'] : null;
    $selected_fabric    = isset($_POST['selected_fabric']) ? $_POST['selected_fabric'] : null;
    $selected_stain     = isset($_POST['selected_stain']) ? $_POST['selected_stain'] : null;

   
    $sql = "INSERT INTO transactions (TranID, TranDate, Service, Volume, ProductName, Amount, 
    customer_payment, LaundryLoad, FabricType, StainLevel) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind the parameters to the SQL query
    $stmt->bind_param("sssddsss", $service_type, $selected_volume, $selected_product, $total_price, $customer_payment, $laundry_load, $selected_fabric, $selected_stain);

    // Execute the SQL statement
    if (!$stmt->execute()) {
        die("Query failed: " . $stmt->error);
    } else {
        echo "Transaction saved successfully.";
    }

    // Close the statement
    $stmt->close();
}


/////////////////////////////////////////////////// MAIN CODES ///////////////////////////////////////////////
$conn = connectToDatabase();

$tagged = isset($_GET['tagged']) ? $_GET['tagged'] : (isset($_POST['tagged']) ? $_POST['tagged'] : null);

switch ($tagged) {
    case 'saveTransaction':
        saveTransaction($conn);
        break;
}

closeDatabaseConnection($conn);

?>











?>