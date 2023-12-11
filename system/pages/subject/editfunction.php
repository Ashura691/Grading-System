<!-- ========= EDIT SCHOOLYEAR =========== -->
<?php
	if(isset($_POST['btn_save']))
	{
	    $txt_id = $_POST['hidden_id'];
	    $txt_edit_yl = $_POST['txt_edit_yl'];
	    $txt_edit_desc = $_POST['txt_edit_desc'];

	    $query = mysqli_query($con,"UPDATE tblyearlevel SET yearlevel = '".$txt_edit_yl."', description = '".$txt_edit_desc."'  where id = '".$txt_id."' ");

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
