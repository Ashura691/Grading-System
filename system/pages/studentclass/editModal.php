
<!-- ========= CLASS MODAL ======== -->
<?php echo '<div id="editModal'.$row['sid'].'" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width:300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Student Class</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" value="'.$row['sid'].'" name="hidden_id" id="hidden_id"/>
                <div class="form-group">
                    <label>Class:</label>
                    <select name="ddl_edit_class" id="ddl_edit_class" data-style="btn-primary" class="form-control input-sm">
                        <option value="'.$row['cid'].'" selected>'.$row['classname'].'</option>';
                        $q = mysqli_query($con,"SELECT * from tblclass where id not in ('".$row['cid']."')");
                        while($row1=mysqli_fetch_array($q)){
                            echo '<option value="'.$row1['id'].'">'.$row1['classname'].'</option>';
                        }
                echo '</select>
                </div>
                <div class="form-group">
                    <label>Student:</label>
                    <select name="ddl_edit_stud" id="ddl_edit_stud" data-style="btn-primary" class="form-control input-sm">
                        <option value="'.$row['stid'].'" selected>'.$row['sname'].'</option>';
                        $q = mysqli_query($con,"SELECT * from tblstudent where id not in ('".$row['sid']."')");
                        while($row2=mysqli_fetch_array($q)){
                            echo '<option value="'.$row2['id'].'">'.$row2['fname'].', '.$row2['lname'].' '.$row2['mname'].'</option>';
                        }
                echo '</select>
                </div>
                <div class="form-group">
                    <label>Subject:</label>
                    <select name="ddl_edit_subj" id="ddl_edit_subj" data-style="btn-primary" class="form-control input-sm">
                        <option value="'.$row['sbid'].'" selected>'.$row['subjectname'].' - '.$row['description'].'</option>';
                        $q = mysqli_query($con,"SELECT * from tblsubjects where id not in ('".$row['sbid']."')");
                        while($row3=mysqli_fetch_array($q)){
                            echo '<option value="'.$row3['id'].'">'.$row3['subjectname'].' - '.$row3['description'].'</option>';
                        }
                echo '</select>
                </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_save" value="Save"/>
        </div>
    </div>
  </div>
</form>
</div>';?>