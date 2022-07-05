<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contract travel</title>
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

        h1{
            text-align:center;
            color:forestgreen;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <form action="" method="POST" id="validation">
            <div class="d-flex align-items-center justify-content-center cormorant">
                <h1 > CONTRACT TRAVEL EXPENSE REPORT-</h1>
            </div>
            <h3 style="text-align:center"> Continuation Sheet</h3>
            <div class="row mb-2 mt-2">
                <div class="col-12 col-md-12 col-lg-12 mb-2">
                    <div class="row mb-2">
                        <div class="col-12 col-md-6 col-lg-7 mb-2">
                            <label for="name">NAME:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name">
                        </div>
                        <div class="col-12 col-md-6 col-lg-5 mb-2">
                            <label for="date">Trip Dates:</label>
                            <input type="date" class="form-control" id="date" name="tripDate">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12 col-md-6 col-lg-4 mb-2">
                            <label for="number">Employee Number:</label>
                            <input type="number" class="form-control" id="number" name="empNumber" placeholder="Employee Number">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-2">
                            <label for="text">SITE:</label>
                            <input type="text" class="form-control" id="text" name="site">
                        </div>
                    </div>

                    <button class="btn btn-success btn-sm my-2" type="button" id="btn">Add Column</button>
                    <button class="btn btn-success btn-sm my-2" type="button" onclick="remove()" id="btn">Delete</button>

                    <table id="table">
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
            <div class="row">
                <div class="col-12  mt-5">
                    <div class="row align-items-center">
                        <div class="col-sm-12">
                            <label for="additionl">ADDITIONAL COMMENTS:</label>
                            <textarea name="addComment" id="additional" class="form-control w-100 h-100" placeholder="Add a comment... " rows="5"></textarea>
                        </div>
                        <div class="col-sm-11 mt-2">
                            <h6 style="text-align:right">Sheet Total:<span class="px-2">sad</span></h6>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.3.4/signature_pad.min.js" integrity="sha512-Mtr2f9aMp/TVEdDWcRlcREy9NfgsvXvApdxrm3/gK8lAMWnXrFsYaoW01B5eJhrUpBT7hmIjLeaQe0hnL7Oh1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js" integrity="sha512-FOhq9HThdn7ltbK8abmGn60A/EMtEzIzv1rvuh+DqzJtSGq8BRdEN0U+j0iKEIffiw/yEtVuladk6rsG4X6Uqg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
    <script>
        var count = 1;
        $('#btn').click(function() {
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
                var col = '<td class="border border-black"><input type=' + type + ' class="w-100 ' + colCount + ' ' + totalCol + '" ' + addEvent + '></td>';
                $(row).children().last().prev().after(col);
            });
            staticRows.forEach(row => {
                $(row).children().first().after(emptyCol);
            });
        });

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
                }
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
            }
        });
    </script>
</body>

</html>