<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin-style.css">
</head>
<body>
    <div class="container">

        <!-- PAGE 1 : LOGIN -->
        <div  id="page_login" class="page" style="width:100%; height:100vh;">
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
                            <table class="table-login" style="width:100%;">
                                <tr>
                                    <td class="td-label">
                                        <label for="login_username">Username: </label>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="login_username" placeholder="Username">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-label">
                                        <label for="login_password">Password: </label>
                                    </td>
                                    <td>
                                        <input type="password" class="form-control" id="login_password" placeholder="Password">
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2" class="">
                                        <div class="btn-div text-right">
                                            <button id="btn_login_exit">Exit</button>
                                            <button id="btn_login">Login</button>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>   
               </div>
            </div>
        </div>

        <!-- PAGE 2 : MAIN -->
        <div id="page_main" class="page hidden" style="width:100%; height:100vh;">
            <div style="width: 100%;margin:auto;gap: 20px;padding: 20px 20px 0 20px;" class="d-flex">
                <div class="progress w-100">
                    <label class="product_name1"></label>
                    <div id="progress_bar1" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="progress w-100">
                    <label class="product_name2 "></label>
                    <div id="progress_bar2" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="progress w-100">
                    <label class="product_name3 "></label>
                    <div id="progress_bar3" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>


            <div class="d-flex row justify-content-center align-items-center" style="width:100%; height:90vh;">
            <div class="card border">
                <div class="card-header text-center">
                    <div class="main-header">
                        <span class="mh-left">LAUNDRO</span><span class="mh-right">FILL</span>
                    </div>
                </div>
                <div class="card-body"></div>
                    <div class="card-form">
                        <div class="form-group">
                            <table class="table-admin-main" style="width:100%;">
                                <tr>
                                    <!-- EDIT PRODUCTS -->
                                   <td class="w-25">
                                    <div class="box" id="option_btn_Products">
                                        <span id="option_name_Products" class="w-100 text-wrap">Edit Products</span>
                                    </div>
                                   </td>

                                   <!-- Transaction History -->
                                   <td class="w-25">
                                    <div class="box" id="option_btn_Transactions">
                                        <span id="option_name_Transaction" class="w-100 text-wrap">Transaction History</span>
                                    </div>
                                   </td>

                                   <!-- Reports -->
                                   <td class="w-25">
                                    <div class="box" id="option_btn_Reports">
                                        <span id="option_name_Reports" class="w-100 text-wrap">Reports</span>
                                    </div>
                                   </td>

                                   <!-- Settings -->
                                   <td class="w-25">
                                    <div class="box" id="option_btn_Settings">
                                        <span id="option_name_Settings" class="w-100 text-wrap">Settings</span>
                                    </div>
                                   </td>
                                   
                                </tr>
                            </table>
                        </div>
                    </div>   
            </div>
            </div>
        </div>

        <!-- PAGE 2.1 : EDIT PRODUCTS -->
        <div id="page_products" class="page hidden" style="width:100%; height:100vh;">
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
                        <span>EDIT PRODUCTS</span>
                    </div>
                    
                </div>
                <div class="card-body"></div>
                    <div class="card-form">
                        <div class="form-group">
                            <table class="table-admin-main" style="width:100%;">
                                <tr>
                                    <!--PRODUCTS -->
                                   <td class="w-25">
                                    <div class="box" id="option_btn_Products_1">
                                        <span id="option_name_Products_1" class="w-100 text-wrap">Product 1</span>
                                    </div>
                                   </td>

                                   <td class="w-25">
                                    <div class="box" id="option_btn_Products_2">
                                        <span id="option_name_Products_2" class="w-100 text-wrap">Product 2</span>
                                    </div>
                                   </td>

                                   <td class="w-25">
                                    <div class="box" id="option_btn_Products_3">
                                        <span id="option_name_Products_3" class="w-100 text-wrap">Product 3</span>
                                    </div>
                                   </td>

                                </tr>
                            </table>
                        </div>
                    </div>   
            </div>
            </div>
        </div>

        <!-- PAGE 2.1.1 : EDIT PRODUCTS FORM -->
        <div id="page_products_edit" class="page hidden" style="width:100%; height:100vh;">
            <!-- <div style="width: 100%; margin:auto;">
                <button class="btn_back" style="width: 10%;" > < </button>
            </div> -->
            <div class="d-flex justify-content-center align-items-center" style="width:100%; gap:20px; height: 90vh;">
            <div class="card border">
                <div class="card-header text-center">
                    <div class="main-header">
                        <span class="mh-left">LAUNDRO</span><span class="mh-right">FILL</span>
                    </div>
                    <div class="sub-header">
                        <span>PRODUCT </span><span id="product_id"></span>
                    </div>
                    
                </div>
                <div class="card-body"></div>
                    <div class="card-form">
                        <div class="form-group">
                            <div class="row">
                                <table class="table-form w-50">
                                    <tr>
                                        <td class="td-label">
                                            <label for="product_type">Type: </label>
                                        </td>
                                        <td>
                                            <select type="text" class="form-control" id="product_type" placeholder="Product Type">
                                                <option value="Liquid Detergent">Liquid Detergent</option>
                                                <option value="Fabric Conditioner" >Fabric Conditioner</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="td-label">
                                            <label for="product_name">Name: </label>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="product_name" placeholder="Product Name">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="td-label">
                                            <label for="product_desc">Desc: </label>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="product_desc" placeholder="Product Description">
                                        </td>
                                    </tr>
                                </table>
    
                                <table class="table-form w-50">
                                    <tr>
                                        <td class="td-label">
                                            <label for="" id="product_vol1" >Vol 1: </label>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" id="unit_price_1" placeholder="Unit Price 1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="td-label">
                                            <label for="" id="product_vol2" >Vol 2: </label>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" id="unit_price_2" placeholder="Unit Price 2">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="td-label">
                                            <label for="" id="product_vol3" >Vol 3: </label>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" id="unit_price_3" placeholder="Unit Price 3">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="btn-div text-right" style="padding:30px 0;">
                                <button id="btn_ep_cancel">Back</button>
                                <button id="btn_ep_edit">Edit</button>
                                <button id="btn_ep_update" class="hidden">Update</button>
                            </div>
                            


                        </div>
                    </div>   
            </div>
            </div>
        </div>

        <!-- PAGE 2.2: TRANSACTION -->
        <div id="page_transactions" class="page hidden" style="width:100%; height:100vh;">
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
                        <span>TRANSACTION HISTORY</span>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="card-form">
                        <div class="">
                            <div class="form-group">
                                <table class="table-table" style="width:100%;">
                                    <tr>
                                        <td>
                                            <label for="transaction_from">From: </label>
                                        </td>
                                        <td>
                                            <input type="date" class="form-control" id="transaction_from">
                                        </td>
                                        <td>
                                            <label for="transaction_to">To: </label>
                                        </td>
                                        <td>
                                            <input type="date" class="form-control" id="transaction_to">
                                        </td>
                                        <td>
                                            <input type="button" class="form-control" id="transaction_view" value="VIEW">
                                        </td>
                                    </tr>
                                   
                                </table>
                            </div>
                        </div>
                        <div class="form-group" style="height: 30vh; overflow: auto;">
                            <table id="table_transaction" class="table" >
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>DATE</th>
                                        <th>PRODUCT</th>
                                        <th>SERVICE</th>
                                        <th>LOAD</th>
                                        <th>FRABRIC</th>
                                        <th>STAIN</th>
                                        <th>VOLUME</th>
                                        <th>PRICE</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            
                        </div>
                    </div>   
                </div>
                    
            </div>
            </div>
        </div>

        <!-- PAGE 2.3: REPORTS -->
        <div id="page_reports" class="page hidden" style="width:100%; height:100vh;">
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
                        <span>REPORTS</span>
                    </div>
                    
                </div>
                <div class="card-body"></div>
                    <div class="card-form">
                        <div class="form-group">
                            <table class="table-admin-main" style="width:100%;">
                                <tr>
                                    <!--REPORTS -->
                                   <td class="w-25">
                                    <div class="box" id="option_btn_reports_sales">
                                        <span id="option_name_reports_sales" class="w-100 text-wrap">SALES</span>
                                    </div>
                                   </td>

                                   <td class="w-25">
                                    <div class="box" id="option_btn_reports_inventory">
                                        <span id="option_name_reports_inventory" class="w-100 text-wrap">INVENTORY</span>
                                    </div>
                                   </td>

                                   <td class="w-25">
                                    <div class="box" id="option_btn_reports_monitoring">
                                        <span id="option_btn_reports_monitoring" class="w-100 text-wrap">MONITORING</span>
                                    </div>
                                   </td>

                                </tr>
                            </table>
                        </div>
                    </div>   
                </div>
            </div>
        </div>

        <!-- PAGE 2.4:   -->
        <div id="page_monitoring" class="page hidden" style="width:100%; height:100vh;">
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
                        <span>REPORTS</span>
                    </div>
                    
                </div>
                <div class="card-body"></div>
                    <div class="card-form">
                        <div class="form-group">
                            <table class="table-admin-main" style="width:100%;">
                                <tr>
                                <div class="progress">
                                    <label class="product_name1">Product 1</label>
                                    <div id="progress_bar1" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="progress">
                                    <label class="product_name2">Product 2</label>
                                    <div id="progress_bar2" class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="progress">
                                    <label class="product_name3">Product 3</label>  
                                    <div id="progress_bar3" class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                </tr>
                            </table>
                        </div>
                    </div>   
                </div>
            </div>
        </div>

        <!-- PAGE 2.3.1: REPORTS TABLE -->
        <div id="page_reports_table" class="page hidden" style="width:100%; height:100vh;">
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
                        <span id="report_name"></span><span> REPORT</span> 
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="card-form hidden" id="reports_sales_card">
                        <div class="">
                            <div class="form-group">
                                <table class="table-table" style="width:100%;">
                                    <tr>
                                        <td>
                                            <label for="reports_from">From: </label>
                                        </td>
                                        <td>
                                            <input type="date" class="form-control" id="reports_from">
                                        </td>
                                        <td>
                                            <label for="reports_to">To: </label>
                                        </td>
                                        <td>
                                            <input type="date" class="form-control" id="reports_to">
                                        </td>
                                        <td>
                                            <input type="button" class="form-control" id="reports_view" value="VIEW">
                                        </td>
                                    </tr>
                                   
                                </table>
                            </div>
                        </div>
                        <div class="form-group" style="height: 30vh; overflow: auto;">
                            <table id="table_reports_sales" class="table" >
                                <thead class="thead-dark">
                                <tr>
                                        <th>ID</th>
                                        <th>DATE</th>
                                        <th>PRODUCT</th>
                                        <th>SERVICE</th>
                                        <th>LOAD</th>
                                        <th>FRABRIC</th>
                                        <th>STAIN</th>
                                        <th>VOLUME</th>
                                        <th>TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div> 
                    
                    
                    <div class="card-form hidden" id="reports_inventory_card">
                        <div class="">
                            <div class="form-group">
                                <table class="table-table" style="width:100%;">
                                    <tr>
                                        <td>
                                            <input type="button" class="form-control" id="reports_inventory_view" value="VIEW">
                                        </td>
                                    </tr>
                                   
                                </table>
                            </div>
                        </div>
                        <div class="form-group" style="height: 30vh; overflow: auto;">
                            <table id="table_reports_inventory" class="table" >
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>TYPE</th>
                                        <th>NAME</th>
                                        <th>DESCRIPTION</th>
                                        <th>VOLUME</th>
                                        <th>PRICE</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div> 
                </div>
                    
            </div>
            </div>
        </div>

        <!-- PAGE 2.4: SETTINGS -->
        <div id="page_settings" class="page hidden" style="width:100%; height:100vh;">
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
                        <span>SETTINGS</span>
                    </div>
                    
                </div>
                <div class="card-body"></div>
                    <div class="card-form">
                        <div class="form-group">
                            <table class="table-admin-main" style="width:100%;">
                                <tr>
                                    <!--REPORTS -->
                                   <td class="w-25">
                                    <div class="box" id="option_btn_settings_account">
                                        <span id="option_btn_settings_account" class="w-100 text-wrap">USER ACCOUNT</span>
                                    </div>
                                   </td>

                                   <td class="w-25">
                                    <div class="box" id="option_name_reports_logout">
                                        <span id="option_name_reports_logout" class="w-100 text-wrap">LOGOUT</span>
                                    </div>
                                   </td>

                                </tr>
                            </table>
                        </div>
                    </div>   
                </div>
            </div>
        </div>

         <!-- PAGE 2.4.1 SETTINGS ACCOUNT -->
         <div id="page_account" class="page hidden" style="width:100%; height:100vh;">
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
                        <span>ACCOUNT SETTINGS</span>
                    </div>
                </div>
                <div class="card-body"></div>
                    <div class="card-form">
                        <div class="form-group">
                            <div class="row">
                                <table class="table-form w-100">
                                    <tr>
                                        <td class="td-label">
                                            <select type="text" class="form-control" id="settings_user_type" placeholder="User Type">
                                                <option value="admin">ADMIN</option>
                                                <option value="user" >USER</option>
                                            </select>
                                        </td>
                                        <td>
                                            <!-- <label> Change Password</label> <br> -->
                                            <span id="settings_error_message" class="hidden" style="font-size:20px; color:red;">* password mismatch</span>
                                            <input type="text" class="form-control" id="settings_new_username" placeholder="New Username">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="td-label">
                                            <input type="text" class="form-control" id="settings_username" placeholder="Old Username">
                                        </td>
                                        <td>
                                            <input type="password" class="form-control" id="settings_new_password" placeholder="New Password" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="td-label">
                                            <input type="password" class="form-control" id="settings_old_password" placeholder="Old Password">
                                        </td>
                                        </td>
                                        <td>
                                            <input type="password" class="form-control" id="settings_confirm_password" placeholder="Confirm Password" disabled>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="btn-div text-right" style="padding:30px 0;">
                                <button type="button" id="btn_ua_cancel">Back</button>
                                <button type="button" id="btn_ua_edit" >Edit</button>
                                <button type="button" id="btn_ua_update" class="hidden">Update</button>
                            </div>

                        </div>
                    </div>   
                </div>
            </div>
        </div>


    </div>

    <div class="modal-div">

        <!-- SUCCESS MESSAGE -->
        <div class="modal" tabindex="-1" role="dialog" id="modal_success">
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
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                </div>
              </div>
            </div>
        </div>

        <!-- LOGOUT MESSAGE -->
        <div class="modal"  role="dialog" id="modal_logout" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document"> 
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Logout</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" id="confirm_logout">YES</button>
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
    <script src="admin-script.js"></script>
</body>

</html>
