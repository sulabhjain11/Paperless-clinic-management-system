<?php
     print_r($_GET);
     include '../dbcon.php';
     $id = $_GET['id'];
     $sql = "SELECT * FROM `registereduser` WHERE `id`='$id'";
     $run = mysqli_query($connect,$sql);
     if($run){
               $data = mysqli_fetch_assoc($run);
               $patientname = $data['fullname'];
               $patientage = $data['age'];
               $pulse = $data['lastpulse'];
               $temperature = $data['lasttemperature'];
               $glucose = $data['lastglucose'];
               $height = $data['lastheight'];
               $weight = $data['lastweight'];
               $dietplan = $data['lastdietplan'];
               $symptoms = $data['lastsymptoms'];
               $disease = $data['lastdisease'];
               $prescription = $data['lastinternalprescription'];
               $test = $data['lasttests'];
               $feesbeforediscount = $data['feesbeforediscount'];
               $discount = $data['discount'];
               $feesafterdiscount = $data['feesafterdiscount'];

               $sql2 = "SELECT * FROM `registereduser_appointment` WHERE `registered id`='$id'";
               $run2 = mysqli_query($connect,$sql2);
               if($run2){
                    $data2 = mysqli_fetch_assoc($run2);
                    $doctorname = $data2['doctor name'];
                    $date = $data2['date'];

               }
               $arr = explode(" ",$doctorname);
               // print_r($arr);
               $sql3 = "SELECT * FROM `admin_assign_doctor` WHERE `First Name`='$arr[0]' AND `Last Name`='$arr[1]'";
               $run3 = mysqli_query($connect,$sql3);
               if($run3){
                    $data3 = mysqli_fetch_assoc($run3);
                    $specialization = $data3['Specialization'];

               }

               $finaldata = '{"patientname":"'.$patientname.'","patientage":"'.$patientage.'","pulse":"'.$pulse.'","temperature":"'.$temperature.'","glucose":"'.$glucose.'","height":"'.$height.'","weight":"'.$weight.'","symptoms":"'.$symptoms.'","disease":"'.$disease.'","prescription":"'.$prescription.'","test":"'.$test.'","feesbeforediscount":"'.$feesbeforediscount.'","discount":"'.$discount.'","feesafterdiscount":"'.$feesafterdiscount.'","doctorname":"'.$doctorname.'","date":"'.$date.'","specialization":"'.$specialization.'"}';
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
                Pulse:<span id="pulse"></span>
                Temperature:<span id="temperature"></span>
                Glucose:<span id="glucose"></span>
                Height:<span id="height"></span>
                Weight:<span id="weight"></span>
                Prescribed Diet Plan:<span id="dietplan"></span>
                Symptoms:<span id="symptoms"></span>
                Disease:<span id="disease"></span>
                Prescription:<span id="prescription"></span>
                Tests:<span id="test"></span>
                Fees Before Discount:<span id="feesbeforediscount"></span>
                Discount:<span id="discount"></span>
                Fees After Discount:<span id="feesafterdiscount"></span>
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
                   document.getElementById('pulse').innerHTML = obj.pulse;
                   document.getElementById('temperature').innerHTML = obj.temperature;
                   document.getElementById('glucose').innerHTML = obj.glucose;
                   document.getElementById('height').innerHTML = obj.height;
                   document.getElementById('weight').innerHTML = obj.weight;
                   document.getElementById('symptoms').innerHTML = obj.symptoms;
                   document.getElementById('disease').innerHTML = obj.disease;
                   document.getElementById('prescription').innerHTML = obj.prescription;
                   document.getElementById('test').innerHTML = obj.test;
                   document.getElementById('feesbeforediscount').innerHTML = obj.feesbeforediscount;
                   document.getElementById('discount').innerHTML = obj.discount;
                   document.getElementById('feesafterdiscount').innerHTML = obj.feesafterdiscount;


          </script>
   </body>
 </html>
