//MAIN VARIALES

var username = null;
var userID = null;
var password = null;

var page_login          = $("#page_login");
var page_main           = $("#page_main");
var page_products       = $("#page_products");
var page_transactions   = $("#page_transactions");
var page_reports        = $("#page_reports");
var page_settings       = $("#page_settings");
var page_products_edit  = $("#page_products_edit");
var page_reports_table  = $("#page_reports_table");
var page_account        = $("#page_account");
var page_monitoring     = $("#page_monitoring");

var modal_success = $("#modal_success");

var main_option = null;
var main_product = null;

var ProductID = null;

//PAGE 1: VARIABLES
var txt_login_username = null;
var txt_login_password = null;

var btn_login_exit = $("#btn_login_exit");
var btn_login = $("#btn_login");


function pageSelected(page){
    page_login.addClass('hidden');       
    page_main.addClass('hidden');      
    page_products.addClass('hidden');         
    page_transactions.addClass('hidden');     
    page_reports.addClass('hidden');          
    page_settings.addClass('hidden');         
    page_products_edit.addClass('hidden');   
    page_reports_table.addClass('hidden');   
    page_account.addClass('hidden');
    page_monitoring.addClass('hidden');
    
    if (page === "login") {
        page_login.removeClass('hidden');
    } else if (page === "main") {
        page_main.removeClass('hidden');
    } else if (page === "products") {
        page_products.removeClass('hidden');
    } else if (page === "transactions") {
        page_transactions.removeClass('hidden');
    } else if (page === "reports") {
        page_reports.removeClass('hidden');
    } else if (page === "settings") {
        page_settings.removeClass('hidden');
    } else if (page === "products_edit") {
        page_products_edit.removeClass('hidden');
    } else if (page === "reports_table") {
        page_reports_table.removeClass('hidden');
    } else if (page === "account") {
        page_account.removeClass('hidden');
    } else if (page === "p_monitoring") {
        page_monitoring.removeClass('hidden');
    }
}


function disableBackButton() {
    history.pushState(null, null, location.href);
    window.onpopstate = function() {
        history.go(1);
    };
}

function getLoginInfo() {

    txt_login_username = $("#login_username").val();
    txt_login_password = $("#login_password").val();

    $.ajax({
        url: 'admin-data.php',
        type: 'POST',
        data: {
            tagged: "getLogin",
            username: txt_login_username,
            password: txt_login_password
        },
        success: function(response) {
            // Parse JSON response
            var data = JSON.parse(response);
            var userType = data.usertype;
            userID = data.userID;
            username = data.username;

            if(userType === "ADMIN"){
                pageSelected("main");
            }
            else if(userType === "USER"){
                // location.href = "/display-laudrofill/USER/index.html";
                disableBackButton();
                window.location.href = "http://localhost:3000";
            }
            else {
                pageSelected("login");
            }
        },
        error: function(xhr, status, error) {
            alert("Login failed: " + xhr.responseText);
        }
    });
}

//PAGE 2: VARIABLES

var btn_main_products   = $('#option_btn_Products');
var btn_main_transations = $('#option_btn_Transactions');
var btn_main_reports    = $('#option_btn_Reports');
var btn_main_settings   = $('#option_btn_Settings');


function goToSelectedMenu(main_option) {

    page_main.addClass("hidden");

    if(main_option === "Edit Products"){
        pageSelected("products");
    }
    else if (main_option === "Transaction History"){
        pageSelected("transactions");
    }
    else if (main_option === "Reports"){
        pageSelected("reports");
    }
    else if (main_option === "Settings"){
        pageSelected("settings");
    }
}

//PAGE 3: VARIABLES

var btn_product1 = $("#option_btn_Products_1");
var btn_product2 = $("#option_btn_Products_2");
var btn_product3 = $("#option_btn_Products_3");

function goToSelectedProduct(main_product) {

    page_main.addClass("hidden");
    page_products.addClass("hidden");

    if(main_product !== null){
        page_products_edit.removeClass("hidden");
        $("#product_id").text(main_product);
    }
}

//PAGE 4: VARIABLES
function LoadProductDetails(ProductID) {
    $.ajax({
        url: 'admin-data.php',
        type: 'GET',
        data: {
            tagged: "getProductDetails",
            product_id: ProductID
        },
        success: function(response) {
            var data = JSON.parse(response);
            //var ProductID = data.ProductID;

            $('#product_type').val(data.ProductType);
            $('#product_name').val(data.ProductName);
            $('#product_desc').val(data.ProductDesc);
            $('#product_vol1').text(data.Volume1);
            $('#product_vol2').text(data.Volume2);
            $('#product_vol3').text(data.Volume3);
            $('#unit_price_1').val(data.UnitPrice1);
            $('#unit_price_2').val(data.UnitPrice2);
            $('#unit_price_3').val(data.UnitPrice3);
            
        },
        error: function(xhr, status, error) {
            alert("Login failed: " + xhr.responseText);
        }
    });
}

function updateProductDetails(productUpdate) {
    $.ajax({
        url: 'admin-data.php',
        type: 'POST',
        data: productUpdate,
        processData: false,
        contentType: false,
        success: function(response) {
            var data = JSON.parse(response);
            if (data.success) {
                alert('Product updated successfully!');
            } else {
                alert('Failed to update product: ' + data.error);
            }
        },
        error: function(xhr, status, error) {
            alert('Failed to update product: ' + xhr.responseText);
        }
    });
}

//PAGE: User Account FUNCTIONS
function loadAccountDetails(usertype){
    $.ajax({
        url: 'admin-data.php',
        type: 'GET',
        data: {
            tagged: "getAccountDetails",
            user_type: usertype
        },
        success: function(response) {
            var data = JSON.parse(response);
            if (data.error) {
                console.error("Failed to get account details: " + data.error);
                return;
            }

            password = data.Password;
            username = data.Username;
            $("#settings_username").val(username);
            $("#settings_new_username").val(username);
            $("#settings_new_password").val(password);

            $('#user_id').val(data.UserID);
            $('#user_type').val(data.UserType);
            
        },
        error: function(xhr, status, error) {
            alert("Login failed: " + xhr.responseText);
        }
    });
}

function updateAccountDetails(account) {
    $.ajax({
        url: 'admin-data.php',
        type: 'POST',
        data: account,
        processData: false,
        contentType: false,
        success: function(response) {
            var data = JSON.parse(response);
            if (data.success) {
                alert('Product updated successfully!');
            } else {
                alert('Failed to update product: ' + data.error);
            }
        },
        error: function(xhr, status, error) {
            alert('Failed to update product: ' + xhr.responseText);
        }
    });
}


//PAGE : Transaction History
function loadTransactionTable(tran_from, tran_to)
{
    $.ajax({
        url: 'admin-data.php',
        type: 'GET',
        data: {
            tagged: "viewTransation",
            tranFrom: tran_from,
            tranTo: tran_to,
        },
        success: function(response) {
            console.log(response);
            var data = JSON.parse(response);
            if (data.success) {
                $('#table_transaction tbody').html(data.tableRowsHTML);
            } else {
                alert('No transactions found for the selected date range.');
            }
        },
        error: function(xhr, status, error) {
            alert('Failed to update product: ' + xhr.responseText);
        }
    });
}


//PAGE : REPORTS
function loadSalesReportsTable(tran_from, tran_to)
{
    $.ajax({
        url: 'admin-data.php',
        type: 'GET',
        data: {
            tagged: "viewSalesReport",
            tranFrom: tran_from,
            tranTo: tran_to,
        },
        success: function(response) {
            console.log(response);
            var data = JSON.parse(response);
            if (data.success) {
                $('#table_reports_sales tbody').html(data.tableRowsHTML);
            } else {
                alert('No transactions found for the selected date range.');
            }
        },
        error: function(xhr, status, error) {
            alert('Failed to update product: ' + xhr.responseText);
        }
    });
}

function loadInventoryReportsTable(tran_from, tran_to)
{
    $.ajax({
        url: 'admin-data.php',
        type: 'GET',
        data: {
            tagged: "viewInventoryReport",
            tranFrom: tran_from,
            tranTo: tran_to,
        },
        success: function(response) {
            console.log(response);
            var data = JSON.parse(response);
            if (data.success) {
                $('#table_reports_inventory tbody').html(data.tableRowsHTML);
            } else {
                alert('No transactions found for the selected date range.');
            }
        },
        error: function(xhr, status, error) {
            alert('Failed to update product: ' + xhr.responseText);
        }
    });
}


function updateProgressBar(product1_value, product2_value, product3_value) {
    // Ensure the value is within the valid range
    product1_value = Math.max(0, Math.min(100, product1_value));
    product2_value = Math.max(0, Math.min(100, product2_value));
    product3_value = Math.max(0, Math.min(100, product3_value));

    // Select the progress bar element
    var progressBar1 = document.querySelector('#progress_bar1');
    var progressBar2 = document.querySelector('#progress_bar2');
    var progressBar3 = document.querySelector('#progress_bar3');

    // Update the aria-valuenow attribute and the width style property
    progressBar1.setAttribute('aria-valuenow', product1_value);
    progressBar1.style.width = product1_value + '%';

    progressBar2.setAttribute('aria-valuenow', product2_value);
    progressBar2.style.width = product2_value + '%';

    progressBar3.setAttribute('aria-valuenow', product3_value);
    progressBar3.style.width = product3_value + '%';
}


var distance1;
var distance2;
var distance3;
var product1;
var product2;
var product3;

function getTheLDDIstance() {
    $.ajax({
        url: 'admin-data.php',
        type: 'GET',
        data: {
            tagged: "getLDDistance",
        },
        success: function(response) {
            // Parse the JSON response
            var data = JSON.parse(response);

            if (data.error) {
                alert('Error: ' + data.error);
                return;
            }

            distance1 = data.distance1;
            distance2 = data.distance2;
            distance3 = data.distance3;

            product1 = data.product1;
            product2 = data.product2;
            product3 = data.product3;

            $('.product_name1').text(product1);
            $('.product_name2').text(product2);
            $('.product_name3').text(product3);

            // Log the levels
            console.log("Product1:", getLevel(distance1));
            console.log("Product2:", getLevel(distance2));
            console.log("Product3:", getLevel(distance3));

            // Update progress bars
            updateProgressBar(distance1, '#progress_bar1');
            updateProgressBar(distance2, '#progress_bar2');
            updateProgressBar(distance3, '#progress_bar3');

        },
        error: function(xhr, status, error) {
            alert('Failed to update product: ' + xhr.responseText);
        }
    });


}

function getLevel(distance) {
    if (distance >= 21 && distance <= 25) {
        return "LOW";
    } else if (distance >= 26 && distance <= 30) {
        return "MEDIUM";
    } else if (distance > 30) {
        return "HIGH";
    } else {
        return "EMPTY";
    }
}

function updateProgressBar(distance, progressBarId) {
    const level = getLevel(distance);
    const progressBar = $(progressBarId);
    
    let width = 0;
    let color = '';

    switch(level) {
        case "LOW":
            width = 25;
            color = 'red';
            break;
        case "MEDIUM":
            width = 50;
            color = 'orange';
            break;
        case "HIGH":
            width = 75;
            color = 'green';
            break;
        case "EMPTY":
            width = 0;
            color = 'gray';
            break;
    }

    progressBar.css('width', width + '%');
    progressBar.css('background-color', color);
    progressBar.attr('aria-valuenow', width);
}

/////////////////////////////////////////////////////////////////////////////
$('document').ready(function () {

    getTheLDDIstance();

    $(".btn_back").on('click', function() {
        pageSelected("main");
    });


    //PAGE 1: INTERACTIONS
    btn_login.on('click', function() {
        getLoginInfo();
    });

    btn_login_exit.on('click', function() {
        window.location.href = "http://localhost:3000";
    });


    //PAGE 2: INTERACTIONS
    btn_main_products.on('click', function() {
        goToSelectedMenu("Edit Products");
    });
    btn_main_transations.on('click', function() {
        goToSelectedMenu("Transaction History");
    });
    btn_main_reports.on('click', function() {
        goToSelectedMenu("Reports");
    });
    btn_main_settings.on('click', function() {
        goToSelectedMenu("Settings");
    });



    //PAGE 3: Product Edit
    btn_product1.on('click', function() {
        ProductID = "1";
        LoadProductDetails(ProductID);
        goToSelectedProduct(ProductID);

        $("#page_products_edit").find('input, select').attr('readonly', true);
    });
    btn_product2.on('click', function() {
        ProductID = "2";
        LoadProductDetails(ProductID);
        goToSelectedProduct(ProductID);
        $("#page_products_edit").find('input, select').attr('readonly', true);
    });
    btn_product3.on('click', function() {
        ProductID = "3";
        LoadProductDetails(ProductID);
        goToSelectedProduct(ProductID);
        $("#page_products_edit").find('input, select').attr('readonly', true);
    });

    $('#btn_ep_cancel').on('click', function() {
        $("#btn_ep_update").addClass("hidden");
        pageSelected("products");
    });

    $('#btn_ep_edit').on('click', function() {
        $("#page_products_edit").find('input, select').removeAttr('readonly');
        $("#btn_ep_update").removeClass("hidden");
    });

    $('#btn_ep_update').on('click', function() {
        var productUpdate = new FormData();
    
        productUpdate.append('tagged', "updateProduct");
        productUpdate.append('ProductID', $('#product_id').text());
        productUpdate.append('ProductType', $('#product_type').val());
        productUpdate.append('ProductName', $('#product_name').val());
        productUpdate.append('ProductDesc', $('#product_desc').val());
        // productUpdate.append('Volume1', $('#product_vol1').val());
        // productUpdate.append('Volume2', $('#product_vol2').val());
        // productUpdate.append('Volume3', $('#product_vol3').val());
        productUpdate.append('UnitPrice1', $('#unit_price_1').val());
        productUpdate.append('UnitPrice2', $('#unit_price_2').val());
        productUpdate.append('UnitPrice3', $('#unit_price_3').val());

        updateProductDetails(productUpdate);
        $("#page_products_edit").find('input, select').attr('readonly', true);
        $("#btn_ep_update").addClass("hidden");
    });




    //Page: User Account
    $("#option_btn_settings_account").on('click', function() {
        pageSelected("account");
        $("#page_account").find('input').attr('readonly', true);
        $("#settings_old_password").removeAttr('readonly');

    });

    $("#settings_user_type").on('change', function() {

        var usertype = $("#settings_user_type").val();
        loadAccountDetails(usertype);
    });

    $("#btn_ua_cancel").on('click', function() {
        pageSelected("settings");
        $("#btn_ua_update").addClass("hidden");
    });

    $("#btn_ua_edit").on('click', function() {

        var account_old_password = $('#settings_old_password').val();
        var account_old_username = $('#settings_username').val();

        if(account_old_password === password && account_old_username === username ) {
            $("#page_account").find('input').removeAttr('readonly');
            $("#page_account").find('input').removeAttr('disabled');

            $("#btn_ua_update").removeClass("hidden");
            $('#settings_old_password').attr('readonly', true);
            $('#settings_username').attr('readonly', true);

        }
        else{
            alert("Please enter correct password to edit this User");
        }

        
    });

    $("#btn_ua_update").on('click', function() {
        var account = new FormData();

        var account_type = $('#settings_user_type').val();
        var account_username = $('#settings_username').val();
        var account_old_password = $('#settings_old_password').val();
        var account_new_username = $('#settings_new_username').val();

        var account_new_password = $('#settings_new_password').val();
        var account_confirm_password = $('#settings_confirm_password').val();


        if(account_new_password === account_confirm_password ){
            
            $("#settings_error_message").addClass("hidden");

            account.append('tagged', "updateAccount");
            account.append('UserID',   account_type  );
            account.append('UserType', account_type  );
            account.append('UserName', account_new_username );
            account.append('Password', account_confirm_password );
    
            updateAccountDetails(account);
            $("#page_products_edit").find('input, select').attr('readonly', true);
            $("#btn_ua_update").addClass("hidden");
        }
        else {
            // $("#settings_error_message").removeClass("hidden");
            alert("Password Mismatch");
        }

        $('#settings_username').val("");
        $('#settings_old_password').val("");
        // $('#settings_new_username').val("");
        // $('#settings_new_password').val("");
        // $('#settings_confirm_password').val("");
    });



    //PAGE: LOGOUT
    $("#option_name_reports_logout").on('click', function() {
        $("#modal_logout").show("modal");
        $("#confirm_logout").on("click", function() {
            location.reload();
        });
        
    });


    //PAGE: Transaction
    $("#transaction_view").on('click', function() {
        var tran_from = $("#transaction_from").val();
        var tran_to = $("#transaction_to").val();

        loadTransactionTable(tran_from, tran_to);

    });

    //PAGE: REPORTS
    $('#option_name_reports_sales').on('click', function() {
        $("#report_name").text("SALES");
        pageSelected('reports_table');
        $('#reports_inventory_card').addClass("hidden");
        $('#reports_sales_card').removeClass("hidden");
    });

    $('#option_name_reports_inventory').on('click', function() {
        $("#report_name").text("INVENTORY");
        pageSelected('reports_table');
        $('#reports_sales_card').addClass("hidden");
        $('#reports_inventory_card').removeClass("hidden");
    });

    $('#option_btn_reports_monitoring').on('click', function() {
        $("#report_name").text("MONITORING");
        pageSelected("p_monitoring");

        var product1_value = 10;
        var product2_value = 20;
        var product3_value = 30;

        updateProgressBar(product1_value, product2_value, product3_value);
    });
    

    $("#reports_view").on('click', function() {
        var reportName = $("#report_name").text();
        var tran_from = $("#reports_from").val();
        var tran_to = $("#reports_to").val();

        if(reportName === "SALES"){
            loadSalesReportsTable(tran_from, tran_to);
        }
    });

    $("#reports_inventory_view").on('click', function() {
        var reportName = $("#report_name").text();
        var tran_from = $("#reports_from").val();
        var tran_to = $("#reports_to").val();
        
        if(reportName === "INVENTORY"){
            loadInventoryReportsTable(tran_from, tran_to);
        } 
    });

//////////////////////////////////////////////////////////////////////////

// var socket = io();

// function monitoring() {
//     socket.on('distance', function(data) {
//         console.log("Distance data received:", data);
//     });
// }


    



});