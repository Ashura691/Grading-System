<!-- ========= SCHOOLYEAR MODAL ======== -->
<?php echo '<div id="editModal'.$row['sgid'].'" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width:300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Student Grade</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" value="'.$row['sgid'].'" name="hidden_id" id="hidden_id"/>
                <div class="form-group">
                    <label>School Year: </label>
                    <input readonly name="txt_edit_sy" id="txt_edit_sy" class="form-control input-sm" type="text" value="'.$row['schoolyear'].'" />
                </div>
                <div class="form-group">
                    <label>Class: </label>
                    <input readonly name="txt_edit_class" id="txt_edit_class" class="form-control input-sm" type="text" value="'.$row['classname'].'" />
                </div>
                <div class="form-group">
                    <label>Subject: </label>
                    <input readonly name="txt_edit_subj" id="txt_edit_subj" class="form-control input-sm" type="text" value="'.$row['subjectname'].' - '.$row['description'].'" />
                </div>
                <div class="form-group">
                    <label>Student: </label>
                    <input readonly name="txt_edit_stud" id="txt_edit_stud" class="form-control input-sm" type="text" value="'.$row['sname'].'" />
                </div>
                <div class="form-group">
                    <label>1st Grading: </label>
                    <input name="txt_edit_1stgrading" id="txt_edit_1stgrading" class="form-control input-sm" type="number" value="'.$row['1stgrading'].'" />
                </div>
                <div class="form-group">
                    <label>2nd Grading: </label>
                    <input name="txt_edit_2ndgrading" id="txt_edit_2ndgrading" class="form-control input-sm" type="number" value="'.$row['2ndgrading'].'" />
                </div>
                <div class="form-group">
                    <label>3rd Grading: </label>
                    <input name="txt_edit_3rdgrading" id="txt_edit_3rdgrading" class="form-control input-sm" type="number" value="'.$row['3rdgrading'].'" />
                </div>
                <div class="form-group">
                    <label>4th Grading: </label>
                    <input name="txt_edit_4thgrading" id="txt_edit_4thgrading" class="form-control input-sm" type="number" value="'.$row['4thgrading'].'" />
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

