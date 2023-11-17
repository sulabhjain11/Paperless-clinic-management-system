<!DOCTYPE html>
<!-- THIS IS THE SIGNUP PAGE OF THE DOCTOR -->
<!-- LEARNING 1: try to put all inline elements into block elements.(like div is block) -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style media="screen">
            *{
              /* star-selector means that all elements in the page */
              margin: 0;
              padding: 0;
              box-sizing: border-box;
            }
            body{
              display: flex;
              height: 100vh; /* In the absence of this,the height of the body will be the  height of the all its elements. */
              justify-content: center;
              align-items: center;
              background: linear-gradient(135deg,#71b7e6,#9b59b6);
            }
            .container{
              background-color:pink;
              max-width: 700px;
              width: 100%; /*The parent of .container is flexible. the .container can push its parent body since it is flexible*/
              /* if u make the width as 100%, it will occupy 100%width of the parent including the flexibility region. */
              padding: 25px 30px;
              border-radius: 5px;
            }
            .container .heading{
              font-size: 25px;
              font-weight: 400;
              margin: 10px;
            }
            .container form .user-container{
              display: flex;
              /* initially, the flex-items will not go down on wrapping */
              flex-wrap: wrap;
              justify-content: space-between; /*space between two flex items*/
              /* min-width: 280px; */
            }
            .user-detail{
              width: 45%;
              margin: 10px;
            }
            .user-detail input{
              width: 100%;
              height: 30px;
            }
            .user-detail input{
              border-width: 1px;
              border-color: #efb8e6f7;
              outline: none;
            }
            .user-detail span{
              font-weight: 400;
            }
            .user-gender-detail{
              margin: 10px;
            }
            .button-container{
              margin-left: 10px;
              margin-top: 20px;
            }
            .gender-category{
              margin-top: 10px;
            }
            .gender-category label{
              margin-right: 10px;
            }
            .button-container input{
              padding-top: 2px;
              padding-bottom: 2px;
              padding-right: 5px;
              padding-left: 5px;
            }
    </style>
  </head>
  <body>

        <div class="container">
              <div class="heading">
                    Registration
              </div>
              <form action="signup.php" method="post">
                     <div class="user-container">
                          <div class="user-detail">
                                <span>Full Name</span>
                                <input type="text" name="fullname" required>
                          </div>
                          <div class="user-detail">
                                <span>Username</span>
                                <input type="text" name="username" required>
                          </div>
                          <div class="user-detail">
                                <span>Email</span>
                                <input type="email" name="email" required>
                          </div>
                          <div class="user-detail">
                                <span>Phone Number</span>
                                <input type="text" name="phone-number" required>
                          </div>
                          <div class="user-detail">
                                <span>Specialization</span>
                                <input type="text" name="specialization" required>
                          </div>
                          <div class="user-detail">
                                <span>Password</span>
                                <input type="password" name="password" required>
                          </div>
                          <div class="user-detail">
                                <span>Confirm Password</span>
                                <input type="password" name="cpassword" required>
                          </div>
                     </div>
                     <div class="user-gender-detail">
                           <span>Gender</span>
                           <div class="gender-category">
                                 <label>
                                        <input type="radio" name="gender" value="male" required>
                                        <span>Male</span>
                                 </label>
                                 <label>
                                        <input type="radio" name="gender" value="female" required>
                                        <span>Female</span>
                                 </label>
                                 <label>
                                        <input type="radio" name="gender" value="notavailable" required>
                                        <span>Prefer not to say</span>
                                 </label>
                           </div>
                     </div>
                     <div class="button-container">
                           <input type="submit" name="submit" value="Submit">
                     </div>
              </form>
        </div>
  </body>
</html>
<?php
  if(isset($_POST['submit'])){
    // as soon as submit is clicked, the form will be genereated with the values that are to be sent.
    // Since, the form is to be submitted to this page itself, the flow will come to the php portion of the same page. after the php portion has finished, the flow will go to the top of the page.
    // Therefore, the php code for submission to the database should be written above the page so that the page is not loaded again.
    include('dbcon.php');
    $fullname = mysqli_real_escape_string($connect,$_POST['fullname']);
    $username = mysqli_real_escape_string($connect,$_POST['username']);
    $email = mysqli_real_escape_string($connect,$_POST['email']);
    $phonenumber = mysqli_real_escape_string($connect,$_POST['phone-number']);
    $specialization = mysqli_real_escape_string($connect,$_POST['specialization']);
    $password = mysqli_real_escape_string($connect,$_POST['password']);
    $cpassword = mysqli_real_escape_string($connect,$_POST['cpassword']);
    $gender = mysqli_real_escape_string($connect,$_POST['gender']);
    print_r($_POST);

    $epassword = password_hash($password,PASSWORD_BCRYPT);
    $ecpassword = password_hash($password,PASSWORD_BCRYPT);
    // first check if the email is found in the database.
    $emailquery = "SELECT * FROM `doctor` WHERE `email`='$email'";
    $run = mysqli_query($connect,$emailquery);
    $no_of_rows = mysqli_num_rows($run);
    if($run){
      if($no_of_rows == 0){
         // check if the two passwords are same or not.
         if($password === $cpassword){
             $insertquery = "INSERT INTO `doctor` (`fullname`,`phonenumber`,`specialization`,`gender`,`username`,`password`,`email`,`cpassword`) VALUES ('$fullname','$phonenumber','$specialization','$gender','$username','$epassword','$email','$ecpassword')";
             $run2 = mysqli_query($connect,$insertquery);
             if($run2){
               ?>
                 <script type="text/javascript">
                          alert("You have been signed in.");
                          window.location.href = "login.php";
                 </script>
               <?php
               // header('Location:doctor/doctorprofile.php'); // avoid this
             }
         }
         else{
           ?>
             <script type="text/javascript">
                      alert("Password not matching.");
                      window.open('signup.php','_self');
             </script>
           <?php
         }
      }
      else{
        ?>
          <script type="text/javascript">
                  alert("You are already signed up, please login");
                  window.open('signup.php','_self');
          </script>
        <?php
      }
    }
    else{
      ?>
        <script type="text/javascript">
                 alert("Errow while querring Email");
        </script>
      <?php
    }
  }
?>
