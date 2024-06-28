//const { load } = require("mime");

//VARIABLES
var splash              = $("#splash");
var main                = $("#main");
var normal_refill       = $("#normal_refill");
var smart_dispensing    = $("#smart_dispense");
var p_volume            = $("#p_volume");
var p_product           = $("#p_product");
var p_fabric            = $("#p_fabric");
var p_stain             = $("#p_stain");
var p_suggest           = $("#p_suggest");
var p_b_transaction     = $("#p_b_transaction");
var p_transaction       = $("#p_transaction");
var p_dispensing        = $("#p_dispensing");
var p_finish            = $("#p_finish");


//VARIABLES FROM DATABASE
var product_name1 = "Ariel";
var product_name2 = "Tide";
var product_name3 = "Breeze";

var volume_name1 = "60ml";
var volume_name2 = "120ml";
var volume_name3 = "180ml";
var volume_name4 = "240ml";

var nr_volume_name1 = "100ml";
var nr_volume_name2 = "250ml";
var nr_volume_name3 = "500ml";
var nr_volume_name4 = "1000ml";

var fabric_name1 = "100% Cotton";
var fabric_name2 = "Polyester";
var fabric_name3 = "Cotton-Polyester Blend";

var stain_name1 = "LOW";
var stain_name2 = "MEDIUM";
var stain_name3 = "HIGH";


//SMART DISPENSE PRICE
var price_prod1_vol1 = "3.00";
var price_prod1_vol2 = "6.00";
var price_prod1_vol3 = "9.00";
var price_prod1_vol4 = "12.00";

var price_prod2_vol1 = "3.00";
var price_prod2_vol2 = "6.00";
var price_prod2_vol3 = "9.00";
var price_prod2_vol4 = "12.00";

var price_prod3_vol1 = "3.00";
var price_prod3_vol2 = "6.00";
var price_prod3_vol3 = "9.00"; 
var price_prod2_vol4 = "12.00";

// NORMAL REFILL
var price_prod1_nr_vol1 = "5.00";
var price_prod1_nr_vol2 = "12.00";
var price_prod1_nr_vol3 = "25.00";
var price_prod1_nr_vol4 = "30.00";

var price_prod2_nr_vol1 = "5.00";
var price_prod2_nr_vol2 = "12.00";
var price_prod2_nr_vol3 = "25.00";
var price_prod2_nr_vol4 = "30.00";

var price_prod3_nr_vol1 = "5.00";
var price_prod3_nr_vol2 = "12.00";
var price_prod3_nr_vol3 = "25.00";
var price_prod3_nr_vol4 = "30.00";


// DISPENSE RATE
var dispense_nr_vol1 = 8575;
var dispense_nr_vol2 = 21437;
var dispense_nr_vol3 = 42875;
var dispense_nr_vol4 = 85750;

var dispense_vol1 = 5170;
var dispense_vol2 = 10260;
var dispense_vol3 = 15420;
var dispense_vol4 = 20580;





//VARIABLES TO BE SAVED
var service_type = null;
var selected_volume = null;
var selected_product = null;
var total_price = null;
var customer_payment = null;
var laundry_load = null;
var selected_fabric = null;
var selected_stain = null;

var val_service_type        = $(".nrTran_service");
var val_selected_volume     = $(".nrTran_volume");
var val_selected_product    = $(".nrTran_product");
var val_total_price         = $(".nrTran_price"); 
var val_customer_payment    = $(".nrTran_payment");
var val_laundry_load        = $(".nrTran_load");
var val_change              = $(".nrTran_change");

var val_selected_fabric     = $(".sdTran_fabric");
var val_selected_stain     = $(".sdTran_stain");



function pageSelected(page) {
    splash.addClass("hidden");          
    main.addClass("hidden");            
    normal_refill.addClass("hidden");   
    smart_dispensing.addClass("hidden");
    p_volume.addClass("hidden");       
    p_product.addClass("hidden");       
    p_fabric.addClass("hidden");        
    p_stain.addClass("hidden");        
    p_suggest.addClass("hidden");
    p_b_transaction.addClass("hidden");         
    p_transaction.addClass("hidden");  
    p_dispensing.addClass("hidden");   
    p_finish.addClass("hidden");
    
     // Show the selected section
     if (page === "splash") {
        splash.removeClass("hidden");
    } 
    else if (page === "main") {

        service_type = null;
        selected_volume = null;
        selected_product = null;
        total_price = null;
        customer_payment = null;
        laundry_load = null;
        selected_fabric = null;
        selected_stain = null;
        
        main.removeClass("hidden");

        $("#main_normal_refill").on('click', function() {
            pageSelected("normal_refill");
            service_type = "Normal Refill";
            val_service_type.val(service_type);
            console.log("SERVICE TYPE: " + service_type);
            sendValue("1"); //SERIAL MONITOR
        });

        $("#main_smart_dispense").on('click', function() {
            pageSelected("smart_dispense");
            service_type = "Smart Dispense";
            val_service_type.val(service_type);
            console.log("SERVICE TYPE: " + service_type);
            sendValue("2"); //SERIAL MONITOR
        });

        disableBackButton();
    } 
    else if (page === "normal_refill") {
        normal_refill.removeClass("hidden");
    } else if (page === "smart_dispense") {
        smart_dispensing.removeClass("hidden");
    } else if (page === "p_volume") {

        if(service_type === "Normal Refill"){
            $("#volume_name1").text(nr_volume_name1);
            $("#volume_name2").text(nr_volume_name2);
            $("#volume_name3").text(nr_volume_name3);
            $("#volume_name4").text(nr_volume_name4);
        }
        else {
            $("#volume_name1").text(volume_name1);
            $("#volume_name2").text(volume_name2);
            $("#volume_name3").text(volume_name3);
            $("#volume_name4").text(volume_name4);
        }

        p_volume.removeClass("hidden");


    } else if (page === "p_product") {
        p_product.removeClass("hidden");
    } else if (page === "p_fabric") {
        p_fabric.removeClass("hidden");
    } else if (page === "p_stain") {
        p_stain.removeClass("hidden");
    } else if (page === "p_suggest") {

        smartVolumeSuggest();
        p_suggest.removeClass("hidden");

    } else if (page === "p_b_transation") {
        p_b_transaction.removeClass("hidden");
    }
    else if (page === "p_transaction") {
        getUnitPrice();
        p_transaction.removeClass("hidden");
        $("#btn_dispense_trans").addClass('hidden');
        $(".nrTran_payment").val("");

    } else if (page === "p_dispensing") {
        p_dispensing.removeClass("hidden");
        setTimeout(function() {
            dispenseLoading();
        }, 1000);
        
    } else if (page === "p_finish") {
        p_finish.removeClass("hidden");
    }
}

function transactionLog() {

    if(service_type === "Normal Refill"){
        var normal_refill_info = [];

        normal_refill_info.push({
            service: service_type,
            volume: selected_volume,
            product: selected_product,
            price: total_price
        });

        console.log(normal_refill_info);
    }
}


function loadAllData() {


    $("#product_name1").text(product_name1);
    $("#product_name2").text(product_name2);
    $("#product_name3").text(product_name3);

    $("#fabric_name1").text(fabric_name1);
    $("#fabric_name2").text(fabric_name2);
    $("#fabric_name3").text(fabric_name3);

    $("#fabric_name1").text(fabric_name1);
    $("#fabric_name2").text(fabric_name2);
    $("#fabric_name3").text(fabric_name3);

    $("#stain_name1").text(stain_name1);
    $("#stain_name2").text(stain_name2);
    $("#stain_name3").text(stain_name3);
}

function getUnitPrice() {

    var volume = $(".nrTran_volume").val();
    var product = $(".nrTran_product").val();

    var price;
    
    /////////////// NORMAL REFILL  ///////////////////////////////////
    // product 1
    if(volume === nr_volume_name1 && product === product_name1) {
        price = price_prod1_nr_vol1;
    } 
    else if(volume === nr_volume_name2 && product === product_name1) {
        price = price_prod1_nr_vol2;
    } 
    else if(volume === nr_volume_name3 && product === product_name1) {
        price = price_prod1_nr_vol3;
    }
    else if(volume === nr_volume_name4 && product === product_name1) {
        price = price_prod1_nr_vol4;
    }

    // product 2
    else if(volume === nr_volume_name1 && product === product_name2) {
        price = price_prod2_nr_vol1;
    } 
    else if(volume === nr_volume_name2 && product === product_name2) {
        price = price_prod2_nr_vol2;
    } 
    else if(volume === nr_volume_name3 && product === product_name2) {
        price = price_prod2_nr_vol3;
    }
    else if(volume === nr_volume_name4 && product === product_name2) {
        price = price_prod2_nr_vol4;
    }

    // product 3
    else if(volume === nr_volume_name1 && product === product_name3) {
        price = price_prod3_nr_vol1;
    } 
    else if(volume === nr_volume_name2 && product === product_name3) {
        price = price_prod3_nr_vol2;
    } 
    else if(volume === nr_volume_name3 && product === product_name3) {
        price = price_prod3_nr_vol3;
    } 
    else if(volume === nr_volume_name4 && product === product_name3) {
        price = price_prod3_nr_vol4;
    }

    /////////////// SMART DISPENSE  ///////////////////////////////////
    // product 1
    else if(volume === volume_name1 && product === product_name1) {
        price = price_prod1_vol1;
    } 
    else if(volume === volume_name2 && product === product_name1) {
        price = price_prod1_vol2;
    } 
    else if(volume === volume_name3 && product === product_name1) {
        price = price_prod1_vol3;
    }
    else if(volume === volume_name4 && product === product_name1) {
        price = price_prod1_vol4;
    }

    // product 2
    else if(volume === volume_name1 && product === product_name2) {
        price = price_prod2_vol1;
    } 
    else if(volume === volume_name2 && product === product_name2) {
        price = price_prod2_vol2;
    } 
    else if(volume === volume_name3 && product === product_name2) {
        price = price_prod2_vol3;
    }
    else if(volume === volume_name4 && product === product_name2) {
        price = price_prod2_vol4;
    }

    // product 3
    else if(volume === volume_name1 && product === product_name3) {
        price = price_prod3_vol1;
    } 
    else if(volume === volume_name2 && product === product_name3) {
        price = price_prod3_vol2;
    } 
    else if(volume === volume_name3 && product === product_name3) {
        price = price_prod3_vol3;
    } 
    else if(volume === volume_name4 && product === product_name3) {
        price = price_prod3_vol4;
    } 

    else {
        price = "N/A"; // Handle case where no match is found
    }

    total_price = price;

    $(".nrTran_price").val(price);
    console.log("price: " + total_price);
}

function enableDispenseButton() {
    var price = parseFloat($(".nrTran_price").val());
    var payment = parseFloat($(".nrTran_payment").val());

    if(payment >= price){
        var change = payment - price;
        customer_payment = change;
        console.log(customer_payment);
        val_change.val(customer_payment.toFixed(2)); 
        $("#btn_dispense_trans").removeClass('hidden');
        $("#btn_cancel_trans").removeClass('hidden');
        //pageSelected("p_dispensing");
    }

    console.log("change: " + change);
}

// FOR COMPUTING THE CHANGE
function changeComputation() {
    var price = parseFloat($(".nrTran_price").val());
    var payment = parseFloat($(".nrTran_payment").val());

    if(payment >= price){
        var change = payment - price; 
        val_change.val(change.toFixed(2));
       
    } else {
        val_change.val("Insufficient payment");
    }

    console.log("change: " + change);
}




function dispenseLoading() {

    var timeDelay;
    var finalTime = null;


    if(service_type === "Normal Refill"){
        if (selected_volume === volume_name1) {
            timeDelay = dispense_nr_vol1;
            finalTime = timeDelay + 3000;
        } 
        else if (selected_volume === volume_name2) {
            timeDelay = dispense_nr_vol2;
            finalTime = timeDelay + 3000;
        } 
        else if (selected_volume === volume_name3) {
            timeDelay = dispense_nr_vol3;
            finalTime = timeDelay + 3000;
        }
        else if (selected_volume === volume_name4) {
            timeDelay = dispense_nr_vol4;
            finalTime = timeDelay + 3000;
        }
    
    }
    else {
        if (selected_volume === volume_name1) {
            timeDelay = 5170;
            finalTime = timeDelay + 4000;
        } 
        else if (selected_volume === volume_name2) {
            timeDelay = 10260;
            finalTime = timeDelay + 4000;
        } 
        else if (selected_volume === volume_name3) {
            timeDelay = 15420;
            finalTime = timeDelay + 4000;
        }
        else if (selected_volume === volume_name4) {
            timeDelay = 20580;
            finalTime = timeDelay + 4000;
        }
    
    }

    setTimeout(function() {
        pageSelected("p_finish");
    }, finalTime);

    $('#tagged').val("saveTransaction");
    $('#service_type').val(service_type);
    $('#selected_volume').val(selected_volume);
    $('#selected_product').val(selected_product);
    $('#total_price').val(total_price);
    $('#customer_payment').val(customer_payment);
    $('#laundry_load').val(laundry_load);
    $('#selected_fabric').val(selected_fabric);
    $('#selected_stain').val(selected_stain);
    
}


function smartVolumeSuggest() {

    if(selected_stain === "LOW" && selected_fabric === "100% Cotton"){

        // Example : 60ml
        selected_volume = volume_name1;
        console.log("VOLUME Suggest:" + selected_volume);
        val_selected_volume.val(selected_volume);
    }

    else if(selected_stain === "LOW" && selected_fabric === "Polyester"){
        
        // Example : 60ml
        selected_volume = volume_name1;
        console.log("VOLUME Suggest:" + selected_volume);
        val_selected_volume.val(selected_volume);
    }

    else if(selected_stain === "LOW" && selected_fabric === "Cotton-Polyester Blend"){
        
        // Example : 60ml
        selected_volume = volume_name1;
        console.log("VOLUME Suggest:" + selected_volume);
        val_selected_volume.val(selected_volume);
    }

    else if(selected_stain === "MEDIUM" && selected_fabric === "100% Cotton"){
        // Example : 120ml
        selected_volume = volume_name2;
        console.log("VOLUME Suggest:" + selected_volume);
        val_selected_volume.val(selected_volume);
    }

    else if(selected_stain === "MEDIUM" && selected_fabric === "Polyester"){
        // Example : 120ml
        selected_volume = volume_name2;
        console.log("VOLUME Suggest:" + selected_volume);
        val_selected_volume.val(selected_volume);
    }

    else if(selected_stain === "MEDIUM" && selected_fabric === "Cotton-Polyester Blend"){
        // Example : 120ml
        selected_volume = volume_name3;
        console.log("VOLUME Suggest:" + selected_volume);
        val_selected_volume.val(selected_volume);
    }

    else if(selected_stain === "HIGH" && selected_fabric === "100% Cotton"){
        // Example : 180ml
        selected_volume = volume_name3;
        console.log("VOLUME Suggest:" + selected_volume);
        val_selected_volume.val(selected_volume);
    }

    else if(selected_stain === "HIGH" && selected_fabric === "Polyester"){
        // Example : 180ml
        selected_volume = volume_name3;
        console.log("VOLUME Suggest:" + selected_volume);
        val_selected_volume.val(selected_volume);
    }

    else if(selected_stain === "HIGH" && selected_fabric === "Cotton-Polyester Blend"){
        // Example : 180ml
        selected_volume = volume_name3;
        console.log("VOLUME Suggest:" + selected_volume);
        val_selected_volume.val(selected_volume);
    }

    $("#ps_fabric").text(selected_fabric);
    $("#ps_stain").text(selected_stain);
    $("#ps_volume").text(selected_volume);


}

////////////////////////////////////////////////////////////////////////////////////////

var socket = io();

function sendValue(value) {
    socket.emit('sendValue', value);
    console.log("Serial Input: " + value);
}

var coinInserted;
function getCoinInsertedValue() {
    socket.on('coinInserted', function(coinValue) {
        console.log("Coin inserted: " + coinValue);
        //document.getElementById('coinValue').innerText = 'Coin inserted: ' + coinValue;
        val_customer_payment.val(coinValue);
        enableDispenseButton();
        
    });
}

var distance_1;
var distance_2;
var distance_3;

function getLDDistance() {
    let distance_1, distance_2, distance_3;

    // Listen for distance 1
    socket.on('distance1', function(distance) {
        console.log('Distance 1 received:', distance);
        distance_1 = distance;
        $('#distance1').val(distance_1); // Update text content, assuming #distance1 is a <div>
    });

    // Listen for distance 2
    socket.on('distance2', function(distance) {
        console.log('Distance 2 received:', distance);
        distance_2 = distance;
        $('#distance2').val(distance_2); // Update text content, assuming #distance2 is a <div>
    });

    // Listen for distance 3
    socket.on('distance3', function(distance) {
        console.log('Distance 3 received:', distance);
        distance_3 = distance;
        $('#distance3').val(distance_3); // Update text content, assuming #distance3 is a <div>
    });
}

function handleSerialData(data) {
    // Process the serial data here
    console.log("Handling serial data: " + data);
    // You can add more logic to handle the received data
}

function disableBackButton() {
    history.pushState(null, null, location.href);
    window.onpopstate = function() {
        history.go(1);
    };
}

function saveLDDistance() {
    var formData = {
        tagged: "saveLDDistance",
        distance1: $('#distance1').val(),
        distance2: $('#distance2').val(),
        distance3: $('#distance3').val()
    };
        
    $.ajax({
        url: '/saveTransaction', // Send request to the Node.js server
        type: 'POST',
        data: formData, // Pass the formData object directly
        success: function(response) {
            console.log('Success:', response);
            sendValue("0");
            window.location.href = 'http://localhost/display-laudrofill/USER/admin.php';
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error:', textStatus, errorThrown);
        }
    });
}




// //////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function() {

    
    loadAllData(); 
    getLDDistance();
    getCoinInsertedValue();

    //PAGE 1: SPLASH SCREEN
    $("#btn_main_header").on('click', function () {
        sendValue("L"); //SERIAL MONITOR
        pageSelected("main");
       
        // setTimeout(function() {
        //     pageSelected("main");
        //     sendValue("L"); //SERIAL MONITOR
        // }, 1000);
    });
    

    ///////// for getting the distance of each ultrasonic sensor
    //EXIT BUTTON
    $("#btn_exit_user").on('click', function() {

        //ADMIN
        sendValue("admin");
        //Liquid Detergent Level Monitoring
        sendValue("1");
        //Product 1 Level
        setTimeout(() => {
            sendValue("1");
            //getLDDistance();
            //Product 2 Level
            setTimeout(() => {
                sendValue("2");
                //getLDDistance();
                //Product 3 Level
                setTimeout(() => {
                    sendValue("3");
                    //TAKE ALL THE DATA
                    setTimeout(() => {
                        const distance1 = $('#distance1').val();
                        const distance2 = $('#distance2').val();
                        const distance3 = $('#distance3').val();

                        if (distance1 && distance2 && distance3 != null) {
                            saveLDDistance();
                        }
                    }, 1000);
                }, 1000);
            }, 1000);
        }, 1000);

        
        
    });
    
    
    //BACK BUTTON
    $(".btn_back").on('click', function() {
        pageSelected("main");
    });

    //PAGE: Normal Refill 
    $("#nr_start").on('click', function() {
        pageSelected("p_product");
        val_service_type.val(service_type);
        laundry_load = val_laundry_load.val();
        value = laundry_load;
        
        //sendValue(value); //SERIAL MONITOR
    });

    //PAGE: SELECT VOLUME
    $("#btn_volume_name1").on('click', function() {

        selected_volume = $("#volume_name1").text();
        console.log("VOLUME:" + selected_volume);
        val_selected_volume.val(selected_volume);
        
        sendValue("1"); //SERIAL MONITOR

        if(service_type === "No Smart Dispense"){
            pageSelected("p_product");
        }
        else {
            pageSelected("p_transaction");
        }
        

    });

    $("#btn_volume_name2").on('click', function() {

        selected_volume = $("#volume_name2").text();
        console.log("product:" + selected_volume);
        val_selected_volume.val(selected_volume);
        getUnitPrice();

        sendValue("2"); //SERIAL MONITOR

        if(service_type === "No Smart Dispense"){
            pageSelected("p_product");
        }
        else {
            pageSelected("p_transaction");
        }  
    });

    $("#btn_volume_name3").on('click', function() {

        selected_volume = $("#volume_name3").text();
        console.log("product:" + selected_volume);
        val_selected_volume.val(selected_volume);
        getUnitPrice();

        sendValue("3"); //SERIAL MONITOR
        if(service_type === "No Smart Dispense"){
            pageSelected("p_product");
        }
        else {
            pageSelected("p_transaction");
        }  

    });

    $("#btn_volume_name4").on('click', function() {

        selected_volume = $("#volume_name4").text();
        console.log("product:" + selected_volume);
        val_selected_volume.val(selected_volume);
        getUnitPrice();

        sendValue("4"); //SERIAL MONITOR
        if(service_type === "No Smart Dispense"){
            pageSelected("p_product");
        }
        else {
            pageSelected("p_transaction");
        }  

    });


    //PAGE: SELECT PRODUCT
    $("#btn_product_name1").on('click', function() {
        selected_product = $("#product_name1").text();
        console.log("PRODUCT:" + selected_product);
        val_selected_product.val(selected_product);
        // getUnitPrice();

        sendValue("1"); //SERIAL MONITOR
        if(service_type === "No Smart Dispense"){
            pageSelected("p_transaction");
            service_type = "Normal Refill";
            val_service_type.val(service_type);
        }
        else if(service_type === "Smart Dispense"){
            pageSelected("p_transaction");
        }
        else {
            pageSelected("p_volume");
        }
        
    });

    $("#btn_product_name2").on('click', function() {
        selected_product = $("#product_name2").text();
        console.log("product:" + selected_product);
        val_selected_product.val(selected_product);
        // getUnitPrice();

        sendValue("2"); //SERIAL MONITOR
        if(service_type === "No Smart Dispense"){
            pageSelected("p_transaction");
            service_type = "Normal Refill";
            val_service_type.val(service_type);
        }
        else if(service_type === "Smart Dispense"){
            pageSelected("p_transaction");
        }
        else {
            pageSelected("p_volume");
        }
    });

    $("#btn_product_name3").on('click', function() {

        selected_product = $("#product_name3").text();
        console.log("product:" + selected_product);
        val_selected_product.val(selected_product);
        // getUnitPrice();

        sendValue("3"); //SERIAL MONITOR
        if(service_type === "No Smart Dispense"){
            pageSelected("p_transaction");
            service_type = "Normal Refill";
            val_service_type.val(service_type);
        }
        else if(service_type === "Smart Dispense"){
            pageSelected("p_transaction");
        }
        else {
            pageSelected("p_volume");
        }
    });

    ///////// FOR TRANSACTION INSERTING COIN //////////// 
    // IF THE INaSERTED AMOUNT IS REACHED  $("#btn_dispense_trans").removeClass('hidden');

    $("#btn_proceed_trans").on('click', function() {
        pageSelected("p_transaction");
    });

    $("#btn_cancel_trans").on('click', function() {
        var confirmation = confirm("Are you sure you want to cancel the transaction?");

        if (confirmation) {
            sendValue("c");
            //pageSelected("main");
            location.reload();
            
        }
    });


    $("#nrTran_payment").on('change', function() {
        enableDispenseButton();
    });

    $("#btn_dispense_trans").on('click', function() {
        sendValue("d");
        pageSelected("p_dispensing");
    });


    //$("#btn_finish").on('click', function() {
    $(".btn_finish").on('click', function() {

        // Get form data as an object
        var formData = {
            tagged: "saveTransaction",
            service_type: $('#service_type').val(),
            selected_volume: $('#selected_volume').val(),
            selected_product: $('#selected_product').val(),
            total_price: $('#total_price').val(),
            customer_payment: $('#customer_payment').val(),
            laundry_load: $('#laundry_load').val(),
            selected_fabric: $('#selected_fabric').val(),
            selected_stain: $('#selected_stain').val()
        };
    
        // Log the formData object to inspect its contents (optional)
        console.log("FormData:", formData);
    
        $.ajax({
            url: '/saveTransaction', // Send request to the Node.js server
            type: 'POST',
            data: formData, // Pass the formData object directly
            success: function(response) {
                console.log('Success:', response);
                //alert("Transaction saved successfully.");
                location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error:', textStatus, errorThrown);
                alert("Failed to save transaction.");
            }
        });
       
    });

    

    ///////////////////////////////// SMART DISPENSE /////////////////////////////////////////////

    $("#sd_next").on("click", function() {
        laundry_load = $("#nrTran_load").val();
        console.log("LAUNDRY LOAD: " + laundry_load);

        if(laundry_load <= 0){
            alert("laundry cannot be 0kg!");
        }
        else if(laundry_load > 8){
            alert("laundry cannot be more than 8Kg");
        }
        else {
            pageSelected("p_fabric");
            sendValue(laundry_load);
        }


        
        
    });

    //PAGE: SELECT FABRIC
    $("#btn_fabric_name1").on('click', function() {
        selected_fabric = $("#fabric_name1").text();
        console.log("FABRIC TYPE: " + selected_fabric);
        val_selected_fabric.val(selected_fabric);
        pageSelected("p_stain");

        sendValue("1");
    });

    $("#btn_fabric_name2").on('click', function() {
        selected_fabric = $("#fabric_name2").text();
        console.log("FABRIC TYPE: " + selected_fabric);
        val_selected_fabric.val(selected_fabric);
        pageSelected("p_stain");

        sendValue("2");
    });

    $("#btn_fabric_name3").on('click', function() {
        selected_fabric = $("#fabric_name3").text();
        console.log("FABRIC TYPE: " + selected_fabric);
        val_selected_fabric.val(selected_fabric);
        pageSelected("p_stain");

        sendValue("3");
    });

    //PAGE: SELECT LEVEL OF STAIN
    $("#btn_stain_name1").on('click', function() {
        selected_stain = $("#stain_name1").text();
        console.log("STAIN LEVEL: " + selected_stain);
        val_selected_stain.val(selected_stain);
        pageSelected("p_suggest");

        sendValue("1");
    });

    $("#btn_stain_name2").on('click', function() {
        selected_stain = $("#stain_name2").text();
        console.log("STAIN LEVEL: " + selected_stain);
        val_selected_stain.val(selected_stain);
        pageSelected("p_suggest");

        sendValue("2");
    });

    $("#btn_stain_name3").on('click', function() {
        selected_stain = $("#stain_name3").text();
        console.log("STAIN LEVEL: " + selected_stain);
        val_selected_stain.val(selected_stain);
        pageSelected("p_suggest");

        sendValue("3");
    });


    //PAGE: SMART DISPENSE SUGGESTION
    $("#sd_YES").on('click', function() {
        pageSelected("p_product");
        console.log("SERVICE TYPE: " + service_type);
        // selected_product = $("#product_name1").text();
        // console.log("product:" + selected_product);
        // val_selected_stain.val(selected_product);

        sendValue("y");
    });

    $("#sd_NO").on('click', function() {
        pageSelected("p_volume");
        service_type = "No Smart Dispense";
        val_service_type.val(service_type);
        console.log("SERVICE TYPE: " + service_type);
        // selected_product = $("#product_name1").text();
        // console.log("product:" + selected_product);
        // val_selected_stain.val(selected_product);

        sendValue("n");
    });




});

