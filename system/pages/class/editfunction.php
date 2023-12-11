
<?php
	if(isset($_POST['btn_save']))
	{
	    $txt_id = $_POST['hidden_id'];
	    $txt_edit_class = $_POST['txt_edit_class'];
	    $ddl_edit_sy = $_POST['ddl_edit_sy'];
	    $ddl_edit_yl = $_POST['ddl_edit_yl'];

	    $query = mysqli_query($con,"UPDATE tblclass SET classname = '".$txt_edit_class."',schoolyearid = '".$ddl_edit_sy."',yearlevelid = '".$ddl_edit_yl."' where id = '".$txt_id."' ");

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
