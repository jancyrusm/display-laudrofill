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
var product_name1 = "Surf (scent)";
var product_name2 = "Ariel (scent)";
var product_name3 = "Breeze (scent)";

var volume_name1 = "60ml";
var volume_name2 = "120ml";
var volume_name3 = "180ml";
var volume_name4 = "240ml";

var fabric_name1 = "100% Cotton";
var fabric_name2 = "Polyester";
var fabric_name3 = "Cotton-Polyester Blend";

var stain_name1 = "LOW";
var stain_name2 = "MEDIUM";
var stain_name3 = "HIGH";

var price_prod1_vol1 = "7.00";
var price_prod1_vol2 = "13.00";
var price_prod1_vol3 = "19.00";
var price_prod1_vol4 = "25.00";

var price_prod2_vol1 = "7.00";
var price_prod2_vol2 = "13.00";
var price_prod2_vol3 = "19.00";
var price_prod2_vol4 = "25.00";

var price_prod3_vol1 = "7.00";
var price_prod3_vol2 = "13.00";
var price_prod3_vol3 = "19.00"; 
var price_prod2_vol4 = "25.00";





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
            console.log("service: " + service_type);
            sendValue("1"); //SERIAL MONITOR
        });

        $("#main_smart_dispense").on('click', function() {
            pageSelected("smart_dispense");
            service_type = "Smart Dispense";
            val_service_type.val(service_type);
            console.log("service: " + service_type);
            sendValue("2"); //SERIAL MONITOR
        });
    } 
    else if (page === "normal_refill") {
        normal_refill.removeClass("hidden");
    } else if (page === "smart_dispense") {
        smart_dispensing.removeClass("hidden");
    } else if (page === "p_volume") {
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
    $("#volume_name1").text(volume_name1);
    $("#volume_name2").text(volume_name2);
    $("#volume_name3").text(volume_name3);
    $("#volume_name4").text(volume_name4);

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
    
    // product 1
    if(volume === volume_name1 && product === product_name1) {
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

    var timeDelay = 1000; // Default to 10 seconds if no match
    var finalTime = null;

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

    // Change the page after the time delay
    setTimeout(function() {
        pageSelected("p_finish");
    }, finalTime);
}


function smartVolumeSuggest() {

    if(selected_stain === "LOW" && selected_fabric === "100% Cotton"){

        // Example : 60ml
        selected_volume = $("#volume_name1").text();
        console.log("service:" + selected_volume);
        val_selected_volume.val(selected_volume);
    }

    else if(selected_stain === "LOW" && selected_fabric === "Polyester"){
        
        // Example : 60ml
        selected_volume = $("#volume_name1").text();
        console.log("service:" + selected_volume);
        val_selected_volume.val(selected_volume);
    }

    else if(selected_stain === "LOW" && selected_fabric === "Cotton-Polyester Blend"){
        
        // Example : 60ml
        selected_volume = $("#volume_name1").text();
        console.log("service:" + selected_volume);
        val_selected_volume.val(selected_volume);
    }

    else if(selected_stain === "MEDIUM" && selected_fabric === "100% Cotton"){
        // Example : 120ml
        selected_volume = $("#volume_name2").text();
        console.log("service:" + selected_volume);
        val_selected_volume.val(selected_volume);
    }

    else if(selected_stain === "MEDIUM" && selected_fabric === "Polyester"){
        // Example : 120ml
        selected_volume = $("#volume_name2").text();
        console.log("service:" + selected_volume);
        val_selected_volume.val(selected_volume);
    }

    else if(selected_stain === "MEDIUM" && selected_fabric === "Cotton-Polyester Blend"){
        // Example : 120ml
        selected_volume = $("#volume_name3").text();
        console.log("service:" + selected_volume);
        val_selected_volume.val(selected_volume);
    }

    else if(selected_stain === "HIGH" && selected_fabric === "100% Cotton"){
        // Example : 180ml
        selected_volume = $("#volume_name3").text();
        console.log("service:" + selected_volume);
        val_selected_volume.val(selected_volume);
    }

    else if(selected_stain === "HIGH" && selected_fabric === "Polyester"){
        // Example : 180ml
        selected_volume = $("#volume_name3").text();
        console.log("service:" + selected_volume);
        val_selected_volume.val(selected_volume);
    }

    else if(selected_stain === "HIGH" && selected_fabric === "Cotton-Polyester Blend"){
        // Example : 180ml
        selected_volume = $("#volume_name3").text();
        console.log("service:" + selected_volume);
        val_selected_volume.val(selected_volume);
    }

    $("#ps_fabric").text(selected_fabric);
    $("#ps_stain").text(selected_stain);
    $("#ps_volume").text(selected_volume);


}


// //////////////////////////////////////////////////////////////////////////////////////

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

function handleSerialData(data) {
    // Process the serial data here
    console.log("Handling serial data: " + data);
    // You can add more logic to handle the received data
}

// //////////////////////////////////////////////////////////////////////////////////////



$(document).ready(function() {

    
    loadAllData(); 

    //PAGE 1: SPLASH SCREEN
    pageSelected("splash");
    setTimeout(function() {
        pageSelected("main");
        sendValue("L"); //SERIAL MONITOR
    }, 1000);

    // for getting the value from the serial monitor
    getCoinInsertedValue();

    //BACK BUTTON
    $(".btn_back").on('click', function() {
        pageSelected("main");
    });

    //PAGE: Normal Refill 
    $("#nr_start").on('click', function() {
        pageSelected("p_volume");
        val_service_type.val(service_type);
        laundry_load = val_laundry_load.val();
        value = laundry_load;
        
        //sendValue(value); //SERIAL MONITOR
    });

    //PAGE: SELECT VOLUME
    $("#btn_volume_name1").on('click', function() {

        selected_volume = $("#volume_name1").text();
        console.log("product:" + selected_volume);
        val_selected_volume.val(selected_volume);

        sendValue("1"); //SERIAL MONITOR
        pageSelected("p_product");
    });

    $("#btn_volume_name2").on('click', function() {

        selected_volume = $("#volume_name2").text();
        console.log("product:" + selected_volume);
        val_selected_volume.val(selected_volume);

        sendValue("2"); //SERIAL MONITOR
        pageSelected("p_product");   
    });

    $("#btn_volume_name3").on('click', function() {

        selected_volume = $("#volume_name3").text();
        console.log("product:" + selected_volume);
        val_selected_volume.val(selected_volume);

        sendValue("3"); //SERIAL MONITOR
        pageSelected("p_product");

    });

    $("#btn_volume_name4").on('click', function() {

        selected_volume = $("#volume_name4").text();
        console.log("product:" + selected_volume);
        val_selected_volume.val(selected_volume);

        sendValue("4"); //SERIAL MONITOR
        pageSelected("p_product");

    });


    //PAGE: SELECT PRODUCT
    $("#btn_product_name1").on('click', function() {
        selected_product = $("#product_name1").text();
        console.log("product:" + selected_product);
        val_selected_product.val(selected_product);
        getUnitPrice();

        sendValue("1"); //SERIAL MONITOR
        pageSelected("p_b_transation");
    });

    $("#btn_product_name2").on('click', function() {
        selected_product = $("#product_name2").text();
        console.log("product:" + selected_product);
        val_selected_product.val(selected_product);
        getUnitPrice();

        sendValue("2"); //SERIAL MONITOR
        pageSelected("p_b_transation");
    });

    $("#btn_product_name3").on('click', function() {

        selected_product = $("#product_name3").text();
        console.log("product:" + selected_product);
        val_selected_product.val(selected_product);
        getUnitPrice();

        sendValue("3"); //SERIAL MONITOR
        pageSelected("p_b_transation");
    });

    ///////// FOR TRANSACTION INSERTING COIN //////////// 
    // IF THE INSERTED AMOUNT IS REACHED  $("#btn_dispense_trans").removeClass('hidden');

    $("#btn_proceed_trans").on('click', function() {
        pageSelected("p_transaction");
    });

    $("#btn_cancel_trans").on('click', function() {
        var confirmation = confirm("Are you sure you want to cancel the transaction?");

        if (confirmation) {
            pageSelected("main");
        }
    });


    $("#nrTran_payment").on('change', function() {
        enableDispenseButton();
    });

    $("#btn_dispense_trans").on('click', function() {
        sendValue("1");
        pageSelected("p_dispensing");
    });
    

    ///// CODE FOR DISPENSING PROCESSS ////////



    $("#btn_finish").on('click', function() {
        location.reload();
    });



    ///////////////////////////////// SMART DISPENSE /////////////////////////////////////////////

    $("#sd_next").on("click", function() {
        laundry_load = $("#nrTran_load").val();
        console.log("load: " + laundry_load);

        pageSelected("p_fabric");
        
    });

    //PAGE: SELECT FABRIC
    $("#btn_fabric_name1").on('click', function() {
        selected_fabric = $("#fabric_name1").text();
        console.log("fabric: " + selected_fabric);
        val_selected_fabric.val(selected_fabric);
        pageSelected("p_stain");

        sendValue("1");
    });

    $("#btn_fabric_name2").on('click', function() {
        selected_fabric = $("#fabric_name2").text();
        console.log("fabric: " + selected_fabric);
        val_selected_fabric.val(selected_fabric);
        pageSelected("p_stain");

        sendValue("2");
    });

    $("#btn_fabric_name3").on('click', function() {
        selected_fabric = $("#fabric_name3").text();
        console.log("fabric: " + selected_fabric);
        val_selected_fabric.val(selected_fabric);
        pageSelected("p_stain");

        sendValue("3");
    });

    //PAGE: SELECT LEVEL OF STAIN
    $("#btn_stain_name1").on('click', function() {
        selected_stain = $("#stain_name1").text();
        console.log("stain: " + selected_stain);
        val_selected_stain.val(selected_stain);
        pageSelected("p_suggest");

        sendValue("1");
    });

    $("#btn_stain_name2").on('click', function() {
        selected_stain = $("#stain_name2").text();
        console.log("stain: " + selected_stain);
        val_selected_stain.val(selected_stain);
        pageSelected("p_suggest");

        sendValue("2");
    });

    $("#btn_stain_name3").on('click', function() {
        selected_stain = $("#stain_name3").text();
        console.log("stain: " + selected_stain);
        val_selected_stain.val(selected_stain);
        pageSelected("p_suggest");

        sendValue("3");
    });


    //PAGE: SMART DISPENSE SUGGESTION
    $("#sd_YES").on('click', function() {
        pageSelected("p_product");
        // selected_product = $("#product_name1").text();
        // console.log("product:" + selected_product);
        // val_selected_stain.val(selected_product);

        sendValue("1");
    });

    $("#sd_NO").on('click', function() {
        service_type = "Normal Refill";
        val_service_type.val(service_type);
        pageSelected("p_volume");
        // selected_product = $("#product_name1").text();
        // console.log("product:" + selected_product);
        // val_selected_stain.val(selected_product);

        sendValue("2");
    });




});

