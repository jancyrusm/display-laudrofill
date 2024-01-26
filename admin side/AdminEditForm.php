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
            <p class="header">Edit Product <span id="ProductID"></span></p>
            <p class="subtitle">LaundroFill Management & Settings</p>
            
            <div class="form1"> 
                <div class="form1Cont">
                    <p class="message" id="errorMessage"></p>

                    <div class="form-group form1Group">
                        <label class="formLabel">Name:</label>
                        <input type="text" id="productName" class="form-control formInput">
                    </div>

                    <div class="form-group form1Group">
                        <label class="formLabel">Volume:</label>
                        <select id="productVol" class="form-control formInput">
                            <option>select volume</option>
                            <option value="60ml">60ml</option>
                            <option value="80ml">80ml</option>
                            <option value="125ml">125ml</option>
                            <option value="185ml">185ml</option>
                            <option value="205ml">205ml</option>
                        </select>
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

        function updateProducts() {
            $.ajax({
                url:'php/getData.php',
                type: 'POST',
                data: {
                    tagged: "updateProducts",
                    productVol: volume,
                    productName: name,
                    productPrice: price,
                    productID: productID
                },
                success: function(res){
                    console.log(res);
                },
                error: function(err){
                    console.log(err);
                },
            });
        }

        function mapVolumeAndProIDToProductID(volume, proID) {
            switch (proID) {
                case '1':
                    switch (volume) {
                        case '60ml':
                            return 'A1';
                        case '80ml':
                            return 'A2';
                        case '125ml':
                            return 'A3';
                        case '185ml':
                            return 'A4';
                        case '205ml':
                            return 'A5';
                    }
                    break;

                case '2':
                    // Map volume to productID for proID = 2
                    switch (volume) {
                        case '60ml':
                            return 'B1';
                        case '80ml':
                            return 'B2';
                        case '125ml':
                            return 'B3';
                        case '185ml':
                            return 'B4';
                        case '205ml':
                            return 'B5';
                    }
                    break;

                case '3':
                    // Map volume to productID for proID = 3
                    switch (volume) {
                        case '60ml':
                            return 'C1';
                        case '80ml':
                            return 'C2';
                        case '125ml':
                            return 'C3';
                        case '185ml':
                            return 'C4';
                        case '205ml':
                            return 'C5';
                    }
                    break;

                // Add more cases for other proIDs if needed

                default:
                    return null;
            }
        }


        $(document).ready(function() {
            
            getTheProductID();
            
            $('#CancelProductChanges').one('click', function() {
                window.history.back();
            });
            
            $('.formInput').on('click', function() {
                $('#errorMessage').text('');
            });


            $('#SaveProductChanges').on('click', function() {
                var volume = $('#productVol').val();
                var name = $('#productName').val();
                var price = $('#productPrice').val();
                var proID = $('#ProductID').text();

                if (volume == "" || name == "" || price == "") {
                    $('#errorMessage').text('* Please complete all necessary details *');
                } else {
                    var productID = mapVolumeAndProIDToProductID(volume, proID);
                    if (productID !== null) {
                        
                        $.ajax({
                            url:'php/getData.php',
                            type: 'POST',
                            data: {
                                tagged: "updateProducts",
                                productVol: volume,
                                productName: name,
                                productPrice: price,
                                productID: productID
                            },
                            success: function(res){
                                console.log(res);
                            },
                            error: function(err){
                                console.log(err);
                            },
                        });

                    } else {
                        $('#errorMessage').text('* Invalid combination of volume and product ID *');
                    }
                }
            });






        });




    </script>
</body>
</html>
