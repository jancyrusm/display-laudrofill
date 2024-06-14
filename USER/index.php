<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.google.com/specimen/Kumbh+Sans" rel="stylesheet">
    <script src="/socket.io/socket.io.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid">

        <!-- PAGE 1 : SPLASH SCREEN -->
        <div  id="splash" class="page " style="width:100%; height:100vh;">
            <div class="d-flex row justify-content-center align-items-center" style="width:100%; height:100vh;">
               <div class="card border">
                <div class="card-header text-center">
                    <div class="main-header">
                        <span class="mh-left">LAUNDRO</span><span class="mh-right">FILL</span>
                    </div>
                </div>
                <div class="card-body"></div>
                    <div class="card-form">
                        <div class="form-group">
                           
                        </div>
                    </div>   
               </div>
            </div>
        </div>

        <!-- PAGE 2 : MAIN -->
        <div id="main" class="page hidden" style="width:100%; height:100vh;">
            <div class="d-flex row justify-content-center align-items-center" style="width:100%; height:100vh;">
            <div class="card border">
                <div class="card-header text-center">
                    <div class="main-header">
                        <span class="mh-left">LAUNDRO</span><span class="mh-right">FILL</span>
                    </div>
                    <div class="sub-header">
                        <span>Type of Service</span>
                    </div>
                </div>
                <div class="card-body"></div>
                    <div class="card-form">
                        <div class="form-group">
                            <table class="table-admin-main" style="width:100%;">
                                <tr>
                                    <!-- NORMAL Refill -->
                                   <td class="w-25">
                                    <div class="box" id="main_normal_refill">
                                        <span id="" class="w-100 text-wrap">Normal Refill</span>
                                    </div>
                                   </td>

                                   <!-- SMART Dispensing -->
                                   <td class="w-25">
                                    <div class="box" id="main_smart_dispense">
                                        <span id="" class="w-100 text-wrap">Smart Dispense</span>
                                    </div>
                                   </td>

                                </tr>
                            </table>
                        </div>
                    </div>   
            </div>
            </div>
        </div>

        <!-- PAGE 2.1 :NORMAL REFILL -->
        <div id="normal_refill" class="page hidden" style="width:100%; height:100vh;">
            <div style="width: 100%; margin:auto;">
                <button class="btn_back" style="width: 10%;" > < </button>
            </div>
            <div class="d-flex justify-content-center align-items-center" style="width:100%; gap:20px;">
            <div class="card border">
                <div class="card-header text-center">
                    <div class="main-header">
                        <span class="mh-left">LAUNDRO</span><span class="mh-right">FILL</span>
                    </div>
                    <div class="sub-header">
                        <span>Normal Refill</span>
                    </div>
                    
                </div>
                <div class="card-body"></div>
                    <div class="card-form">
                        <div class="form-group">
                            <table class="table-admin-main" style="width:100%;">
                                <tr>
                                   <td class="w-25">
                                    <div class="box-m" id="">
                                        <span id="" class="w-100 text-wrap">
                                            Please place your refillable container in the dispenser.
                                        </span>
                                        <span id="" class="w-100 text-wrap" style="font-size:25px; color:#706E6E;">
                                            And then, press start.
                                        </span>
                                    </div>
                                   </td>
                                </tr>
                                <tr>
                                    <td class="w-25">
                                        <button class="w-100" style="margin: 15px 0 0 0; height:13vh;" id="nr_start">
                                            START
                                        </button>
                                    </td>
                                 </tr>
                            </table>
                        </div>
                    </div>   
                </div>
            </div>
        </div>

        <!-- PAGE 2.1 :VOLUME OPTIONS -->
        <div id="p_volume" class="page hidden" style="width:100%; height:100vh;">
            <div style="width: 100%; margin:auto;">
                <button class="btn_back" style="width: 10%;" > < </button>
            </div>
            <div class="d-flex justify-content-center align-items-center" style="width:100%; gap:20px;">
            <div class="card border">
                <div class="card-header text-center">
                    <div class="main-header">
                        <span class="mh-left">LAUNDRO</span><span class="mh-right">FILL</span>
                    </div>
                    <div class="sub-header">
                        <span></span>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="card-form">
                        <div class="form-group">
                            <table class="table-admin-main" style="width:100%;">
                                <tr>
                                    <td class="w-25" colspan="4">
                                        <div class="box-m" id="" style="margin:3%;">
                                            <span id="" class="w-100 text-wrap">
                                                Please select your desired volume.
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                   <td class="w-25">
                                    <div class="box" id="btn_volume_name1">
                                        <span id="volume_name1" class=" w-100 text-wrap">Volume 1</span>
                                    </div>
                                   </td>

                                   <td class="w-25">
                                    <div class="box" id="btn_volume_name2">
                                        <span id="volume_name2" class="w-100 text-wrap">Volume 2</span>
                                    </div>
                                   </td>

                                   <td class="w-25">
                                    <div class="box" id="btn_volume_name3">
                                        <span id="volume_name3" class="w-100 text-wrap">Volume 3</span>
                                    </div>
                                   </td>

                                   <td class="w-25">
                                    <div class="box" id="btn_volume_name4">
                                        <span id="volume_name4" class="w-100 text-wrap">Volume 4</span>
                                    </div>
                                   </td>

                                </tr>
                            </table>
                        </div>
                    </div>  
                </div> 
            </div>
            </div>
        </div>

        <!-- PAGE 2.1 :PRODUCTS OPTIONS -->
        <div id="p_product" class="page hidden" style="width:100%; height:100vh;">
            <div style="width: 100%; margin:auto;">
                <button class="btn_back" style="width: 10%;" > < </button>
            </div>
            <div class="d-flex justify-content-center align-items-center" style="width:100%; gap:20px;">
            <div class="card border">
                <div class="card-header text-center">
                    <div class="main-header">
                        <span class="mh-left">LAUNDRO</span><span class="mh-right">FILL</span>
                    </div>
                    <div class="sub-header">
                        <span></span>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="card-form">
                        <div class="form-group">
                            <table class="table-admin-main" style="width:100%;">
                                <tr>
                                    <td class="w-25" colspan="3">
                                        <div class="box-m" id="" style="margin:3%;">
                                            <span id="" class="w-100 text-wrap">
                                                Please select your desired product.
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                   <td class="w-25">
                                    <div class="box" id="btn_product_name1">
                                        <span id="product_name1" class="w-100 text-wrap">Product 1</span>
                                    </div>
                                   </td>

                                   <td class="w-25">
                                    <div class="box" id="btn_product_name2">
                                        <span id="product_name2" class="w-100 text-wrap">Product 2</span>
                                    </div>
                                   </td>

                                   <td class="w-25">
                                    <div class="box" id="btn_product_name3">
                                        <span id="product_name3" class="w-100 text-wrap">Product 3</span>
                                    </div>
                                   </td>
                                </tr>
                            </table>
                        </div>
                    </div>  
                </div> 
            </div>
            </div>
        </div>

        <!-- PAGE 2.1 :Transaction Screen -->
        <div id="p_b_transaction" class="page hidden" style="width:100%; height:100vh;">
            <div style="width: 100%; margin:auto;">
                <button class="btn_back" style="width: 10%;" > < </button>
            </div>
            <div class="d-flex justify-content-center align-items-center" style="width:100%; gap:20px;">
            <div class="card border">
                <div class="card-header text-center">
                    <div class="main-header">
                        <span class="mh-left">LAUNDRO</span><span class="mh-right">FILL</span>
                    </div>
                    <div class="sub-header">
                        <span></span>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="card-form">
                        <div class="form-group">
                            <table class="table-admin-main" style="width:100%;">
                                <tr>
                                    <td class="d-flex">
                                        <div class="fg-left">

                                            <div class="form-group d-flex align-items-center tran-input" style="font-size:30px; gap:10px;">
                                                <table id="nTrans_table">
                                                    <tr>
                                                        <!-- Service -->
                                                        <td><label for="nrTran_service">Service: </label></td>
                                                        <td><input type="text" class="nrTran_service form-control" id="nrTran_service" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <!-- Volume -->
                                                        <td><label for="nrTran_volume">Volume: </label></td>
                                                        <td><input type="text" class="nrTran_volume form-control" id="nrTran_volume" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <!-- Product -->
                                                        <td><label for="nrTran_product">Product: </label></td>
                                                        <td><input type="text" class="nrTran_product form-control" id="nrTran_product" readonly></td>
                                                    </tr>
                                                    <tr>
                                                         <!-- Price -->
                                                        <td><label for="nrTran_price">Price: </label></td>
                                                        <td><input type="text" class="nrTran_price form-control" style="text-align:right; font-weight:600;" id="nrTran_price" readonly></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-50">
                                        <div class="fg-right">
                                            <div class="fgr-message">
                                                <label>
                                                    Please Confirm Service</label>
                                                <span style="font-size: 25px;">
                                                    As you proceed, you won't be able to cancel the service
                                                </span>
                                                <div class="d-flex justify-content-between" style="margin: 5% 0px;">
                                                    <button id="btn_cancel_trans" style="width:48%;">CANCEL</button>
                                                    <button id="btn_proceed_trans" style="width:48%;">PROCEED</button>
                                                </div>
                                            </div>

                                            <!-- CHANGE -->
                                            <!-- <div class="form-group fgr d-flex align-items-center tran-input" style="font-size:30px; gap:10px;">
                                                <label for="nrTran_change">Change: </label>
                                                <input type="text" class="form-control" id="nrTran_change" placeholder="">
                                            </div> -->
                                        </div>
                                    </td>           
                                    
                                </tr>
                               
                            </table>
                        </div>
                    </div>  
                </div> 
            </div>
            </div>
        </div>

        <!-- PAGE 2.1 :Transaction Screen -->
        <div id="p_transaction" class="page hidden" style="width:100%; height:100vh;">
            <!-- <div style="width: 100%; margin:auto;">
                <button class="btn_back" style="width: 10%;" > < </button>
            </div> -->
            <div class="d-flex justify-content-center align-items-center" style="width:100%; gap:20px;">
            <div class="card border">
                <div class="card-header text-center">
                    <div class="main-header">
                        <span class="mh-left">LAUNDRO</span><span class="mh-right">FILL</span>
                    </div>
                    <div class="sub-header">
                        <span></span>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="card-form">
                        <div class="form-group">
                            <table class="table-admin-main" style="width:100%;">
                                <tr>
                                    <td class="d-flex">
                                        <div class="fg-left">
                                            <div class="form-group d-flex align-items-center tran-input" style="font-size:30px; gap:10px;">
                                                <table id="nTrans_table">
                                                    <tr>
                                                        <!-- Service -->
                                                        <td><label for="nrTran_service">Service: </label></td>
                                                        <td><input type="text" class="nrTran_service form-control" id="nrTran_service" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <!-- Volume -->
                                                        <td><label for="nrTran_volume">Volume: </label></td>
                                                        <td><input type="text" class="nrTran_volume form-control" id="nrTran_volume" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <!-- Product -->
                                                        <td><label for="nrTran_product">Product: </label></td>
                                                        <td><input type="text" class="nrTran_product form-control" id="nrTran_product" readonly></td>
                                                    </tr>
                                                    <tr>
                                                         <!-- Price -->
                                                        <td><label for="nrTran_price">Price: </label></td>
                                                        <td><input type="text" class="nrTran_price form-control" style="text-align:right; font-weight:600;" id="nrTran_price" readonly></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </td>           
                                    <td class="w-50">
                                        <div class="fg-right">
                                            <div class="form-group fgr fgr-message">
                                                <label for="nrTran_payment">Insert payment</label>
                                                <input type="number" class="nrTran_payment form-control" id="nrTran_payment" >

                                                <div class="form-group d-flex align-items-center tran-input" style="font-size:30px; gap:10px;">
                                                    <label for="nrTran_change">Change: </label>
                                                    <input type="text" class="nrTran_change form-control" id="nrTran_change" placeholder="">
                                                </div>
                                                <div class="form-group d-flex align-items-center tran-input" style="font-size:30px;">
                                                    <button id="btn_dispense_trans" style="width:100%;" class="hidden">DISPENSE</button>
                                                </div>
                                            </div>
                                            

                                            <!-- CHANGE -->
                                            <!-- <div class="form-group fgr d-flex align-items-center tran-input" style="font-size:30px; gap:10px;">
                                                <label for="nrTran_change">Change: </label>
                                                <input type="text" class="form-control" id="nrTran_change" placeholder="">
                                            </div> -->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <!-- <td colspan="2" style="text-align:right; padding:4% 0;">
                                        <button id="btn_cancel_trans">CANCEL</button>
                                        <button id="btn_proceed_trans" style="width:200px;">SUBMIT</button>
                                        <button id="btn_dispense_trans" style="width:10%;" class="hidden">DISPENSE</button>
                                    </td> -->
                                </tr>
                            </table>
                        </div>
                    </div>  
                </div> 
            </div>
            </div>
        </div>

        <!-- PAGE 2.1 :Dispensing -->
        <div id="p_dispensing" class="page hidden" style="width:100%; height:100vh;">
            <!-- <div style="width: 100%; margin:auto;">
                <button class="btn_back" style="width: 10%;" > < </button>
            </div> -->
            <div class="d-flex justify-content-center align-items-center" style="width:100%; gap:20px;">
            <div class="card border">
                <div class="card-header text-center">
                    <div class="main-header">
                        <span class="mh-left">LAUNDRO</span><span class="mh-right">FILL</span>
                    </div>
                    <div class="sub-header">
                        <span></span>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="card-form">
                        <div class="form-group">
                            <table class="table-admin-main" style="width:100%;">
                                <tr>
                                    <td style="height:35vh;">
                                        <div class="container">
                                            <div class="progress-bar-container">
                                                <span style="letter-spacing: 25px;">DISPENSING</span><span class="loading-dots"></span>
                                                <!-- <div class="progress mt-3">
                                                    <div id="progress-bar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="stop-container d-flex w-100">
                                            <div class="sc-message" style="width:70%;">
                                                <span style="text-wrap:wrap; font-size:25px; line-height: 1;">
                                                    Incase the dispensing overflows,  press the emergency stop.
                                                </span>
                                            </div>
                                           <div class="d-flex justify-content-center flex-column" style="width:30%;">
                                                <button class="w-100">STOP</button>
                                           </div>
                                        </div> 
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>  
                </div> 
            </div>
            </div>
        </div>

        <!-- PAGE 2.1 :FINISH -->
        <div id="p_finish" class="page hidden" style="width:100%; height:100vh;">
            <!-- <div style="width: 100%; margin:auto;">
                <button class="btn_back" style="width: 10%;" > < </button>
            </div> -->
            <div class="d-flex justify-content-center align-items-center" style="width:100%; gap:20px;">
            <div class="card border">
                <div class="card-header text-center">
                    <div class="main-header">
                        <span class="mh-left">LAUNDRO</span><span class="mh-right">FILL</span>
                    </div>
                    <div class="sub-header">
                        <span></span>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="card-form">
                        <div class="form-group">
                            <table class="table-admin-main" style="width:100%;">
                                <tr>
                                    <td style="height: 50vh;">
                                        <div class="stop-container d-flex w-100 justify-content-center align-items-center" id="btn_finish" style="height:20vh;">
                                            <span style="text-wrap:wrap; font-size:25px; text-align:center;">
                                                DONE!
                                            </span>
                                        </div> 
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>  
                </div> 
            </div>
            </div>
        </div>



        <!-- PAGE 2.1 :SMART DISPENSING -->
        <div id="smart_dispense" class="page hidden" style="width:100%; height:100vh;">
            <div style="width: 100%; margin:auto;">
                <button class="btn_back" style="width: 10%;" > < </button>
            </div>
            <div class="d-flex justify-content-center align-items-center" style="width:100%; gap:20px;">
            <div class="card border">
                <div class="card-header text-center">
                    <div class="main-header">
                        <span class="mh-left">LAUNDRO</span><span class="mh-right">FILL</span>
                    </div>
                    <div class="sub-header">
                        <span>Smart Dispense</span>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="card-form">
                        <div class="form-group">
                            <table class="table-admin-main" style="width:100%;">
                                <tr>
                                    <td class="w-50">
                                        <div class="fg-left">
                                            <div>
                                                <p>
                                                    Please indicate how heavy is your laundry.
                                                </p>
                                            </div>
                                            <div>
                                                <button class="w-100" id="sd_next">NEXT</button>
                                            </div>
                                            
                                        </div>
                                    </td>           
                                    <td class="w-50">
                                        <div class="fg-right">
                                            <div class="form-group fgr">
                                                <input type="number" class="form-control" id="nrTran_load" placeholder="0" step="0.01" style="height:45vh;">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
        </div>

        <!-- PAGE 2.1 :FABRIC OPTIONS -->
        <div id="p_fabric" class="page hidden" style="width:100%; height:100vh;">
            <div style="width: 100%; margin:auto;">
                <button class="btn_back" style="width: 10%;" > < </button>
            </div>
            <div class="d-flex justify-content-center align-items-center" style="width:100%; gap:20px;">
            <div class="card border">
                <div class="card-header text-center">
                    <div class="main-header">
                        <span class="mh-left">LAUNDRO</span><span class="mh-right">FILL</span>
                    </div>
                    <div class="sub-header">
                        <span></span>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="card-form">
                        <div class="form-group">
                            <table class="table-admin-main" style="width:100%;">
                                <tr>
                                    <td class="w-25" colspan="3">
                                        <div class="box-m" id="" style="margin:3%;">
                                            <span id="" class="w-100 text-wrap">
                                                Please select your fabric type.
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                   <td class="w-25">
                                    <div class="box" id="btn_fabric_name1">
                                        <span id="fabric_name1" class="w-100 text-wrap">Fabric 1</span>
                                    </div>
                                   </td>

                                   <td class="w-25">
                                    <div class="box" id="btn_fabric_name2">
                                        <span id="fabric_name2" class="w-100 text-wrap">Fabric 2</span>
                                    </div>
                                   </td>

                                   <td class="w-25">
                                    <div class="box" id="btn_fabric_name3">
                                        <span id="fabric_name3" class="w-100 text-wrap">Fabric 3</span>
                                    </div>
                                   </td>
                                </tr>
                            </table>
                        </div>
                    </div>  
                </div> 
            </div>
            </div>
        </div>

        <!-- PAGE 2.1 :STAIN OPTIONS -->
        <div id="p_stain" class="page hidden" style="width:100%; height:100vh;">
            <div style="width: 100%; margin:auto;">
                <button class="btn_back" style="width: 10%;" > < </button>
            </div>
            <div class="d-flex justify-content-center align-items-center" style="width:100%; gap:20px;">
            <div class="card border">
                <div class="card-header text-center">
                    <div class="main-header">
                        <span class="mh-left">LAUNDRO</span><span class="mh-right">FILL</span>
                    </div>
                    <div class="sub-header">
                        <span></span>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="card-form">
                        <div class="form-group">
                            <table class="table-admin-main" style="width:100%;">
                                <tr>
                                    <td class="w-25" colspan="3">
                                        <div class="box-m" id="" style="margin:3%;">
                                            <span id="" class="w-100 text-wrap">
                                                Please select your level of Stain.
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                   <td class="w-25">
                                    <div class="box" id="btn_stain_name1">
                                        <span id="stain_name1" class="w-100 text-wrap">Stain 1</span>
                                    </div>
                                   </td>

                                   <td class="w-25">
                                    <div class="box" id="btn_stain_name2">
                                        <span id="stain_name2" class="w-100 text-wrap">Stain 2</span>
                                    </div>
                                   </td>

                                   <td class="w-25">
                                    <div class="box" id="btn_stain_name3">
                                        <span id="stain_name3" class="w-100 text-wrap">Stain 3</span>
                                    </div>
                                   </td>
                                </tr>
                            </table>
                        </div>
                    </div>  
                </div> 
            </div>
            </div>
        </div>

        <!-- PAGE 2.2: SUGGEST VOLUME -->
        <div id="p_suggest" class="page hidden" style="width:100%; height:100vh;">
            <div style="width: 100%; margin:auto;">
                <button class="btn_back" style="width: 10%;" > < </button>
            </div>
            <div class="d-flex justify-content-center align-items-center" style="width:100%; gap:20px;">
            <div class="card border" style="width:80%;">
                <div class="card-header text-center">
                    <div class="main-header">
                        <span class="mh-left">LAUNDRO</span><span class="mh-right">FILL</span>
                    </div>
                    <div class="sub-header">
                        <span></span>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="card-form">
                        <div class="form-group">
                            <table class="table-admin-main" style="width:100%;">
                                <tr>
                                <td class="w-25">
                                    <div class="box-m" id="" style="padding: 10px 2%;">
                                        <span id="" class="w-100 text-wrap">
                                            For a <span id="ps_fabric" class="sd-inputs"></span> type of fabric, 
                                            with <span id="ps_stain" class="sd-inputs"></span> level of stain,
                                            we suggest <span id="ps_volume" class="sd-inputs"></span> of liquid detergent for better cleaning.
                                        </span>
                                        <span id="" class="w-100 text-wrap" style="font-size:25px; color:#706E6E;">
                                            Do you want to proceed with the recommended volume?
                                        </span>
                                    </div>
                                </td>
                                </tr>
                                <tr>
                                    <td class="w-25">
                                        <div class="d-flex" style="gap:40px;">
                                            <button class="w-100" style="margin: 15px 0 0 0; height:13vh;" id="sd_NO">
                                                NO
                                            </button>
                                            <button class="w-100" style="margin: 15px 0 0 0; height:13vh;" id="sd_YES">
                                                YES
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div> 
            </div>
            </div>
            </div>
        </div>

        

       


        <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



       


    
    
    
    
    </div>

    <div class="modal-div">
        <div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary">Save changes</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
