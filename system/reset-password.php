<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recover Account</title>

    <style>
        body{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
           justify-content: center;
           display: flex;
           background-color: rgb(233, 231, 231);
           font-family: sans-serif;
           color: #1c1e21;
           text-decoration: none;
        }
        form{
            border-top: 5px solid blueviolet;
            background-color: rgba(254, 251, 251, 0.841);
            padding: 5px 20px 20px 20px;
            margin-top: 50px;
            border-radius: 5px;
            box-shadow: 1px 1px 3px rgb(198, 198, 198);
            
           
            
        }
        form input{
            margin-bottom: 10px;
            width: 300px;
            height: 40px;
            padding-left: 10px;
            outline: none;
            border: 1px solid rgb(186, 185, 185);
            border-radius: 5px;
            
        }
        form input:hover{
            outline: .5px solid blueviolet;
        }
        form input[placeholder]:hover{
            color:blueviolet;
        }
        form button{
            margin-top: 10px;
            width: 80px;
            height: 30px;
            border-radius: 5px;
            outline: none;
            border: 1px solid #333;
            float: right;
            margin-right: 5px;
        }
        form .save:hover{
            background-color: rgb(106, 22, 184);
           
            outline: none;
          
        }form .cancel:hover{
            background-color: rgb(188, 186, 190);
            
            outline: none;
           
        }
        form .cancel{
            border: none;
            border-radius: 5px;
            background-color: #ccc;
            font-size: 12px;
            font-weight: bold;
            color: #333;
        }
        form .save{
            border: none;
            border-radius: 5px;
            background-color: blueviolet;
            font-size: 12px;
            font-weight: bold;
            color: #fff;
        }
        hr{
            
            border: 1px solid #ccc;
            
        }
        p{
            font-size: 14px;
        }
        form .error{
            background-color: rgb(249, 234, 234);
            padding: 10px 10px;
            line-height: 1px;
            border: 1px solid red;
            display: none;
        }
        .error h4{
            font-size: 14px;
        }
        .error p{
            font-size: 12px;
        }

    </style>
</head>
<body>
    <form action="includes/reset-request.inc.php" method="post">
        <h3>Recover your account</h3>
        <hr>
        
        <p>Please enter your correct email to recover your account.</p>
        <input type="text" placeholder="Enter email" name="email"><br>
        <hr>
        <button class="save" name="reset-request-submit">Save</button>
        <button class="cancel">Cancel</button>
       
    </form>
    <?php
include("config.php");

if(!isset($_GET["code"])) {
	exit("Cant Find Page");
}
	
	$code = $_GET["code"];

	$getEmailQuery = mysqli_query($con, "SELECT email FROM resetpasswords WHERE code='$code'");
	if(mysqli_num_rows($getEmailQuery) == 0) {
		exit("Cant Find Page");
	}

if(isset($POST["password"])) {
	$pw = $_POST["password"];
	$pw = md5($pw);

	$row = mysqli_fetch_array($getEmailQuery);
	$email = $row["email"];

	$query = mysqli_query($con, "UPDATE user SET password='$pw' WHERE email='$email'");

	if($query) {
		$query = mysqli_query($con, "DELETE FROM resetpasswords WHERE code='$code'");
		exit("Password Updated");
	}
	else {
		exit("Something went wrong");
	}
}
?>
    ?>
   
</body>
</html>