<?php
     print_r($_GET);
     include '../dbcon.php';
     $id = $_GET['id'];
     $sql = "SELECT * FROM `guestuserappointment` WHERE `id`='$id'";
     $run = mysqli_query($connect,$sql);
     if($run){
               $data = mysqli_fetch_assoc($run);
               $patientname = $data['name'];
               $patientage = $data['age'];
               $height = $data['height'];
               $weight = $data['weight'];
               $dietplan = $data['dietplan'];
               $date = $data['date'];
               $prescription = $data['prescription'];
               $doctor = $data['doctor'];
               $fees = $data['fees'];
               $specialization = $data['specialization'];
               $finaldata = '{"patientname":"'.$patientname.'","patientage":"'.$patientage.'","height":"'.$height.'","weight":"'.$weight.'","prescription":"'.$prescription.'","fees":"'.$fees.'","doctorname":"'.$doctor.'","date":"'.$date.'","specialization":"'.$specialization.'"}';
               // echo $finaldata;

               // $finaldata = '{"name":"Sulabh","gender":"male"}';

               // echo gettype($finaldata);
               // var_dump($finaldata);
               // var_dump($prescription);
               // $abcd = json_decode($prescription);
               $dietplansent = '{"dietplan":"'.$dietplan.'"}';
               $dietplansent = json_encode($dietplansent);
               // echo $finaldata;
               // var_dump($finaldata);
          }

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 <head>
     <meta charset="utf-8">
     <title></title>
     <style media="screen">
             .report{
               background-color: grey;
               display : grid;
               grid-template-columns: 200px 500px;
             }
     </style>
   </head>
   <body>
          <div class="report">
                Patient Name:<span id="patientname"></span>
                Patient's Age:<span id="patientage"></span>
                Doctor:<span id="doctorname"></span>
                Doctor's Specialization:<span id="doctorspecialization"></span>
                Date Of Appointment:<span id="date"></span>
                Height:<span id="height"></span>
                Weight:<span id="weight"></span>
                Prescribed Diet Plan:<span id="dietplan"></span>
                Prescription:<span id="prescription"></span>
                Fees:<span id="feesafterdiscount"></span>
                <button type="button" name="button">Receipt</button>
                <div id="abc">

                </div>
          </div>
          <script type="text/javascript">


                   // var a = '{"patientname":"jkhjkh\tkj"}';
                   // var a = '{\"patientname\":\"jkhjkh\\tkj\"}';
                   var a = <?php echo $dietplansent; ?>;
                   document.getElementById('dietplan').innerHTML = a;

                   console.log(typeof a);
                   console.log(a);
                   // a = JSON.stringify(a);
                   // console.log(typeof a);
                   // console.log(a);
                   // var obj = JSON.stringify(a);
                   var b = '<?php echo $finaldata; ?>';
                   var obj = JSON.parse(b);
                   // console.log(typeof obj);

                   // console.log(obj['gender']);
                   console.log(obj);

                   // var obj = JSON.parse(a);
                   document.getElementById('patientname').innerHTML = obj.patientname;
                   document.getElementById('patientage').innerHTML = obj.patientage;
                   document.getElementById('doctorname').innerHTML = obj.doctorname;
                   document.getElementById('doctorspecialization').innerHTML = obj.specialization;
                   document.getElementById('date').innerHTML = obj.date;
                   document.getElementById('height').innerHTML = obj.height;
                   document.getElementById('weight').innerHTML = obj.weight;
                   document.getElementById('prescription').innerHTML = obj.prescription;
                   document.getElementById('fees').innerHTML = obj.feesafterdiscount;


          </script>
   </body>
 </html>
