<!-- THIS IS THE LOGIN PAGE FOR THE DOCTOR -->
<?php
  // always start the session at top. when started in between, it gave some error(don't know the reason why)
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <!-- <script src="https://kit.fontawesome.com/1215799f7d.js" crossorigin="anonymous"></script> -->
    <title></title>
    <style media="screen">
            *{
              padding: 0;
              margin: 0;
              box-sizing: border-box;
            }
            body{
              background-image: url('https://cdn.dnaindia.com/sites/default/files/styles/full/public/2018/07/01/699806-666766-doctor-file.jpg');
              background-repeat: no-repeat;
              background-size: cover;
              display: flex;
              height: 100vh;
              justify-content: center;
              align-items: center;
            }
            .login-container{
              transition-property: height;
              transition-duration: 2s;
            }
            .login-container:hover{
              height: 58vh;
            }
            .login-container{
              height: 50vh;
              /* opacity: 0.5; */
              background-color: rgba(255, 255, 255, 0.1);
              box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
              border-radius: 5px;
              border-top: 1px solid rgba(255, 255, 255, 0.3);
              border-left: 1px solid rgba(255,255,255,0.3);
              backdrop-filter: blur(10px);
            }
            .user-login-detail{
              display: grid;
              grid-template-rows: auto;
            }
            .header{
              font-size: 1.8em;
              font-weight: 400;
              margin: 18px;
            }
            .enter-detail input{
              border: none;
              width: 19em;
              height: 2.5em;
              margin: 6px;
              margin-right: 30px;
              outline: none;
              text-align: center;
              background: rgba(0, 0, 0, 0.1);
              color: rgba(255, 255, 255, 0.7);
              box-shadow: 0 0 5px rgba(0, 0, 0, 0.5) inset;
              letter-spacing: 1px;
              border-radius: 2em;
            }
            .enter-detail i{
              margin-left: 18px;
            }
            .submit-button input{
              border: none;
              height: 2.5em;
              width: 22em;
              margin: 18px;
              border-radius: 5em;
              outline: none;
              background: rgba(0, 0, 0, 0.1);
              color: rgba(255, 255, 255, 0.7);
              box-shadow: 0 0 5px rgba(0, 0, 0, 0.5) inset;
              letter-spacing: 1px;
            }
    </style>
  </head>
  <body>
         <div class="login-container">
               <div class="header">
                     Login
               </div>
               <form action="login.php" method="post">
               <div class="user-login-detail">
                       <div class="enter-detail" id="username">
                             <label>
                                    <i class="fas fa-user"></i>
                                    <input type="text" name="username" placeholder="Enter username" required>
                             </label>
                       </div>
                       <div class="enter-detail" id="email">
                             <label>
                                    <i>@</i>
                                    <input type="email" name="email" placeholder="Enter email address" required>
                             </label>
                       </div>
                       <div class="enter-detail" id="password">
                             <label>
                                    <i class="fa-duotone fa-key"></i>
                                    <input type="password" name="password" placeholder="Enter password" required>
                             </label>
                       </div>
                       <div class="submit-button">
                            <input type="submit" name="submit" value="Login">
                       </div>
               </div>
               </form>
         </div>
  </body>
</html>
<?php
  if(isset($_POST['submit'])){
    // if the submit button has been clicked, come to me.
    include('dbcon.php');
    $username = mysqli_real_escape_string($connect,$_POST['username']);
    $email = mysqli_real_escape_string($connect,$_POST['email']);
    $password = mysqli_real_escape_string($connect,$_POST['password']);

    $query = "SELECT * FROM `doctor` WHERE `username`='$username'";
    $run = mysqli_query($connect,$query);
    if($run==false){
      ?>
        <script type="text/javascript">
                 alert('Error while running the query');
        </script>
      <?php
    }
    else{
      // The query ran successfully.
      $no_of_rows = mysqli_num_rows($run);
      if($no_of_rows == 1){
        // username is present in the database.
        $data = mysqli_fetch_assoc($run);
        $hashedpassword = $data['password'];
        if(password_verify($password,$hashedpassword)){
          // the passwords have matched.
          // you cannot compare the hashed password on ur own.
          // each time you enter a passoword(even though the password is same), password_hash() will create a different hash based on different salts it has, value of which  will be stored for later use.
          // the user is a valid user,set his session and send him to the next page.

          // session_start();
          $_SESSION['uid'] = $data['id'];
          // header('Location:doctor/doctorprofile.php');
          ?>
               <script type="text/javascript">
                        // window.location.href = "bookappointment.php";
                        window.location.href = "doctor/doctorprofile.php";
               </script>
          <?php
        }
      }
      else if($num_of_rows == 0){
        ?>
          <script type="text/javascript">
                   alert('Invalid username');
          </script>
        <?php
      }
    }
  }
?>
