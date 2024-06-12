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
var p_b_transaction       = $("#p_b_transaction");
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

var fabric_name1 = "100% Cotton";
var fabric_name2 = "Polyester";
var fabric_name3 = "Cotton-Polyester Blend";

var stain_name1 = "LOW";
var stain_name2 = "MEDIUM";
var stain_name3 = "HIGH";

var price_prod1_vol1 = "11.00";
var price_prod1_vol2 = "21.00";
var price_prod1_vol3 = "31.00";

var price_prod2_vol1 = "12.00";
var price_prod2_vol2 = "22.00";
var price_prod2_vol3 = "32.00";

var price_prod3_vol1 = "13.00";
var price_prod3_vol2 = "23.00";
var price_prod3_vol3 = "33.00"; 





//VARIABLES TO BE SAVED
var service_type = null;
var selected_volume = null;
var selected_product = null;
var total_price = null;
var customer_payment = null;
var laundry_load = null;
var selected_fabric = null; 

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
    } else if (page === "main") {
        main.removeClass("hidden");
    } else if (page === "normal_refill") {
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
        }, 3000);
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

    if(volume === volume_name1 && product === product_name1) {
        price = price_prod1_vol1;
    } else if(volume === volume_name2 && product === product_name1) {
        price = price_prod1_vol2;
    } else if(volume === volume_name3 && product === product_name1) {
        price = price_prod1_vol3;
    } else if(volume === volume_name1 && product === product_name2) {
        price = price_prod2_vol1;
    } else if(volume === volume_name2 && product === product_name2) {
        price = price_prod2_vol2;
    } else if(volume === volume_name3 && product === product_name2) {
        price = price_prod2_vol3;
    } else if(volume === volume_name1 && product === product_name3) {
        price = price_prod3_vol1;
    } else if(volume === volume_name2 && product === product_name3) {
        price = price_prod3_vol2;
    } else if(volume === volume_name3 && product === product_name3) {
        price = price_prod3_vol3;
    } else {
        price = "N/A"; // Handle case where no match is found
    }

    $(".nrTran_price").val(price);
    console.log(price);
}

function enableDispenseButton() {
    var price = parseFloat($(".nrTran_price").val());
    var payment = parseFloat($(".nrTran_payment").val());

    if(payment >= price){
        var change = payment - price;
        customer_payment = change;
        console.log(customer_payment); 
        $("#btn_dispense_trans").removeClass('hidden');
    } else {
        // $(".nrTran_change").val("Insufficient payment");
        val_change.val("Insufficient payment");
    }
}

// FOR COMPUTING THE CHANGE
function changeComputation() {
    var price = parseFloat($(".nrTran_price").val());
    var payment = parseFloat($(".nrTran_payment").val());

    if(payment >= price){
        var change = payment - price; 
        val_change.val(change.toFixed(2));
        pageSelected("p_dispensing");
    } else {
        val_change.val("Insufficient payment");
    }
}

function dispenseLoading() {
    var $progressBar = $('#progress-bar');
    $progressBar.css('width', '0%');

    setTimeout(function() {
        $progressBar.css('width', '100%').attr('aria-valuenow', 100);
    }, 0);

    setTimeout(function() {
        pageSelected("p_finish");
    }, 10000); // 10 seconds
}







$(document).ready(function() {

    loadAllData(); 

    //PAGE 1: SPLASH SCREEN
    pageSelected("splash");
    setTimeout(function() {
        pageSelected("main");
    }, 1000);


    //BACK BUTTON
    $(".btn_back").on('click', function() {
        pageSelected("main");
    });


    //PAGE 2: MAIN (Normal Refill of Smart Dispense)
    $("#main_normal_refill").on('click', function() {
        pageSelected("normal_refill");
        service_type = "Normal Refill";
        console.log(service_type);
        sendValue("1");
    });

    $("#main_smart_dispense").on('click', function() {
        pageSelected("smart_dispense");
        service_type = "Smart Dispense";
        console.log(service_type);
        sendValue("2");
    });



    /*
        Take Notes:

        - The Type of Service must determine the whole transaction.
    */

    //PAGE: Normal Refill 
    $("#nr_start").on('click', function() {
        pageSelected("p_volume");
        val_service_type.val(service_type);
    });

    //PAGE: SELECT VOLUME
    $("#btn_volume_name1").on('click', function() {
        pageSelected("p_product");
        selected_volume = $("#volume_name1").text();
        console.log("service:" + selected_volume);
        val_selected_volume.val(selected_volume);
    });

    $("#btn_volume_name2").on('click', function() {
        pageSelected("p_product");
        selected_volume = $("#volume_name2").text();
        console.log("service:" + selected_volume);
        val_selected_volume.val(selected_volume);      
    });

    $("#btn_volume_name3").on('click', function() {
        pageSelected("p_product");
        selected_volume = $("#volume_name3").text();
        console.log("service:" + selected_volume);
        val_selected_volume.val(selected_volume);
    });


    //PAGE: SELECT PRODUCT
    $("#btn_product_name1").on('click', function() {
        pageSelected("p_b_transation");
        selected_product = $("#product_name1").text();
        console.log("product:" + selected_product);
        val_selected_product.val(selected_product);
        getUnitPrice();
    });

    $("#btn_product_name2").on('click', function() {
        pageSelected("p_b_transation");
        selected_product = $("#product_name2").text();
        console.log("product:" + selected_product);
        val_selected_product.val(selected_product);
        getUnitPrice();
    });

    $("#btn_product_name3").on('click', function() {
        pageSelected("p_b_transation");
        selected_product = $("#product_name3").text();
        console.log("product:" + selected_product);
        val_selected_product.val(selected_product);
        getUnitPrice();
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
        changeComputation();
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
        pageSelected("p_stain");
        selected_fabric = $("#fabric_name1").text();
        console.log("fabric:" + selected_fabric);
        val_selected_fabric.val(selected_fabric);
    });

    $("#btn_fabric_name2").on('click', function() {
        pageSelected("p_stain");
        selected_fabric = $("#fabric_name2").text();
        console.log("fabric:" + selected_fabric);
        val_selected_fabric.val(selected_fabric);
    });

    $("#btn_fabric_name3").on('click', function() {
        pageSelected("p_stain");
        selected_fabric = $("#fabric_name3").text();
        console.log("fabric:" + selected_fabric);
        val_selected_fabric.val(selected_fabric);
    });

    //PAGE: SELECT LEVEL OF STAIN
    $("#btn_stain_name1").on('click', function() {
        pageSelected("p_suggest");
        selected_stain = $("#stain_name1").text();
        console.log("fabric:" + selected_stain);
        val_selected_stain.val(selected_stain);
    });

    $("#btn_stain_name2").on('click', function() {
        pageSelected("p_suggest");
        selected_stain = $("#stain_name2").text();
        console.log("stain:" + selected_stain);
        val_selected_stain.val(selected_stain);
    });

    $("#btn_stain_name3").on('click', function() {
        pageSelected("p_suggest");
        selected_stain = $("#stain_name3").text();
        console.log("stain:" + selected_stain);
        val_selected_stain.val(selected_stain);
    });

});



//////////////////////////////////////////////////////////////////////////////////////
function sendValue(value) {
    fetch('/send', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ value: value })
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}
////////////////////////////////////////////////////////////////////////////////////