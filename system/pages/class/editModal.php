
<!-- ========= CLASS MODAL ======== -->
<?php echo '<div id="editModal'.$row['cid'].'" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width:300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Class</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" value="'.$row['cid'].'" name="hidden_id" id="hidden_id"/>
                <div class="form-group">
                    <label>Class Name: </label>
                    <input name="txt_edit_class" id="txt_edit_class" class="form-control input-sm" type="text" value="'.$row['classname'].'" />
                </div>
                <div class="form-group">
                    <label>School Year:</label>
                    <select name="ddl_edit_sy" id="ddl_edit_sy" data-style="btn-primary" class="form-control input-sm">
                        <option value="'.$row['sid'].'" selected>'.$row['schoolyear'].'</option>';
                        $q = mysqli_query($con,"SELECT * from tblschoolyear where schoolyear not in ('".$row['schoolyear']."')");
                        while($row1=mysqli_fetch_array($q)){
                            echo '<option value="'.$row1['id'].'">'.$row1['schoolyear'].'</option>';
                        }
                echo '</select>
                </div>
                <div class="form-group">
                    <label>Year Level:</label>
                    <select name="ddl_edit_yl" id="ddl_edit_yl" data-style="btn-primary" class="form-control input-sm">
                        <option value="'.$row['yid'].'" selected>'.$row['yearlevel'].' - '.$row['description'].'</option>';
                        $q = mysqli_query($con,"SELECT * from tblyearlevel where yearlevel not in ('".$row['yearlevel']."')");
                        while($row2=mysqli_fetch_array($q)){
                            echo '<option value="'.$row2['id'].'">'.$row2['yearlevel'].' - '.$row2['description'].'</option>';
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