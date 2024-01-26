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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title> Admin </title>
</head>
<body>
    
    <div class="frame">
        <!-- <div class="top-buttons">
            <button class="btn btn-danger tp-btns" id="backBTN">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
                <span>BACK</span>
                
            </button>
        </div> -->
        <p class="header">Edit Product</p>
        <p class="subtitle"> LaundroFill Management & Settings </p>

        <div class="frame_1"> 
            <div>
                <div id="product1" class="box">
                    <p>Product 1</p>
                </div>
            </div>
            <div>
                <div id="product2" class="box">
                    <p>Product 2</p>
                </div>
            </div>
            <div>
                <div id="product3" class="box">
                    <p>Product 3</p>
                </div>
            </div>
            <div>
                <div id="product4" class="box">
                    <p>Cup</p>
                </div>
            </div>
        </div>
        <div class="form-group form1Group" style="padding:0px;">
            <button class="btn btn-danger formBtn tp-btns" id="BackBTN" style="width:75%; height:60px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
                <span>BACK</span>
            </button>
            <!-- <input type="button" id="SaveProductChanges" class="btn btn-primary formBtn" value="Save"> -->
        </div>
    </div>
</body>
</html>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>

    $(document).ready(function() {

         //Product 1 Button Click
         $('#product1').on('click', function() {
            window.location.href = 'AdminEditForm.php?1';
        });

        //Product 2 Button Click
        $('#product2').on('click', function() {
            window.location.href = 'AdminEditForm.php?2';
        });

        //Product 3 Button Click
        $('#product3').on('click', function() {
            window.location.href = 'AdminEditForm.php?3';
        });

        //Product 3 Button Click
        $('#product4').on('click', function() {
            window.location.href = 'AdminEditFormCup.php?4';
        });

        //Back Butoon
        $('#BackBTN').on('click', function() {
            window.location.href = 'index.php';
            //$('body').css('background', 'black');
        });

    });

</script>