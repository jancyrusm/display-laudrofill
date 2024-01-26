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
    <title>Admin</title>

</head>
<body>
    <div class="container">
        <div class="frame">
            <p class="header"> Transaction History <span id="ProductID"></span></p>
            <p class="subtitle">LaundroFill Management & Settings</p>
            
            <div class="form2" style="height:auto;"> 
                <div class="form1Cont">
                    <table class="table table-bordered form-table" id="transactionHistoryTable">
                        <thead class="thead-dark">
                            <tr>
                                <th rowspan="2">No.</th>
                                <th rowspan="2">Product Name</th>
                                <th rowspan="2">Date</th>
                                <th colspan="5">Volume</th>
                            </tr>
                            <tr>
                                <th>60ml</th>
                                <th>80ml</th>
                                <th>125ml</th>
                                <th>185ml</th>
                                <th>205ml</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Tide</td>
                                <td>01-23-2024 12:45pm</td>
                                <td>P20.00</td>
                                <td>P0.00</td>
                                <td>P0.00</td>
                                <td>P0.00</td>
                                <td>P0.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group form1Group" style="padding:0px;">
                <button class="btn btn-primary formBtn tp-btns" id="BackBTN">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                    </svg>
                    <span>BACK</span>
                </button>
                <!-- <input type="button" id="SaveProductChanges" class="btn btn-primary formBtn" value="Save"> -->
            </div>
        </div>
    </div>

    <style>
        .form-table {
            text-align: center;
            border-radius: 10px;
            color: #fff;
        }
        .form-table thead {
            top:0;
            position: sticky;  
            border-radius: 10px; 
        }
        
        
    </style>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>


        function getTransactionHistory() {
            $.ajax({
                url:'php/getData.php',
                type: 'GET',
                data: {
                    tagged: "getTransactionHistory"
                },
                success: function(res){
                    console.log(res);
                   $('#transactionHistoryTable tbody').html(res);
                },
                error: function(err){
                    console.log(err);
                },
            });
        }


        $(document).ready(function() {

            getTransactionHistory();

            $('#BackBTN').on('click', function() {

                //window.history.back();
                window.location.href = 'index.php'

            });
            
        });
    </script>
</body>
</html>
