<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'] )) {
    header("Location: login.php");
    exit();
    
}

$Username = $_SESSION['username'];

//echo "Welcome, $Username!";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title> Admin </title>
</head>
<body>
    <div class="frame">
        <p class="header" style="padding-top:90px;"> Welcome, Admin! :> </p>
        <p class="subtitle"> LaundroFill Management & Settings </p>

        <div class="frame_1"> 
            <div>
                <div id="btn1" class="box">
                    <p> Edit Product </p>
                </div>
                
            </div>
            <div>
                <div id="btn2" class="box">
                    <p> Transaction History </p>
                </div>
            </div>
            <div>
                <div id="btn3" class="box">
                    <p>Settings</p>
                </div>
            </div>

        </div>
    </div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>

    $(document).ready(function() {

        //Edt Product Button Click
        $('#btn1').on('click', function() {
            window.location.href = 'AdminEditProduct.php';
        });

         //View Transaction History Button Click
        $('#btn2').on('click', function() {
            window.location.href = 'AdminTransactionHistory.php';
        });

        //View Transaction History Button Click
        $('#btn3').on('click', function() {
            window.location.href = 'AdminSettings.php';
        });

    });

</script>