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

        <div class="frame_1"> 

            <div class="form1" style="height:350px; width:50%;"> 
                <div class="form1Cont">
                    <p class="message" id="errorMessage"></p>

                    <div class="form-group form1Group" style="gap:60px;">
                        <label class="formLabel">Username</label>
                        <input type="text" id="username" class="form-control formInput">
                    </div>

                    <div class="form-group form1Group" style="gap:60px;">
                        <label class="formLabel">Password</label>
                        <input type="password" id="password" class="form-control formInput">
                    </div>

                    <div class="form-group form1Group" style="padding:20px;">
                        <!-- <input type="button" id="CancelProductChanges" class="btn btn-primary formBtn" value="Cancel"> -->
                        <input type="button" id="SaveProductChanges" class="btn btn-primary formBtn" value="Save">

                    </div>
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
        $('#SaveProductChanges').on('click', function() {
            var username = $('#username').val();
            var password = $('#password').val();

            if(username == "" || password == ""){
                $('#errorMessage').text('* Please complete all detials *');
            }
            else {
                $.ajax({
                    url:'php/getData.php',
                    type:'POST',
                    data:{
                        tagged: "verifyLogin",
                        username: username,
                        password: password
                    },
                    success: function(res){
                        console.log(res);
                        var data = JSON.parse(res);
                        if (data.error) {
                            console.log(data.error);
                        } else {
                            // console.log('Username:', data.username);
                            // console.log('Password:', data.password);

                            var verified_username = data.username;
                            var verified_password = data.password;

                            if(verified_username != "null" && verified_password != "null"){
                                $('#errorMessage').text('* login successful *').css('color', '#72f872');
                                window.location.href = "index.php";
                            }
                            else {
                                $('#errorMessage').text('* invalid username and password *');
                            }

                        }

                    },
                    error: function(err){
                        console.log(res);
                    },
                });
            }

        });

         //View Transaction History Button Click
        $('#btn2').on('click', function() {
            window.location.href = 'AdminTransactionHistory.html';
        });

    });

</script>