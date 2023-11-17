<?php
           include '../dbcon.php';
           if(isset($_POST['date'])){
               ?>
                     <tr>
                         <th>ID</th>
                         <th>PATIENT NAME</th>
                         <th>DOCTOR</th>
                         <th>DOCTOR'S SPECIALIZATION</th>
                         <th>FEES</th>
                         <th>CLICK ME</th>
                     </tr>
               <?php
               $date = $_POST['date'];
               // echo $date;
               $sql1 = "SELECT * FROM `guestuserappointment` WHERE `date`='$date'";
               $run1 = mysqli_query($connect,$sql1);
               if($run1){
                   while($data = mysqli_fetch_assoc($run1)){
                                  ?>
                                    <tr>
                                         <th><?php echo $data['id']; ?></th>
                                         <th><?php echo $data['name']; ?></th>
                                         <th><?php echo $data['specialization']; ?></th>
                                         <th><?php echo $data['doctor']; ?></th>
                                         <th><?php echo $data['fees']; ?></th>
                                         <th><a href="ReceptionistReceivePayment_guest_server.php?id=<?php echo $data['id']; ?>">Click Me</a></th>
                                    </tr>
                                  <?php
                         }
                   }
               }

?>
