<?php if(isset($_SESSION['added'])){
    echo '<script>$(document).ready(function (){save_success();});</script>';
    unset($_SESSION['added']);
    echo '<div class="alert alert-success alert-autocloseable-add" style=" position: fixed; top: 1em; right: 1em; z-index: 9999; display: none;">
     Successfully Added !
</div>';
} ?>

<?php if(isset($_SESSION['edit'])){
    echo '<script>$(document).ready(function (){editsuccess();});</script>';
    unset($_SESSION['edit']);
    
echo '<div class="alert alert-success alert-autocloseable-editsuccess" style=" position: fixed; top: 1em; right: 1em; z-index: 9999; display: none;">
     Edited Value Saved!
</div>';
} ?>

<?php if(isset($_SESSION['delete'])){
    echo '<script>$(document).ready(function (){deleted();});</script>';
    unset($_SESSION['delete']);
    
echo '<div class="alert alert-danger alert-autocloseable-danger" style=" position: fixed; top: 1em; right: 1em; z-index: 9999; display: none;">
     Deleted Successfully !
</div>';
} ?>

<?php if(isset($_SESSION['duplicate'])){
    echo '<script>$(document).ready(function (){duplicate();});</script>';
    unset($_SESSION['duplicate']);
    
echo '<div class="alert alert-danger alert-autocloseable-duplicate" style=" position: fixed; top: 1em; right: 1em; z-index: 9999; display: none;">
     Duplicate Entry
</div>'; }?>


<?php if(isset($_SESSION['excess'])){
    echo '<script>$(document).ready(function (){excess();});</script>';
    unset($_SESSION['excess']);
    
echo '<div class="alert alert-warning alert-autocloseable-excess" style="background:#fcf8e3; position: fixed; top: 1em; right: 1em; z-index: 9999; display: none;">
     Total Percentage is more than 100%. Criteria not save !
</div>'; }?>


<?php if(isset($_SESSION['invalidpass'])){
    echo '<script>$(document).ready(function (){invalidpass();});</script>';
    unset($_SESSION['invalidpass']);
    
echo '<div class="alert alert-danger alert-autocloseable-invalidpass" style="background:#f2dede; position: fixed; top: 1em; right: 1em; z-index: 9999; display: none;">
     Password not matched !
</div>';} ?>

