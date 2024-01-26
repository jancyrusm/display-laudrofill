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
        <p class="header">Admin Settings</p>
        <p class="subtitle"> LaundroFill Management & Settings </p>

        <div class="frame_1"> 
            <div>
                <div id="option1" class="box">
                    <p>Account</p>
                </div>
            </div>

            <div>
                <div id="option2" class="box">
                    <p>Logout</p>
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
        $('#option1').on('click', function() {
            window.location.href = 'AdminSettingAccount.php';
        });

        //Product 1 Button Click
        $('#option2').on('click', function() {
            $.ajax({
                url:'php/getData.php',
                type:'POST',
                data:{
                    tagged: "logout"
                },
                success:function(res){
                    console.log(res);
                    if(res == "logout"){
                        window.location.href = 'login.php';
                    }
                },
                error: function(err){
                    console.log(err);
                },
            });
        });

       

        //Back Butoon
        $('#BackBTN').on('click', function() {
            window.location.href = 'index.php';
            //$('body').css('background', 'black');
        });

    });

</script>