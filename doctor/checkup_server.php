<?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "hospitalmanagementsystem";

      $connect = mysqli_connect($servername,$username,$password,$database);
      if($connect == false){
          echo "Failed to connect to the database of the xampp server.";
      }
      else{

          if(isset($_POST['date'])){
                // will receive the date received by the doctor, and display all the patient names as options on that date.
                // print_r($_POST);
                $date = "2022-03-31";
                // $date = $_POST['date'];
                $sql = "SELECT `registered id` FROM `registereduser_appointment` WHERE `date`='$date'";
                $result = mysqli_query($connect,$sql);
                if($result == false){
                    echo "Failed while selecting from the database";
                }
                else{
                    $row = mysqli_num_rows($result);
                    if($row<1){
                         echo "There is no appointment yet for you,doctor";
                    }
                    else{
                         while($data = mysqli_fetch_assoc($result)){
                             $a = $data['registered id'];
                             // echo $a;
                             $sql2 = "SELECT * FROM `registereduser` WHERE `id`='$a'";
                             $result2 = mysqli_query($connect,$sql2);
                             if($result2 == false){
                                  echo "Failed to select from the registered user database";
                             }
                             else{
                                  $row2 = mysqli_num_rows($result2);
                                  if($row2<1){
                                      echo "No data for the registered user found";
                                  }
                                  else{
                                           $data2 = mysqli_fetch_assoc($result2);
                                           $fullname = $data2['fullname'];
                                           echo "<option> $fullname </option>";
                           }
                         }
                       }
                     }
                   }
          }
        if(isset($_POST['patientname'])){
                $a = $_POST['patientname'];
                $sql3 = "SELECT * FROM `registereduser` WHERE `fullname`='$a'";
                $result3 = mysqli_query($connect,$sql3);
                if($result3 == false){
                     echo "Failed to select from the registered user database";
                }
                else{
                     $row3 = mysqli_num_rows($result3);
                     if($row3<1){
                         echo "No data for the registered user found";
                     }
                     else{
                              $data3 = mysqli_fetch_assoc($result3);
                              $fullname = $data3['fullname'];
                              $contactnumber = $data3['contactnumber'];
                              $aadharnumber = $data3['aadharnumber'];
                              $age = $data3['age'];
                              $guardianname = $data3['guardianname'];
                              $guardianrelation = $data3['guardianrelation'];
                              $guardianage = $data3['guardianage'];
                              $lastappointmentdate = $data3['lastappointmentdate'];
                              $lastappointmentdoctor = $data3['lastappointmentdoctor'];
                              $lastpulse = $data3['lastpulse'];
                              $lasttemperature = $data3['lasttemperature'];
                              $lastglucose = $data3['lastglucose'];
                              $lastinternalprescription= $data3['lastinternalprescription'];
                              $lastsymptoms = $data3['lastsymptoms'];
                              $lastdisease = $data3['lastdisease'];
                              $lastexternalprescription = $data3['lastexternalprescription'];
                              $lasttest = $data3['lasttests'];
                              $lastheight = $data3['lastheight'];
                              $lastweight = $data3['lastweight'];
                              $lastdietplan = $data3['lastdietplan'];
                              // print_r(json_encode($data3));
                              // $abc = json_encode($data3); // php associative array to json string
                              // echo $abc;
                              // https://www.codewall.co.uk/how-creating-json-in-php-manually-is-better-for-beginners/
                              $abc = '{"fullname": "'.$fullname.'", "contactnumber": "'.$contactnumber.'", "aadharnumber": "'.$aadharnumber.'", "age": "'.$age.'", "guardianname": "'.$guardianname.'", "guardianrelation": "'.$guardianrelation.'", "guardianage": "'.$guardianage.'", "lastappointmentdate": "'.$lastappointmentdate.'", "lastappointmentdoctor": "'.$lastappointmentdoctor.'", "lastpulse": "'.$lastpulse.'", "lasttemperature": "'.$lasttemperature.'", "lastglucose": "'.$lastglucose.'", "lastinternalprescription": "'.$lastinternalprescription.'", "lastsymptoms": "'.$lastsymptoms.'", "lastdisease": "'.$lastdisease.'", "lastexternalprescription": "'.$lastexternalprescription.'", "lasttest": "'.$lasttest.'", "lastheight": "'.$lastheight.'", "lastweight": "'.$lastweight.'", "lastdietplan": "'.$lastdietplan.'"}';
                              echo $abc;
                              // echo json_encode($z);
                              // print_r($abc);
                     }
                }
        }
           }
 ?>
