<!DOCTYPE html>
<html>
    <?php include('../head_css.php'); ?>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <?php 
        ob_start();
        include "../connection.php";
        ?>
        <?php include('../header.php'); ?>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include('../sidebar-left.php'); ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Student
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <?php
                            if(($_SESSION['role']) == "Administrator")
                            {
                            ?>

                            <div class="box">
                                <div class="box-header">
                                    <div style="padding:10px;">
                                        
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addStudModal"><i class="fa fa-plus" aria-hidden="true"></i> Add Student</button>  

                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button> 

                                
                                    </div>                                
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                <form method="post">
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)" /></th>
                                                <th>Student Name</th>
                                                <th>Contact</th>
                                                <th>Address</th>
                                                <th>Email</th>
                                                <th style="width: 40px !important;">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $squery = mysqli_query($con, "select *,CONCAT(lname, ', ', fname, ' ',mname) as sname from tblstudent");
                                            while($row = mysqli_fetch_array($squery))
                                            {
                                                echo '
                                                <tr>
                                                    <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="'.$row['id'].'" /></td>
                                                    <td>'.$row['sname'].'</td>
                                                    <td>'.$row['contact'].'</td>
                                                    <td>'.$row['address'].'</td>
                                                    <td>'.$row['username'].'</td>
                                                    <td><button class="btn btn-primary btn-sm" data-target="#editModal'.$row['id'].'" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></td>
                                                </tr>
                                                ';
                                                
                                                include "editModal.php";
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <?php include "../deleteModal.php"; ?>

                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                            <?php
                            }
                            else if(($_SESSION['role']) == "Teacher")
                            {
                            ?>
                            <div class="box">
                                <div class="box-header">
                                    <div style="padding:10px;">
                                        <form method="post">
                                        <div class="form-group">
                                            <div class="col-md-2">
                                            <select required name="ddl_yl" id="ddl_yl" data-style="btn-primary" class="form-control input-sm">
                                                <option value="" selected disabled>-- Select Year Level --</option>
                                                <?php
                                                    $q = mysqli_query($con,"SELECT * from tblschoolyear");
                                                    while($row=mysqli_fetch_array($q)){
                                                        echo '<option value="'.$row['id'].'">'.$row['schoolyear'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                            </div>

                                            <div class="col-md-2">
                                            <select required name="ddl_class" id="ddl_class" data-style="btn-primary" class="form-control input-sm">
                                                <option value="" selected disabled>-- Select Class --</option>
                                                <?php
                                                    $q = mysqli_query($con,"SELECT * from tblclass");
                                                    while($row=mysqli_fetch_array($q)){
                                                        echo '<option value="'.$row['id'].'">'.$row['classname'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                            </div>
                                            
                                            <div class="col-md-2">
                                            <select required name="ddl_subj" id="ddl_subj" data-style="btn-primary" class="form-control input-sm">
                                                <option value=""  selected disabled>-- Select Subject --</option>
                                                <?php
                                                    $q = mysqli_query($con,"SELECT * from tblsubjects");
                                                    while($row=mysqli_fetch_array($q)){
                                                        echo '<option value="'.$row['id'].'">'.$row['subjectname'].' - '.$row['description'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                            </div>

                                            <button type="submit" class="btn btn-primary btn-sm" name="btn_search"><i class="fa fa-search" aria-hidden="true"></i> Search</button> 

                                        </div>
                                        </form>
                                
                                    </div>                                
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <?php
                                    if(isset($_POST['btn_search']))
                                    {
                                    ?>
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)" /></th>
                                                <th>Last Name</th>
                                                <th>First Name</th>
                                                <th>Middle Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if((!isset($_POST['ddl_yl'])) & (!isset($_POST['ddl_class'])) & (!isset($_POST['ddl_subj'])) )
                                            {
                                                $squery = mysqli_query($con, "SELECT * 
                                                                        FROM  tblstudent s
                                                                        LEFT JOIN tblstudentclass sc ON sc.studentid = s.id
                                                                        LEFT JOIN tblsubjects sb ON sc.subjectid = sb.id
                                                                        LEFT JOIN tblclass c ON sc.classid = c.id
                                                                        LEFT JOIN tblyearlevel y ON c.yearlevelid = y.id ");
                                            }
                                            /*else if((isset($_POST['ddl_yl'])) & (!isset($_POST['ddl_class'])) & (!isset($_POST['ddl_subj'])) )
                                            {
                                                $squery = mysqli_query($con, "SELECT * 
                                                                        FROM  tblstudent s
                                                                        LEFT JOIN tblstudentclass sc ON sc.studentid = s.id
                                                                        LEFT JOIN tblsubjects sb ON sc.subjectid = sb.id
                                                                        LEFT JOIN tblclass c ON sc.classid = c.id
                                                                        LEFT JOIN tblyearlevel y ON c.yearlevelid = y.id 
                                                                        WHERE c.yearlevelid = '".$_POST['ddl_yl']."'");
                                            }
                                            else if((isset($_POST['ddl_yl'])) & (!isset($_POST['ddl_class'])) & (!isset($_POST['ddl_subj'])) )
                                            {
                                                $squery = mysqli_query($con, "SELECT * 
                                                                        FROM  tblstudent s
                                                                        LEFT JOIN tblstudentclass sc ON sc.studentid = s.id
                                                                        LEFT JOIN tblsubjects sb ON sc.subjectid = sb.id
                                                                        LEFT JOIN tblclass c ON sc.classid = c.id
                                                                        LEFT JOIN tblyearlevel y ON c.yearlevelid = y.id 
                                                                        WHERE c.yearlevelid = '".$_POST['ddl_yl']."'");
                                            }*/
                                            else{
                                                $squery = mysqli_query($con, "SELECT * 
                                                                        FROM  tblstudent s
                                                                        LEFT JOIN tblstudentclass sc ON sc.studentid = s.id
                                                                        LEFT JOIN tblsubjects sb ON sc.subjectid = sb.id
                                                                        LEFT JOIN tblclass c ON sc.classid = c.id
                                                                        LEFT JOIN tblyearlevel y ON c.yearlevelid = y.id
                                                                        WHERE c.yearlevelid = '".$_POST['ddl_yl']."'
                                                                        and sc.id = '".$_POST['ddl_class']."'
                                                                        and sc.subjectid = '".$_POST['ddl_subj']."' ");
                                            }

                                            while($row = mysqli_fetch_array($squery))
                                            {
                                                echo '
                                                <tr>
                                                    <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="'.$row['id'].'" /></td>
                                                    <td>'.$row['lname'].'</td>
                                                    <td>'.$row['fname'].'</td>
                                                    <td>'.$row['mname'].'</td>
                                                </tr>
                                                ';
                                                
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)" /></th>
                                                <th>Last Name</th>
                                                <th>First Name</th>
                                                <th>Middle Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                                $squery = mysqli_query($con, "SELECT * 
                                                                        FROM  tblstudent s
                                                                        LEFT JOIN tblstudentclass sc ON sc.studentid = s.id
                                                                        LEFT JOIN tblsubjects sb ON sc.subjectid = sb.id
                                                                        LEFT JOIN tblclass c ON sc.classid = c.id
                                                                        LEFT JOIN tblyearlevel y ON c.yearlevelid = y.id ");
                                            
                                            while($row = mysqli_fetch_array($squery))
                                            {
                                                echo '
                                                <tr>
                                                    <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="'.$row['id'].'" /></td>
                                                    <td>'.$row['lname'].'</td>
                                                    <td>'.$row['fname'].'</td>
                                                    <td>'.$row['mname'].'</td>
                                                </tr>
                                                ';
                                                
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                    }
                                    ?>


                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                            <?php
                            }
                            ?>

            <?php include "../notification.php"; ?>

            <?php include "../addModal.php"; ?>

            <?php include "../addfunction.php"; ?>
            <?php include "editfunction.php"; ?>
            <?php include "deletefunction.php"; ?>


                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <?php include "../footer.php"; ?>
<script type="text/javascript">
    $(function() {
        $("#table").dataTable({
           "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0] } ],"aaSorting": []
        });
    });
</script>
    </body>
</html>