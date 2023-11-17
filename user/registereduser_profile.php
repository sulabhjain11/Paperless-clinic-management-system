<?php
     session_start();
     print_r($_SESSION);
     include('../dbcon.php');
     $uid = $_SESSION['uid'];
     $query = "SELECT * FROM `registereduser` WHERE `id`='$uid'";
     $run = mysqli_query($connect,$query);
     if($run){
       ?>
         <script type="text/javascript">
                  alert("quering with the database is successfull.");
         </script>
       <?php
       $data = mysqli_fetch_assoc($run);
       $fullname = $data['fullname'];
       echo "Welcome";
       echo "<br>";
       echo $fullname;
       // $_SESSION["patientname"] = $fullname;
       print_r($_SESSION);
       print_r($data);
     }
     else{
       ?>
         <script type="text/javascript">
                  alert("Error while quering with the database.");
         </script>
       <?php
     }


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
            #profile_div{
              display: none;
              width: 50%;
              margin-top: 2em;
              border-style: solid;
              border-color: black;
              padding: 1em;
              grid-template-columns: 0.5fr 1fr;
              grid-gap: 5px;
            }
    </style>
  </head>
  <body>
        <a href="bookappointment.php">book doctor's appointment</a>
        <button type="button" name="userprofile" id="userprofile" onclick="userProfile()">Profile setting</button>
        <div id="profile_div">
              <span>Full Name:</span>
              <input type="text" name="fullname" id="fullname">
              <span>Username:</span>
              <input type="text" name="username" id="username">
              <span>Email:</span>
              <input type="text" name="email" id="email">
              <span>Contact Number:</span>
              <input type="text" name="contactnumber" id="contactnumber">
              <span>Aadhar Number:</span>
              <input type="text" name="aadharcard" id="aadharcard">
              <span>Age</span>
              <input type="text" name="age" id="age">
              <span>Password:</span>
              <input type="text" name="password" id="password">
              <span>Guardian Name:</span>
              <input type="text" name="guardianname" id="guardianname">
              <span>Guardian Relation:</span>
              <input type="text" name="guardianrelation" id="guardianrelation">
              <span>Guardian Age:</span>
              <input type="text" name="guardianage" id="guardianage">
              <span>Last Appointment Date:</span>
              <input type="text" name="lastappointmentdate" id="lastappointmentdate" disabled>
              <span>Last Appointment Doctor:</span>
              <input type="text" name="lastappointmentdoctor" id="lastappointmentdoctor" disabled>
              <span>Last Pulse:</span>
              <input type="text" name="lastpulse" id="lastpulse" disabled>
              <span>Last Temperature:</span>
              <input type="text" name="lasttemperature" id="lasttemperature" disabled>
              <span>Last Glucose:</span>
              <input type="text" name="lastglucose" id="lastglucose" disabled>
              <span>Last Internal Prescription:</span>
              <input type="text" name="lastinternalprescription" id="lastinternalprescription" disabled>
              <span>Last Symptoms:</span>
              <input type="text" name="lastsymptoms" id="lastsymptoms" disabled>
              <span>Last Disease:</span>
              <input type="text" name="lastdisease" id="lastdisease" disabled>
              <span>Last External Prescription:</span>
              <input type="text" name="lastexternalprescription" id="lastexternalprescription" disabled>
              <span>Last Tests:</span>
              <input type="text" name="lastdisease" id="lastdisease" disabled>
              <span>Last Height:</span>
              <input type="text" name="lastheight" id="lastheight" disabled>
              <span>Last Weight:</span>
              <input type="text" name="lastweight" id="lastweight" disabled>
              <span>Last Dietplan:</span>
              <input type="text" name="lastdietplan" id="lastdietplan" disabled>
              <span>Last Paid Fees:</span>
              <input type="text" name="lastamount" id="lastamount" disabled>
              <span>Next Date Of Appointment:</span>
              <input type="text" name="nextappointmentdate" id="nextappointmentdate" disabled>
              <span>Next Doctor Of Appointment:</span>
              <input type="text" name="nextappointmentdoctor" id="nextappointmentdoctor" disabled>
              <button type="button" name="saveme" id="saveme" onclick="saveme()">Save Changes</button>
        </div>
        <script type="text/javascript">
                 function userProfile(){
                       var a = document.getElementById('profile_div');
                       console.log("hi");
                       if(window.getComputedStyle(a,null).getPropertyValue("display") == "none"){
                            a.style.display = "grid";
                            var b = document.getElementById('fullname');
                            var c = document.getElementById('username');
                            var d = document.getElementById('email');
                            var e = document.getElementById('aadharcard');
                            var f = document.getElementById('contactnumber');
                            var g = document.getElementById('age');
                            var h = document.getElementById('password');
                            var i = document.getElementById('guardianname');
                            var j = document.getElementById('guardianrelation');
                            var k = document.getElementById('guardianage');
                            var l = document.getElementById('lastappointmentdate');

                            var m = document.getElementById('lastappointmentdoctor');
                            var n = document.getElementById('lastpulse');
                            var o = document.getElementById('lasttemperature');
                            var p = document.getElementById('lastglucose');
                            var q = document.getElementById('lastinternalprescription');
                            var r = document.getElementById('lastsymptoms');
                            var s = document.getElementById('lastdisease');
                            var t = document.getElementById('lastexternalprescription');
                            var u = document.getElementById('lastheight');
                            var v = document.getElementById('lastweight');
                            var w = document.getElementById('lastamount');
                            var x = document.getElementById('nextappointmentdate');
                            var y = document.getElementById('nextappointmentdoctor');

                            b.value = "<?php echo $data["fullname"]; ?>";
                            c.value = "<?php echo $data["username"]; ?>";
                            d.value = "<?php echo $data["email"]; ?>";
                            e.value = "<?php echo $data["aadharnumber"]; ?>";
                            f.value = "<?php echo $data["contactnumber"]; ?>";
                            g.value = "<?php echo $data["age"]; ?>";
                            h.value = "<?php echo $data["password"]; ?>";
                            i.value = "<?php echo $data["guardianname"]; ?>";
                            j.value = "<?php echo $data["guardianrelation"]; ?>";
                            k.value = "<?php echo $data["guardianage"]; ?>";
                            l.value = "<?php echo $data["lastappointmentdate"]; ?>";
                            m.value = "<?php echo $data["lastappointmentdoctor"]; ?>";
                            n.value = "<?php echo $data["lastpulse"]; ?>";
                            o.value = "<?php echo $data["lasttemperature"]; ?>";
                            p.value = "<?php echo $data["lastglucose"]; ?>";
                            q.value = "<?php echo $data["lastinternalprescription"]; ?>";
                            r.value = "<?php echo $data["lastsymptoms"]; ?>";
                            s.value = "<?php echo $data["lastdisease"]; ?>";
                            t.value = "<?php echo $data["lastexternalprescription"]; ?>";
                            u.value = "<?php echo $data["lastheight"]; ?>";
                            v.value = "<?php echo $data["lastweight"]; ?>";
                            w.value = "<?php echo $data["feesafterdiscount"]; ?>";
                            x.value = "<?php echo $data["presentappointmentdate"]; ?>";
                            y.value = "<?php echo $data["presentappointmentdoctor"]; ?>";

                       }
                       else if(window.getComputedStyle(a,null).getPropertyValue("display") == "grid"){
                            a.style.display = "none";
                       }
                 }
                 function saveme(){
                         console.log("saveme");
                         var b = document.getElementById('fullname');
                         var c = document.getElementById('username');
                         var d = document.getElementById('email');
                         var e = document.getElementById('aadharcard');
                         var f = document.getElementById('contactnumber');
                         var g = document.getElementById('age');
                         var h = document.getElementById('password');
                         var i = document.getElementById('guardianname');
                         var j = document.getElementById('guardianrelation');
                         var k = document.getElementById('guardianage');
                         let xhr = new XMLHttpRequest();
                         xhr.onload = function(){
                                var responseData = xhr.responseText;
                                console.log(responseData);
                         }
                         var requestData = `fullname=${b.value}&username=${c.value}&email=${d.value}&aadharcard=${e.value}&contactnumber=${f.value}&age=${g.value}&password=${h.value}&guardianname=${i.value}&guardianrelation=${j.value}&guardianage=${k.value}&saveme=${"yes"}`;
                         console.log("========THIS IS THE REQUEST DATA SENT TO THE SERVER: "+requestData);
                         xhr.open('post','registereduser_profile.php');
                         xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
                         xhr.send(requestData);
                 }
        </script>
  </body>
</html>
<?php
     if(isset($_POST["saveme"])){
          echo "====THE MESSAGE RECEIVED BY THE SERVER IS: ";
          print_r($_POST);
          $fullname = $_POST['fullname'];
          $aadharcard = $_POST['aadharcard'];
          $contactnumber = $_POST['contactnumber'];
          $password = $_POST['password'];
          $age = $_POST['age'];
          $username = $_POST['username'];
          $email = $_POST['email'];
          $guardianname = $_POST['guardianname'];
          $guardianrelation = $_POST['guardianrelation'];
          $guardianage = $_POST['guardianage'];

          print_r($_SESSION);
          echo $uid;
          $sql2 = "UPDATE `registereduser` SET `fullname`='$fullname',`aadharnumber`='$aadharcard',`contactnumber`='$contactnumber',`password`='$password',`age`='$age',`username`='$username',`email`='$email',`guardianname`='$guardianname',`guardianrelation`='$guardianrelation',`guardianage`='$guardianage' WHERE `id`='$uid'";
          $run2 = mysqli_query($connect,$sql2);
          if($run2){
                echo "Data has been saved successfully";

          }
          else{
                echo "Failed to save the data";
          }
     }
 ?>
