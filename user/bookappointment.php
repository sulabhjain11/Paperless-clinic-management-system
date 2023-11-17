 <!-- First check if the user is a guest or the user is registered.
      If the user is a logedin user, fill the user-details in his database already.
      If the user is a guest, tell him to fill the necessary record and save his details in the guest database.
      This "bookappointment.php" server is the common server for both the guest and the registered user.
 -->

 <!-- WHEN YOU WRITE A PHP CODE, THE CODE WILL BE FIRST RUN BY THE SERVER AND THAN SENT TO THE CLIENT SIDE.-->
 <?php
   session_start();
   print_r($_SESSION);
   include '../dbcon.php';

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
       <?php $specialization; ?>
          <form id="form" action="bookappointment_server_registered user.php" method="post">
            <span id="span"></span>
                  <label for="date">Date</label>
                  <input type="date" name="date" id="id">
                  <label for="checkup-type">Checkup Type</label>
                  <select onchange="myFunction()" id="checkup-type" name="checkup-type">
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
                  <label for="doctor-name">Doctor Name</label>
                  <select id="doctor-name" name="doctor-name">
                           <option>Select Doctor</option>
                           <script type="text/javascript">
                                    var checkuptype = document.getElementById('checkup-type').value;
                                    console.log(checkuptype);
                                    function myFunction(){
                                        checkuptype = document.getElementById('checkup-type').value;
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
                                        xhr.open('post','bookappointment_getdoctors.php');
                                        xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded'); // the server will wait for the request in the form of key-value format.
                                        xhr.send(requestData);
                                    }
                           </script>
                  </select>
                  <input type="submit" name="submit">
          </form>
   </body>
 </html>
