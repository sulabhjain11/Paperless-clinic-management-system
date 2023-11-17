<?php
  include '../dbcon.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
            .div1{
              display: grid;
              grid-template-columns: 120px 200px;
              margin: 10px;
            }
    </style>
  </head>
  <body>
         <div class="div1">
               Name: <input type="text" id="name">
         </div>
         <div class="div1">
               Age: <input type="number" id="age">
         </div>
         <div class="div1">
               Gender:
               <div id="GENDER">
                     <input type="radio" name="gender" value="male">Male
                     <input type="radio" name="gender" value="female">Female
               </div>
         </div>
         <div class="div1">
               Contact Number: <input type="number" id="number">
         </div>
         <div class="div1">
               Date: <input type="date" id="date">
         </div>
         <div class="div1">
               Specialization:
               <select onchange="myFunction()" id="specialization">
                        <?php
                              $sql = "SELECT DISTINCT `Specialization` FROM `admin_assign_doctor`";
                              $result = mysqli_query($connect,$sql);
                              $row = mysqli_num_rows($result);
                              if($row>=1){
                                  while($data = mysqli_fetch_assoc($result)){
                                       ?>
                                          <option id="<?php echo $data['Specialization'] ?>" value="<?php echo $data['Specialization'] ?>"><?php echo $data['Specialization'] ?></option>
                                       <?php
                                  }
                              }
                         ?>
               </select>
         </div>
         <div class="div1">
               Doctor:
               <select id="doctor-name" name="doctor-name">
                        <!-- <option>Select Doctor</option> -->
                        <script type="text/javascript">
                                 var checkuptype = document.getElementById('specialization').value;
                                 console.log(checkuptype);
                                 function myFunction(){
                                     checkuptype = document.getElementById('specialization').value;
                                     console.log(checkuptype);
                                     let xhr = new XMLHttpRequest();

                                     xhr.onload = function(){
                                          var a = xhr.responseText;
                                          // document.write(a[0]);
                                          console.log(a);
                                          // result.innerHTML = xhr.responseText;
                                          // let responseObject = JSON.parse(xhr.responseText);
                                          // let responseObject = Object.assign(xhr.responseText);
                                          // console.log(responseObject);
                                          document.getElementById('doctor-name').innerHTML = a;
                                     }
                                     let requestData = `checkuptype=${checkuptype}`; // key value pair
                                     console.log(requestData);
                                     xhr.open('post','../user/bookappointment_getdoctors.php');
                                     xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded'); // the server will wait for the request in the form of key-value format.
                                     xhr.send(requestData);
                                 }
                        </script>
               </select>
         </div>
         <button type="button" name="button" onclick="book()">BOOK APPOINTMENT</button>
         <script type="text/javascript">
                  function book(){
                      // console.log("hi");
                      var name = document.getElementById('name');
                      var age = document.getElementById('age');
                      var gender = document.querySelector(`input[type="radio"][name="gender"]:checked`);
                      console.log(gender);
                      var contactnumber = document.getElementById('number');
                      var date = document.getElementById('date');
                      var specialization = document.getElementById('specialization');
                      console.log(specialization.value);
                      var doctor = document.getElementById('doctor-name');
                      console.log(doctor.value);
                      let xhr = new XMLHttpRequest();

                      xhr.onload = function(){
                           var a = xhr.responseText;
                           // document.write(a[0]);
                           console.log(a);
                      }
                      let requestData = `name=${name.value}&age=${age.value}&gender=${gender.value}&contactnumber=${contactnumber.value}&date=${date.value}&specialization=${specialization.value}&doctor=${doctor.value}`; // key value pair
                      console.log(requestData);
                      xhr.open('post','ReceptionistBookAppointment_server.php');
                      xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded'); // the server will wait for the request in the form of key-value format.
                      xhr.send(requestData);
                  }
         </script>
  </body>
</html>
