<?php

require_once('autoload.inc.php');

use Dompdf\Dompdf;
use Dompdf\Options;
// echo "<pre>";
//print_r($_POST); die();
if (isset($_POST['submit'])) {
    // if (1) {
    error_reporting(0);

    $name1 = $_POST['name1'];
    $dob1 = $_POST['dob1'];
    $empamount1 = $_POST['empamount1'];
    $pervalue1 = $_POST['pervalue1'];
    $grossval1 = $_POST['grossval1'];
    $netval1  = $_POST['netval1'];

    $ssnumber1 = $_POST['ssnumber1'];
    $hnumber1 = $_POST['hnumber1'];
    $maddress1 = $_POST['maddress1'];
    $apt1 = $_POST['apt1'];
    $city1 = $_POST['city1'];
    $state1 = $_POST['state1'];
    $zip1 = $_POST['zip1'];
    $copnumber1 = $_POST['copnumber1'];
    $cpempamount1 = $_POST['cpname1'];
    $city2 = $_POST['city2'];
    $state2 = $_POST['state2'];
    $zip2 = $_POST['zip2'];

    $checkbox6 =  $_POST['checkbox6'];
    $nrwyou1 = $_POST['nrwyou1'];
    $nraddress1 =  $_POST['nraddress1'];
    $nrnumber1 =  $_POST['nrnumber1'];
    $emailo1 = $_POST['emailo1'];
    $checkbox4 =  $_POST['checkbox4'];
    $ename1 =  $_POST['ename1'];
    $add1income1 =  $_POST['add1income1'];
    $eaddress1 =  $_POST['eaddress1'];
    $soaincome1 =  $_POST['soaincome1'];
    $bphone1 =  $_POST['bphone1'];
    $aincomed1 =  $_POST['aincomed1'];
    $otitle1 =  $_POST['otitle1'];
    $pemployer1 =  $_POST['pemployer1'];
    $lemployment1 =  $_POST['lemployment1'];
    $pempadd1 =  $_POST['pempadd1'];
    $gincome1 =  $_POST['gincome1'];
    $lemp1 =  $_POST['lemp1'];
    $nincome1 =  $_POST['nincome1'];
    $occupation1 =  $_POST['occupation1'];

    if (($_POST['aincomed1']) == 1) {
        $chk15 = "checked='true'";
        $chk16 = "";
        $chk17 = "";
        $chk18 = "";
    } elseif (($_POST['aincomed1']) == 2) {
        $chk15 = "";
        $chk16 = "checked='true'";
        $chk17 = "";
        $chk18 = "";
    } elseif (($_POST['aincomed1']) == 3) {
        $chk15 = "";
        $chk16 = "";
        $chk17 = "checked='true'";
        $chk18 = "";
    } elseif (($_POST['aincomed1']) == 4) {
        $chk15 = "";
        $chk16 = "";
        $chk17 = "";
        $chk18 = "checked='true'";
    }

    if (($_POST['gincome1']) == 1) {
        $chk19 = "checked='true'";
        $chk20 = "";
        $chk21 = "";
        $chk22 = "";
    } elseif (($_POST['gincome1']) == 2) {
        $chk19 = "";
        $chk20 = "checked='true'";
        $chk21 = "";
        $chk22 = "";
    } elseif (($_POST['gincome1']) == 3) {
        $chk19 = "";
        $chk20 = "";
        $chk21 = "checked='true'";
        $chk22 = "";
    } elseif (($_POST['gincome1']) == 4) {
        $chk19 = "";
        $chk20 = "";
        $chk21 = "";
        $chk22 = "checked='true'";
    }

    //  2nd part

    $yes = $_POST['yes'];
    // die;
    if ($yes == "yes") {

        $name2 = $_POST['name2'];
        $dob2 = $_POST['dob2'];

        $empamount2 = $_POST['empamount2'];
        $pervalue2 = $_POST['pervalue2'];
        $gincome2 = $_POST['gincome2'];
        $netval2 = $_POST['netval2'];
        $grossval2  = $_POST['grossval2'];
        $gincome2  = $_POST['gincome2'];

        $ssnumber2 = $_POST['ssnumber2'];
        $gincome2 = $_POST['gincome2'];
        $hnumber2 = $_POST['hnumber2'];
        $maddress2 = $_POST['maddress2'];
        $apt2 = $_POST['apt2'];
        $city3 = $_POST['city3'];
        $state3 = $_POST['state3'];
        $zip3 = $_POST['zip3'];
        $copnumber2 = $_POST['copnumber2'];
        $cpname2 = $_POST['cpname2'];
        $city4 = $_POST['city4'];
        $state4 = $_POST['state4'];
        $zip4 = $_POST['zip4'];

        $checkbox8 =  $_POST['checkbox8'];
        $nrwyou2 = $_POST['nrwyou2'];
        $nraddress2 =  $_POST['nraddress2'];
        $nrnumber2 =  $_POST['nrnumber2'];
        $emailo2 = $_POST['emailo2'];
        $checkbox9 =  $_POST['checkbox9'];
        $ename2 =  $_POST['ename2'];
        $add1income2 =  $_POST['add1income2'];
        $eaddress2 =  $_POST['eaddress2'];
        $soaincome2 =  $_POST['soaincome2'];
        $bphone2 =  $_POST['bphone2'];
        $aincomed2 =  $_POST['aincomed2'];
        $otitle2 =  $_POST['otitle2'];
        $pemployer2 =  $_POST['pemployer2'];
        $lemployment2 =  $_POST['lemployment2'];
        $pempadd2 =  $_POST['pempadd2'];
        $gincome2 =  $_POST['gincome2'];
        $lemp2 =  $_POST['lemp2'];
        $nincome2 =  $_POST['nincome2'];
        $occupation2 =  $_POST['occupation2'];
    }
    // echo "<pre>";
    // print_r($_POST);exit;

    if (($_POST['checkbox6']) == 1) {
        $chk3 = "checked='true'";
        $chk4 = "";
    } else {
        $chk4 = "checked='true'";
        $chk3 = "";
    }

    if (($_POST['checkbox4']) == 1) {
        $chk5 = "checked='true'";
        $chk6 = "";
    } else {
        $chk6 = "checked='true'";
        $chk5 = "";
    }

    if (($_POST['checkbox8']) == 1) {
        $chk11 = "checked='true'";
        $chk12 = "";
    } else {
        $chk12 = "checked='true'";
        $chk11 = "";
    }

    if (($_POST['checkbox9']) == 1) {
        $chk13 = "checked='true'";
        $chk14 = "";
    } else {
        $chk14 = "checked='true'";
        $chk13 = "";
    }

    if (($_POST['aincomed2']) == 1) {
        $chk23 = "checked='true'";
        $chk24 = "";
        $chk24 = "";
        $chk26 = "";
    } elseif (($_POST['aincomed2']) == 2) {
        $chk23 = "";
        $chk24 = "checked='true'";
        $chk24 = "";
        $chk26 = "";
    } elseif (($_POST['aincomed2']) == 3) {
        $chk23 = "";
        $chk24 = "";
        $chk24 = "checked='true'";
        $chk26 = "";
    } elseif (($_POST['aincomed2']) == 4) {
        $chk23 = "";
        $chk24 = "";
        $chk24 = "";
        $chk26 = "checked='true'";
    }

    if (($_POST['gincome2']) == 1) {
        $chk27 = "checked='true'";
        $chk28 = "";
        $chk29 = "";
        $chk30 = "";
    } elseif (($_POST['gincome2']) == 2) {
        $chk27 = "";
        $chk28 = "checked='true'";
        $chk29 = "";
        $chk30 = "";
    } elseif (($_POST['gincome2']) == 3) {
        $chk27 = "";
        $chk28 = "";
        $chk29 = "checked='true'";
        $chk30 = "";
    } elseif (($_POST['gincome2']) == 4) {
        $chk27 = "";
        $chk28 = "";
        $chk29 = "";
        $chk30 = "checked='true'";
    }

    // print_r($_POST);
    $html = '<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            table {
                border: 1px solid black;
                border-radius: 1px;
            }
    
            .form1 {
                padding-bottom: 250px;
                resize: horizontal;
                overflow: auto;
            }

            input[type="text"],
            textarea {
                background-color: #EEF2FF;
            }
        </style>
    </head>
    
    <body>
        <form>
        <div class="containerhead">
            <span class="logo-image-container">
                <img src="mintapp.png" style="width: 12%; transform: rotate(360deg); margin-top:10px; margin-left: 3%; margin-bottom:0px;">
            </span>
            <h4 align="center" style="margin-top:-10%;"> Consumer(Personal) Credit Card Application </h4>
        </div>
        <!--  <h4 style="background-color: white; margin: -10px auto; padding: 20px;  min-width: 100px; background-color:silver; font-family:sans-serif; word-spacing: 1px; font-weight: lighter ; font-size: 15px; ">
                STEP 1 : Please Complete the Application Form</h4>-->
            <div class="form1">
                <span class="row" style="font-family:Sans-serif;">
                <!--  <h5 style="font-weight: lighter; margin-top: -20px;">1. APPLICANT INFORMATION : <h5>-->
                        <!-- <h6 style="font-weight: lighter; font-size: 11px; margin-top: 0px;">Please note that you must
                                reside in the United States and be 18 years or older to apply.</h6>-->
                </span>
                <div class="wrap1" style="margin-top: -10px;">
                    <table id="customers" style="font-family: Arial, Helvetica, sans-serif; width: 100%;">
                        <tr>
                            <th style="text-align: left; font-weight: lighter; font-size:11px; color:black;">Name (First-Middle-Last) Please Print</th>
                            <th style="text-align: left; font-weight: lighter; font-size:11px; color:black;">Date of Birth</th>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">Social Security Number</th>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">Home Phone Number*</th>
                        </tr>
                        <tr>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $name1 . '</td>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $dob1 . '</td>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $ssnumber1 . '
                            </td>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $hnumber1 . '
                            </td>
    
                        </tr>
                    </table>
                </div><br>
                <div class="wrap2" style="margin-top: -16px;">
                    <table id="customers" style="font-family: Arial, Helvetica, sans-serif;
                        
                        width: 100%;">
                        <tr>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">Street address</th>
                            <th style="text-align: left; font-weight: lighter; font-size:11px; color:black;">Apt.#</th>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">City</th>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">State</th>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">Zip</th>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">Cell/Other Phone Number*</th>
                        <tr>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $maddress1 . '
                            </td>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $apt1 . '</td>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $city1 . '</td>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $state1 . '</td>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $zip1 . '</td>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $copnumber1 . '
                            </td>
                        </tr>
                    </table>
                </div><br>
                <div class="wrap3" style="margin-top: -16px;">
                    <table id="customers" style="font-family: Arial, Helvetica, sans-serif;
                        
                        width: 100%;">
                        <tr>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">Mailing Address</th>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">City</th>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">State</th>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">Zip</th>
                        </tr>
                        <tr>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $cpname1 . '</td>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $city2 . '</td>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $state2 . '</td>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $zip2 . '</td>
                        </tr>
                    </table>
                </div><br>
                <div class="wrap4" style="margin-top: -16px;">
                    <table id="customers" style="font-family: Arial, Helvetica, sans-serif; width: 100%;">
                        <tr>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">Housing Information</th>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;"><input type="checkbox" ' . $chk3 . '>Rent</th>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;"><input type="checkbox" ' . $chk4 . '>Own</th>
                        </tr>
                        <tr>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">Nearest Relative (not living with you)</th>
                            <th style="text-align: left; font-weight: lighter; font-size:9px; color:black;">Nearest Relative (Address)</th>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">Nearest Relative (Phone Number)</th>
                        </tr>
                        <tr>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $nrwyou1 . '</td>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $nraddress1 . '
                            </td>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $nrnumber1 . '
                            </td>

                        </tr>
                    </table>
                </div><br>          
                <div class="wrap5" style="margin-top: -16px;">
                    <table id="customers" style="font-family: Arial, Helvetica, sans-serif; width: 100%;">
                        <tr>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">E-Mail Address (optional)*</th>
                        </tr>
                        <tr>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $emailo1 . '</td>
                        </tr>
                    </table>
                </div><br>     

        <div style="border:solid .5px; padding: 1px;">
            <h5 style="text-align:center; margin-top: 0%;">EMPLOYMENT INFORMATION</h5>
            <div class ="row"style="margin-top: 1%;">
                <div class="col">
                    <label>Are you self-employed?</label>
                    <label><input style="width: auto; margin-top:5% font-size: 12px; font-family: Open Sans;" type="checkbox" ' . $chk5 . '> YES </label>   
                    
                    <label><input style="width: auto; margin-top:5% font-size: 12px; font-family: Open Sans;" type="checkbox" ' . $chk6 . '> NO </label>
                </div>              
            </div>
            
            <div class ="row" style="margin-top: 1%;">
                <div class="col">
                    <label>Employer Name</label><br>
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 40%;" value = " ' . $ename1   . '">
                </div>
                <div class="col" style = "margin-top: -7%;  margin-left:50%">
                    <label>Add l Income</label><br>
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 88%;" value = "' . $add1income1 . '">
                </div>
            </div>

            <div class ="row"style="margin-top: 1%;">
                <div class="col">
                    <label>Employer Address</label><br>
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 40%;" value = " ' . $eaddress1   . '">
                </div>
                
                <div class="col" style = "margin-top: -7%;  margin-left:50%">
                    <label>Source of Add l  Income</label><br>
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 88%;" value = "' . $soaincome1 . '">
                </div>
            </div>
            
            <div class ="row"style="margin-top: 1%;">
                <div class="col">
                    <label>Employer Phone Number</label><br>
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 40%;" value = " ' . $bphone1   . '">
                </div>
            
                <div class="col"style = "margin-top: -14%;  margin-left:50%">
                    <label for="" >Amount:</label>  <br>
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 40%;" value = " ' . $pervalue1   . '">
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 44%;" value = " ' . $empamount1  . '">
                </div>
            </div>
            <div class ="row"style="margin-top: 1%;">
                <div class="col">
                    <label>Occupation/Title</label><br>
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 40%;" value = " ' . $otitle1   . '">
                </div>
                
                <div class="col"style = "margin-top: -7%;  margin-left:50%">
                    <label>Previous Employer (if less than 2 yrs at present)</label><br>
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 88%;" value = "' . $pemployer1 . '">
                </div>
            </div>

            <div class ="row"style="margin-top: 1%;">
                    <div class="col">
                        <label>Length of Employment</label><br>
                        <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 40%;" value = " ' . $lemployment1  . '">
                    </div>
                
                    <div class="col"style = "margin-top: -7%;  margin-left:50%">
                        <label>Previous Employer Address</label><br>
                        <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 88%;" value = "' . $pempadd1  . '">
                    </div>
            </div>

            <div class ="row"style="margin-top: 1%;">
                <div class="col">
                    <label>Gross Income</label><br>
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 22%;" value = " ' . $grossval1   . '">
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 15.5%;" value = " ' . $gincome1   . '">
                </div>
                <div class="col"style = "margin-top: -7%;  margin-left:50%">
                    <label>Length of Employment</label><br>
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 88%;" value = " ' . $lemp1  . '">
                </div>

            </div>

            <div class ="row"style="margin-top: 1%;">
                <div class="col">
                    <label>Net Income</label><br>
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 22%;" value = " ' . $netval1   . '">
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 15.5%;" value = " ' . $nincome1   . '">
                </div>
                
                <div class="col"style = "margin-top: -7%;  margin-left:50%">
                    <label>Occupation</label><br>
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 88%;" value = "' . $occupation1  . '">
                </div>
            </div>
        </div>';

    $html1 = '<div class="form2" style="margin-top: -8%;">
            <span class="row" style="font-family:Sans-serif;">
                <h5 style="font-weight: lighter; ">2. JOINT INFORMATION:<h5>
                <!--   <h6 style="font-weight: lighter; font-size: 11px; margin-top: 0px;">An additional account will be issued to the person indicated below. The applicant (and joint applicant, if any) will be liable for all transactions made on the account including those made by any authorized user. JOINT APPLICANT: You agree that we may send notices to you and/or applicant at the applicant’s address, regardless of whether you live at that address.</h6>-->
            </span><br>
                <div class="wrap1" style="margin-top: -40px;">
                    <table id="customers" style="font-family: Arial, Helvetica, sans-serif;

                    width: 100%;">
                        <tr>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">Name (First-Middle-Last) Please Print</th>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">Date of Birth</th>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">Social Security Number</th>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">Home Phone Number*</th>
                        </tr>
                        <tr>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $name2 . '</td>
                            <td style=" background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $dob2 . '</td>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $ssnumber2 . '
                            </td>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $hnumber2 . '
                            </td>
                        </tr>
                    </table>
                </div><br>
                <div class="wrap2" style="margin-top: -16px;">
                    <table id="customers" style="font-family: Arial, Helvetica, sans-serif;
                    
                    width: 100%;">
                        <tr>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">Street address</th>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">Apt.#</th>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">City</th>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">State</th>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">Zip</th>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">Cell/Other Phone Number*</th>
                        <tr>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $maddress2 . '
                            </td>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $apt2 . '</td>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $city3 . '</td>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $state3 . '</td>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $zip3 . '</td>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $copnumber2 . '
                            </td>
                        </tr>
                    </table>
                </div><br>
                <div class="wrap3" style="margin-top: -16px;">
                    <table id="customers" style="font-family: Arial, Helvetica, sans-serif;width: 100%;">
                        <tr>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">Mailing Address</th>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">City</th>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">State</th>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">Zip</th>
                        </tr>
                        <tr>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $cpname2 . '</td>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $city4 . '</td>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $state4 . '</td>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $zip4 . '</td>
                        </tr>
                    </table>
                </div><br>
                <div class="wrap4" style="margin-top: -15px;">
                    <table id="customers" style="font-family: Arial, Helvetica, sans-serif;width: 100%;">
                        <tr>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">Housing Information</th>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;"><input type="checkbox" ' . $chk11 . '>Rent</th>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;"><input type="checkbox" ' . $chk12 . '>Own</th>
                        </tr>
                        <tr>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">Nearest Relative (not living with you)</th>
                            <th style="text-align: left; font-weight: lighter; font-size:9px; color:black;">Nearest Relative (Address)</th>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">Nearest Relative (Phone Number)</th>
                        </tr>
                        <tr>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $nrwyou2 . '</td>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $nraddress2 . '
                            </td>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $nrnumber2 . '
                            </td>
                        </tr>
                    </table>
                </div><br>
                <div class="wrap5" style="margin-top: -16px;">
                    <table id="customers" style="font-family: Arial, Helvetica, sans-serif;
                    width: 100%;">
                        <tr>
                            <th style="text-align: left;  font-weight: lighter;  font-size:11px; color:black;">E-Mail Address (optional)*</th>
                        </tr>
                        <tr>
                            <td style="background-color: #EEF2FF;font-weight: lighter;font-size:13px;">' . $emailo2 . '</td>
                        </tr>
                    </table>
                </div><br>

        <div style="border:solid .5px; padding: 1px;">
            <h5 style="text-align:center; margin-top: 0%;">CO EMPLOYMENT INFORMATION</h5>
            <div class ="row"style="margin-top: 1%;">
                <div class="col">
                    <label>Are you self-employed?</label><input style="width: auto; margin-top:5% font-size: 12px; font-family: Open Sans;" type="checkbox" ' . $chk13 . '> YES </label>   

                    <label><input style="width: auto; margin-top:5% font-size: 12px; font-family: Open Sans;" type="checkbox" ' . $chk14 . '> NO </label>
                </div>              
            </div>
            
            <div class ="row" style="margin-top: 1%;">
                <div class="col">
                    <label>Employer Name</label><br>
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 40%;" value = " ' . $ename2   . '">
                </div>
                <div class="col" style = "margin-top: -7%;  margin-left:50%">
                    <label>Add l Income</label><br>
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 88%;" value = "' . $add1income2 . '">
                </div>
            </div>

            <div class ="row"style="margin-top: 1%;">
                <div class="col">
                    <label>Employer Address</label><br>
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 40%;" value = " ' . $eaddress2   . '">
                </div>
                
                <div class="col" style = "margin-top: -7%;  margin-left:50%">
                    <label>Source of Add l  Income</label><br>
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 88%;" value = "' . $soaincome2 . '">
                </div>
            </div>
            
            <div class ="row"style="margin-top: 1%;">
                <div class="col">
                    <label>Employer Phone Number</label><br>
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 40%;" value = " ' . $bphone2   . '">
                </div>
            
                <div class="col"style = "margin-top: -14%;  margin-left:50%">
                <label for="" >Amount:</label>  <br>
                <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 40%;" value = " ' . $pervalue2   . '">
                <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 44%;" value = " ' . $empamount2  . '">
                </div>
            </div>
            <div class ="row"style="margin-top: 1%;">
                <div class="col">
                    <label>Occupation/Title</label><br>
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 40%;" value = " ' . $otitle2   . '">
                </div>
                
                <div class="col"style = "margin-top: -7%;  margin-left:50%">
                    <label>Previous Employer (if less than 2 yrs at present)</label><br>
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 88%;" value = "' . $pemployer2 . '">
                </div>
            </div>

            <div class ="row"style="margin-top: 1%;">
                <div class="col">
                    <label>Length of Employment</label><br>
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 40%;" value = " ' . $lemployment2   . '">
                </div>
                
                <div class="col"style = "margin-top: -7%;  margin-left:50%">
                    <label>Previous Employer Address</label><br>
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 88%;" value = "' . $pempadd2  . '">
                </div>
            </div>

            <div class ="row"style="margin-top: 1%;">
                <div class="col">
                    <label>Gross Income</label><br>
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 22%;" value = " ' . $grossval2   . '">
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 15.5%;" value = " ' . $gincome2   . '">
                </div>
                <div class="col"style = "margin-top: -7%;  margin-left:50%">
                    <label>Length of Employment</label><br>
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 88%;" value = "' . $lemp2  . '">
                </div>
            </div>

            <div class ="row"style="margin-top: 1%;">
                <div class="col">
                    <label>Net Income</label><br>
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 22%;" value = " ' . $netval2   . '">
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 15.5%;" value = " ' . $nincome2   . '">

                </div>
                
                <div class="col"style = "margin-top: -7%;  margin-left:50%">
                    <label>Occupation</label><br>
                    <input type="text"style="font-family: Open Sans; height: auto; font-size: 12px; width: 88%;" value = "' . $occupation2  . '">
                </div>
            </div>
        </div>';
    $html3 = '
            </div>
    
        </form>
    </body>
    
    </html>';

    if ($yes == "yes") {
        $html = $html . $html1 . $html3;
    } else {
        $html = $html . '<div class="" style="margin-top: -210px;"><div>' . $html3;
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

    // $curl = curl_init();

    // curl_setopt_array($curl, array(
    //     CURLOPT_URL => 'https://www.wegroupindustries.com/rest/7/s04ysn59ti70vyl8/crm.deal.get?id=' . $_POST['id'],
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => '',
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 0,
    //     CURLOPT_FOLLOWLOCATION => true,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => 'GET',
    //     CURLOPT_HTTPHEADER => array(
    //         'Cookie: BITRIX_SM_SALE_UID=5'
    //     ),
    // ));
    // $response = curl_exec($curl);
    // $err = curl_error($curl);
    // curl_close($curl);
    // $result = json_decode($response, true);
    // $cont_id = $result['result']['CONTACT_ID'];
    // $folderid = $result['result']['UF_CRM_1643979411240'];
    // $output = base64_encode($output);

    // foreach ($_FILES as $key => $value) {
    //     for ($i = 0; $i < count($value['name']); $i++) {
    //         $date = date('d-m-y');
    //         $file_name = $value['name'][$i];
    //         $new_filename = $date . '_' . $file_name;
    //         $file_content = file_get_contents($value['tmp_name'][$i]);
    //         $file_content = base64_encode($file_content);


    //         $curl = curl_init();

    //         curl_setopt_array($curl, array(
    //             CURLOPT_URL => 'https://www.wegroupindustries.com/rest/7/s04ysn59ti70vyl8/crm.contact.get?ID=' . $cont_id,
    //             CURLOPT_RETURNTRANSFER => true,
    //             CURLOPT_ENCODING => '',
    //             CURLOPT_MAXREDIRS => 10,
    //             CURLOPT_TIMEOUT => 0,
    //             CURLOPT_FOLLOWLOCATION => true,
    //             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //             CURLOPT_CUSTOMREQUEST => 'GET',
    //             CURLOPT_HTTPHEADER => array(
    //                 'Cookie: BITRIX_SM_SALE_UID=5'
    //             ),
    //         ));

    //         $response = curl_exec($curl);

    //         curl_close($curl);

    //         $result = json_decode($response, true);
    //         $cont_name = $result['result']['NAME'];
    //         $cont_name1 = $result['result']['LAST_NAME'];
    //         $folder_name = "Consumer(Personal) Credit Card Application.pdf";

    //         $concade = $_POST['id'] . "-" . $cont_name . " " . $cont_name1 . "-" . $folder_name;




    //         $curl = curl_init();
    //         curl_setopt_array($curl, array(
    //             CURLOPT_URL => "https://www.wegroupindustries.com/rest/7/s04ysn59ti70vyl8/disk.folder.uploadfile",
    //             CURLOPT_RETURNTRANSFER => true,
    //             CURLOPT_ENCODING => "",
    //             CURLOPT_MAXREDIRS => 10,
    //             CURLOPT_TIMEOUT => 30,
    //             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //             CURLOPT_CUSTOMREQUEST => "POST",
    //             CURLOPT_POSTFIELDS => '{ "id": "' . $folderid . '", "data":{ "NAME": "' . $new_filename . '" }, "fileContent": "' . $file_content . '" }',
    //             CURLOPT_HTTPHEADER => array(
    //                 "cache-control: no-cache",
    //                 "content-type: application/json",
    //                 "postman-token: 75803666-391c-f1e0-cf2a-d2eb0901aee1"
    //             ),
    //         ));
    //         $response = curl_exec($curl);
    //         curl_close($curl);
    //     }
    // }

    // $curl = curl_init();

    // curl_setopt_array($curl, array(
    //     CURLOPT_URL => "https://www.wegroupindustries.com/rest/7/s04ysn59ti70vyl8/disk.folder.uploadfile",
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => "",
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 30,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => "POST",
    //     CURLOPT_POSTFIELDS => '{ "id": "' . $folderid . '", "data":{ "NAME": "' . $concade . '" }, "fileContent": "' . $output . '" }',
    //     CURLOPT_HTTPHEADER => array(
    //         "cache-control: no-cache",
    //         "content-type: application/json",
    //         "postman-token: 75803666-391c-f1e0-cf2a-d2eb0901aee1"
    //     ),
    // ));
    // $response = curl_exec($curl);
    // // echo $response;
    // $result = json_decode($response, true);
    // // print_r($result);
    // $pdfid = $result['result']['ID'];
    // //echo $pdfid;
    // curl_close($curl);

    // $curl = curl_init();

    // curl_setopt_array($curl, array(
    //     CURLOPT_URL => 'https://www.wegroupindustries.com/rest/7/s04ysn59ti70vyl8/crm.deal.update?id=' . $_POST['id'],
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => '',
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 0,
    //     CURLOPT_FOLLOWLOCATION => true,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => 'POST',
    //     CURLOPT_POSTFIELDS => '{
    // "fields":{
    //     "UF_CRM_1644060103395":"' . $pdfid . '"
    // }
    // }',
    //     CURLOPT_HTTPHEADER => array(
    //         'Content-Type: application/json',
    //         'Cookie: BITRIX_SM_SALE_UID=5'
    //     ),
    // ));

    // $response = curl_exec($curl);
    // // echo $response;
    // curl_close($curl);
    // unset($_POST['submit']);
}

?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <title>Thank You</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #1c6dd0;
        }

        .jumbotron {
            color: black;
        }

        img {
            height: 75px;
            width: 150px;
            margin-right: 1000px;
            margin-bottom: 10px;
            margin-top: 0px
        }

        .wrapper {
            width: 600px;
            margin: 40px auto;
            margin-top: 180px;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            background-color: white;
            box-shadow: 0px 10px 40px 0px rgba(47, 47, 47, .1);
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div id=logo>
            <img src="mintapp.png">
        </div>
        <div class="jumbotron text-center">
            <h1 class="display-3">Thank You!</h1>
            <p class="lead"><strong>Your Application form has been submitted</strong> </p>
        </div>
    </div>
</body>

</html> -->