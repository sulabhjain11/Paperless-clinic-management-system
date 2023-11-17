<?php
  // this php file is used to connect the webpage to the database.
  $connect = mysqli_connect('localhost','root','','hospitalmanagementsystem');
  if($connect == true){
    ?>
      <!-- <script type="text/javascript">
               alert("This webpage has successfully connected to the database");
      </script> -->
    <?php
  }
  else{
    ?>
      <script type="text/javascript">
               alert("This webpage has failed to connect to the database");
      </script>
    <?php
  }
?>
