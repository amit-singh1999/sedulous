<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sedulous</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap" rel="stylesheet">
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

        #additional {
            font-size: 130%;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <form action="PDF.php" method="POST" id="validation">
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
                        <tr class="default-row custom-row border-top border-right border-black" data-type="text" data-name="data[NAME OF CITY]">
                            <th class="border border-black">NAME OF CITY</th>
                            <td class="border border-black"><input type="text" name="data[NAME OF CITY][1]"  class="w-100"></td>
                            <td><b>Total Expenses</b></td>
                        </tr>
                        <tr class="default-row custom-row border-right border-black" data-type="date" data-name="data[DATES]">
                            <th class="border border-black">DATES</th>
                            <td class="border border-black"><input type="date" name="data[DATES][1]" class="w-100"></td>
                            <td></td>
                        </tr>
                        <tr class="default-row border border-black custom-row" data-type="number" data-id="1" data-name="data[AIRFARE]">
                            <td class="border border-black">AIRFARE</td>
                            <td><input type="number" name="data[AIRFARE][1]" class="w-100 column1" oninput="calculate(this)"></td>
                            <td class="border border-black" id="row_1"></td>
                        </tr>
                        <tr class="default-row border border-black custom-row" data-type="number" data-id="2" data-name="data[AIRLINE SERVICE FEE]">
                            <td class="border border-black">AIRLINE SERVICE FEE</td>
                            <td><input type="number" name="data[AIRLINE SERVICE FEE][1]" class="w-100 column1" oninput="calculate(this)"></td>
                            <td class="border border-black" id="row_2"></td>
                        </tr>
                        <tr class="default-row border border-black custom-row" data-type="number" data-id="3" data-name="data[LODGING]">
                            <td class="border border-black">LODGING</td>
                            <td><input type="number" name="data[LODGING][1]" class="w-100 column1" oninput="calculate(this)"></td>
                            <td class="border border-black" id="row_3"></td>
                        </tr>
                        <tr class="default-row border border-black custom-row" data-type="number" data-id="4" data-name="data[LODGING TAXES]">
                            <td class="border border-black">LODGING TAXES</td>
                            <td><input type="number" name="data[LODGING TAXES][1]" class="w-100 column1" oninput="calculate(this)"></td>
                            <td class="border border-black" id="row_4"></td>
                        </tr>
                        <tr class="default-row border border-black custom-row" data-type="number" data-id="5" data-name="data[Per Diem (MI&E)]">
                            <td class="border border-black">Per Diem (MI&E)</td>
                            <td><input type="number" name="data[Per Diem (MI&E)][1]" class="w-100 column1" oninput="calculate(this)"></td>
                            <td class="border border-black" id="row_5"></td>
                        </tr>
                        <tr class="default-row border border-black custom-row" data-type="number" data-id="6" data-name="data[AUTO RENTAL]">
                            <td class="border border-black">AUTO RENTAL</td>
                            <td><input type="number" name="data[AUTO RENTAL][1]" class="w-100 column1" oninput="calculate(this)"></td>
                            <td class="border border-black" id="row_6"></td>
                        </tr>
                        <tr class="default-row border border-black custom-row" data-type="number" data-id="7" data-name="data[TOLLS/PARKING]">
                            <td class="border border-black">TOLLS/PARKING</td>
                            <td><input type="number" name="data[TOLLS/PARKING][1]" class="w-100 column1" oninput="calculate(this)"></td>
                            <td class="border border-black" id="row_7"></td>
                        </tr>
                        <tr class="default-row border border-black custom-row" data-type="number" data-id="8" data-name="data[NUMBER OF MILES]">
                            <td class="border border-black">NUMBER OF MILES</td>
                            <td><input type="number" name="data[NUMBER OF MILES][1]" class="w-100 column1" oninput="calculate(this)"></td>
                            <td class="border border-black" id="row_8"></td>
                        </tr>
                        <tr class="default-row border border-black custom-row" data-type="number" data-id="9" data-name="data[MILEAGE]">
                            <td class="border border-black">MILEAGE</td>
                            <td><input type="number" name="data[MILEAGE][1]" class="w-100 column1" oninput="calculate(this)"></td>
                            <td class="border border-black" id="row_9"></td>
                        </tr>
                        <tr class="default-row border border-black custom-row" data-type="number" data-id="10" data-name="data[TAXI]">
                            <td class="border border-black">TAXI</td>
                            <td><input type="number" name="data[TAXI][1]" class="w-100 column1" oninput="calculate(this)"></td>
                            <td class="border border-black" id="row_10"></td>
                        </tr>
                        <tr class="default-row border border-black custom-row" data-type="number" data-id="11" data-name="data[GAS(Rental Vehicle Only)]">
                            <td class="border border-black">GAS(Rental Vehicle Only)</td>
                            <td><input type="number" name="data[GAS(Rental Vehicle Only)][1]" class="w-100 column1" oninput="calculate(this)"></td>
                            <td class="border border-black" id="row_11"></td>
                        </tr>
                        <tr class="default-row border border-black custom-row" data-type="number" data-id="12" data-name="data[OTHER*]">
                            <td class="border border-black">OTHER*</td>
                            <td><input type="number" name="data[OTHER*][1]" class="w-100 column1" oninput="calculate(this)"></td>
                            <td class="border border-black" id="row_12"></td>
                        </tr>
                        <tr class="default-row border border-black custom-row total" data-type="number" data-name="data[TOTAL]">
                            <td class="border border-black">TOTAL</td>
                            <td><input type="number" name="data[TOTAL][1]" class="w-100 column1-total" id="total_sum_value"></td>
                            <td class="border border-black" id="sum"></td>
                        </tr>
                    </table>

                    <!-- <table id="table2" class="mt-5 d-none">
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
                    </table> -->
                </div>
            </div>
            <div>
                <!-- <table>
                <tr class="default-row static-row">
                    <td>
                        <h6>Continuation Sheet Totals =></h6>
                    </td>
                    <td>yeuyrtu</td>
                    <td class="border border-black">

                    </td>
                </tr> -->
                <tr class="default-row static-row">
                    <td>
                        <h6>TOTAL EXPENSES ESTIMATED</h6>
                    </td>
                    <td>dugvt</td>
                    
                </tr>
                <tr class="default-row static-row">
                    <td>
                        <h6>Travel Advance Amount Requested (up to 75% total est.)</h6>
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
                
                </table>
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

            <button type="submit" class="btn btn-success btn-sm my-2" name="submit">Submit</button>


        </form>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.3.4/signature_pad.min.js" integrity="sha512-Mtr2f9aMp/TVEdDWcRlcREy9NfgsvXvApdxrm3/gK8lAMWnXrFsYaoW01B5eJhrUpBT7hmIjLeaQe0hnL7Oh1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js" integrity="sha512-FOhq9HThdn7ltbK8abmGn60A/EMtEzIzv1rvuh+DqzJtSGq8BRdEN0U+j0iKEIffiw/yEtVuladk6rsG4X6Uqg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script type="text/javascript" src="js/jspdf.min.js"></script>
    <script>
        var count = 1;
        $('#btn').click(function() {
            if (count == 4) {
                $('#continueBtn').removeClass('d-none');
                return true;
            }
            count++;
            var emptyCol = '<td></td>';
            var rows = $('.custom-row').toArray();
            var staticRows = $('.static-row').toArray();
            rows.forEach(row => {
                var colCount = addEvent = '';
                var type = $(row).data('type');
                var totalCol = $(row).hasClass('total') ? 'column' + count + '-total' : '';
                type == 'number' && !totalCol ? colCount = 'column' + count : '';
                type == 'number' ? addEvent = 'oninput="calculate(this)"' : addEvent = '';
                var name = $(row).data('name')+'['+count+']';
                var col = '<td class="border border-black"><input name="'+name+'" type=' + type + ' class="w-100 ' + colCount + ' ' + totalCol + '" ' + addEvent + '></td>';
                $(row).children().last().prev().after(col);
            });
            staticRows.forEach(row => {
                $(row).children().first().after(emptyCol);
            });
        });
        $(document).ready(function() {

            var canvas = document.getElementById("signature");
            var signaturePad = new SignaturePad(canvas);

            $('#clear-signature').on('click', function() {
                signaturePad.clear();
            });
        });


        function check() {
            $('#table2').removeClass('d-none');
        }

        function remove() {
            var tble = document.getElementById('table');
            var row = tble.rows;
            var r = $("#table tr:nth-child(3)");
            console.log(r.children('td'));
            var i = r.children('td').length - 2;
            for (var j = 0; j < row.length; j++) {
                if (count > 1) {
                    row[j].deleteCell(i);
                }
            }
            count <= 1 ? count = 1 : count--;
        }
        // console.log($("input[class*=' column']"));
        // $("input[class*=' column']").on('change', function() {
        //     colTotal += Number($(this).val());
        //     $('.col1-total').val(colTotal);
        //     console.log($(this).val());
        // })
        // //    function 
        // $('#allTotal').click(function() {
        //     var cols = $('input[class*=" column"]').toArray();
        //     console.log(cols);
        // })
        var colTotal = {};
        var rowTotal = {};

        function calculate(key) {
            var sum = 0;
            var classList = key.classList;
            var className = classList[1];
            var rowId = $(key).closest('tr').data('id');
            rowId += 2;
            var inputs = $('.' + className).toArray();
            inputs.forEach(input => {
                colTotal[className] = Number(0);
            });
            inputs.forEach(input => {
                colTotal[className] += Number($(input).val());
            });
            var rowInputs = $('#table tr:nth-child(' + rowId + ')').children('td').find('input').toArray();
            rowInputs.forEach(inp => {
                rowTotal[rowId] = Number(0);
            });
            rowInputs.forEach(inp => {
                rowTotal[rowId] += Number($(inp).val());
            });
            // console.log(rowTotal);
            Object.keys(rowTotal).map(index => {
                var rowId = Number(index) - Number(2)
                $('#row_' + rowId).html('$ ' + rowTotal[index]);
                sum += rowTotal[index];
            });
            Object.keys(colTotal).map(index => {
                $('.' + index + '-total').val(colTotal[index]);
            });
            $('#sum').html(sum);
            // total += sum[index];
        }

        // jQuery.validator.setDefaults({
        //     debug: true,
        //     success: "valid"
        // });

        $('#validation').validate({
            rules: {
                name: "required",
                tripDate: "required",
                empNumber: {
                    required: true,
                    minlength: 7
                },
                site: {
                    required: true,
                    url: true
                },
                datePrepared: "required",
                reason: "required",
                accSite: {
                    required: true,
                    url: true
                },
                accProject: "required",
                amount: "required",
                dateApproved: "required"
            },
            messages: {
                name: "Please Enter Your Name",
                tripDate: "Please Enter Trip Date",
                empNumber: {
                    required: "Please Enter Employee Number",
                    minlength: "Employee Number Must Be 7 Charaters"
                },
                site: {
                    required: "The Field is Required",
                    url: "Please Enter Valid URL"
                },
                datePrepared: "Please Field a Date",
                reason: "Please Write Some Reason",
                accSite: {
                    required: "The Field is Required",
                    url: "Please Enter Valid URL"
                },
                accProject: "Enter a valid project name",
                amount: "Enter amount",
                dateApproved: "Please enter approved date"

            }
        });

        function onClick() {
            var pdf = new jsPDF('p', 'pt', 'letter');
            pdf.canvas.height = 72 * 11;
            pdf.canvas.width = 72 * 8.5;

            pdf.fromHTML(document.body);

            pdf.save('sedulous.pdf');
        };

        var element = document.getElementById("clickbind");
        element.addEventListener("click", onClick);
    </script>



    <?php
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

    if (isset($_POST['submit'])) {
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
    ?>
</body>

</html>