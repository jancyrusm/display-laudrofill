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



function getTransactionHistory($conn){

    $Tagged = isset($_GET['tagged']) ? $_GET['tagged'] : null;

    $sql = "CALL Transaction_SP(?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $Tagged);

    if (!$stmt->execute()) {
        die("Query failed: " . $stmt->error);
    }

    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $row['ProductID']; ?></td>
                <td><?php echo $row['ProductName']; ?></td>
                <td>
                    <?php 
                        $loginTime = new DateTime($row['TranDate']);
                        echo $loginTime->format('m-d-Y, g:ia'); 
                    ?>                  
                </td>
                <td><?php echo $row['Vol_60ml']; ?></td>
                <td><?php echo $row['Vol_80ml']; ?></td>
                <td><?php echo $row['Vol_125ml']; ?></td>
                <td><?php echo $row['Vol_185ml']; ?></td>
                <td><?php echo $row['Vol_205ml']; ?></td>
            </tr>
        <?php


    }

    $stmt->close();
}


function updateProducts($conn){

    $Tagged = isset($_POST['tagged']) ? $_POST['tagged'] : null;
    $Name = isset($_POST['productName']) ? $_POST['productName'] : null;
    $Volume = isset($_POST['productVol']) ? $_POST['productVol'] : null;
    $Price = isset($_POST['productPrice']) ? $_POST['productPrice'] : null;
    $ProductID = isset($_POST['productID']) ? $_POST['productID']: null;

    $sql = "UPDATE products2 
            SET ProductName = ?,
                ProductVolume = ?,
                ProductPrice = ?
                
            WHERE ProductID = ?";
            
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssds", $Name, $Volume, $Price, $ProductID);

    if (!$stmt->execute()) {
        die("Query failed: " . $stmt->error);
    }
    else{

        $result = $stmt->get_result();

        echo "updated successfully";
    }

    $stmt->close();
}



function verifyLogin($conn){
    // $Tagged = isset($_POST['tagged']) ? $_POST['tagged'] : null;
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    $sql = "SELECT Username, Password FROM useradmin WHERE Username = ? AND Password = ?";
            
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    if (!$stmt->execute()) {
        die("Query failed: " . $stmt->error);
    }
    else{

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row !== null) {
            $verify_username = $row['Username'];
            $verify_password = $row['Password'];

            $_SESSION['username']    = $verify_username;
            $response = array('username' => $verify_username, 'password' => $verify_password);


        } else {
            $noVerify = "null";
            $response = array('username' => $noVerify, 'password' => $noVerify);
        }

        $json_response = json_encode($response);
        echo $json_response;


    }

    $stmt->close();

}

function updateAdminAccount($conn){
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : null;

    $sql = "UPDATE useradmin SET Password = ? WHERE Username = ?";
            
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $password, $username);

    if (!$stmt->execute()) {
        die("Query failed: " . $stmt->error);
    }
    else{

        $result = $stmt->get_result();
        echo "update successful";


    }

    $stmt->close();
}

function logout($conn){
    
    $_SESSION = array();

    session_destroy();

    echo "logout";
}

//------------------------------------------------- MAIN Codes -------------------------------------------------

$conn = connectToDatabase();

$tagged = isset($_GET['tagged']) ? $_GET['tagged'] : (isset($_POST['tagged']) ? $_POST['tagged'] : null);

switch ($tagged) {
    case 'getTransactionHistory':
        getTransactionHistory($conn);
        break;
    case 'updateProducts':
        updateProducts($conn);
        break;
    case 'verifyLogin':
        verifyLogin($conn);
        break;
    case 'updateAdminAccount':
        updateAdminAccount($conn);
        break;
    case 'logout':
        logout($conn);
        break;
}

closeDatabaseConnection($conn);