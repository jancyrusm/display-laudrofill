<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title> User </title>
</head>
<body>
    <div class="container">

        <!-- page 1 Laundrofill Intro -->
        <div class="page" id="page1">
            <div class="maint-title-cont">
                <p class="header" id="mainTitle" style="cursor:pointer;"> LAUNDROFILL</p>
                <div class="loading" id="startLoading" style="display:none;">
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border" role="status">
                          <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        <!-- Ask the Laundry Load -->
        <div class="page" id="page2">
            <div class="frame" style="display:flex; flex-direction: row;">
                
                <div class="cont" id="cont1">
                    <p class="header"> Specify Laundry Load </p>
                    <p id="errorMessage" class="subtitle" style="font-size:30px; padding:40px 0; color:red; display:none;"> * please enter a valid value * </p>
                    <div class="cont-button">
                        <center>
                            <input id="startBTN" class="btn btn-default" type="button" value="Start" style="background-color: #cccccc;">
                            <input id="startBTN" class="btn btn-default" type="button" value="Cancel">
                        </center>
                    </div>
                </div>
                <div class="cont" id="cont2">
                    <div class="big-box">
                        <div class="input-title">
                            <p>Amount of Laundry (kg)</p>
                        </div>
                        <div class="input-number" id="kiloCounter">0</div>
                        <div class="input-number-buttons">
                            <div class="number-arrow" style="text-align:start;">
                                <svg id="number_down" xmlns="http://www.w3.org/2000/svg" width="150" height="150 " fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16" style="color:white;">
                                    <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                                </svg>
                            </div>
                            <div class="number-arrow" style="text-align:end;">
                                <svg id="number_up" xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16" style="color:white;">
                                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--PAGE 3: Ask the level of Stain -->
        <div class="page" id="page3">
            <div class="frame">
                <div>
                    <p class="header"> Specify the Stain </p>
                    <p class="subtitle"> How dirty is your laundry?  </p>
                </div>
               
                <div class="frame_1"> 
                    <div>
                        <div class="box" id="stain1"> </div>
                        <p id="stainName1">Not Stained</p>
                    </div>
                    <div>
                        <div class="box" id="stain2"> </div>
                        <p id="stainName2">Quite Stained</p>
                    </div>
                    <div>
                        <div class="box" id="stain3"> </div>
                        <p id="stainName3">Heavily Stained</p>
                    </div>
                </div>
                <p id="selectedStain"></p>
                
            </div>
        </div>

        <!-- Page 3_5: Did they brought a cup? -->
        <div class="page" id="page3_5" style="background-color: #404040;">
            <div class="frame" style="display:flex; flex-direction: column; margin:30px;">
                <div class="input-title" style="display: flex; justify-content:center; align-items:center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-question-circle-fill" viewBox="0 0 16 16" style="color:#fff; margin:0 40px;">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247m2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z"/>
                    </svg>
                    <div>
                        <p style="font-size:65px;">For Stained Laundry</p>
                        <p style="font-size:35px;">Would you like to use Stain removing liquide detergent?</p>
                    </div>
                    
                </div>
                <div class="content-cont" style="display:flex; flex-direction: row; justify-content: space-around; margin:30px;">
                    <div class="option-cont btn btn-default" id="YesStrongLD">Yes</div>
                    <div class="option-cont btn btn-default" id="NoStrongLD">No</div>
                </div>  
            </div>
        </div>




        <!-- PAGE 4: Ask the level of Stain -->
        <div class="page" id="page4">
            <div class="frame">
                <div>
                    <p class="header"> Select Laundry Detergent</p>
                    <p class="subtitle"> What Laundry Detergent do you prefer? </p>
                </div>
               
                <div class="frame_1"> 
                    <div>
                        <div class="box" id="product1"> </div>
                        <p id="productName1"></p>
                    </div>
                    <div>
                        <div class="box" id="product2"> </div>
                        <p id="productName2"></p>
                    </div>
                    <div>
                        <div class="box" id="product3"> </div>
                        <p id="productName3"></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page 4_5: Suggest prefered Liquid Detergent Amount -->
        <div class="page" id="page4_5" style="background-color: #404040;">
            <div class="frame" style="display:flex; flex-direction: column;">
                <div class="input-title" style="display: flex; flex-direction: column; justify-content:center; align-items:center;">
                    <div style="display: flex; justify-content:center; align-items:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-question-circle-fill" viewBox="0 0 16 16" style="color:#fff; margin:0 20px;">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                        </svg>
                        <p style="font-size:65px;">Recommended</p>
                    </div>
                    <p class="subtitle" id="ld_suggest">For a <span id="laundry_load"></span> kg of <span id="stain_level"></span> laundry, <span id="reco_ld"></span> of Liquid Detergent is prefered</p>
                    
                </div>
                <div class="content-cont" style="display:flex; flex-direction: row; justify-content: space-around;">
                    <div class="option-cont btn btn-default" id="YesLDAmount">Yes</div>
                    <div class="option-cont btn btn-default" id="NoLDAmount">No</div>
                </div>  
            </div>
        </div>

        <!-- Page 3_6: Suggest prefered Liquid Detergent Amount for Stained Laundry
        <div class="page" id="page3_6" style="background-color: #404040;">
            <div class="frame" style="display:flex; flex-direction: column;">
                <div class="input-title" style="display: flex; flex-direction: column; justify-content:center; align-items:center;">
                    <div style="display: flex; justify-content:center; align-items:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-question-circle-fill" viewBox="0 0 16 16" style="color:#fff; margin:0 20px;">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                        </svg>
                        <p style="font-size:65px;">Recommended</p>
                    </div>
                    <p class="subtitle" id="ld_suggest">For a <span id="laundry_load"></span> of <span id="stain_level"></span> laundry, <span id="reco_ld_stained"></span> of Liquid Detergent is prefered</p>
                    
                </div>
                <div class="content-cont" style="display:flex; flex-direction: row; justify-content: space-around;">
                    <div class="option-cont btn btn-default" id="YesLDAmount">Yes</div>
                    <div class="option-cont btn btn-default" id="NoLDAmount">No</div>
                </div>  
            </div>
        </div> -->
    
        <!-- Page 5: select liquid detergent -->
        <div class="page" id="page5">
            <div class="frame" style="padding: 10px;">
                <div class="top-frame_1" style="display: flex; width:100%; justify-content: center;">
                    <!-- <div class="top-buttons">
                        <svg xmlns="http://www.w3.org/2000/svg" width="118" height="100" viewBox="0 0 118 100" fill="none">
                            <rect width="118" height="100" rx="30" fill="#989898"/>
                            <path d="M15.4645 46.4645C13.5118 48.4171 13.5118 51.5829 15.4645 53.5355L47.2843 85.3553C49.2369 87.308 52.4027 87.308 54.3553 85.3553C56.308 83.4027 56.308 80.2369 54.3553 78.2843L26.0711 50L54.3553 21.7157C56.308 19.7631 56.308 16.5973 54.3553 14.6447C52.4027 12.692 49.2369 12.692 47.2843 14.6447L15.4645 46.4645ZM94.0267 55C96.7881 55 99.0267 52.7614 99.0267 50C99.0267 47.2386 96.7881 45 94.0267 45V55ZM19 55H94.0267V45H19V55Z" fill="#D9D9D9"/>
                        </svg>
                    </div> -->
                    <div class="title-cont">
                        <center>
                        <p class="header"> Product Selected: <span id="ProductNameDisplay" class="ProductDisplay"></span> </p>
                        <p class="subtitle"> Select Volume </p>
                    </center>
                    </div>
                    <div></div>
                </div>
                <div class="frame_1" style="width:100%; overflow-x:auto;"> 
                    <div>
                        <div class="box" id="volume1"> </div>
                        <p id="prod_vol1"> 60ml </p>
                    </div>
                    <div>
                        <div class="box" id="volume2"> </div>
                        <p id="prod_vol2"> 80ml  </p>
                    </div>
                    <div>
                        <div class="box" id="volume3"> </div>
                        <p id="prod_vol3"> 125ml </p>
                    </div>
                    <div>
                        <div class="box" id="volume4"> </div>
                        <p id="prod_vol4"> 185ml </p>
                    </div>
                    <div>
                        <div class="box" id="volume5"> </div>
                        <p id="prod_vol5"> 205ml </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page 6: Inserted Amount by Customer -->
        <div class="page" id="page6">
            <div class="frame" style="display:flex; flex-direction: row;">
                
                <div class="cont" id="cont1">
                    <div class="cont-header">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        PRODUCTS
                                    </th>
                                    <th>
                                        VOLUME (ml)
                                    </th>
                                    <th>
                                        PRICE
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="header ProductDisplay" id="ProductNameDisplay">LD</td>
                                    <td class="header VolumeDisplay" id="VolumeDisplay">0</td>
                                    <td class="header PriceDisplay" id="PriceDisplay">0.00</td>
                                </tr>
                                <tr>
                                    <td class="header" id="CupDisplay">CUP</td>
                                    <td class="header" id="CupVolDisplay">0</td>
                                 <td class="header" id="CupPriceDisplay">0.00</td>
                                </tr>

                                <tr>
                                    <td class="header" >Total</td>
                                    <td class="header" ></td>
                                    <td class="header" id="TotalPrice">0.00</td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- <div style="display: flex;">
                            <p class="header" style="color:gray">PRODUCT: </p> 
                            <p class="header ProductDisplay" id="ProductNameDisplay" style="margin-left:25px;"></p>
                        </div>
                        <div style="display: flex;">
                            <p class="header" style="color:gray">VOLUME: </p> 
                            <p class="header VolumeDisplay" id="VolumeDisplay" style="margin-left:25px;"></p>
                        </div>
                        <div style="display: flex;">
                            <p class="header" style="color:gray">PRICE: </p> 
                            <p class="header PriceDisplay" id="PriceDisplay" style="margin-left:25px;"></p>
                        </div> -->
                        
                    </div>
                    
                    <p id="errorMessage" class="subtitle" style="font-size:30px; padding:40px 0; color:red; display:none;"> * please enter a valid value * </p>
                    <div class="cont-button">
                        <center>
                            <input id="startCollecting" class="btn btn-default" type="button" value="Start" disabled>
                            <input id="cancelCollecting" class="btn btn-default" type="button" value="Cancel">
                        </center>
                    </div>
                </div>
                <div class="cont" id="cont2">
                    <div class="big-box">
                        <div class="input-title" >
                            <p style="font-size:65px;">Amount Inserted</p>
                        </div>
                        <div class="input-number" id="AmountInserted" style="">
                            <div class="money-sign">₱</div>
                            <div class="money-amount">40.00</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Page 7: Did they brought a cup? -->
        <div class="page" id="page7" style="background-color: #404040;">
            <div class="frame" style="display:flex; flex-direction: column;">
                <div class="input-title" style="display: flex; justify-content:center; align-items:center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-question-circle-fill" viewBox="0 0 16 16" style="color:#fff; margin:0 20px;">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247m2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z"/>
                    </svg>
                    <p style="font-size:65px;">Did you bring your own cup?</p>
                </div>
                <div class="content-cont" style="display:flex; flex-direction: row; justify-content: space-around;">
                    <div class="option-cont btn btn-default" id="YesCup">Yes</div>
                    <div class="option-cont btn btn-default" id="NoCup">No</div>
                </div>  
            </div>
        </div>

        <!-- Page 8: Dispensing -->
        <div class="page" id="page8" style="background-color: #404040;">
            <div class="frame" style="display:flex; flex-direction: column;">
                <div class="input-title" style="display: flex; justify-content:center; align-items:center;">
                    <p style="font-size:65px;">DISPENSING...</p>
                </div>
                <div class="content-cont" style="display:flex; flex-direction: row;">
                    <div id="progress-container">
                        <div id="progress-bar"></div>
                        <div id="progress-text">0%</div>
                    </div>
                </div>  
            </div>
        </div>

        <!-- Page 9: Done -->
        <div class="page" id="page9" style="background-color: #404040;">
            <div class="frame" style="display:flex; flex-direction: column;">
                <div class="input-title" style="display: flex; justify-content:center; align-items:center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16" style="color:#fff; margin:0 20px;">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                      </svg>
                    <p id="restartTransaction" style="font-size:65px; cursor: pointer">DONE</p>
                </div> 
            </div>
        </div>


        <!-- Page 10: CUP Dispenser
        <div class="page" id="page10">
            <div class="frame" style="display:flex; flex-direction: row;">
                
                <div class="cont" id="cont1">
                    <div class="cont-header">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        PRODUCTS
                                    </th>
                                    <th>
                                        VOLUME (ml)
                                    </th>
                                    <th>
                                        PRICE
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="header ProductDisplay" id="ProductNameDisplay">LD</td>
                                    <td class="header VolumeDisplay" id="VolumeDisplay">0</td>
                                    <td class="header PriceDisplay" id="PriceDisplay">0.00</td>
                                </tr>
                                <tr>
                                    <td class="header" >CUP</td>
                                    <td class="header" >0</td>
                                    <td class="header" >0.00</td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>
                    
                    <p id="errorMessage" class="subtitle" style="font-size:30px; padding:40px 0; color:red; display:none;"> * please enter a valid value * </p>
                    <div class="cont-button">
                        <center>
                            <input id="startCollecting" class="btn btn-default" type="button" value="Start" disabled>
                            <input id="cancelCollecting" class="btn btn-default" type="button" value="Cancel">
                        </center>
                    </div>
                </div>
                <div class="cont" id="cont2">
                    <div class="big-box">
                        <div class="input-title" >
                            <p style="font-size:65px;">Amount Inserted</p>
                        </div>
                        <div class="input-number" id="AmountInserted" style="padding:140px 0;">
                            <div class="money-sign">₱</div>
                            <div class="money-amount">10.00</div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->


    </div>
    
    
</body>









<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>

    //GLOBAL VAIRABLES
    var product1_name = null;
    var product2_name = null;
    var product3_name = null;
    var product4_name = null;

    var product_60ml  = null;
    var product_80ml  = null;
    var product_125ml = null;
    var product_185ml = null;
    var product_205ml = null;
    var product_cup   = null;

    var product_60ml_rate = null;
    var product_80ml_rate = null;
    var product_125ml_rate = null;
    var product_185ml_rate = null;
    var product_205ml_rate = null;

    

    function collectAllData() {


        product1_name = 'TIDE';
        product2_name = 'ARIEL';
        product3_name = 'OxiClean'; // for special 
        product4_name = 'CUP';
        product_cupsize = '12oz';

        product_60ml = '10.00';
        product_80ml = '15.00';
        product_125ml = '20.00';
        product_185ml = '25.00';
        product_205ml = '30.00';
        product_cupPrice = '5.00';

        product_60ml_rate = 2120;
        product_80ml_rate = 2820;
        product_125ml_rate = 4410;
        product_185ml_rate = 6470;
        product_205ml_rate = 7060;

        // product1_name = null;
        // product2_name = null;
        // product3_name = null; 
        // product4_name = null;
        // product_cupsize = null;

        // product_60ml =  null;
        // product_80ml =  null;
        // product_125ml = null;
        // product_185ml = null;
        // product_205ml = null;
        // product_cupPrice = null;

        // product_60ml_rate =  null;
        // product_80ml_rate =  null;
        // product_125ml_rate = null;
        // product_185ml_rate = null;
        // product_205ml_rate = null;


        // $.ajax({
        //     url:'php/getUserData.php',
        //     type: 'GET',
        //     data: {
        //         tagged:"collectAllData"
        //     },
        //     success: function(res){
        //         console.log(res);
                
        //         product1_name = 'TIDE';
        //         product2_name = 'ARIEL';
        //         product3_name = 'Oxi Clean'; // for special 
        //         product4_name = 'CUP';
        //         product_cupsize = '12oz';

        //         product_60ml = '10.00';
        //         product_80ml = '15.00';
        //         product_125ml = '20.00';
        //         product_185ml = '25.00';
        //         product_205ml = '30.00';
        //         product_cupPrice = '5.00';

        //         product_60ml_rate = 2120;
        //         product_80ml_rate = 2820;
        //         product_125ml_rate = 4410;
        //         product_185ml_rate = 6470;
        //         product_205ml_rate = 7060;
             
        //     }
        // });
    }

    function startLaundrofill() {
        document.getElementById('page2').scrollIntoView({ behavior: 'smooth' });
        // $('#startLoading').hide();
    }
    

    function updateProgressBar(volumeRate) {
        var progressBar = document.getElementById('progress-bar');
        var progressText = document.getElementById('progress-text');

        var progress = 0;
        var totalTime = volumeRate; // Use the provided volume rate as the total time
        var intervalTime = totalTime / 100; // Adjust the interval time based on the total time

        var interval = setInterval(function() {
            progress += 1;
            progressBar.style.width = progress + '%';
            progressText.innerHTML = progress + '%';

            if (progress >= 100) {
                clearInterval(interval);
            }
            
        }, intervalTime);

        
    }

    function suggestLiquidDetergentAmound() {
        var product_name1 = $('#productName1').text();
        document.getElementById('page4_5').scrollIntoView({ behavior: 'smooth' });
        $('.ProductDisplay').text(product_name1);
        var laundry_load = $('#kiloCounter').text();

        if(laundry_load <= 2){
            var LD_vol = "60ml";
            $('#laundry_load').text(laundry_load);
            $('#reco_ld').text(LD_vol);

        }
        else if(laundry_load > 2 && laundry_load <= 4){
            var LD_vol = "80ml";
            $('#laundry_load').text(laundry_load);
            $('#reco_ld').text(LD_vol);
        }
        else if(laundry_load > 4 && laundry_load <= 6){
            var LD_vol = "125ml";
            $('#laundry_load').text(laundry_load);
            $('#reco_ld').text(LD_vol);
        }
        else if(laundry_load > 6 && laundry_load <= 8){
            var LD_vol = "185ml";
            $('#laundry_load').text(laundry_load);
            $('#reco_ld').text(LD_vol);
        }
        else if(laundry_load > 8 && laundry_load <= 10){
            var LD_vol = "205ml";
            $('#laundry_load').text(laundry_load);
            $('#reco_ld').text(LD_vol);
        }
    }


    function suggestLiquidDetergentAmoundForStained() {
        var product_name3 = $('#productName3').text();
        var laundry_load = $('#kiloCounter').text();
        var stain_level = $('#selectedStain').text();

        $('.ProductDisplay').text(product_name3);

        $('#stain_level').text(stain_level);
        $('#laundry_load').text(laundry_load);
        $('#reco_ld_stained').text();

        if(laundry_load <= 2){
            var LD_vol = "60ml";
            $('#laundry_load').text(laundry_load);
            $('#reco_ld').text(LD_vol);

        }
        else if(laundry_load > 2 && laundry_load <= 4){
            var LD_vol = "80ml";
            $('#laundry_load').text(laundry_load);
            $('#reco_ld').text(LD_vol);
        }
        else if(laundry_load > 4 && laundry_load <= 6){
            var LD_vol = "125ml";
            $('#laundry_load').text(laundry_load);
            $('#reco_ld').text(LD_vol);
        }
        else if(laundry_load > 6 && laundry_load <= 8){
            var LD_vol = "185ml";
            $('#laundry_load').text(laundry_load);
            $('#reco_ld').text(LD_vol);
        }
        else if(laundry_load > 8 && laundry_load <= 10){
            var LD_vol = "205ml";
            $('#laundry_load').text(laundry_load);
            $('#reco_ld').text(LD_vol);
        }
    }

    function LiquidDetergentDispensing() {
        var laundry_load = $('#kiloCounter').text();
        var stain_level = $('#selectedStain').text();
        var product_name = $('#ProductNameDisplay').text();
        var product_vol = $('#VolumeDisplay').text();
        var product_price = $('#PriceDisplay').text();

        document.getElementById('page8').scrollIntoView({ behavior: 'smooth' });

        if(product_vol == "60ml"){
            updateProgressBar(3000);
            setTimeout(function() {
                document.getElementById('page9').scrollIntoView({ behavior: 'smooth' });
            }, 3500);
        }
        else if (product_vol == "80ml"){
            updateProgressBar(3500);
            setTimeout(function() {
                document.getElementById('page9').scrollIntoView({ behavior: 'smooth' });
            }, 4000);
        }
        else if (product_vol == "125ml"){
            updateProgressBar(4500);
            setTimeout(function() {
                document.getElementById('page9').scrollIntoView({ behavior: 'smooth' });
            }, 5000);
        }
        else if (product_vol == "185ml"){
            updateProgressBar(6500);
            setTimeout(function() {
                document.getElementById('page9').scrollIntoView({ behavior: 'smooth' });
            }, 7000);
        }
        else if (product_vol == "205ml"){
            updateProgressBar(7500);
            setTimeout(function() {
                document.getElementById('page9').scrollIntoView({ behavior: 'smooth' });
            }, 8000);
        }
    }


    $(document).ready(function() {

        collectAllData();

        $('#productName1').text(product1_name);
        $('#productName2').text(product2_name);
        $('#productName3').text(product3_name);

        //$('#startLoading').hide();

        //Page 1: Start LaundroFill
        $('#mainTitle').on('click', function() {
            document.getElementById('page1').scrollIntoView({ behavior: 'smooth' });
            $('#startLoading').show();
            setTimeout(startLaundrofill, 3000);
        });

        

        //hidden inputs:
        $('#selectedStain').hide();

        //Page 2: Laundry Load
        $('#number_up').on('click', function() {

            var kiloCounter = $('#kiloCounter').text();
            var total = kiloCounter++;
            $('#kiloCounter').text(kiloCounter);
        });

        $('#number_down').on('click', function() {

            var kiloCounter = $('#kiloCounter').text();
            kiloCounter = parseInt(kiloCounter, 10); // Convert to integer
            if (kiloCounter > 0) {
                kiloCounter--;
            } else {
                kiloCounter = 0;
            }
            $('#kiloCounter').text(kiloCounter);

        });

        $('#startBTN').on('click', function() {
            var kiloCounter = $('#kiloCounter').text();

            if(kiloCounter == '0'){
                $('#errorMessage').show();
            }
            else {
                document.getElementById('page3').scrollIntoView({ behavior: 'smooth' });
            }
        });


        //Page 3: Stain Level
        //Stain 1 button (Not Stained)
        $('#stain1').on('click', function(){
            var stainName1 = $('#stainName1').text();
            document.getElementById('page4').scrollIntoView({ behavior: 'smooth' });
            $('#selectedStain').text(stainName1);
        });

        //Stain 2 button (Quite Stained)
        $('#stain2').on('click', function(){
            var stainName2 = $('#stainName2').text();
            document.getElementById('page3_5').scrollIntoView({ behavior: 'smooth' });
            $('#selectedStain').text(stainName2);
           
        });

        //Stain 3 button (Heavily Stained)
        $('#stain3').on('click', function(){
            var stainName3 = $('#stainName3').text();
            document.getElementById('page3_5').scrollIntoView({ behavior: 'smooth' });
            $('#selectedStain').text(stainName3);
            
        });


        //Page 4: Select Laundry Detergent
        $('#product1').on('click', function(){
            // var product_name1 = $('#productName1').text();
            // document.getElementById('page4_5').scrollIntoView({ behavior: 'smooth' });
            // $('.ProductDisplay').text(product_name1);
            // var laundry_load = $('#kiloCounter').text();

            // if(laundry_load <= 2){
            //     var LD_vol = "60ml";
            //     $('#laundry_load').text(laundry_load);
            //     $('#reco_ld').text(LD_vol);

            // }
            suggestLiquidDetergentAmound();
        });

        $('#product2').on('click', function(){
            // var product_name2 = $('#productName2').text();
            // document.getElementById('page4_5').scrollIntoView({ behavior: 'smooth' });
            // $('.ProductDisplay').text(product_name2);

            suggestLiquidDetergentAmound();
        });

        $('#product3').on('click', function(){
            // var product_name3 = $('#productName3').text();
            // document.getElementById('page4_5').scrollIntoView({ behavior: 'smooth' });
            // $('.ProductDisplay').text(product_name3);

            suggestLiquidDetergentAmound();
        });



        //Page 5: Select Laundry Detergent Amount
        $('#volume1').on('click', function(){
            var vol_1 = $('#prod_vol1').text().trim();

            if(vol_1 == "60ml"){
                $('.PriceDisplay').text(product_60ml);
            }
            document.getElementById('page7').scrollIntoView({ behavior: 'smooth' });
            $('.VolumeDisplay').text(vol_1);
        });

        $('#volume2').on('click', function(){
            var vol_2 = $('#prod_vol2').text().trim();
            if(vol_2 == "80ml"){
                $('.PriceDisplay').text(product_80ml);
            }
            document.getElementById('page7').scrollIntoView({ behavior: 'smooth' });
            $('.VolumeDisplay').text(vol_2);
        });

        $('#volume3').on('click', function(){
            var vol_3 = $('#prod_vol3').text().trim();
            if(vol_3 == "125ml"){
                $('.PriceDisplay').text(product_125ml);
            }
            document.getElementById('page7').scrollIntoView({ behavior: 'smooth' });
            $('.VolumeDisplay').text(vol_3);
        });

        $('#volume4').on('click', function(){
            var vol_4 = $('#prod_vol4').text().trim();
            if(vol_4 == "185ml"){
                $('.PriceDisplay').text(product_185ml);
            }
            document.getElementById('page7').scrollIntoView({ behavior: 'smooth' });
            $('.VolumeDisplay').text(vol_4);
        });

        $('#volume5').on('click', function(){
            var vol_5 = $('#prod_vol5').text().trim();
            if(vol_5 == "205ml"){
                $('.PriceDisplay').text(product_205ml);
            }
            document.getElementById('page7').scrollIntoView({ behavior: 'smooth' });
            $('.VolumeDisplay').text(vol_5);
        });


        //Page 6: Amount Inserted
        $('.money-amount').on('click', function() {
            var insertedAmount = $('.money-amount').text();
            var amountToPay = $('#TotalPrice').text();
            var insertedAmountValue = parseFloat(insertedAmount.trim());
            var amountToPayValue = parseFloat(amountToPay.trim());

            if (insertedAmountValue >= amountToPayValue ) {
                $('#startCollecting').attr('disabled', false);
            }
            else{
                $('#startCollecting').attr('disabled', true);
            }

            $('#startCollecting').on('click', function() {
                LiquidDetergentDispensing();
            });
        });
        

        //Page 3_5: Use Laundry Detergent for Stain
        $('#YesStrongLD').on('click', function() {


            suggestLiquidDetergentAmoundForStained();
            document.getElementById('page4_5').scrollIntoView({ behavior: 'smooth' });
        });

        $('#NoStrongLD').on('click', function() {
            document.getElementById('page4').scrollIntoView({ behavior: 'smooth' });
        });

        //PAGE 4_5: Suggest Amount of Liquid Detergent
        $('#YesLDAmount').on('click', function() {
            var reco_vol = $('#reco_ld').text();
            var laundry_load = $('#laundry_load').text(); 

            $('.VolumeDisplay').text(reco_vol);
            if(reco_vol == "60ml"){
                $('.PriceDisplay').text(product_60ml);
            }
            else if(reco_vol == "80ml"){
                $('.PriceDisplay').text(product_80ml);
            }
            else if(reco_vol == "125ml"){
                $('.PriceDisplay').text(product_125ml);
            }
            else if(reco_vol == "185ml"){
                $('.PriceDisplay').text(product_185ml);
            }
            else if(reco_vol == "205ml"){
                $('.PriceDisplay').text(product_205ml);
            }

            document.getElementById('page7').scrollIntoView({ behavior: 'smooth' });
        });

        $('#NoLDAmount').on('click', function() {
            document.getElementById('page5').scrollIntoView({ behavior: 'smooth' });
        });





        //Page 7: Yes CUP
        $('#YesCup').on('click', function() {

            document.getElementById('page6').scrollIntoView({ behavior: 'smooth' });

            var ProductName = $('#ProductNameDisplay').text().trim();
            var ProductVol = $('#VolumeDisplay').text().trim();
            var ProductPrice = parseFloat($('#PriceDisplay').text().trim());

            var Cup = $('#CupDisplay').text().trim();
            var CupVol = $('#CupVolDisplay').text().trim();
            var CupPrice = parseFloat($('#CupPriceDisplay').text().trim());

            var TotalPrice = (ProductPrice + CupPrice).toFixed(2);

            $('#TotalPrice').text(TotalPrice);
        
        });

        $('#NoCup').on('click', function() {
            document.getElementById('page6').scrollIntoView({ behavior: 'smooth' });

            var ProductName = $('#ProductNameDisplay').text().trim();
            var ProductVol = $('#VolumeDisplay').text().trim();
            var ProductPrice = parseFloat($('#PriceDisplay').text().trim());

            var Cup = $('#CupDisplay').text(product4_name);
            var CupVol = $('#CupVolDisplay').text(product_cupsize);
            var CupPrice = $('#CupPriceDisplay').text(product_cupPrice);
            var CupPriceConverted = parseFloat(product_cupPrice.trim());

            var TotalPrice = (ProductPrice + CupPriceConverted).toFixed(2);

            $('#TotalPrice').text(TotalPrice);
        });

        $('#cancelCollecting').on('click',function(){
            window.location.href = "index.php";
        });


        
        $('#restartTransaction').on('click', function() {
            // code the saving of the transactions
            
            
            window.location.href = "index.php";
        });





        
    }); 


</script>

<style>

body {
    /* overflow: hidden; */
    display: inline-flex;
    padding: 0;
    margin: 0;
    width: 100%;
    justify-content: center;
    align-items: center;
}

@font-face {
    font-family: Inter;
    src: url(fonts/Inter.ttf);
}

.container {
    max-width: 100%;
    height: auto;
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

.page {
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    border: 1px solid #bbbbbb;
    align-items: center;
}

.frame {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    width: 90%;
}

.maint-title-cont {
    width: 100%;
    display: flex;
    align-items: center;
    flex-direction: column;
    align-content: space-around;
}

#mainTitle {
    font-size: 100px;
    letter-spacing: 10px;
    width: 100%;
}

.header {
    color: #404040;
    font-family: Inter;
    font-size: 40px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
}

.cont {
    font-family: Inter;
}

.subtitle {
    color: #404040;
    font-family: Inter;
    font-size: 48px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

.frame_1 {
    display: flex;
    justify-content: center;
    align-items: center;
    /* gap: 158px; */
}

.frame_1,
p {
    color: #404040;
    font-family: Inter;
    font-size: 36px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    text-align: center;
}

.frame_1+div {
    width: 242px;
    height: 307px;
}

.box {
    width: 250px;
    height: 200px;
    border-radius: 30px;
    background: #404040;
    transition: width 0.3s, height 0.3s;
    cursor: pointer;
    margin: 0 30px;
}

.laundryInfo {
    margin-left: 36px;
    font-size: 32px;
}

.button {
    color: white;
}

.burger {
    margin-top: 24px;
    display: grid;
    grid-row-gap: 20px;
}

input[type=button] {
    height: 72px;
    width: 90%;
    font-size: 32px;
    display: block;
    background-color: gray;
    color: white;
    border-radius: 10px;
    border: none;
    outline: none;
    transition: linear 0.3s;
}

.burger input:hover {
    scale: 102%;
    color: #161616;
    transition: linear 0.3s;
    /* box-shadow: 1px 4px 8px #404040; */
}

.box:hover {
    width: 300px;
    height: 260px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
}


/* products */

.top-frame_1 {
    width: 100%;
    display: flex;

}


.big-box {
    width: 95%;
    height: 563px;
    border-radius: 30px;
    background: #404040;
    /* padding: 10px; */
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 45px;
}

.input-number {
    width: 100%;
    height: 80%;
    /* border: 1px solid black; */
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 100px;
}

.input-number-buttons {
    width: 100%;
    height: 80%;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: flex-end;
}

.input-title {
    width: 100%;
    text-align: center;
}

.input-title p {
    color: #fff;
    font-size: 38px;
}

.number-arrow {
    width: 100%;
    /* height: 50%; */
    /* border: 1px solid black; */
}

.cont {
    width: 50%;
    height: 100%;
}

#cont1 {
    width: 50%;
    /* height: 100%; */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

#cont2 {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
}

.cont-button {
    padding: 30px;
}

.cont-button input[type=button]{
    margin: 20px;
}

/* .cont-button input[type=button]:hover{
    transform: scale(1.1);
} */

.cont-header {
    /* padding:65px; */
}

.cont-header p {
    text-align: start;
    font-size: 55px;
}

/* .content-cont {
    width: 100%;
} */

.option-cont {
    width: 300px;
    height: 200px;
    border-radius: 30px;
    background: #bbbbbb;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 35px;
    font-weight: bold;
    color: #fff;
    /* margin: 100px; */
    transition: linear 0.3s;
}

.option-cont:hover {
    width: 310px;
    height: 210px;
    
}

.content-cont {
    width: 100%;
}

#progress-container {
    width: 60%;
    margin: 50px auto;
    border: 1px solid #ccc;
    height: 30px;
    position: relative;
}

#progress-bar {
    height: 100%;
    width: 0;
    background-color: #4CAF50;
}

#progress-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #000;
}

#ld_suggest {
    font-size: 60px;
    margin: 20px 0;
}

#restartTransaction {
    cursor: pointer;
}

#startLoading {
    cursor: pointer;
}



</style>


</html>

