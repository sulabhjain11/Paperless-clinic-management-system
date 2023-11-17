<?php
           include '../dbcon.php';
           if(isset($_POST['date'])){
               ?>
                     <tr>
                         <th>ID</th>
                         <th>PATIENT NAME</th>
                         <th>DOCTOR</th>
                         <th>DOCTOR'S SPECIALIZATION</th>
                         <th>FEES BEFORE DISCOUNT</th>
                         <th>DISCOUNT</th>
                         <th>FEES AFTER DISCOUNT</th>
                         <th>Click Me</th>
                     </tr>
               <?php
               $date = $_POST['date'];
               // echo $date;
               $sql1 = "SELECT * FROM `registereduser_appointment` WHERE `date`='$date'";
               $run1 = mysqli_query($connect,$sql1);
               if($run1){
                   while($data = mysqli_fetch_assoc($run1)){
                         $id = $data['registered id'];
                         $doctorname = $data['doctor name'];
                         $sql2 = "SELECT * FROM `registereduser` WHERE `id`='$id'";
                         $run2 = mysqli_query($connect,$sql2);
                         if($run2){
                                 $data2 = mysqli_fetch_assoc($run2);
                                  ?>
                                    <tr>
                                         <th><?php echo $data2['id']; ?></th>
                                         <th><?php echo $data2['fullname']; ?></th>
                                         <th><?php echo $doctorname; ?></th>
                                         <th>hi</th>
                                         <th><?php echo $data2['feesbeforediscount']; ?></th>
                                         <th><?php echo $data2['discount']; ?></th>
                                         <th><?php echo $data2['feesafterdiscount']; ?></th>
                                         <th><a href="ReceptionistReceivePayment_registered_server.php?id=<?php echo $data2['id']; ?>">Click Me</a></th>
                                    </tr>
                                  <?php
                         }
                   }
               }
           }
?>
