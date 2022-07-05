<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Estimate</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .border-black {
            border-color: #000 !important;
        }

        .cormorant {
            font-family: 'Cormorant Garamond', serif;
        }

        table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;

        }

        table.center {
            margin-left: auto;
            margin-right: auto;
        }

        #reason {
            font-size: 130%;
        }

        .container {
            background-color: #f2f2f2;
            padding: 10px 15px 10px 15px;
            border: 1px solid lightgrey;
            border-radius: 3px;
        }

        label {
            cursor: pointer;
            color: #555;
            display: block;
            padding: 10px;
            margin: 3px;
        }

        .danger {
            background-color: #f44336;
        }

        .danger:hover {
            background: #da190b;
        }

        #additional {
            font-size: 130%;
        }

        .error {
            color: red;
        }

        .hover:hover {
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
        }

        .btn-info {
            float:right;
        }

    </style>
</head>

<body>
    <div class="container my-3 shadow">
        <div class="card-body">

            <button style="font-size:15px" class="btn btn-info btn-sm" onClick="refreshPage()"><i class="fa fa-refresh"></i></button>
          <!-- <button type="button" style="float:right" class="btn btn-success btn-sm my-2" onClick="refreshPage()">Refresh Page</button> -->
          
          <form action="estimatePDF.php" method="POST" id="validation" enctype="multipart/form-data">
              <div class="d-flex align-items-center justify-content-center cormorant">
                  <img src="logo.png" alt="">
                  <!-- <div class=""> -->
                      <h1 style="color:green"> CONTRACT TRAVEL ESTIMATE</h1>
                    
                    <!-- </div> -->
                </div>
                <div class="row mb-2 mt-2">
                    <input type="hidden" name="tableCount" id="tableCount" value="1">
                    <input type="hidden" name="sheet_table" id="sheet_table">
                    <input type="hidden" name="sheet_table2" id="sheet_table2">
                    <input type="hidden" name="sheet_table3" id="sheet_table3">
                    <input type="hidden" name="columncount" id="count_column">
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
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <label for="email">EMAIL:<span style="color:#ff0000">*</span></label>
                                <input type="email" class="form-control" id="email_id" name="email" onfocusout="bitrixMail(this);" placeholder="bitrix email address">
                            </div>
                        </div>
                        <div id="tableDiv">
                            <button class="btn btn-success btn-sm my-2" type="button" onclick="add(this)" data-table="table">Add Column</button>
                            <button class="btn btn-success btn-sm my-2" type="button" onclick="remove(this)" id="btn" data-table="table">Delete Column</button>
                            <button class="btn btn-success btn-sm my-2 d-none continueBtn" type="button" onclick="check(this);" data-div="table2Div">Continuation Sheet</button>
                            <table id="table" class="center">
                                <tr class="default-row custom-row border-top border-right border-black" data-type="text" data-name="data[1][NAME OF CITY]">
                                    <th class="border border-black">NAME OF CITY</th>
                                    <td class="border border-black"><input type="text" name="data[1][NAME OF CITY][1]" class="w-100"></td>
                                    <td><b>Total Expenses</b></td>
                                </tr>
                                <tr class="default-row custom-row border-right border-black" data-type="date" data-name="data[1][DATES]">
                                    <th class="border border-black">DATES</th>
                                    <td class="border border-black"><input type="date" name="data[1][DATES][1]" class="w-100"></td>
                                    <td></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="1" data-name="data[1][AIRFARE]">
                                    <td class="border border-black">AIRFARE</td>
                                    <td><input type="number" name="data[1][AIRFARE][1]" class="w-100 column1" data-table="table" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table_row_1"><input type="number" class="w-100" name="data[1][AIRFARE][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="2" data-name="data[1][AIRLINE SERVICE FEE]">
                                    <td class="border border-black">AIRLINE SERVICE FEE</td>
                                    <td><input type="number" name="data[1][AIRLINE SERVICE FEE][1]" class="w-100 column1" data-table="table" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table_row_2"><input type="number" class="w-100" name="data[1][AIRLINE SERVICE FEE][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="3" data-name="data[1][LODGING]">
                                    <td class="border border-black">LODGING</td>
                                    <td><input type="number" name="data[1][LODGING][1]" class="w-100 column1" data-table="table" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table_row_3"><input type="number" class="w-100" name="data[1][LODGING][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="4" data-name="data[1][LODGING TAXES]">
                                    <td class="border border-black">LODGING TAXES</td>
                                    <td><input type="number" name="data[1][LODGING TAXES][1]" class="w-100 column1" data-table="table" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table_row_4"><input type="number" class="w-100" name="data[1][LODGING TAXES][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="5" data-name="data[1][Per Diem (MI&E)]">
                                    <td class="border border-black">Per Diem (MI&E)</td>
                                    <td><input type="number" name="data[1][Per Diem (MI&E)][1]" class="w-100 column1" data-table="table" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table_row_5"><input type="number" class="w-100" name="data[1][Per Diem (MI&E)][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="6" data-name="data[1][AUTO RENTAL]">
                                    <td class="border border-black">AUTO RENTAL</td>
                                    <td><input type="number" name="data[1][AUTO RENTAL][1]" class="w-100 column1" data-table="table" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table_row_6"><input type="number" class="w-100" name="data[1][AUTO RENTAL][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="7" data-name="data[1][TOLLS/PARKING]">
                                    <td class="border border-black">TOLLS/PARKING</td>
                                    <td><input type="number" name="data[1][TOLLS/PARKING][1]" class="w-100 column1" data-table="table" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table_row_7"><input type="number" class="w-100" name="data[1][TOLLS/PARKING][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="9" data-name="data[1][NUMBER OF MILES]" data-function="true">
                                    <td class="border border-black">NUMBER OF MILES</td>
                                    <td><input type="number" name="data[1][NUMBER OF MILES][1]  " class="w-100 column1 miles" data-table="table" oninput="mapMiles(this);calculate(this);"></td>
                                    <td class="border border-black" id="table_row_8"><input type="text" readonly></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="9" data-name="data[1][MILEAGE]">
                                    <td class="border border-black">MILEAGE <span style="color:green;float: right;border-left: 1px solid;"> $0.5850</span></td>
                                    <td><input type="number" class="column1" name="data[1][MILEAGE][1]"></td>
                                    <td class="border border-black" id="table_row_9"><input type="number" class="w-100" name="data[1][MILEAGE][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="10" data-name="data[1][TAXI]">
                                    <td class="border border-black">TAXI</td>
                                    <td><input type="number" name="data[1][TAXI][1]" class="w-100 column1" data-table="table" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table_row_10"><input type="number" class="w-100" name="data[1][TAXI][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="11" data-name="data[1][GAS(Rental Vehicle Only)]">
                                    <td class="border border-black">GAS(Rental Vehicle Only)</td>
                                    <td><input type="number" name="data[1][GAS(Rental Vehicle Only)][1]" class="w-100 column1" data-table="table" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table_row_11"><input type="number" class="w-100" name="data[1][GAS(Rental Vehicle Only)][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="12" data-name="data[1][OTHER*]">
                                    <td class="border border-black">OTHER*</td>
                                    <td><input type="number" name="data[1][OTHER*][1]" class="w-100 column1" data-table="table" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table_row_12"><input type="number" class="w-100" name="data[1][OTHER*][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row total" data-type="number" data-name="data[1][TOTAL]">
                                    <td class="border border-black">TOTAL</td>
                                    <td><input type="number" name="data[1][TOTAL][1]" class="w-100 column1-total" id="total_sum_value"></td>
                                    <td class="border border-black" id="table_sum"><input type="number" id="main1" class="w-100" name="data[1][TOTAL][row]" value=""></td>
                                </tr>
                            </table>
                        </div>

                        <div class="mt-3">
                            <table>
                                <tr>
                                    <h6>TOTAL OF SHEET 1 =<span id="first" class="table_sheet"></span></h6>
                                </tr>
                                <tr>
                                    <h6>TOTAL OF SHEET 2 =<span id="second" class="table2_sheet"></span></h6>
                                </tr>
                                <tr>
                                    <h6>TOTAL OF SHEET 3 =<span id="third" class="table3_sheet"></span></h6>
                                </tr>
                                <tr>
                                    <h6>TOTAL EXPENSES ESTIMATE= <span id="demo"></span></h6>
                                </tr><br>
                                <tr>
                                    <div>
                                        <h6> Travel Advance Amount Requested (up to 75% total est.) =<span style="position: absolute; margin-left: 10px; margin-top: 3px;"> $ </span> <input type="number" oninput="validateAmount(this)" id="allow" name="travelAmount" style="padding-left: 14px;"><span id="alertSpan" class="text-danger" style="display: none;"></span></h6>
                                    </div>
                                </tr><br>
                                </tr>
                                <h6>TOTAL Due Employee = <span id="totalDue"> </span></h6>
                                </tr><br>
                            </table>
                        </div>

                        <div id="table2Div" class="mt-5 d-none">
                            <button class="btn btn-success btn-sm my-2" type="button" onclick="add(this)" data-table="table2">Add Column</button>
                            <button class="btn btn-success btn-sm my-2" type="button" onclick="remove(this)" id="btn" data-table="table2">Delete Column</button>
                            <button class="btn btn-danger" style="float:right" type="button" onclick="toggleTable(this)" data-table="table2">Remove Table</button>
                            <button class="btn btn-success btn-sm my-2 d-none continueBtn" type="button" onclick="check(this);" data-div="table3Div">Continuation Sheet</button>
                            <table id="table2">
                                <tr class="default-row custom-row border-top border-right border-black" data-type="text" data-name="data[2][NAME OF CITY]">
                                    <th class="border border-black">NAME OF CITY</th>
                                    <td class="border border-black"><input type="text" name="data[2][NAME OF CITY][1]" class="w-100"></td>
                                    <td><b>Total Expenses</b></td>
                                </tr>
                                <tr class="default-row custom-row border-right border-black" data-type="date" data-name="data[2][DATES]">
                                    <th class="border border-black">DATES</th>
                                    <td class="border border-black"><input type="date" name="data[2][DATES][1]" class="w-100"></td>
                                    <td></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="1" data-name="data[2][AIRFARE]">
                                    <td class="border border-black">AIRFARE</td>
                                    <td><input type="number" name="data[2][AIRFARE][1]" class="w-100 column1" data-table="table2" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table2_row_1"><input type="number" class="w-100" name="data[2][AIRFARE][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="2" data-name="data[2][AIRLINE SERVICE FEE]">
                                    <td class="border border-black">AIRLINE SERVICE FEE</td>
                                    <td><input type="number" name="data[2][AIRLINE SERVICE FEE][1]" class="w-100 column1" data-table="table2" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table2_row_2"><input type="number" class="w-100" name="data[2][AIRLINE SERVICE FEE][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="3" data-name="data[2][LODGING]">
                                    <td class="border border-black">LODGING</td>
                                    <td><input type="number" name="data[2][LODGING][1]" class="w-100 column1" data-table="table2" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table2_row_3"><input type="number" class="w-100" name="data[2][LODGING][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="4" data-name="data[2][LODGING TAXES]">
                                    <td class="border border-black">LODGING TAXES</td>
                                    <td><input type="number" name="data[2][LODGING TAXES][1]" class="w-100 column1" data-table="table2" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table2_row_4"><input type="number" class="w-100" name="data[2][LODGING TAXES][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="5" data-name="data[2][Per Diem (MI&E)]">
                                    <td class="border border-black">Per Diem (MI&E)</td>
                                    <td><input type="number" name="data[2][Per Diem (MI&E)][1]" class="w-100 column1" data-table="table2" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table2_row_5"><input type="number" class="w-100" name="data[2][Per Diem (MI&E)][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="6" data-name="data[2][AUTO RENTAL]">
                                    <td class="border border-black">AUTO RENTAL</td>
                                    <td><input type="number" name="data[2][AUTO RENTAL][1]" class="w-100 column1" data-table="table2" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table2_row_6"><input type="number" class="w-100" name="data[2][AUTO RENTAL][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="7" data-name="data[2][TOLLS/PARKING]">
                                    <td class="border border-black">TOLLS/PARKING</td>
                                    <td><input type="number" name="data[2][TOLLS/PARKING][1]" class="w-100 column1" data-table="table2" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table2_row_7"><input type="number" class="w-100" name="data[2][TOLLS/PARKING][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="9" data-name="data[2][NUMBER OF MILES]" data-function="true">
                                    <td class="border border-black">NUMBER OF MILES</td>
                                    <td><input type="number" name="data[2][NUMBER OF MILES][1]" class="w-100 column1 miles" data-table="table2" oninput="mapMiles(this);calculate(this);"></td>
                                    <td class="border border-black" id="table_row_8"></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="9" data-name="data[2][MILEAGE]">
                                    <td class="border border-black">MILEAGE <span style="color:green;float: right;border-left: 1px solid;"> $0.5850</span></td>
                                    <td><input type="number" name="data[2][MILEAGE][1]" class="w-100 column1" data-table="table2" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table2_row_9"><input type="number" class="w-100" name="data[2][MILEAGE][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="10" data-name="data[2][TAXI]">
                                    <td class="border border-black">TAXI</td>
                                    <td><input type="number" name="data[2][TAXI][1]" class="w-100 column1" data-table="table2" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table2_row_10"><input type="number" class="w-100" name="data[2][TAXI][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="11" data-name="data[2][GAS(Rental Vehicle Only)]">
                                    <td class="border border-black">GAS(Rental Vehicle Only)</td>
                                    <td><input type="number" name="data[2][GAS(Rental Vehicle Only)][1]" class="w-100 column1" data-table="table2" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table2_row_11"><input type="number" class="w-100" name="data[2][GAS(Rental Vehicle Only)][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="12" data-name="data[2][OTHER*]">
                                    <td class="border border-black">OTHER*</td>
                                    <td><input type="number" name="data[2][OTHER*][1]" class="w-100 column1" data-table="table2" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table2_row_12"><input type="number" class="w-100" name="data[2][OTHER*][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row total" data-type="number" data-name="data[2][TOTAL]">
                                    <td class="border border-black">TOTAL</td>
                                    <td><input type="number" name="data[2][TOTAL][1]" class="w-100 column1-total" id="total_sum_value"></td>
                                    <td class="border border-black" id="table2_sum"><input type="number" id="main2" class="w-100" name="data[2][TOTAL][row]" value=""></td>
                                </tr>
                            </table>
                        </div>
                        <div id="table3Div" class="mt-5 d-none">
                            <button class="btn btn-success btn-sm my-2" type="button" onclick="add(this)" data-table="table3">Add Column</button>
                            <button class="btn btn-success btn-sm my-2" type="button" onclick="remove(this)" id="btn" data-table="table3">Delete Column</button>
                            <button class="btn btn-danger" style="float:right" type="button" onclick="toggleTable(this)" data-table="table3">Remove Table</button>
                            <table id="table3">
                                <tr class="default-row custom-row border-top border-right border-black" data-type="text" data-name="data[3][NAME OF CITY]">
                                    <th class="border border-black">NAME OF CITY</th>
                                    <td class="border border-black"><input type="text" name="data[3][NAME OF CITY][1]" class="w-100"></td>
                                    <td><b>Total Expenses</b></td>
                                </tr>
                                <tr class="default-row custom-row border-right border-black" data-type="date" data-name="data[3][DATES]">
                                    <th class="border border-black">DATES</th>
                                    <td class="border border-black"><input type="date" name="data[3][DATES][1]" class="w-100"></td>
                                    <td></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="1" data-name="data[3][AIRFARE]">
                                    <td class="border border-black">AIRFARE</td>
                                    <td><input type="number" name="data[3][AIRFARE][1]" class="w-100 column1" data-table="table3" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table3_row_1"><input type="number" class="w-100" name="data[3][AIRFARE][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="2" data-name="data[3][AIRLINE SERVICE FEE]">
                                    <td class="border border-black">AIRLINE SERVICE FEE</td>
                                    <td><input type="number" name="data[3][AIRLINE SERVICE FEE][1]" class="w-100 column1" data-table="table3" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table3_row_2"><input type="number" class="w-100" name="data[3][AIRLINE SERVICE FEE][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="3" data-name="data[3][LODGING]">
                                    <td class="border border-black">LODGING</td>
                                    <td><input type="number" name="data[3][LODGING][1]" class="w-100 column1" data-table="table3" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table3_row_3"><input type="number" class="w-100" name="data[3][LODGING][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="4" data-name="data[3][LODGING TAXES]">
                                    <td class="border border-black">LODGING TAXES</td>
                                    <td><input type="number" name="data[3][LODGING TAXES][1]" class="w-100 column1" data-table="table3" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table3_row_4"><input type="number" class="w-100" name="data[3][LODGING TAXES][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="5" data-name="data[3][Per Diem (MI&E)]">
                                    <td class="border border-black">Per Diem (MI&E)</td>
                                    <td><input type="number" name="data[3][Per Diem (MI&E)][1]" class="w-100 column1" data-table="table3" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table3_row_5"><input type="number" class="w-100" name="data[3][Per Diem (MI&E)][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="6" data-name="data[3][AUTO RENTAL]">
                                    <td class="border border-black">AUTO RENTAL</td>
                                    <td><input type="number" name="data[3][AUTO RENTAL][1]" class="w-100 column1" data-table="table3" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table3_row_6"><input type="number" class="w-100" name="data[3][AUTO RENTAL][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="7" data-name="data[3][TOLLS/PARKING]">
                                    <td class="border border-black">TOLLS/PARKING</td>
                                    <td><input type="number" name="data[3][TOLLS/PARKING][1]" class="w-100 column1" data-table="table3" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table3_row_7"><input type="number" class="w-100" name="data[3][TOLLS/PARKING][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="9" data-name="data[3][NUMBER OF MILES]" data-function="true">
                                    <td class="border border-black">NUMBER OF MILES</td>
                                    <td><input type="number" name="data[3][NUMBER OF MILES][1]" class="w-100 column1 miles" data-table="table3" oninput="mapMiles(this);calculate(this);"></td>
                                    <td class="border border-black" id="table_row_8"></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="9" data-name="data[3][MILEAGE]">
                                    <td class="border border-black">MILEAGE <span style="color:green;float: right;border-left: 1px solid;"> $0.5850</span></td>
                                    <td><input type="number" name="data[3][MILEAGE][1]" class="w-100 column1" data-table="table3" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table3_row_9"><input type="number" class="w-100" name="data[3][MILEAGE][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="10" data-name="data[3][TAXI]">
                                    <td class="border border-black">TAXI</td>
                                    <td><input type="number" name="data[3][TAXI][1]" class="w-100 column1" data-table="table3" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table3_row_10"><input type="number" class="w-100" name="data[3][TAXI][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="11" data-name="data[3][GAS(Rental Vehicle Only)]">
                                    <td class="border border-black">GAS(Rental Vehicle Only)</td>
                                    <td><input type="number" name="data[3][GAS(Rental Vehicle Only)][1]" class="w-100 column1" data-table="table3" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table3_row_11"><input type="number" class="w-100" name="data[3][GAS(Rental Vehicle Only)][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row" data-type="number" data-id="12" data-name="data[3][OTHER*]">
                                    <td class="border border-black">OTHER*</td>
                                    <td><input type="number" name="data[3][OTHER*][1]" class="w-100 column1" data-table="table3" oninput="calculate(this)"></td>
                                    <td class="border border-black" id="table3_row_12"><input type="number" class="w-100" name="data[3][OTHER*][row]" value=""></td>
                                </tr>
                                <tr class="default-row border border-black custom-row total" data-type="number" data-name="data[3][TOTAL]">
                                    <td class="border border-black">TOTAL</td>
                                    <td><input type="number" name="data[3][TOTAL][1]" class="w-100 column1-total" id="total_sum_value"></td>
                                    <td class="border border-black" id="table3_sum"><input type="number" id="main3" class="w-100" name="data[3][TOTAL][row]" value=""></td>
                                </tr>

                            </table>
                        </div>

                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <label for="reason">REASON FOR TRAVEL OR EXPENSE:<span style="color:#ff0000">*</span></label>
                                <textarea name="reason" id="reason" rows="4" maxlength="400" placeholder="Write your thoughts..." class="form-control w-100 h-100"></textarea>
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
                                                <span>Amount: </span>
                                            </div>
                                            <div class="col-12 col-md-9 col-lg-9">
                                                <input type="number" name="amount" class="form-control">
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
                <div class="col-sm-8 mt-5 ">
                    <div class="d-flex justify-content-between">
                        <!-- <div class="col-12 col-md-6 col-lg-6 "> -->
                        <span>UPLOAD RELEVANT FILES: </span>
                        <input type='file' name='upload[]' multiple>
                        <!-- </div> -->
                        <!-- <div class="col-12 col-md-6 col-lg-6">
                        <input type="text" name="sign" class="form-control"> -->
                        <!-- <canvas id="signature" name="sign" width="400" height="150" style="border: 1px solid #ddd;"></canvas>
                        <br>
                        <button id="clear-signature">Clear</button> -->
                        <!-- </div> -->
                    </div>
                    <!-- <div class="row mt-1">
                    <div class="col-12 col-md-6 col-lg-6">
                        <span>SUPERVISOR SIGNATURE:<span style="color:#ff0000">*</span> </span>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <input type="text" name="supervisorSign" class="form-control">
                        <canvas id="supervisorSign" name="sign" width="400" height="150" style="border: 1px solid #ddd;"></canvas> -->
                    <!-- <br>
                        <button id="clear">Clear</button> -->
                    <!-- </div>
                </div> -->
                    <!-- <div class="row mt-1">
                    <div class="col-12 col-md-6 col-lg-6">
                        <span>DATE APPROVED: <span style="color:#ff0000">*</span></span>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <input type="date" name="dateApproved" class="form-control">
                    </div>
                </div> -->

                </div>
                <!-- <button type="button" class="btn btn-success btn-sm my-2"  onclick="generatePDF()">Create a PDF</button> -->
                <button type="submit" class="btn btn-success btn-lg mt-4 mb-2 hover" name="submit">Submit</button>
            </form>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.3.4/signature_pad.min.js" integrity="sha512-Mtr2f9aMp/TVEdDWcRlcREy9NfgsvXvApdxrm3/gK8lAMWnXrFsYaoW01B5eJhrUpBT7hmIjLeaQe0hnL7Oh1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js" integrity="sha512-FOhq9HThdn7ltbK8abmGn60A/EMtEzIzv1rvuh+DqzJtSGq8BRdEN0U+j0iKEIffiw/yEtVuladk6rsG4X6Uqg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var count = {
            'table': 1,
            'table2': 1,
            'table3': 1
        };

        function add(key) {
            var table = $(key).data('table');
            var tables = $('table').toArray();
            var table_count = table;
            if (count[table] == 4) {
                $('#' + table + 'Div').find('.continueBtn').removeClass('d-none');
                return true;
            }
            count[table]++;
            $('#count_column').val(count[table]);

            var emptyCol = '<td></td>';
            var rows = $('#' + table).find('.custom-row').toArray();
            var staticRows = $('#' + table).find('.static-row').toArray();
            rows.forEach(row => {
                var colCount = addEvent = '';
                var type = $(row).data('type');
                var totalCol = $(row).hasClass('total') ? 'column' + count[table] + '-total' : '';
                type == 'number' && !totalCol ? colCount = 'column' + count[table] : '';
                type == 'number' ? addEvent = 'oninput="calculate(this)"' : addEvent = '';
                var name = $(row).data('name') + '[' + count[table] + ']';
                if (name.match('NUMBER OF MILES'))
                    colCount += ' miles';
                addEvent = $(row).data('function') ? 'oninput="mapMiles(this);calculate(this);"' : addEvent;
                if (totalCol) addEvent = "";
                var col = '<td class="border border-black"><input name="' + name + '" type=' + type + ' class="w-100 ' + colCount + ' ' + totalCol + '" ' + addEvent + ' data-table="' + table_count + '"> </td>';
                $(row).children().last().prev().after(col);
            });
            staticRows.forEach(row => {
                $(row).children().first().after(emptyCol);
            });
        };
        $(document).ready(function() {
            var canvas = document.getElementById("signature");
            var signaturePad = new SignaturePad(canvas);
            $('#clear-signature').on('click', function() {
                signaturePad.clear();
            });
        });


        function check(key) {
            var table = $(key).data('div');
            var tableCount = table.split('table');
            tableCount = tableCount[1].split('Div')[0];
            $('#tableCount').val(tableCount);
            $('#' + table).removeClass('d-none');
        }

        function remove(key) {
            var table = $(key).data('table');
            var tble = document.getElementById(table);
            var row = tble.rows;
            var r = $("#" + table + ' ' + "tr:nth-child(3)");
            var i = r.children('td').length - 2;
            for (var j = 0; j < row.length; j++) {
                if (count[table] > 1) {
                    row[j].deleteCell(i);
                }
            }
            count[table] <= 1 ? count[table] = 1 : count[table]--;
        }
        var colTotal = {
            'table': {},
            'table2': {},
            'table3': {}
        };
        var rowTotal = {
            'table': {},
            'table2': {},
            'table3': {}
        };
        var temp = 0;

        function calculate(key) {
            var table = $(key).data('table');
            if (table == 'table1')
                table = 'table';
            var sum = 0;
            var classList = key.classList;
            var className = classList[1];
            var rowId = $(key).closest('tr').data('id');
            rowId += 2;
            var inputs = $('#' + table).find('.' + className).toArray();
            inputs.forEach(input => {
                colTotal[table][className] = Number(0);
            });
            inputs.forEach(input => {
                if ($(input).attr('oninput') == 'mapMiles(this);' || $(input).hasClass('miles'))
                    return false;
                colTotal[table][className] += Number($(input).val());
            });
            var rowInputs = $('#' + table + ' tr:nth-child(' + rowId + ')').children('td').find('input').toArray();
            rowInputs.pop();
            rowInputs.forEach(inp => {
                rowTotal[table][rowId] = 0;
            });
            rowInputs.forEach(inp => {
                rowTotal[table][rowId] += Number($(inp).val());
            });
            Object.keys(rowTotal[table]).map(index => {
                var rowId = Number(index) - Number(2)
                $('#' + table + '_' + 'row_' + rowId).find('input').val(rowTotal[table][index]);
            });
            Object.keys(colTotal[table]).map(index => {
                $('#' + table).find('.' + index + '-total').val(colTotal[table][index]);
                sum += colTotal[table][index];
            });
            sum = (Math.round(sum * 100) / 100).toFixed(2);
            $('#' + table + '_sum').find('input').val(sum);
            $('.' + table + '_sheet').text(sum);
            $('#sheet_' + table).val(sum);
            temp = 0;
            temp += Number($('#first').text());
            temp += Number($('#second').text());
            temp += Number($('#third').text());
            temp = (Math.round(temp * 100) / 100).toFixed(2);
            $('#demo').html(temp);
        }

        function validateAmount(key) {
            var allowed = 0;
            $('#alertSpan').hide();
            allowed = temp * 0.75;
            if ($('#allow').val() > allowed) {
                allowed = (Math.round(allowed * 100) / 100).toFixed(2);
                $(key).val(allowed);
                $('#alertSpan').html('*Max Travel Advance Amount can be 75% or less').show();
                setTimeout(() => {
                    $('#alertSpan').hide();
                }, 3000);
            }
            $('#totalDue').html((Math.round((temp - $(key).val()) * 100) / 100).toFixed(2));
        }
        $('#validation').validate({
            rules: {
                name: "required",
                tripDate: "required",
                travelAmount: "required",
                // empNumber: {
                //     required: true,
                //     minlength: 7
                // },
                // site: {
                //     required: true,
                //     url: true
                // },
                datePrepared: "required",
                reason: "required",
                // accSite: {
                //     required: true,
                //     url: true
                // },
                accProject: "required",
                amount: "required",
                dateApproved: "required"
            },
            messages: {
                name: "Please Enter Your Name",
                tripDate: "Please Enter Trip Date",
                travelAmount: "Please Enter Amount",
                // empNumber: {
                //     required: "Please Enter Employee Number",
                //     minlength: "Employee Number Must Be 7 Charaters"
                // },
                // site: {
                //     required: "The Field is Required",
                //     url: "Please Enter Valid URL"
                // },
                datePrepared: "Please Field a Date",
                reason: "Please Write Some Reason",
                // accSite: {
                //     required: "The Field is Required",
                //     url: "Please Enter Valid URL"
                // },
                accProject: "Enter a valid project name",
                amount: "Enter amount",
                dateApproved: "Please enter approved date"

            }
        });

        function mapMiles(key) {
            var column = key.classList[1];
            var mileage = $(key).closest('tr').next('tr').find('.' + column);
            mileage.val((key.value * 0.5850).toFixed(2));
        }


        // $('validation').submit(function(event) {
        //     event.preventDefault();
        //     console.log($('input[class^=column]'));
        // })
        function toggleTable(key) {
            var table = $(key).data('table');
            var inputs = $('#' + table + 'Div').find('input').toArray();
            inputs.forEach(input => {
                $(input).val('');
            })
            $('#' + table + 'Div').addClass('d-none');
            $('#demo').html(Number($('#demo').html()) - Number($('.' + table + '_sheet').html()));
            $('.' + table + '_sheet').html('');
            if ($('#tableCount').val() > 1)
                $('#tableCount').val(Number($('#tableCount').val()) - 1);
        }

        function bitrixMail(key) {
            $.ajax({
                type: "POST",
                url: 'userAccess.php',
                dataType: 'json',
                data: {
                    "bitrixEmail": $(key).val()
                },
                success: function(data) {
                    if (data == 0)
                        alert('Email ID Does Not Exist');
                }
            });
        }

        function refreshPage() {
            window.location.reload();
        }


        // if ($('.' + table + '_sheet').text(0.00 && empty)) {
        //     $('.d-none').find("th td :eq(14)").remove();
        // }
    </script>




</body>

</html>