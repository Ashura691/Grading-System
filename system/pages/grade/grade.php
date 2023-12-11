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
                        View Grade
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <div class="box">
                                <div class="box-header">
                                    <div style="padding:10px;">
                                        
                                    </div>                                
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                <form method="post">
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)" /></th>
                                                <th>Subject</th>
                                                <th>1st Grading</th>
                                                <th>2nd Grading</th>
                                                <th>3rd Grading</th>
                                                <th>4th Grading</th>
                                                <th>Average</th>
                                                <th>Remarks</th>
                                                <th>Adviser</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $squery = mysqli_query($con, "SELECT *, CONCAT(t.lname, ', ', t.fname, ' ', t.mname)  as tname
                                                                        FROM tblstudentgrade sg
                                                                        LEFT JOIN tblstudentclass sc ON sg.classid = sc.classid
                                                                        AND sg.studentid = sc.studentid
                                                                        AND sg.subjectid = sc.subjectid
                                                                        LEFT JOIN tblstudent s ON sg.studentid = s.id
                                                                        LEFT JOIN tblteacheradvisory ta ON sg.classid = ta.classid
                                                                        LEFT JOIN tblteacher t ON sg.adviserid = t.id
                                                                        LEFT JOIN tblclass c ON sg.classid = c.id
                                                                        LEFT JOIN tblschoolyear sy ON sg.schoolyearid = sy.id
                                                                        LEFT JOIN tblsubjects sb on sg.subjectid = sb.id
                                                                        where sg.studentid = '".$_SESSION['userid']."' ");
                                            while($row = mysqli_fetch_array($squery))
                                            {
                                                echo '
                                                <tr>
                                                    <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="'.$row['id'].'" /></td>
                                                    <td>'.$row['subjectname'].' - '.$row['description'].'</td>
                                                    <td>'.$row['1stgrading'].'</td>
                                                    <td>'.$row['2ndgrading'].'</td>
                                                    <td>'.$row['3rdgrading'].'</td>
                                                    <td>'.$row['4thgrading'].'</td>
                                                    <td><b>'.$row['gradeaverage'].'</b></td>
                                                    <td>'.($row['remarks'] == "Passed" ? "<label style='color:green'>".$row['remarks']."</label>" : (($row['remarks'] == "Failed") ? "<label style='color:red'>".$row['remarks']."</label>" : "<label style='color:black'>No Final Remarks</label>")) .'</td>
                                                    <td>'.$row['tname'].'</td>
                                                </tr>
                                                ';
                                                
                                            }
                                            ?>
                                        </tbody>
                                    </table>


                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

            <?php //include "../notification.php"; ?>

            <?php //include "../addModal.php"; ?>

            <?php //include "../addfunction.php"; ?>
            <?php //include "editfunction.php"; ?>
            <?php //include "deletefunction.php"; ?>


                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <?php include "../footer.php"; ?>
<script type="text/javascript">
    $(function() {
        $("#table").dataTable({
           "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0 ] } ],"aaSorting": []
        });
    });
</script>
    </body>
</html>