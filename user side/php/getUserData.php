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



function collectAllData($conn){

    $Tagged = isset($_GET['tagged']) ? $_GET['tagged'] : null;

    $sql = "
    
        SELECT
        vol60.ProductBrand as ProductBrand,
        vol60.ProductPrice as vol60,
        vol80.ProductPrice as vol80,
        vol125.ProductPrice as vol125,
        vol185.ProductPrice as vol185,
        vol205.ProductPrice as vol205

        FROM
        (select ProductBrand, ProductPrice from products2 where ProductBrand = 'A' and ProductVolume = '60ml' ) as vol60
        left join (select ProductBrand, ProductPrice from products2 where ProductBrand = 'A' and ProductVolume = '80ml') as vol80 
        on vol60.ProductBrand = vol80.ProductBrand 
        left join (select ProductBrand, ProductPrice from products2 where ProductBrand = 'A' and ProductVolume = '125ml') as vol125
        on vol60.ProductBrand = vol125.ProductBrand 
        left join (select ProductBrand, ProductPrice from products2 where ProductBrand = 'A' and ProductVolume = '185ml') as vol185
        on vol60.ProductBrand = vol185.ProductBrand 
        left join (select ProductBrand, ProductPrice from products2 where ProductBrand = 'A' and ProductVolume = '205ml') as vol205
        on vol60.ProductBrand = vol205.ProductBrand 

        UNION ALL

        SELECT
            vol60.ProductBrand as ProductBrand,
            vol60.ProductPrice as vol60,
            vol80.ProductPrice as vol80,
            vol125.ProductPrice as vol125,
            vol185.ProductPrice as vol185,
            vol205.ProductPrice as vol205

        FROM
        (select ProductBrand, ProductPrice from products2 where ProductBrand = 'B' and ProductVolume = '60ml' ) as vol60
        left join (select ProductBrand, ProductPrice from products2 where ProductBrand = 'B' and ProductVolume = '80ml') as vol80 
        on vol60.ProductBrand = vol80.ProductBrand 
        left join (select ProductBrand, ProductPrice from products2 where ProductBrand = 'B' and ProductVolume = '125ml') as vol125
        on vol60.ProductBrand = vol125.ProductBrand 
        left join (select ProductBrand, ProductPrice from products2 where ProductBrand = 'B' and ProductVolume = '185ml') as vol185
        on vol60.ProductBrand = vol185.ProductBrand 
        left join (select ProductBrand, ProductPrice from products2 where ProductBrand = 'B' and ProductVolume = '205ml') as vol205
        on vol60.ProductBrand = vol205.ProductBrand 

        UNION ALL

        SELECT
            vol60.ProductBrand as ProductBrand,
            vol60.ProductPrice as vol60,
            vol80.ProductPrice as vol80,
            vol125.ProductPrice as vol125,
            vol185.ProductPrice as vol185,
            vol205.ProductPrice as vol205

        FROM
        (select ProductBrand, ProductPrice from products2 where ProductBrand = 'C' and ProductVolume = '60ml' ) as vol60
        left join (select ProductBrand, ProductPrice from products2 where ProductBrand = 'C' and ProductVolume = '80ml') as vol80 
        on vol60.ProductBrand = vol80.ProductBrand 
        left join (select ProductBrand, ProductPrice from products2 where ProductBrand = 'C' and ProductVolume = '125ml') as vol125
        on vol60.ProductBrand = vol125.ProductBrand 
        left join (select ProductBrand, ProductPrice from products2 where ProductBrand = 'C' and ProductVolume = '185ml') as vol185
        on vol60.ProductBrand = vol185.ProductBrand 
        left join (select ProductBrand, ProductPrice from products2 where ProductBrand = 'C' and ProductVolume = '205ml') as vol205
        on vol60.ProductBrand = vol205.ProductBrand 

        UNION ALL 

        SELECT ProductBrand, ProductPrice, ProductPrice, ProductPrice, ProductPrice, ProductPrice from products2 
        WHERE ProductBrand = 'D' and ProductVolume = '12oz'
    ";
            
    $stmt = $conn->prepare($sql);

    if (!$stmt->execute()) {
        die("Query failed: " . $stmt->error);
    }
    else {

        $data = array();

        while ($stmt->fetch()) {
            $row = array(
                'ProductBrand' => $ProductBrand,
                'vol60' => $vol60,
                'vol80' => $vol80,
                'vol125' => $vol125,
                'vol185' => $vol185,
                'vol205' => $vol205
            );
    
            $data[] = $row;
        }
    
        $stmt->close();
    
        return json_encode($data);
    }
    
    echo collectAllData($conn);

    
    $stmt->close();
}




//------------------------------------------------- MAIN Codes -------------------------------------------------

$conn = connectToDatabase();

//$tagged = isset($_GET['tagged']) ? $_GET['tagged'] : (isset($_POST['tagged']) ? $_POST['tagged'] : null);
$tagged = "collectAllData";

switch ($tagged) {
    case 'collectAllData':
        collectAllData($conn);
        break;
}

closeDatabaseConnection($conn);