<?php
  if(isset($_POST['checkuptype'])){
        include '../dbcon.php';
        $A = [];
        $checkuptype = $_POST['checkuptype'];
        $sql = "SELECT `First Name`,`Last Name`,`id` FROM `admin_assign_doctor` WHERE `Specialization`='$checkuptype'";
        $result = mysqli_query($connect,$sql);
        if($result == false){
            echo "Failed to retrieve data from the table.";
        }
        else{
            $row = mysqli_num_rows($result);
            if($row<1){
                 echo "No doctors found in the chosen specialization";
            }
            else{
                // Doctors are available in the following specialization
                while($data = mysqli_fetch_assoc($result)){
                     // echo "<option> $data['First Name'] </option>";
                     $a = $data['First Name']." ".$data['Last Name'];
                     echo "<option> $a </option>";
                }
              // echo $A;
            }
        }
  }
?>
