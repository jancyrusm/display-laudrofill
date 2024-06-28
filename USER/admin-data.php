<?php

session_start();

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

function getLogin($conn){
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    $sql = "SELECT Username, Password, UserID, UserType FROM users WHERE Username = ? AND Password = ?";
            
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    if (!$stmt->execute()) {
        die("Query failed: " . $stmt->error);
    }
    else{

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row !== null) {
            $verify_userid = $row['UserID'];
            $verify_username = $row['Username'];
            $verify_password = $row['Password'];
            $verify_usertype = $row['UserType'];


            $_SESSION['username']    = $verify_username;
            $_SESSION['userID']    = $verify_userid;
            $response = array('usertype' => $verify_usertype, 'userID' => $verify_userid, 'username' => $verify_username, 'password' => $verify_password);


        } else {
            $noVerify = "null";
            $response = array('username' => $noVerify, 'password' => $noVerify);
        }

        $json_response = json_encode($response);
        echo $json_response;


    }

    $stmt->close();
}

function getProductDetails($conn) {
    $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;

    $sql = "SELECT  ProductType, ProductName, ProductDesc, 
                    Volume1, Volume2, Volume3,
                    UnitPrice1, UnitPrice2, UnitPrice3 
            FROM products 
            WHERE ProductID = ?
            ";
            
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $product_id);

    if (!$stmt->execute()) {
        die("Query failed: " . $stmt->error);
    }
    else{

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $response = array();

        if ($row !== null) {
            $response['ProductType'] = $row['ProductType'];
            $response['ProductName'] = $row['ProductName'];
            $response['ProductDesc'] = $row['ProductDesc'];
            $response['Volume1']     = $row['Volume1'];
            $response['Volume2']     = $row['Volume2'];
            $response['Volume3']     = $row['Volume3'];
            $response['UnitPrice1']  = $row['UnitPrice1'];
            $response['UnitPrice2']  = $row['UnitPrice2'];
            $response['UnitPrice3']  = $row['UnitPrice3'];

        } else {
            $response['error'] = "Product not found";
        }

        $json_response = json_encode($response);
        echo $json_response;
    }

    $stmt->close();
}

function updateProduct($conn) {
    $product_id = isset($_POST['ProductID']) ? $_POST['ProductID'] : null;
    $product_type = isset($_POST['ProductType']) ? $_POST['ProductType'] : null;
    $product_name = isset($_POST['ProductName']) ? $_POST['ProductName'] : null;
    $product_desc = isset($_POST['ProductDesc']) ? $_POST['ProductDesc'] : null;
    // $volume1 = isset($_POST['Volume1']) ? $_POST['Volume1'] : null;
    // $volume2 = isset($_POST['Volume2']) ? $_POST['Volume2'] : null;
    // $volume3 = isset($_POST['Volume3']) ? $_POST['Volume3'] : null;
    $unit_price1 = isset($_POST['UnitPrice1']) ? $_POST['UnitPrice1'] : null;
    $unit_price2 = isset($_POST['UnitPrice2']) ? $_POST['UnitPrice2'] : null;
    $unit_price3 = isset($_POST['UnitPrice3']) ? $_POST['UnitPrice3'] : null;

    $modified_by = isset($_SESSION['username']) ? $_SESSION['username'] : null;
    $modified_date = date('Y-m-d H:i:s');

    // Prepare SQL query
    $sql = "UPDATE  products 
            SET     ProductType = ?, ProductName = ?, ProductDesc = ?, 
                    UnitPrice1 = ?, UnitPrice2 = ?, UnitPrice3 = ?, 
                    ModifiedBy = ? , ModifiedDate = ?
            WHERE   ProductID = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", 
                        $product_type, $product_name, $product_desc, 
                        // $volume1, $volume2, $volume3, 
                        $unit_price1, $unit_price2, $unit_price3, 
                        $modified_by, $modified_date, $product_id
                    );

    if (!$stmt->execute()) {
        die("Query failed: " . $stmt->error);
    } else {
        $response = array('success' => true, 'message' => "Product updated successfully");
        $json_response = json_encode($response);
        echo $json_response;
    }

    $stmt->close();
}


function getAccountDetails($conn){
    $user_type = isset($_GET['user_type']) ? $_GET['user_type'] : null;

    $sql = "SELECT  Username, Password, UserID, UserType
            FROM    users 
            WHERE   UserType = ?
            ";
            
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_type);

    if (!$stmt->execute()) {
        die("Query failed: " . $stmt->error);
    }
    else{

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $response = array();

        if ($row !== null) {
            $response['Username'] = $row['Username'];
            $response['Password'] = $row['Password'];
            $response['UserID'] = $row['UserID'];
            $response['UserType'] = $row['UserType'];

        } else {
            $response['error'] = "User not found";
        }

        $json_response = json_encode($response);
        echo $json_response;
    }

    $stmt->close();
}

function updateAccount($conn){
    $user_id = isset($_POST['UserID']) ? $_POST['UserID'] : null;
    $user_type = isset($_POST['UserType']) ? $_POST['UserType'] : null;
    $username = isset($_POST['UserName']) ? $_POST['UserName'] : null;
    $password = isset($_POST['Password']) ? $_POST['Password'] : null;

    $sql = "UPDATE  users 
            SET     Username = ?, Password = ?
            WHERE   UserType = ?
            ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $password, $user_type);

    if (!$stmt->execute()) {
        die("Query failed: " . $stmt->error);
    } else {
        $response = array('success' => true, 'message' => "User updated successfully");
        $json_response = json_encode($response);
        echo $json_response;
    }

    $stmt->close();

}

function viewTransation($conn) {
    $tran_from = isset($_GET['tranFrom']) ? $_GET['tranFrom'] : null;
    $tran_to = isset($_GET['tranTo']) ? $_GET['tranTo'] : null;
   
    $sql = "SELECT  TranID, 
                    TranDate, 
                    ProductName, 
                    Service, 
                    LaundryLoad, 
                    FabricType, 
                    StainLevel, 
                    Volume, 
                    Amount 
            FROM    transactions
            WHERE   TranDate BETWEEN ? AND ?
        ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $tran_from, $tran_to);

    if (!$stmt->execute()) {
        die("Query failed: " . $stmt->error);
    } else {
        $result = $stmt->get_result();
        $tableRowsHTML = '';

        while ($row = $result->fetch_assoc()) {
            $loginTime = new DateTime($row['TranDate']);
            // $formattedDate = $loginTime->format('m-d-Y, g:ia');
            $formattedDate = $loginTime->format('m-d-Y');

            $tableRowsHTML .= '<tr>
                                <td>' . htmlspecialchars($row['TranID']) . '</td>
                                <td>' . htmlspecialchars($formattedDate) . '</td>
                                <td>' . htmlspecialchars($row['ProductName']) . '</td>
                                <td>' . htmlspecialchars($row['Service']) . '</td>
                                <td>' . htmlspecialchars($row['LaundryLoad']) . '</td>
                                <td>' . htmlspecialchars($row['FabricType']) . '</td>
                                <td>' . htmlspecialchars($row['StainLevel']) . '</td>
                                <td>' . htmlspecialchars($row['Volume']) . '</td>
                                <td>' . htmlspecialchars($row['Amount']) . '</td>
                            </tr>';
        }

        $response = array('success' => true, 'tableRowsHTML' => $tableRowsHTML);
        echo json_encode($response);
    }

    $stmt->close();
}


function viewSalesReport($conn) {
    $tran_from = isset($_GET['tranFrom']) ? $_GET['tranFrom'] : null;
    $tran_to = isset($_GET['tranTo']) ? $_GET['tranTo'] : null;
   
    $sql = "   SELECT  TranID, 
                    TranDate, 
                    ProductName, 
                    Service, 
                    LaundryLoad, 
                    FabricType, 
                    StainLevel, 
                    Volume, 
                    SUM(Amount) AS TotalAmount
            FROM    transactions
            WHERE   TranDate BETWEEN ? AND ?
            GROUP BY TranID, TranDate, ProductName, Service, LaundryLoad, FabricType, StainLevel, Volume
        ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $tran_from, $tran_to);

    if (!$stmt->execute()) {
        die("Query failed: " . $stmt->error);
    } else {
        $result = $stmt->get_result();
        $tableRowsHTML = '';

        while ($row = $result->fetch_assoc()) {
            $loginTime = new DateTime($row['TranDate']);
            // $formattedDate = $loginTime->format('m-d-Y, g:ia');
            $formattedDate = $loginTime->format('m-d-Y');

            $tableRowsHTML .= ' <tr>
                                    <td>' . htmlspecialchars($row['TranID']) . '</td>
                                    <td>' . htmlspecialchars($formattedDate) . '</td>
                                    <td>' . htmlspecialchars($row['ProductName']) . '</td>
                                    <td>' . htmlspecialchars($row['Service']) . '</td>
                                    <td>' . htmlspecialchars($row['LaundryLoad']) . '</td>
                                    <td>' . htmlspecialchars($row['FabricType']) . '</td>
                                    <td>' . htmlspecialchars($row['StainLevel']) . '</td>
                                    <td>' . htmlspecialchars($row['Volume']) . '</td>
                                    <td>' . htmlspecialchars($row['TotalAmount']) . '</td>
                                </tr>';
        }

        $response = array('success' => true, 'tableRowsHTML' => $tableRowsHTML);
        echo json_encode($response);
    }

    $stmt->close();
}

function viewInventoryReport($conn){
    $tran_from = isset($_GET['tranFrom']) ? $_GET['tranFrom'] : null;
    $tran_to = isset($_GET['tranTo']) ? $_GET['tranTo'] : null;
   
    $sql = "SELECT ProductID, ProductType, ProductName, ProductDesc, Volume1 AS Volume, UnitPrice1 AS UnitPrice FROM products 
            UNION ALL
            SELECT ProductID, ProductType, ProductName, ProductDesc, Volume2 AS Volume, UnitPrice2 AS UnitPrice FROM products 
            UNION ALL
            SELECT ProductID, ProductType, ProductName, ProductDesc, Volume3 AS Volume, UnitPrice3 AS UnitPrice FROM products
        ";

    $stmt = $conn->prepare($sql);

    if (!$stmt->execute()) {
        die("Query failed: " . $stmt->error);
    } else {
        $result = $stmt->get_result();
        $tableRowsHTML = '';

        while ($row = $result->fetch_assoc()) {
            $tableRowsHTML .= '<tr>
                                    <td>' . htmlspecialchars($row['ProductID']) . '</td>
                                    <td>' . htmlspecialchars($row['ProductType']) . '</td>
                                    <td>' . htmlspecialchars($row['ProductName']) . '</td>
                                    <td>' . htmlspecialchars($row['ProductDesc']) . '</td>
                                    <td>' . htmlspecialchars($row['Volume']) . '</td>
                                    <td>' . htmlspecialchars($row['UnitPrice']) . '</td>
                                </tr>';
        }

        $response = array('success' => true, 'tableRowsHTML' => $tableRowsHTML);
        echo json_encode($response);
    }

    $stmt->close();
}


function getLDDistance($conn) {
    $distances = array();

    // SQL query to select distances from ld_distance table
    // $sql = "SELECT Distance_1, Distance_2, Distance_3 FROM ld_distance WHERE RecID = 1";
    $sql = "
            SELECT 
                (SELECT ProductName FROM products WHERE ProductID = 1) AS Product_1,
                (SELECT ProductName FROM products WHERE ProductID = 2) AS Product_2,
                (SELECT ProductName FROM products WHERE ProductID = 3) AS Product_3,
                (SELECT Distance_1 FROM ld_distance WHERE RecID = 1) AS Distance_1,
                (SELECT Distance_2 FROM ld_distance WHERE RecID = 1) AS Distance_2,
                (SELECT Distance_3 FROM ld_distance WHERE RecID = 1) AS Distance_3;
    ";

    // Execute the query
    $result = $conn->query($sql);

    // Check if the query executed successfully
    if ($result && $result->num_rows > 0) {
        // Fetch data row by row
        while ($row = $result->fetch_assoc()) {
            // Store distances in the array
            $distances['distance1'] = $row['Distance_1'];
            $distances['distance2'] = $row['Distance_2'];
            $distances['distance3'] = $row['Distance_3'];
            $distances['product1'] = $row['Product_1'];
            $distances['product2'] = $row['Product_2'];
            $distances['product3'] = $row['Product_3'];
        }
    } else {
        // Handle case where no rows are returned or query fails
        echo json_encode(array('error' => 'No distances found or query failed: ' . $conn->error));
        exit;
    }

    // Free result set
    $result->free_result();

    // Return the distances array as JSON
    echo json_encode($distances);
    exit;
}


/////////////////////////////////////////////////// MAIN CODES ///////////////////////////////////////////////
$conn = connectToDatabase();

$tagged = isset($_GET['tagged']) ? $_GET['tagged'] : (isset($_POST['tagged']) ? $_POST['tagged'] : null);

switch ($tagged) {
    case 'getLogin':
        getLogin($conn);
        break;
    case 'getProductDetails':
        getProductDetails($conn);
        break;
    case 'updateProduct':
        updateProduct($conn);
        break;
    case 'getAccountDetails':
        getAccountDetails($conn);
        break;
    case 'updateAccount':
        updateAccount($conn);
        break;
    case 'viewTransation':
        viewTransation($conn);
        break;
    case 'viewSalesReport':
        viewSalesReport($conn);
        break;
    case 'viewInventoryReport':
        viewInventoryReport($conn);
        break;
    case 'getLDDistance':
        getLDDistance($conn);
        break;
}

closeDatabaseConnection($conn);

?>