<!-- THE ADMIN WILL ADD SOME OF THE DOCTOR'S DETAIL TO THE HOSPITAL'S PORTAL. THE DOCTOR CAN AFTER THAT, REGISTER AND LOGIN TO THE PORTAL USING USERNAME AND PASSWORD. -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
         <h1>WELCOME ADMIN</h1>
         <form id="form" action="addDoctor.php" method="post">
                <label for="random_id">Assign Random Id:</label>
                <input type="text" name="random_id" id="random_id" required>
                <label for="firstname">First Name:</label>
                <input type="text" name="firstname" id="firstname" required>
                <label for="lastname">Last Name:</label>
                <input type="text" name="lastname" id="lastname" required>
                <label for="specialization">Specialization:</label>
                <input type="text" name="specialization" id="specialization" required>
                <label for="contactnumber">Contact Number:</label>
                <input type="text" name="contactnumber" id="contactnumber" required>
                <label for="aadharcard">Aadharcard:</label>
                <input type="text" name="aadharcard" id="aadharcard" required>
                <input type="submit" name="submit" value="SUBMIT">
         </form>
  </body>
</html>
<?php
     if(isset($_POST['submit'])){
        include '../dbcon.php';
        $randomid = mysqli_real_escape_string($connect,$_POST['random_id']);
        $firstname = mysqli_real_escape_string($connect,$_POST['firstname']);
        $lastname = mysqli_real_escape_string($connect,$_POST['lastname']);
        $specialization = mysqli_real_escape_string($connect,$_POST['specialization']);
        $contactnumber = mysqli_real_escape_string($connect,$_POST['contactnumber']);
        $aadharcard = mysqli_real_escape_string($connect,$_POST['aadharcard']);
        // INSERT THE DATA INTO THE "admin_assign_doctor" table.
        $sql = "INSERT INTO `admin_assign_doctor`(`random_id`,`First Name`,`Last Name`,`Specialization`,`Contact Number`,`Aadhar Card`) VALUES('$randomid','$firstname','$lastname','$specialization','$contactnumber','$aadharcard')";
        $result = mysqli_query($connect,$sql);
        if($result){
           echo "Inserted successfully!";
        }
        else{
          echo "Failed while inserting the doctor into the database!";
        }
     }
 ?>
