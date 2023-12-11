<!DOCTYPE html>
<html>
<?php
session_start();
?>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
      
<style>

  /* Import Google font - Poppins */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  min-height: 100vh;
  background:
        linear-gradient(
          rgba(0, 0, 0, 0.9), 
          rgba(0, 0, 0, 0.9)
        ),
        url('bggradee.jpg');
  
  background-position: center;
  background-color: black;
  
}
.container{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  max-width: 430px;
  width: 100%;
  background: #fff;
  border-radius: 7px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.3);
}
.container .registration{
  display: none;
}
#check:checked ~ .registration{
  display: block;
}
#check:checked ~ .login{
  display: none;
}
#check{
  display: none;
}
.container .form{
  padding: 2rem;
}
.form header{
  font-size: 2rem;
  font-weight: 500;
  text-align: center;
  margin-bottom: 1.5rem;
}
 .form input{
   height: 60px;
   width: 100%;
   padding: 0 15px;
   font-size: 17px;
   margin-bottom: 1.3rem;
   border: 1px solid #ddd;
   border-radius: 6px;
   outline: none;
 }
 .form input:focus{
   box-shadow: 0 1px 0 rgba(0,0,0,0.2);
 }
.form a{
  margin-top: -20px;
  font-size: 14px;
  color: #009579;
  text-decoration: none;
  float: right;
}
.form a:hover{
  text-decoration: underline;
  color:  #3a29a8;
}
.form input.button{
  color: #fff;
  background: #6957da;
  font-size: 1.2rem;
  font-weight: 500;
  letter-spacing: 1px;
  margin-top: 1.7rem;
  cursor: pointer;
  transition: 0.4s;
}
.form input.button:hover{
  background: #3a29a8;
}
.signup{
  font-size: 17px;
  text-align: center;
}
.signup label{
  color: #009579;
  cursor: pointer;
}
.signup label:hover{
  text-decoration: underline;
}
.form{
  border-top: 3px solid #3a29a8;
}
.close{
  height: 30px;
  width: 30px;
  margin-left: 20px;
  margin-top: 20px;
  border-radius: 20px;
  font-size: 15px;
  font-weight: bold;
  background-color: transparent;
  color: white;
  outline: none;
  border: none;

}
.close:hover{
  background-color: #6957da;
  color: white;
  box-shadow: rgba(0,0,0,10);
}

</style>
    </head>
    <body>
  <a href="http://localhost/finalfinalgradingsystem/homepage/home.php"><button class="close" >x</button></a>




    <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      <form role="form" method="post" >
        <input type="text" placeholder="Enter your Email" name="txt_username" required>
        <input type="password" placeholder="Enter your password" name="txt_password" required>
        <a class="forgot" href="http://localhost/finalfinalgradingsystem/system/requestReset.php">Forgot password?</a>
      
        <input type="submit" class="button" value="Login" name="btn_login">
      </form>
      <?php
      if(isset($_GET["newpwd"])){
        if($_GET["newpwd"] == "passwordupdated") {
          echo '<p class="signupsuccess">Your password has been reset!</p>';
        }
      }
      ?>
  
    </div>
  </div>
























        

      <?php
        include "pages/connection.php";
        if(isset($_POST['btn_login']))
        { 
            $username = $_POST['txt_username'];
            $password = $_POST['txt_password'];


            $admin = mysqli_query($con, "SELECT * from tbladmin where username = '$username' and password = '$password' and accounttype = 'Administrator' ");
            $numrow = mysqli_num_rows($admin);

            $teacher = mysqli_query($con, "SELECT * from tblteacher where username = '$username' and password = '$password' ");
            $numrow1 = mysqli_num_rows($teacher);

            $student = mysqli_query($con, "SELECT * from tblstudent where username = '$username' and password = '$password' ");
                $numrow2 = mysqli_num_rows($student);

            if($numrow > 0)
            {
                while($row = mysqli_fetch_array($admin)){
                  $_SESSION['role'] = "Administrator";
                  $_SESSION['userid'] = $row['id'];
                }    
                header ('location: pages/dashboard/dashboard.php');
            }
            elseif($numrow1 > 0)
              {
                while($row = mysqli_fetch_array($teacher)){
                  $_SESSION['role'] = "Teacher";
                  $_SESSION['userid'] = $row['id'];
                } 
                header ('location: pages/student/student.php');
              }
            elseif($numrow2 > 0)
                {
                  while($row = mysqli_fetch_array($student)){
                    $_SESSION['role'] = "Student";
                    $_SESSION['userid'] = $row['id'];
                  } 
                  header ('location: pages/grade/grade.php');
                }
             else
                {
                  echo '<script>alert("Invalid Account")</script>';
                }
             
        }
        
      ?>

    </body>
</html>