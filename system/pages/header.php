<!DOCTYPE html>
<html lang="en">
<head>
    
    
    
    <script src="https://kit.fontawesome.com/655a301e1d.js" crossorigin="anonymous"></script>
    <style>
       .fa-lightbulb-on{
        color: white;
       }
    </style>
</head>
<body>

</body>
</html>
  
  <?php
  session_start();
   echo  '<header class="header">
            <a href="#" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <i class="fa-solid fa-lightbulb-on"></i> GRADING SYSTEM
            </a>
            
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav" >

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>';

                                if($_SESSION['role'] == "Administrator"){
                                    $user = mysqli_query($con,"SELECT * from tbladmin where id = '".$_SESSION['userid']."' ");
                                    while($row = mysqli_fetch_array($user)){
                                        $_SESSION['user'] = $row['accounttype'];
                                        echo'<span>'.$row['accounttype'].'<i class="caret"></i></span>';
                                    }
                                }
                                elseif($_SESSION['role'] == "Teacher"){
                                    $user = mysqli_query($con,"SELECT * from tblteacher where id = '".$_SESSION['userid']."' ");
                                    while($row = mysqli_fetch_array($user)){
                                        $_SESSION['user'] = $row['fname'].' '.$row['lname'];
                                        echo'<span>'.$row['fname'].' '.$row['lname'].'<i class="caret"></i></span>';
                                    }
                                }
                                elseif($_SESSION['role'] == "Student"){
                                    $user = mysqli_query($con,"SELECT * from tblstudent where id = '".$_SESSION['userid']."' ");
                                    while($row = mysqli_fetch_array($user)){
                                        $_SESSION['user'] = $row['fname'].' '.$row['lname'];
                                        echo'<span>'.$row['fname'].' '.$row['lname'].'<i class="caret"></i></span>';
                                    }
                                }

                            echo '</a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header "style="background-color:rgb(105, 87, 218)">
                                    
                                    <p>
                                        '.$_SESSION['user'].'
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat" data-toggle="modal" data-target="#editProfileModal">Edit Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../../logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>'; ?>


         <div id="editProfileModal" class="modal fade">
            <form method="post">
              <div class="modal-dialog modal-sm" style="width:300px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Edit Profile</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                        <?php
                        if($_SESSION['role'] == "Administrator"){
                            $user = mysqli_query($con,"SELECT * from tbladmin where id = '".$_SESSION['userid']."' ");
                            while($row = mysqli_fetch_array($user)){
                                echo '
                                    <div class="form-group">
                                        <label>Username:</label>
                                        <input name="txt_username" id="txt_username" class="form-control input-sm" type="text" value="'.$row['username'].'" />
                                    </div>
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input name="txt_password" id="txt_password" class="form-control input-sm" type="password"  value="'.$row['password'].'"/>
                                    </div>';
                            } 
                        }
                        elseif($_SESSION['role'] == "Teacher"){
                            $user = mysqli_query($con,"SELECT * from tblteacher where id = '".$_SESSION['userid']."' ");
                            while($row = mysqli_fetch_array($user)){
                                echo '
                                    <div class="form-group">
                                        <label>Username:</label>
                                        <input name="txt_username" id="txt_username" class="form-control input-sm" type="text" value="'.$row['username'].'" />
                                    </div>
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input name="txt_password" id="txt_password" class="form-control input-sm" type="password"  value="'.$row['password'].'"/>
                                    </div>';
                            } 
                        }
                        elseif($_SESSION['role'] == "Student"){
                            $user = mysqli_query($con,"SELECT * from tblstudent where id = '".$_SESSION['userid']."' ");
                            while($row = mysqli_fetch_array($user)){
                                echo '
                                    <div class="form-group">
                                        <label>Username:</label>
                                        <input name="txt_username" id="txt_username" class="form-control input-sm" type="text" value="'.$row['username'].'" />
                                    </div>
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input name="txt_password" id="txt_password" class="form-control input-sm" type="password"  value="'.$row['password'].'"/>
                                    </div>';
                            } 
                        }
                        ?>
                         
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" id="btn_saveeditProfile" name="btn_saveeditProfile" value="Save"/>
                    </div>
                </div>
              </div>
              </form>
            </div>


            <?php
            if(isset($_POST['btn_saveeditProfile'])){
                $username = $_POST['txt_username'];
                $password = $_POST['txt_password'];
                $confirmpass = $_POST['txt_cpassword'];


                    if($_SESSION['role'] == "Administrator"){
                        $updadmin = mysqli_query($con,"UPDATE tbladmin set username = '$username', password = '$password' where id = '".$_SESSION['userid']."' ");
                        if($updadmin == true){
                            $_SESSION['edit'] = 1;
                            header ("location: ".$_SERVER['REQUEST_URI']);
                        }
                    }
                    elseif($_SESSION['role'] == "Teacher"){
                        $updfaculty = mysqli_query($con,"UPDATE tblteacher set username = '$username', password = '$password' where id = '".$_SESSION['userid']."' ");
                        if($updfaculty == true){
                            $_SESSION['edit'] = 1;
                            header ("location: ".$_SERVER['REQUEST_URI']);
                        }
                    }
                    elseif($_SESSION['role'] == "Student"){
                        $updstudent = mysqli_query($con,"UPDATE tblstudent set username = '$username', password = '$password' where id = '".$_SESSION['userid']."' ");
                        echo $updstudent;
                        exit();
                        if($updstudent == true){
                            $_SESSION['edit'] = 1;
                            header ("location: ".$_SERVER['REQUEST_URI']);
                        }
                    }
            }

            ?>

            <?php include "../notification.php"; ?>
            