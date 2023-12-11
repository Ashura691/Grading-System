<!-- ========= EDIT SCHOOLYEAR =========== -->
<?php
	if(isset($_POST['btn_save']))
	{
	    $txt_id = $_POST['hidden_id'];
	    $txt_edit_fname = $_POST['txt_edit_fname'];
	    $txt_edit_mname = $_POST['txt_edit_mname'];
	    $txt_edit_lname = $_POST['txt_edit_lname'];
	    $txt_edit_contact = $_POST['txt_edit_contact'];
	    $txt_edit_addr = $_POST['txt_edit_addr'];
	    $txt_edit_uname = $_POST['txt_edit_uname'];
	    $txt_edit_pass = $_POST['txt_edit_pass'];

	    $query = mysqli_query($con,"UPDATE tblstudent SET fname = '".$txt_edit_fname."', mname = '".$txt_edit_mname."', lname = '".$txt_edit_lname."', contact = '".$txt_edit_contact."', address = '".$txt_edit_addr."', username = '".$txt_edit_uname."', password = '".$txt_edit_pass."'  where id = '".$txt_id."' ");

	    if($query == true){
	        $_SESSION['edit'] = 1;
	        header("location: ".$_SERVER['REQUEST_URI']);
	    }

		if(mysqli_error($con)){
			$_SESSION['duplicate'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
		}
	}
?>
