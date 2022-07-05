<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/vendor/autoload.php';

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

$mpdf = new \Mpdf\Mpdf();

$data = '';
$data .= '<style>
table,tr,td{
    border: 2px solid #000;
}
</style>';
$data .= '<h1 style="color:green">Your Details:-</h1>';

$data .= '<strong>Name:- </strong>' . $fullName . '<br>';
$data .= '<strong>Trip Date:- </strong>' . $trip_date . '<br>';
$data .= '<strong>Employee Number:- </strong>' . $emp_number . '<br>';
$data .= '<strong>Site:- </strong>' .  $site . '<br>';
$data .= '<strong>Date Prepered:- </strong>' . $datePrepared . '<br><br>';

$data .= '<table id="table">
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
</table>';

$data .='';
// if ($reason) {
//     $data .= '<br><strong>Reason:- </strong><br><textarea rows="6" cols="100" maxlength="10">' . $reason . '</textarea><br><br>';
// }

// if ($addComment) {
//     $data .= '<br><strong>Comment:- </strong><br><textarea rows="4" cols="100">' . $addComment . '</textarea><br><br>';
// }
$data .= '<strong>Account Site:- </strong>' . $accSite . '<br>';
$data .= '<strong>Account Project:- </strong>' . $accProject . '<br>';
$data .= '<strong>Amount:- </strong>' . $amount . '<br>';
$data .= '<strong>Employee Sign:- </strong>' . $employeeSign . '<br>';
$data .= '<strong>Supervisor Sign:- </strong>' . $supervisorSign . '<br>';
$data .= '<strong>Date Approved:- </strong>' . $dateApproved . '<br>';

// echo $data;
// die;
$mpdf->WriteHTML($data);
$mpdf->Output();
