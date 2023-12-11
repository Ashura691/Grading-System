<?php

	echo '
	<aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        
                        <div class="pull-left info">
                            <h4>Hello, ';

                                if($_SESSION['role'] == "Administrator"){
                                    $user = mysqli_query($con,"SELECT * from tbladmin where id = '".$_SESSION['userid']."' ");
                                    while($row = mysqli_fetch_array($user)){
                                        $_SESSION['user'] = $row['accounttype'];
                                        echo $row['accounttype'];
                                    }
                                }
                                elseif($_SESSION['role'] == "Teacher"){
                                    $user = mysqli_query($con,"SELECT * from tblteacher where id = '".$_SESSION['userid']."' ");
                                    while($row = mysqli_fetch_array($user)){
                                        $_SESSION['user'] = $row['fname'].' '.$row['lname'];
                                        echo $row['fname'].' '.$row['lname'];
                                    }
                                }
                                elseif($_SESSION['role'] == "Student"){
                                    $user = mysqli_query($con,"SELECT * from tblstudent where id = '".$_SESSION['userid']."' ");
                                    while($row = mysqli_fetch_array($user)){
                                        $_SESSION['user'] = $row['fname'].' '.$row['lname'];
                                        echo $row['fname'].' '.$row['lname'];
                                    }
                                }
                                echo '
                            </h4>

                        </div>
                    </div>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">';
                        if($_SESSION['role'] == "Administrator"){
                            echo '
                            <li>
                                <a href="../dashboard/dashboard.php">
                                    <i class="fa  fa-dashboard"></i> <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="../schoolyear/schoolyear.php">
                                    <i class="fa fa-calendar"></i> <span>School Year</span>
                                </a>
                            </li>
                            <li>
                                <a href="../yearlevel/yearlevel.php">
                                    <i class="fa fa-calendar"></i> <span>Year Level</span>
                                </a>
                            </li>
                            <li>
                                <a href="../student/student.php">
                                    <i class="fa fa-user"></i> <span>Students</span>
                                </a>
                            </li>
                            <li>
                                <a href="../studentclass/studentclass.php">
                                    <i class="fa fa-user"></i> <span>Student Class</span>
                                </a>
                            </li>
                            <li>
                                <a href="../teacher/teacher.php">
                                    <i class="fa fa-user"></i> <span>Teacher</span>
                                </a>
                            </li>
                            <li>
                                <a href="../teacheradvisory/teacheradvisory.php">
                                    <i class="fa fa-user"></i> <span>Teacher Advisory</span>
                                </a>
                            </li>
                            <li>
                                <a href="../subject/subject.php">
                                    <i class="fa fa-book"></i> <span>Subject</span>
                                </a>
                            </li>
                            <li>
                                <a href="../class/class.php">
                                    <i class="fa fa-book"></i> <span>Class</span>
                                </a>
                            </li>
                            ';
                        }
                        elseif($_SESSION['role'] == "Teacher"){
                            echo '
                            <li>
                                <a href="../student/student.php">
                                    <i class="fa fa-print"></i> <span>Student</span>
                                </a>
                            </li>
                            <li>
                                <a href="../studgrade/studgrade.php">
                                    <i class="fa fa-print"></i> <span>Student Grade</span>
                                </a>
                            </li>';
                        }
                        elseif($_SESSION['role'] == "Student"){
                            echo '
                            <li>
                            <a href="../grade/grade.php">
                                <i class="fa fa-print"></i> <span>View Grade</span>
                            </a>
                            </li>';
                        }
                        echo'
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
	';
?>