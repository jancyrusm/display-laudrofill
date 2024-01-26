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
            <p class="header">Admin Account<span id="ProductID"></span></p>
            <p class="subtitle">LaundroFill Management & Settings</p>
            
            <div class="form1" style="height:400px; width:70%; padding:20px;"> 
                <div class="form1Cont">
                    <p class="message" id="errorMessage"></p>

                    <div class="form-group form1Group">
                        <label class="formLabel">Username</label>
                        <input type="text" id="username" class="form-control formInput" value="admin" readonly>
                    </div>

                    <div class="form-group form1Group">
                        <label class="formLabel">Password</label>
                        <input type="password" id="password" class="form-control formInput">
                    </div>

                    <div class="form-group form1Group">
                        <label class="formLabel">Confirm Password</label>
                        <input type="password" id="confirm_password" class="form-control formInput">
                    </div>

                    <div class="form-group form1Group" style="padding:20px;">
                        <input type="button" id="backBTN" class="btn btn-primary formBtn" value="Back">
                        <input type="button" id="SaveAccoutChanges" class="btn btn-primary formBtn" value="Save">

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
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>



        $(document).ready(function() {

           $('#SaveAccoutChanges').on('click', function() {
            
            var username = $('#username').val();
            var password = $('#password').val();
            var confirm_password = $('#confirm_password').val();

            if(username == "" || password == "" || confirm_password == ""){
                $('#errorMessage').text('* Please complete all necessary detials *');
            }
            else {

                if (confirm_password != password){
                    $('#errorMessage').text('* Password mismatch *');
                }
                else {
                    $.ajax({
                    url:'php/getData.php',
                    type: 'POST',
                    data: {
                        tagged: "updateAdminAccount",
                        username: username,
                        password: password,
                        confirm_password: confirm_password
                    },
                    success: function(res){
                        $('#errorMessage').text(res).css('color', '#72f872');
                    },
                    error: function(err){
                        console.log(err);
                    },
                });
                }

                
            }

           });

           $('#BackBTN').one('click', function() {

            window.location.href = 'AdminSettings.php';

           });

           $('.formInput').on('click', function() {
            $('#errorMessage').text('');
           });

        });
    </script>
</body>
</html>
