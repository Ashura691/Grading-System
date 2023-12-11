
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
                    <label>First Name: </label>
                    <input name="txt_edit_fname" id="txt_edit_fname" class="form-control input-sm" type="text" value="'.$row['fname'].'" />
                </div>
                <div class="form-group">
                    <label>Middle Name: </label>
                    <input name="txt_edit_mname" id="txt_edit_mname" class="form-control input-sm" type="text" value="'.$row['mname'].'" />
                </div>
                <div class="form-group">
                    <label>Last Name: </label>
                    <input name="txt_edit_lname" id="txt_edit_lname" class="form-control input-sm" type="text" value="'.$row['lname'].'" />
                </div>
                <div class="form-group">
                    <label>Contact: </label>
                    <input name="txt_edit_contact" id="txt_edit_contact" class="form-control input-sm" type="number" value="'.$row['contact'].'" />
                </div>
                <div class="form-group">
                    <label>Address: </label>
                    <input name="txt_edit_addr" id="txt_edit_addr" class="form-control input-sm" type="text" value="'.$row['address'].'" />
                </div>
                <div class="form-group">
                    <label>Email: </label>
                    <input name="txt_edit_uname" id="txt_edit_uname" class="form-control input-sm" type="text" value="'.$row['username'].'" />
                </div>
                <div class="form-group">
                    <label>Password: </label>
                    <input name="txt_edit_pass" id="txt_edit_pass" class="form-control input-sm" type="password" value="'.$row['password'].'" />
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