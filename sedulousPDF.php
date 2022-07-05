<?php

require_once('autoload.inc.php');

use Dompdf\Dompdf;
use Dompdf\Options;
// echo "<pre>";
//print_r($_POST); die();
if (isset($_POST['submit'])) {
    error_reporting(0);


    // print_r($_POST);
    $html = '<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    </head>
    
    <body>
        <div class="container-fluid">
            <form action="" method="POST" id="validation">
                <div class="d-flex align-items-center justify-content-center cormorant">
                    <img src="logo.png" alt="">
                    <!-- <div class=""> -->
                    <h1> CONTRACT TRAVEL ESTIMATE</h1>
                    <!-- </div> -->
                </div>
                <div class="row mb-2 mt-2">
                    <div class="col-12 col-md-12 col-lg-12 mb-2">
                        <div class="row mb-2">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <label for="name">Name:<span style="color:#ff0000">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name">
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <label for="date">Trip Dates:<span style="color:#ff0000">*</span></label>
                                <input type="date" class="form-control" id="date" name="tripDate">
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <label for="number">EMPLOYEE NUMBER:<span style="color:#ff0000">*</span></label>
                                <input type="number" class="form-control" id="number" name="empNumber" placeholder="Employee Number">
                            </div>
                        </div>
                        <div class="row mb-2">
    
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <label for="text">SITE:<span style="color:#ff0000">*</span></label>
                                <input type="text" class="form-control" id="text" name="site">
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <label for="date">DATE PREPARED:<span style="color:#ff0000">*</span></label>
                                <input type="date" class="form-control" id="datePrepared" name="datePrepared">
                            </div>
                        </div>
    
                        <button class="btn btn-success btn-sm my-2" type="button" id="btn">Add Column</button>
                        <button class="btn btn-success btn-sm my-2" type="button" onclick="remove()" id="btn">Delete</button>
                        <button class="btn btn-success btn-sm my-2 d-none" type="button" onclick="check()" id="continueBtn">Continuation Sheet</button>
    
                        <table id="table" class="center">
                            <tr class="default-row custom-row border-top border-right border-black" data-type="text">
                                <th class="border border-black">NAME OF CITY</th>
                                <td class="border border-black"><input type="text" name="city" class="w-100"></td>
                                <td><b>Total Expenses</b></td>
                            </tr>
                            <tr class="default-row custom-row border-right border-black" data-type="date">
                                <th class="border border-black">DATES</th>
                                <td class="border border-black"><input type="date" name="date" class="w-100"></td>
                                <td></td>
                            </tr>
                            <tr class="default-row border border-black custom-row" data-type="number" data-id="1">
                                <td class="border border-black">AIRFARE</td>
                                <td><input type="number" name="airfare" class="w-100 column1" oninput="calculate(this)"></td>
                                <td class="border border-black" id="row_1"></td>
                            </tr>
                            <tr class="default-row border border-black custom-row" data-type="number" data-id="2">
                                <td class="border border-black">AIRLINE SERVICE FEE</td>
                                <td><input type="number" name="airservicefee" class="w-100 column1" oninput="calculate(this)"></td>
                                <td class="border border-black" id="row_2"></td>
                            </tr>
                            <tr class="default-row border border-black custom-row" data-type="number" data-id="3">
                                <td class="border border-black">LODGING</td>
                                <td><input type="number" name="lodging" class="w-100 column1" oninput="calculate(this)"></td>
                                <td class="border border-black" id="row_3"></td>
                            </tr>
                            <tr class="default-row border border-black custom-row" data-type="number" data-id="4">
                                <td class="border border-black">LODGING TAXES</td>
                                <td><input type="number" name="lodgingtaxes" class="w-100 column1" oninput="calculate(this)"></td>
                                <td class="border border-black" id="row_4"></td>
                            </tr>
                            <tr class="default-row border border-black custom-row" data-type="number" data-id="5">
                                <td class="border border-black">Per Diem (MI&E)</td>
                                <td><input type="number" name="perdiem" class="w-100 column1" oninput="calculate(this)"></td>
                                <td class="border border-black" id="row_5"></td>
                            </tr>
                            <tr class="default-row border border-black custom-row" data-type="number" data-id="6">
                                <td class="border border-black">AUTO RENTAL</td>
                                <td><input type="number" name="autorental" class="w-100 column1" oninput="calculate(this)"></td>
                                <td class="border border-black" id="row_6"></td>
                            </tr>
                            <tr class="default-row border border-black custom-row" data-type="number" data-id="7">
                                <td class="border border-black">TOLLS/PARKING</td>
                                <td><input type="number" name="tolls" class="w-100 column1" oninput="calculate(this)"></td>
                                <td class="border border-black" id="row_7"></td>
                            </tr>
                            <tr class="default-row border border-black custom-row" data-type="number" data-id="8">
                                <td class="border border-black">NUMBER OF MILES</td>
                                <td><input type="number" name="noofmiles" class="w-100 column1" oninput="calculate(this)"></td>
                                <td class="border border-black" id="row_8"></td>
                            </tr>
                            <tr class="default-row border border-black custom-row" data-type="number" data-id="9">
                                <td class="border border-black">MILEAGE</td>
                                <td><input type="number" name="mileage" class="w-100 column1" oninput="calculate(this)"></td>
                                <td class="border border-black" id="row_9"></td>
                            </tr>
                            <tr class="default-row border border-black custom-row" data-type="number" data-id="10">
                                <td class="border border-black">TAXI</td>
                                <td><input type="number" name="texi" class="w-100 column1" oninput="calculate(this)"></td>
                                <td class="border border-black" id="row_10"></td>
                            </tr>
                            <tr class="default-row border border-black custom-row" data-type="number" data-id="11">
                                <td class="border border-black">GAS(Rental Vehicle Only)</td>
                                <td><input type="number" name="gas" class="w-100 column1" oninput="calculate(this)"></td>
                                <td class="border border-black" id="row_11"></td>
                            </tr>
                            <tr class="default-row border border-black custom-row" data-type="number" data-id="12">
                                <td class="border border-black">OTHER*</td>
                                <td><input type="number" name="other" class="w-100 column1" oninput="calculate(this)"></td>
                                <td class="border border-black" id="row_12"></td>
                            </tr>
                            <tr class="default-row border border-black custom-row total" data-type="number">
                                <td class="border border-black">TOTAL</td>
                                <td><input type="number" name="total" class="w-100 column1-total" id="total_sum_value"></td>
                                <td class="border border-black" id="sum"></td>
                            </tr>
                        </table><br><br>
    
                        <table id="table2" class="mt-5 d-none">
                            <tr class="default-row custom-row border-top border-right border-black" data-type="text">
                                <th class="border border-black">NAME OF CITY</th>
                                <td class="border border-black"><input type="text" name="city" class="w-100"></td>
                                <td><b>Total Expenses</b></td>
                            </tr>
                            <tr class="default-row custom-row border-right border-black" data-type="date">
                                <th class="border border-black">DATES</th>
                                <td class="border border-black"><input type="date" name="date" class="w-100"></td>
                                <td></td>
                            </tr>
                            <tr class="default-row border border-black custom-row" data-type="number" data-id="1">
                                <td class="border border-black">AIRFARE</td>
                                <td><input type="number" name="airfare" class="w-100 column1" oninput="calculate(this)"></td>
                                <td class="border border-black" id="row_1"></td>
                            </tr>
                            <tr class="default-row border border-black custom-row" data-type="number" data-id="2">
                                <td class="border border-black">AIRLINE SERVICE FEE</td>
                                <td><input type="number" name="airservicefee" class="w-100 column1" oninput="calculate(this)"></td>
                                <td class="border border-black" id="row_2"></td>
                            </tr>
                            <tr class="default-row border border-black custom-row" data-type="number" data-id="3">
                                <td class="border border-black">LODGING</td>
                                <td><input type="number" name="lodging" class="w-100 column1" oninput="calculate(this)"></td>
                                <td class="border border-black" id="row_3"></td>
                            </tr>
                            <tr class="default-row border border-black custom-row" data-type="number" data-id="4">
                                <td class="border border-black">LODGING TAXES</td>
                                <td><input type="number" name="lodgingtaxes" class="w-100 column1" oninput="calculate(this)"></td>
                                <td class="border border-black" id="row_4"></td>
                            </tr>
                            <tr class="default-row border border-black custom-row" data-type="number" data-id="5">
                                <td class="border border-black">Per Diem (MI&E)</td>
                                <td><input type="number" name="perdiem" class="w-100 column1" oninput="calculate(this)"></td>
                                <td class="border border-black" id="row_5"></td>
                            </tr>
                            <tr class="default-row border border-black custom-row" data-type="number" data-id="6">
                                <td class="border border-black">AUTO RENTAL</td>
                                <td><input type="number" name="autorental" class="w-100 column1" oninput="calculate(this)"></td>
                                <td class="border border-black" id="row_6"></td>
                            </tr>
                            <tr class="default-row border border-black custom-row" data-type="number" data-id="7">
                                <td class="border border-black">TOLLS/PARKING</td>
                                <td><input type="number" name="tolls" class="w-100 column1" oninput="calculate(this)"></td>
                                <td class="border border-black" id="row_7"></td>
                            </tr>
                            <tr class="default-row border border-black custom-row" data-type="number" data-id="8">
                                <td class="border border-black">NUMBER OF MILES</td>
                                <td><input type="number" name="noofmiles" class="w-100 column1" oninput="calculate(this)"></td>
                                <td class="border border-black" id="row_8"></td>
                            </tr>
                            <tr class="default-row border border-black custom-row" data-type="number" data-id="9">
                                <td class="border border-black">MILEAGE</td>
                                <td><input type="number" name="mileage" class="w-100 column1" oninput="calculate(this)"></td>
                                <td class="border border-black" id="row_9"></td>
                            </tr>
                            <tr class="default-row border border-black custom-row" data-type="number" data-id="10">
                                <td class="border border-black">TAXI</td>
                                <td><input type="number" name="texi" class="w-100 column1" oninput="calculate(this)"></td>
                                <td class="border border-black" id="row_10"></td>
                            </tr>
                            <tr class="default-row border border-black custom-row" data-type="number" data-id="11">
                                <td class="border border-black">GAS(Rental Vehicle Only)</td>
                                <td><input type="number" name="gas" class="w-100 column1" oninput="calculate(this)"></td>
                                <td class="border border-black" id="row_11"></td>
                            </tr>
                            <tr class="default-row border border-black custom-row" data-type="number" data-id="12">
                                <td class="border border-black">OTHER*</td>
                                <td><input type="number" name="other" class="w-100 column1" oninput="calculate(this)"></td>
                                <td class="border border-black" id="row_12"></td>
                            </tr>
                            <tr class="default-row border border-black custom-row total" data-type="number">
                                <td class="border border-black">TOTAL</td>
                                <td><input type="number" name="total" class="w-100 column1-total" id="total_sum_value"></td>
                                <td class="border border-black" id="sum"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div>
                    <tr class="default-row static-row">
                        <td>
                            <h6>Continuation Sheet Totals =></h6>
                        </td>
                        <td>yeuyrtu</td>
                        <td class="border border-black">
    
                        </td>
                    </tr>
                    <tr class="default-row static-row">
                        <td>
                            <h6>TOTAL EXPENSES =></h6>
                        </td>
                        <td>dugvt</td>
                        <td class="border border-black"></td>
                    </tr>
                    <tr class="default-row static-row">
                        <td>
                            <h6>Travel Advance Amount Received =></h6>
                        </td>
                        <td></td>
                        <td class="border border-black"></td>
                    </tr>
                    <tr class="default-row static-row">
                        <td>
                            <h6>TOTAL Due Employee =></h6>
                        </td>
                        <td></td>
                        <td class="border border-black"></td>
                    </tr>
                    <tr class="default-row static-row">
                        <td></td>
                        <td></td>
                        <td class="border border-black">Total</td>
                    </tr>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <label for="reason">REASON FOR TRAVEL OR EXPENSE:<span style="color:#ff0000">*</span></label>
                                <textarea name="reason" id="reason" rows="6" maxlength="400" placeholder="Write your thoughts..." class="form-control w-100 h-100"></textarea>
                            </div>
                            <div class="col-12  mt-5">
                                <div class="row align-items-center">
                                    <div class="col-sm-8">
                                        <label for="additionl">ADDITIONAL COMMENTS:</label>
                                        <textarea name="addComment" id="additional" maxlength="200" class="form-control w-100 h-100" placeholder="Add a comment... " rows="4"></textarea>
                                    </div>
                                    <div class="col-sm-4">
                                        <h6 class="text-right">ACCOUNT DISTRIBUTION</h6>
                                        <div class="row">
                                            <div class="col-12 col-md-3 col-lg-3">
                                                <span>Site:<span style="color:#ff0000">*</span> </span>
                                            </div>
                                            <div class="col-12 col-md-9 col-lg-9">
                                                <input type="text" name="accSite" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-12 col-md-3 col-lg-3">
                                                <span>Project:<span style="color:#ff0000">*</span> </span>
                                            </div>
                                            <div class="col-12 col-md-9 col-lg-9">
                                                <input type="text" name="accProject" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-12 col-md-3 col-lg-3">
                                                <span>Amount: <span style="color:#ff0000">*</span></span>
                                            </div>
                                            <div class="col-12 col-md-9 col-lg-9">
                                                <input type="text" name="amount" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <h6>TO AVOID PROCESSING DELAYS, YOU MUST ATTACH ALL AIRLINE TICKET RECEIPTS INCLUDING CHANGE TICKETS MADE TO THE ORIGINAL TRIP!</h6>
                </div>
                <div class="col-sm-8 mt-5 text-right">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <span>EMPLOYEE SIGNATURE:<span style="color:#ff0000">*</span> </span>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <input type="text" name="sign" class="form-control">
                            <!-- <canvas id="signature" name="sign" width="400" height="150" style="border: 1px solid #ddd;"></canvas>
                            <br>
                            <button id="clear-signature">Clear</button> -->
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-12 col-md-6 col-lg-6">
                            <span>SUPERVISOR SIGNATURE:<span style="color:#ff0000">*</span> </span>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <input type="text" name="supervisorSign" class="form-control">
                            <!-- <canvas id="supervisorSign" name="sign" width="400" height="150" style="border: 1px solid #ddd;"></canvas>
                            <br>
                            <button id="clear">Clear</button> -->
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-12 col-md-6 col-lg-6">
                            <span>DATE APPROVED: <span style="color:#ff0000">*</span></span>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <input type="date" name="dateApproved" class="form-control">
                        </div>
                    </div>
    
                </div>
                <!-- <button type="button" class="btn btn-success btn-sm my-2"  onclick="generatePDF()">Create a PDF</button> -->
    
                <button type="button" onclick=onClick()  class="btn btn-success btn-sm my-2" name="submit">Submit</button>
    
    
            </form>
        </div>
        </div>
       
        </body>
    
        </html>';



    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "sedulous";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $fullName = $_POST['name'];
    $trip_date = $_POST['tripDate'];
    $emp_number = $_POST['empNumber'];
    $site = $_POST['site'];
    $datePrepared = $_POST['datePrepared'];
    $reason = $_POST['reason'];
    $addComment = $_POST['addComment'];
    $accSite = $_POST['accSite'];
    $accProject = $_POST['accProject'];
    $amount = $_POST['amount'];
    $employeeSign = $_POST['sign'];
    $supervisorSign = $_POST['supervisorSign'];
    $dateApproved = $_POST['dateApproved'];

    $sql = "INSERT INTO `customers` VALUES('$fullName', '$trip_date', '$emp_number',  '$site', '$datePrepared', '$reason',  '$addComment', '$accSite', '$accProject' , '$amount', '$employeeSign', '$supervisorSign', '$dateApproved')";
    $data = mysqli_query($conn, $sql);
}

$document = new Dompdf();
$options = $document->getOptions();
$options->setDefaultFont('Courier');
$options->setIsRemoteEnabled(true);
$options->setIsHtml5ParserEnabled(true);
$document->setOptions($options);
$document->loadHtml(($html));
$document->setPaper('A4', 'portrait');



// $document->setOptions(['isRemoteEnabled' => true]);
// // $document->setOptions('enable_css_float',true);

$document->render();

$document->output();
ob_end_clean();
$output = $document->output();
$document->stream('my.pdf', array('Attachment' => 0));
