
<!-- ========= YEARLEVEL MODAL ======== -->
<?php echo '<div id="editModal'.$row['id'].'" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width:300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Subject</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" value="'.$row['id'].'" name="hidden_id" id="hidden_id"/>
                <div class="form-group">
                    <label>Subject Name: </label>
                    <input name="txt_edit_sname" id="txt_edit_sname" class="form-control input-sm" type="text" value="'.$row['subjectname'].'" />
                </div>
                <div class="form-group">
                    <label>Description: </label>
                    <input name="txt_edit_desc" id="txt_edit_desc" class="form-control input-sm" type="text" value="'.$row['description'].'" />
                </div>
                <div class="form-group">
                    <label>Year Level:</label>
                    <select name="ddl_edit_yl" id="ddl_edit_yl" data-style="btn-primary" class="form-control input-sm">
                        <option value="'.$row['yid'].'" selected>'.$row['yearlevel'].' - '.$row['description'].'</option>';
                        $q = mysqli_query($con,"SELECT * from tblyearlevel where yearlevel not in ('".$row['yearlevel']."')");
                        while($row1=mysqli_fetch_array($q)){
                            echo '<option value="'.$row1['id'].'">'.$row1['yearlevel'].' - '.$row1['description'].'</option>';
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