<?php


require_once('autoload.inc.php');

use Dompdf\Dompdf;
use Dompdf\Options;

//if (isset($_POST['submit'])) {

 if (1) {

     error_reporting(0);

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

    $html = '<!DOCTYPE html>
    ';
    //echo $html;

    $document = new Dompdf();
    $options = $document->getOptions();
    $options->setDefaultFont('Courier');
    $options->setIsRemoteEnabled(true);
    $options->setIsHtml5ParserEnabled(true);
    $document->setOptions($options);
    $document->loadHtml('<h1>Hello</h1>');
    $document->setPaper('A4', 'portrait');

    $document->render();
    $document->stream();
     //$document->output();

    ob_end_clean();

    $output = $document->output();

    //$document->stream('my.pdf', array('Attachment' => 0));
    // 'my.pdf', array('Attachment' => 0)
}
?>