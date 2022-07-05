<?php

ini_set('display_errors', 1);

error_reporting(E_ALL);


require_once 'dompdf/autoload.inc.php';

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'sedulous';

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

//$expenseFolderId = 760;
$query = "SELECT * FROM `customers` WHERE `email_id`='" . trim($_POST['email']) . "' ORDER BY `id` LIMIT 1";
$result = mysqli_query($conn, $query) or die('error');



$row = mysqli_fetch_assoc($result);
if (isset($row['expenseFolderId']))
    $expenseFolderId = $row['expenseFolderId'];
else {
    // echo "NO Travel estimate filled by this User";
    echo '<script>alert("NO Travel Estimate filled by this User")</script>';
    die;
}
// if ( count( $row )<1 )
// echo 'Sorry NO record exist';
// print_r($row);
// die;

// include 'config.php';
// if ( $result[ 'num_rows' ] == 0 ) {
$firstName = explode(' ', $_POST['name']);
$dd = date('m-d-Y h-i-s a');

//     // $firstfoldername = $firstName[ 0 ] . '-travel-request-' . $dd;
//     // $secondfoldername = $firstName[ 0 ] . '-travel-estimate-' . $dd;
//     // $thirdfoldername = $firstName[ 0 ] . '-final-expense-' . $dd;

//     //echo $response;
$pdfname = $firstName[0] . '-final-expense-' . $dd;
// }

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
    //$employeeSign = $_POST[ 'sign' ];
    $travelAmount = $_POST['travelAmount'];
    $emailID = $_POST['email'];
    $sheet_table = $_POST['sheet_table'];
    $sheet_table2 = $_POST['sheet_table2'];
    $sheet_table3 = $_POST['sheet_table3'];
    // $supervisorSign = $_POST[ 'supervisorSign' ];
    // $dateApproved = $_POST[ 'dateApproved' ];
    //$userid = $_re
    //pre( $_FILES[ 'upload' ][ 'name' ] );

    $total = count($_FILES['upload']['name']);

    for ($i = 0; $i < $total; $i++) {

        $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
        $name = $_FILES['upload']['name'];

        // echo "<pre>";
        // print_r($_FILES);
        // die();
        // $ext = end( ( explode( '.', $name[ $i ] ) ) );
        # extra () to prevent notice

        //echo $ext;

        $type = pathinfo($tmpFilePath, PATHINFO_EXTENSION);
        // die();
        // $fileName = $_FILES[ 'upload' ][ 'name' ][ $i ];
        $data = file_get_contents($tmpFilePath);
        $base64 = base64_encode($data);

        // $fileType = $_FILES[ 'upload' ][ 'type' ][ $i ];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sedulous.bitrix24.com/rest/44/mcl8m30hl5f0fblb/disk.folder.uploadfile',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
            "id": ' . $expenseFolderId . ',
            "data":{
                "NAME": "' . $name[$i] . '"
            },
            "fileContent":"' . $base64 . '"
         }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        // print_r( $response );
        curl_close($curl);
    }
    // die( 'aadil' );

    $sql = "INSERT INTO `customers` ( `email_id`, `travelAdvanceAmount`, `name`, `tripDate`, `employeeNumber`, `site`, `datePrepared`, `reason`, `addComment`, `accountSite`, `accountProject`, `amount`, `employeeSign`, `data`, `date_time`) VALUES( '$emailID', '$travelAmount', '$fullName', '$trip_date', '$emp_number',  '$site', '$datePrepared', '$reason',  '$addComment', '$accSite', '$accProject' , '$amount', '', '', CURRENT_TIMESTAMP() ) ";

    $data = mysqli_query($conn, $sql);
}

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$html = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Final Expense PDF </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap" rel="stylesheet">
    <style>
    table,tr,td{
        border: 1px solid;
    }
    </style>
    
</head>

<body>
    <div class="container-fluid">
        <form action="PDF.php" method="POST" id="validation">
            <table style="border: none  !important;">
            <tr style="border: none  !important;">
            <td style="border: none  !important;">
            <img src="data:image/png;base64,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" alt="">
            </td>
            <td style="border: none  !important;">
            <h3 style="color:green"> CONTRACT TRAVEL FINAL EXPENSE REPORT</h3><hr>
            </td>
            </tr>
            </table>
            <div class="row mb-2 mt-2">
                <div class="col-12 col-md-12 col-lg-12 mb-2">
                    <div class="row mb-2">
                        <div class="col-12 col-md-6 col-lg-4 mb-2">
                            <strong>NAME:   </strong><span>' . $fullName . '</span>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-2">
                        <strong>TRIP DATES:   </strong><span>' . $trip_date . '</span>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-2">
                        <strong>EMPLOYEE NUMBER:   </strong><span>' . $emp_number . '</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12 col-md-6 col-lg-4 mb-2">
                        <strong>SITE:   </strong><span>' . $site . '</span>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-2">
                        <strong>DATE PREPARED:  </strong><span>' . $datePrepared . '</span>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-2">
                            <strong>EMAIL ID:   </strong><span>' . $emailID . '</span>
                        </div>
                    </div>';
$tableCount = 0;
foreach ($_POST['data'] as $table => $data) {
    if ($tableCount == $_POST['tableCount'])
        continue;
    $tableCount++;
    if ($tableCount == 2 && !round($sheet_table2))
        continue;
    if ($tableCount == 3 && !round($sheet_table3))
        continue;
    $flag = [];
    $colCount = [];
    foreach ($data as $row) {
        foreach ($row as $key => $col) {
            $flag[$key] = 0;
            $colCount[$key] = 0;
        }
    }
    foreach ($data as $row) {
        foreach ($row as $key => $col) {
            if ($key == 'row')
                continue;
            if ($col == '')
                $flag[$key]++;
            $colCount[$key]++;
        }
    }
    $checkFlag = array_intersect($flag, $colCount);
    $html .= '<table id="table" class="center" style="border:1px solid #000">';
    $i = 1;
    foreach ($data as $name => $row) {
        $html .= '<tr class="default-row border border-black custom-row total" data-type="number"><td>' . $name . '</td>';
        $td = '';
        if (isset($row['row'])) {
            $td = '<td >' . $row['row'] . '</td>';
            unset($row['row']);
        }
        foreach ($row as $key => $data) {
            if (isset($checkFlag[$key]) && $checkFlag[$key] == 15)
                continue;
            $html .= '<td>' . $data . '</td>';
        }
        if ($i == 1) {
            $html .= '<td ><strong >Total Expenses</strong></td>';
        }
        if ($i == 2) {
            $html .= '<td style="border: none  !important;"></td>';
        }
        if ($td)
            $html .= $td;
        $i++;
        $html .= '</tr>';
    }
    $html .= '</table><br>';
}
$result = (int)$sheet_table + (int)$sheet_table2 + (int)$sheet_table3;
$restamt = (int) $result - (int) $travelAmount;
$html .= '
        </div><br>
            <div>
                <h5>TOTAL OF SHEET 1 =<span> $' . $sheet_table . '</span></h5>';
if ($sheet_table2)
    $html .= ' <h5>TOTAL OF SHEET 2 =<span> $' . $sheet_table2 . '</span></h5>';
// }
if ($sheet_table3)
    $html .= ' <h5>TOTAL OF SHEET 3 =<span> $' . $sheet_table3 . '</span></h5>';
$html .= '<h5>TOTAL EXPENSES  = $' . $result . '</h5>
                <h5>Travel Advance Amount Recevied = $' . $travelAmount . '</h5>
                <h5>TOTAL Due Employee = $' . $restamt . ' </h5> 
            </div>
            <div class="row mt-3">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <label for="reason">REASON FOR TRAVEL OR EXPENSE:</label>
                            <textarea name="reason" id="reason" rows="6" maxlength="400" placeholder="Write your thoughts..." class="form-control w-100 h-100">' . $reason . '</textarea>
                        </div><br><br>
                        <div class="col-12  mt-5">
                            <div class="row align-items-center">
                                <div class="col-sm-8">
                                    <label for="additionl">ADDITIONAL COMMENTS:</label>
                                    <textarea name="addComment" id="additional" maxlength="200" class="form-control w-100 h-100" placeholder="Add a comment... " rows="4">' . $addComment . '</textarea>
                                </div>
                                <div class="col-sm-4">
                                    <h4 class="text-right">ACCOUNT DISTRIBUTION</h4>
                                    <div class="row">
                                        <div class="col-12 col-md-3 col-lg-3">
                                            <strong>Site:  </strong>' . $accSite . '
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-12 col-md-3 col-lg-3">
                                            <strong>Project:  </strong>' . $accProject . '
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-12 col-md-3 col-lg-3">
                                            <strong>Amount:  </strong>' . $amount . '
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
                        
                    </div>
                   
                </div>
                

            </div>
        </form>
    </div>
    </div>
    
</body>

</html>';
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
// $dompdf->stream($pdfname, array('Attachment' => 0));
// $pdf = $dompdf->output();
// $output = base64_encode($pdf);
$pdfname = $pdfname . '.pdf';
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://sedulous.bitrix24.com/rest/44/mcl8m30hl5f0fblb/disk.folder.uploadfile',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '  { "id": ' . $expenseFolderId . ', 
   "data":{ "NAME": "' . $pdfname . '"
    },
    "fileContent": "' . $output . '" }
 
 ',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Cookie: BITRIX_SM_SALE_UID=0; qmb=.'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
