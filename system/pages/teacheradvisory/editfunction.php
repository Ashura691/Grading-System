
<?php
	if(isset($_POST['btn_save']))
	{
	    $txt_id = $_POST['hidden_id'];
	    $ddl_edit_teacher = $_POST['ddl_edit_teacher'];
	    $ddl_edit_class = $_POST['ddl_edit_class'];
	    $ddl_edit_subj = $_POST['ddl_edit_subj'];

	    $query = mysqli_query($con,"UPDATE tblteacheradvisory SET teacherid = '".$ddl_edit_teacher."',classid = '".$ddl_edit_class."',subjectid = '".$ddl_edit_subj."' where id = '".$txt_id."' ");

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
