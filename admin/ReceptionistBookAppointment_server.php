<?php
   // print_r($_POST);
   include '../dbcon.php';
   $name = $_POST['name'];
   $age = $_POST['age'];
   $gender = $_POST['gender'];
   $contactnumber = $_POST['contactnumber'];
   $date = $_POST['date'];
   $specialization = $_POST['specialization'];
   $doctor = $_POST['doctor'];
   $sql = "INSERT INTO `guestuserappointment` (`name`,`age`,`gender`,`contactnumber`,`date`,`doctor`,`specialization`) VALUES ('$name','$age','$gender','$contactnumber','$date','$specialization','$doctor')";
   $run = mysqli_query($connect,$sql);
   if($run){
        echo "APPOINTMENT HAS BEEN BOOKED SUCCESSFULLY";
   }
   else{
        echo "ERROR WHILE BOOKING THE APPOINTMENT";
   }
 ?>
