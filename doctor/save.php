<?php
    // this page will update the registereduser table
    session_start();
    print_r($_SESSION);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "hospitalmanagementsystem";
    $connect1 = mysqli_connect($servername,$username,$password,$database);
    if(!$connect1){
         echo  "Failed to connect with the database";
    }
    else{
         $patientname = $_POST['patientname'];
         $guardian = $_POST['guardian'];
         $age = $_POST['age'];
         $lastappointmentdate = $_POST['lastappointmentdate'];
         $lastappointmentdoctor = $_POST['lastappointmentdoctor'];
         $lastpulse = $_POST['lastpulse'];
         $lasttemperature = $_POST['lasttemperature'];
         $lastglucose = $_POST['lastglucose'];
         $lastinternalprescription = $_POST['lastinternalprescription'];
         $lastsymptoms = $_POST['lastsymptoms'];
         $lastexternalprescription = $_POST['lastexternalprescription'];
         $lastdisease = $_POST['lastdisease'];
         $lasttest = $_POST['lasttest'];
         $presentappointmentdate = $_POST['presentappointmentdate'];
         $presentappointmentdoctor = $_POST['presentappointmentdoctor'];
         $presentpulse = $_POST['presentpulse'];
         $presenttemperature = $_POST['presenttemperature'];
         $presentglucose = $_POST['presentglucose'];
         $presentinternalprescription = $_POST['presentinternalprescription'];
         $presentsymptoms = $_POST['presentsymptoms'];
         $presentexternalprescription = $_POST['presentexternalprescription'];
         $presentdisease = $_POST['presentdisease'];
         $presenttest = $_POST['presenttest'];

         $lastheight = $_POST['lastheight'];
         $lastweight = $_POST['lastweight'];
         $lastdietplan = $_POST['lastdietplan'];
         $presentheight = $_POST['presentheight'];
         $presentweight = $_POST['presentweight'];
         $presentdietplan = $_POST['presentdietplan'];
         $guardianrelation = $_POST['guardianrelation'];
         $guardianage = $_POST['guardianage'];
         $remark = $_POST['remarks'];
         $fee = $_POST['fees'];
         $discount = $_POST['discount'];
         $amount = (int)$fee - (int)$discount;

         $sql1 = "UPDATE `registereduser` SET `guardianname`='$guardian',`guardianrelation`='$guardianrelation',`guardianage`='$guardianage',`lastappointmentdate`='$presentappointmentdate',`lastappointmentdoctor`='$presentappointmentdoctor',`lastpulse`='$presentpulse',`lasttemperature`='$presenttemperature',`lastglucose`='$presentglucose',`lastinternalprescription`='$presentinternalprescription',`lastsymptoms`='$presentsymptoms',`lastdisease`='$presentdisease',`lastexternalprescription`='$presentexternalprescription',`lasttests`='$presenttest',`lastheight`='$presentheight',`lastweight`='$presentweight',`lastdietplan`='$presentdietplan',`remark`='$remark',`feesbeforediscount`='$fee',`discount`='$discount',`feesafterdiscount`='$amount' WHERE `fullname`='$patientname' ";
         $run1 = mysqli_query($connect1,$sql1);
         if(!$run1){
              echo "Failed to insert data into the table";
         }
         else{
              echo "Data has been successfully inserted into the table.";
         }
    }
?>
