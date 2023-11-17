<?php
  if(isset($_POST['submit'])){
       session_start();
       print_r($_SESSION);
       print_r($_POST);

       // CONNECT TO THE registereduser_appointment TABLE IN THE hospitalmanagementsystem DATABASE IN THE LOCAL SERVER.
       $servername = "localhost";
       $username = "root";
       $password = "";
       $database = "hospitalmanagementsystem";
       $registeredid = $_SESSION['uid'];
       $date = $_POST['date'];
       $doctor_appointment = $_POST['doctor-name'];

       $connect = mysqli_connect($servername,$username,$password,$database);
       if($connect == false){
           echo "Failed to connect to the database of the xampp server.";
       }
       else{
           $sql = "INSERT INTO `registereduser_appointment`(`registered id`,`date`,`doctor name`) VALUES ('$registeredid','$date','$doctor_appointment')";
           $run = mysqli_query($connect,$sql);
           if($run == false){
               echo "Error while inserting data into the server.";
           }
           else{
               echo "Appointment booked successfully.";
           }
       }
  }
?>
