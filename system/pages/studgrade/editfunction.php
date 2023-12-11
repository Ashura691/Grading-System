<!-- ========= EDIT SCHOOLYEAR =========== -->
<?php
	if(isset($_POST['btn_save']))
	{
	    $txt_id = $_POST['hidden_id'];
	    $txt_edit_sy = $_POST['txt_edit_sy'];
	    $txt_edit_class = $_POST['txt_edit_class'];
	    $txt_edit_subj = $_POST['txt_edit_subj'];
	    $txt_edit_stud = $_POST['txt_edit_stud'];
	    $txt_edit_1stgrading = $_POST['txt_edit_1stgrading'];
	    $txt_edit_2ndgrading = $_POST['txt_edit_2ndgrading'];
	    $txt_edit_3rdgrading = $_POST['txt_edit_3rdgrading'];
	    $txt_edit_4thgrading = $_POST['txt_edit_4thgrading'];

	    $query = mysqli_query($con,"UPDATE tblstudentgrade SET 1stgrading = '".$txt_edit_1stgrading."',2ndgrading = '".$txt_edit_2ndgrading."',3rdgrading = '".$txt_edit_3rdgrading."',4thgrading = '".$txt_edit_4thgrading."' where id = '".$txt_id."' ");
	    $q = mysqli_query($con,"SELECT * from tblstudentgrade where id = '".$txt_id."' ");
	    while($row=mysqli_fetch_array($q)){
	    	if($row['2ndgrading'] != 0 && $row['3rdgrading'] != 0 && $row['4thgrading'] != 0){
	    		$result = (( $row['1stgrading'] + $row['2ndgrading'] + $row['3rdgrading'] + $row['4thgrading'] ) / 4) ;
	    		$average = round($result);
	    		if($average >= 75){
					$query = mysqli_query($con,"UPDATE tblstudentgrade SET gradeaverage = '".$average."', remarks = 'Passed'  where id = '".$txt_id."' ");
		    	}
	    		else{
					$query = mysqli_query($con,"UPDATE tblstudentgrade SET gradeaverage = '".$average."', remarks = 'Failed'  where id = '".$txt_id."' ");    	
	    		}
	    	}
	    	else{
	    		$result = (( $row['1stgrading'] + $row['2ndgrading'] + $row['3rdgrading'] + $row['4thgrading'] ) / 4) ;
	    		$average = round($result);
	    		$query = mysqli_query($con,"UPDATE tblstudentgrade SET gradeaverage = '".$average."', remarks = 'No Final Remarks'  where id = '".$txt_id."' ");    	
	    	}
	    }


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
