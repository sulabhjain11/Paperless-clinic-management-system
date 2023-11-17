
<!-- THE RECEPTIONIST CAN VIEW THE APPOINTMENTS OF BOTH THE GUEST AND REGISTERED PATIENTS. -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
            th{
              border-color: black;
              border-style: solid;
            }
    </style>
  </head>
  <body>
         Date: <input type="date" id="date">
         <h2>REGISTERED USER</h2>
         <div class="patient" id="registeredpatient">
               <!-- ID,REGISTERED ID,DATE,DOCTOR -->
               <script type="text/javascript">
                        // SEND THE DATE TO THE SERVER IN THIS PAGE.
                        var a = document.getElementById('date');
                        a.addEventListener("change",function(){
                            let xhr = new XMLHttpRequest();
                            xhr.onload = function(){
                               var a = xhr.responseText;
                               // console.log(a);
                               document.getElementById('table1').innerHTML = a;

                            }
                            let requestData = `date=${a.value}`;
                            console.log(requestData);
                            xhr.open('post','ReceptionistViewAppointment_registered.php');
                            xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
                            xhr.send(requestData);
                        })

               </script>
               <table id="table1">
                       <tr>
                           <th>ID</th>
                           <th>PATIENT NAME</th>
                           <th>DOCTOR</th>
                           <th>DOCTOR'S SPECIALIZATION</th>
                           <th>FEES BEFORE DISCOUNT</th>
                           <th>DISCOUNT</th>
                           <th>FEES AFTER DISCOUNT</th>
                       </tr>


               </table>

         </div>
         <h2>GUEST USER</h2>
         <div class="patient" id="guestpatient">
               <!-- ID,REGISTERED ID,DATE,DOCTOR -->
               <script type="text/javascript">
                        // SEND THE DATE TO THE SERVER IN THIS PAGE.
                        var a = document.getElementById('date');
                        a.addEventListener("change",function(){
                            let xhr = new XMLHttpRequest();
                            xhr.onload = function(){
                               var a = xhr.responseText;
                               // console.log(a);
                               document.getElementById('table2').innerHTML = a;

                            }
                            let requestData = `date=${a.value}`;
                            console.log(requestData);
                            xhr.open('post','ReceptionistViewAppointment_guest.php');
                            xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
                            xhr.send(requestData);
                        })

               </script>
               <table id="table2">
                       <tr>
                           <th>ID</th>
                           <th>PATIENT NAME</th>
                           <th>DOCTOR</th>
                           <th>DOCTOR'S SPECIALIZATION</th>
                           <th>FEES</th>
                       </tr>




               </table>
         </div>
  </body>
</html>
