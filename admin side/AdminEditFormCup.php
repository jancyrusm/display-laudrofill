<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'] )) {
    header("Location: login.php");
    exit();
    
}

$Username = $_SESSION['username'];

echo "Welcome, $Username!";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin</title>
</head>
<body>
    <div class="container">
        <div class="frame">
            <p class="header">Edit CUP</p>
            <p class="subtitle">LaundroFill Management & Settings</p>
            
            <div class="form1"> 
                <div class="form1Cont">
                    <p class="message" id="errorMessage"></p>

                    <div class="form-group form1Group">
                        <label class="formLabel">Name:</label>
                        <input type="text" id="productName" class="form-control formInput" value="Cup" readonly>
                    </div>

                    <div class="form-group form1Group">
                        <label class="formLabel">Volume:</label>
                        <input type="text" id="productVol" class="form-control formInput" value="12oz" readonly>
                    </div>
    
                    <div class="form-group form1Group">
                        <label class="formLabel">Price:</label>
                        <input type="number" id="productPrice" class="form-control formInput">
                    </div>

                    <div class="form-group form1Group" style="padding:20px;">
                        <input type="button" id="CancelProductChanges" class="btn btn-primary formBtn" value="Cancel">
                        <input type="button" id="SaveProductChanges" class="btn btn-primary formBtn" value="Save">

                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>


        function getTheProductID() {
            const currentURL = window.location.href;
            const parameterValue = currentURL.split('?')[1];
            console.log('ID value:', parameterValue);
            $('#ProductID').text(parameterValue);
        }


        $(document).ready(function() {

            getTheProductID();

           $('#SaveProductChanges').on('click', function() {
            
            var volume = $('#productVol').val();
            var name = $('#productName').val();
            var price = $('#productPrice').val();
            var productID = "D1";

            if(volume == "" || name == "" || price == ""){
                $('#errorMessage').text('* Please complete all necessary detials *');
            }
            else {

                $.ajax({
                    url:'php/getData.php',
                    type: 'POST',
                    data: {
                        tagged: "updateProducts",
                        productVol: volume,
                        productName: name,
                        productPrice: price,
                        productID: productID,
                    },
                    success: function(res){
                        console.log(res);
                        $('#errorMessage').text(res).css('color', '#72f872');
                    },
                    error: function(err){
                        console.log(err);
                    },
                });
            }

           });

           $('#CancelProductChanges').one('click', function() {

            window.history.back();

           });

           $('.formInput').on('click', function() {
            $('#errorMessage').text('');
           });

        });
    </script>
</body>
</html>
