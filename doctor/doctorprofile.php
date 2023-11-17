<?php
     session_start();
     print_r($_SESSION);
     include('../dbcon.php');
     $uid = $_SESSION['uid'];
     $query = "SELECT * FROM `doctor` WHERE `id`='$uid'";
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
       $_SESSION["doctorname"] = $fullname;
       print_r($_SESSION);
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
             *{
               padding: 0;
               margin: 0;
               box-sizing: border-box;
             }
             #settings{
               display: none;
               width: 50%;
               margin-top: 2em;
               border-style: solid;
               border-color: black;
               padding: 1em;
               grid-template-columns: 0.3fr 1fr;
               grid-gap:5px;
             }
    </style>
  </head>
  <body>
         <a href="checkup.php">CHECK PATIENT</a>
         <button id="profile-setting" type="button" name="profile-setting" onclick="doctorProfile()">PROFILE SETTING</button>
         <div id="settings">
               <span>Full Name:</span>
               <input type="text" name="fullname" id="fullname">
               <span>Aadhar Card:</span>
               <input type="text" name="aadharcard" id="aadharcard">
               <span>Contact Number:</span>
               <input type="text" name="contactnumber" id="contactnumber">
               <span>Specialization:</span>
               <input type="text" name="specialization" id="specialization">
               <span>Gender:</span>
               <input type="text" name="gender" id="gender">
               <span>Username:</span>
               <input type="text" name="username" id="username">
               <span>Password:</span>
               <input type="text" name="password" id="password">
               <span>Email:</span>
               <input type="text" name="email" id="email">
               <button type="button" name="saveme" id="saveme" onclick="saveme()">Save Changes</button>
         </div>
         <script type="text/javascript">
                  var a = document.getElementById('profile-setting');
                  var b = document.getElementById('settings');
                  // console.log(b.style);
                  function doctorProfile(){
                        console.log("hi");
                        // console.log(b.style); // this will give only those display that are changed by js dom.
                        // if(b.style.display == "none") b.style.display == "grid";
                        // else if(b.style.display == "grid") b.style.display == "none";
                        var c = window.getComputedStyle(b, null).getPropertyValue("display"); // setPropertyValue can also be used to set values.
                        // console.log(window.getComputedStyle(b));
                        if(c == "grid"){
                             b.style.display = "none";
                        }
                        else if(c == "none"){
                             b.style.display = "grid";
                             var d = document.getElementById('fullname');
                             var e = document.getElementById('aadharcard');
                             var f = document.getElementById('contactnumber');
                             var g = document.getElementById('specialization');
                             var h = document.getElementById('gender');
                             var i = document.getElementById('username');
                             var j = document.getElementById('password');
                             var k = document.getElementById('email');
                             var l = document.getElementById('saveme');
                             d.disabled = true;
                             g.disabled = true;
                             h.disabled = true;
                             j.disabled = true;
                             d.value = "<?php echo $data["fullname"]; ?>";
                             e.value = "<?php echo $data["aadharcard"]; ?>";
                             f.value = "<?php echo $data["phonenumber"]; ?>";
                             g.value = "<?php echo $data["specialization"]; ?>";
                             h.value = "<?php echo $data["gender"]; ?>";
                             i.value = "<?php echo $data["username"]; ?>";

                             k.value = "<?php echo $data["email"]; ?>";

                        }
                  }
                  function saveme(){
                      console.log("saveme function");
                      var d = document.getElementById('fullname');
                      var e = document.getElementById('aadharcard');
                      var f = document.getElementById('contactnumber');
                      var g = document.getElementById('specialization');
                      var h = document.getElementById('gender');
                      var i = document.getElementById('username');
                      var j = document.getElementById('password');
                      var k = document.getElementById('email');
                      var l = document.getElementById('saveme');
                      let xhr = new XMLHttpRequest();
                      xhr.onload = function(){
                             var responseData = xhr.responseText;
                             console.log(responseData);
                      }
                      var requestData = `fullname=${d.value}&aadharcard=${e.value}&contactnumber=${f.value}&specialization=${g.value}&gender=${h.value}&username=${i.value}&password=${j.value}&email=${k.value}&saveme=${"yes"}`;
                      // console.log("hi");
                      console.log(requestData);
                      xhr.open('post','doctorprofile.php');
                      xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
                      xhr.send(requestData);
                  }
         </script>
  </body>
</html>
<?php
     if(isset($_POST["saveme"])){
          print_r($_POST);
          $fullname = $_POST['fullname'];
          $aadharcard = $_POST['aadharcard'];
          $contactnumber = $_POST['contactnumber'];
          $specialization = $_POST['specialization'];
          $gender = $_POST['gender'];
          $username = $_POST['username'];
          $email = $_POST['email'];
          print_r($_SESSION);
          echo $uid;
          $sql2 = "UPDATE `doctor` SET `aadharcard`='$aadharcard',`phonenumber`='$contactnumber',`username`='$username',`email`='$email' WHERE `id`='$uid'";
          $run = mysqli_query($connect,$sql2);
          if($run){
                echo "Data has been saved successfully";

          }
          else{
                echo "Failed to save the data";
          }
     }
 ?>
