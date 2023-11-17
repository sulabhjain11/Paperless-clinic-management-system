<?php
     session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
  </head>
  <style media="screen">
          *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
          }
          body{
            background-image: linear-gradient(177deg,#e224eb,#a784c5);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
          }
          .wrapper{
            height: 370px;
            border-color: #5a3333;
            border-style: solid;
            width: 360px;
          }
          .header{
            display: flex;
            margin: 10%;
            justify-content: center;
          }
          .header button{
            padding: 5px 15px;
            border-radius: 15px;
            margin: 0 -8px;
          }
          .header .button1{
            background-color: yellow;
          }
          .log-in{
            /* display: none; */
            /* visibility: hidden; */
            display: grid;
          }
          .log-in input{
            height: 25px;
            background-color: transparent;
            border: none;
            border-bottom-color: black;
            border-bottom-style: solid;
            border-bottom-width: 1px;
            margin-bottom: 10px;
            margin-right: 15px;
            margin-left: 15px;
          }
          .log-in button{
            width: 80%;
            margin: 15px auto;
            padding: 5px;
            border-radius: 25px;
            background-color: yellow;
          }
          .sign-up{
            display: none;
            /* display: grid; */
          }
          .sign-up input{
            height: 25px;
            background-color: transparent;
            border: none;
            border-bottom-color: black;
            border-bottom-style: solid;
            border-bottom-width: 1px;
            margin-bottom: 10px;
            margin-right: 15px;
            margin-left: 15px;
          }
          .sign-up button{
            width: 80%;
            margin: 15px auto;
            padding: 5px;
            border-radius: 25px;
            background-color: yellow;
          }

  </style>
  <body>
        <div class="wrapper">
              <div class="header">
                    <button type="button" class="button1" name="button1" onclick="result('button1')">Log in</button>
                    <button type="button" class="button2" name="button2" onclick="result('button2')">Register</button>
              </div>
              <form class="login-form" action="user_login_signup.php" method="post">
                      <div class="log-in" id="log-in">
                            <input type="text" name="email" value="" placeholder="Email id" required>
                            <input type="text" name="username" value="" placeholder="username" required>
                            <input type="password" name="password" value="" placeholder="Enter password" required>
                            <button type="submit" name="login-button">Log in</button>
                      </div>
              </form>
              <form class="signup-form" action="user_login_signup.php" method="post">
                      <div class="sign-up" id="sign-up">
                            <input type="text" name="firstname" value="" placeholder="First Name" required>
                            <input type="text" name="lastname" value="" placeholder="Last Name" required>
                            <input type="text" name="email" value="" placeholder="Email id" required>
                            <input type="text" name="username" value="" placeholder="username" required>
                            <input type="password" name="password" value="" placeholder="Enter Password" required>
                            <input type="password" name="cpassword" value="" placeholder="Confirm Password" required>
                            <button type="submit" name="signup-button">Register</button>
                      </div>
              </form>
        </div>
        <script type="text/javascript">
                 var d1 = document.getElementById('log-in');
                 var d2 = document.getElementById('sign-up');
                 var a1 = document.getElementsByClassName('button1');
                 a1[0].disabled = true;
                 // console.log(d2.style.display = "grid");
                 // console.log(d1);
                 // console.log(d2);
                 function result(name){
                    // console.log(name);
                    if(name === "button1"){
                      // console.log("hi1");
                      let a = document.getElementsByClassName('button1');
                      let b = document.getElementsByClassName('button2');
                      // b.style.display = "none";
                      // console.log(a);
                      a[0].style.backgroundColor="yellow";
                      b[0].style.backgroundColor="white";
                      d1.style.display="grid";
                      d2.style.display="none";
                      a[0].disabled = true; // disable button1
                      b[0].disabled = false; // enable button2
                      // console.log("hi1");
                    }
                    else{
                      // console.log("hi2");
                      let a = document.getElementsByClassName('button1');
                      let b = document.getElementsByClassName('button2');
                      // a.style.display = "none";
                      a[0].style.backgroundColor="white";
                      b[0].style.backgroundColor="yellow";
                      d1.style.display="none";
                      d2.style.display="grid";
                      a[0].disabled = false; // disable button2
                      b[0].disabled = true; // enable button1
                      // console.log("hi2");
                    }
                 }
        </script>
  </body>
</html>
<?php
    include('../dbcon.php');  // WHY is this php code loading before the html code.
    if(isset($_POST['login-button'])){
       // echo '<script>alert("hi");</script>';
       // $username = mysqli_real_escape_string($connect,$_POST['username']);
       $username = $_POST['username']; // this username should not be escaped since it is not going to the database.
       // If you escape this username, "\" will be added to the list of escape characters like all others.
       // And when you compare this new username, it will have added "\" which will not be present in the data stored in the database.
       // All the information provided by the user should be stored in the database as it is without escaping any characters.
       // ALSO NOT-E SOMETHING IMPORTANT AND OF SIMILAR FASHION WITH THE PASSWORD, AND WHY IS IT BEING PASSED.
       $email = mysqli_real_escape_string($connect,$_POST['email']);
       $password = mysqli_real_escape_string($connect,$_POST['password']);
       $query1 = "SELECT * FROM `registereduser` WHERE `email`='$email'";
       $run1 = mysqli_query($connect,$query1);
       if($run1){
         $num_of_rows1 = mysqli_num_rows($run1);
         if($num_of_rows1==1){
           // email exists in the database.
           $data = mysqli_fetch_assoc($run1);
           // print_r($data);
           // echo $data['username'];
           // echo $username;
           // exit;
           if($username === $data['username']){
           $hashedpassword = $data['hashedpassword'];
               if(password_verify($password,$hashedpassword)){
                  $_SESSION['uid'] = $data['id'];
                  $_SESSION['uname'] = $data['username'];
                  ?>
                     <script type="text/javascript">
                              window.location.href = "registereduser_profile.php";
                              alert("you are logged in.");
                     </script>
                  <?php
               }
               else{
                   ?>
                      <script type="text/javascript">
                               alert("Invalid Password");
                               window.open('user_login_signup.php','_self');
                      </script>
                   <?php
               }
           }
           else{
               ?>
                  <script type="text/javascript">
                           alert("Invalid username");
                           alert('hi');
                           window.open('user_login_signup.php','_self');
                  </script>
               <?php
           }
         }
       else{
            ?>
               <script type="text/javascript">
                        alert("The email does not exist in the database.");
                        window.open('user_login_signup.php','_self');
               </script>
            <?php
         }
       }
      else{
        ?>
           <script type="text/javascript">
                    alert("Error while quering the email.");
                    window.open('user_login_signup.php','_self');
           </script>
        <?php
      }
    }
    else if(isset($_POST['signup-button'])){
       $firstname = mysqli_real_escape_string($connect,$_POST["firstname"]);
       $lastname = mysqli_real_escape_string($connect,$_POST["lastname"]);
       $email = mysqli_real_escape_string($connect,$_POST["email"]);
       $username = mysqli_real_escape_string($connect,$_POST["username"]);
       $password = mysqli_real_escape_string($connect,$_POST["password"]);
       $cpassword = mysqli_real_escape_string($connect,$_POST["cpassword"]);
       // print_r($_POST);
       // print_r($firstname);
       // FIRST CHECK IF THE PASSWORD IF PRESENT IN THE DATABASE OR NOT.
       $emailquery = "SELECT * FROM `registereduser` WHERE `email`='$email'";
       $run1 = mysqli_query($connect,$emailquery);
       if($run1){
          $num_of_rows1 = mysqli_num_rows($run1);
          if($num_of_rows1>=1){
              ?>
                 <script>
                         alert("The email is already registered");
                         window.open('user_login_signup.php','_self');
                 </script>;
              <?php
          }
          else{
             $usernamequery = "SELECT * FROM `registereduser` WHERE `username`='$username'";
             $run2 = mysqli_query($connect,$usernamequery);
             if($run2){
                $num_of_rows2 = mysqli_num_rows($run2);
                if($num_of_rows2>=1){
                    ?>
                       <script>
                               alert("The username is already taken");
                               window.open('user_login_signup.php','_self');
                       </script>;
                    <?php
                }
                else{
                    if($password === $cpassword){
                       // note that you are hashing the password after "\" is added to it. Avoid this in the next project.
                       $hashpassword = password_hash($password,PASSWORD_BCRYPT);
                       $fullname = $firstname." ".$lastname;
                       $registerquery = "INSERT INTO `registereduser` (`fullname`,`username`,`email`,`password`,`hashedpassword`) VALUES ('$fullname','$username','$email','$password','$hashpassword')";
                       $run3 = mysqli_query($connect,$registerquery);
                       if($run3){
                          ?>
                             <script>
                                     alert("You have registered successfully");
                                     window.open('user_login_signup.php','_self');
                             </script>;
                          <?php
                       }
                    }
                    else{
                       echo '<script> alert("Error while confirming password"); </script>';
                       ?>
                          <script>
                                  window.open('user_login_signup.php','_self');
                          </script>;
                       <?php
                    }
                }
             }
          }
       }
    }
 ?>
