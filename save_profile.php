<?php
    session_start();
    require_once('Connections/connection.php');

	if($_SESSION['customerID'] == "")
	{
		header('Location:alert/alert_login.php');
		exit();
	}
	if(trim($_POST["username"]) == "")
	{
		header('Location:alert/alert_username.php');
		exit();	
	}
	if(trim($_POST["password"]) == "")
	{
		header('Location:alert/alert_password.php');
		exit();	
	}	
	if($_POST["password"] != $_POST["conpassword"])
	{
		header('Location:alert/alert_passwordnotmatch.php');
		exit();
	}
	
	$strSQL = "UPDATE customer SET
								username 	= '".trim($_POST['username'])."',
								password 	= '".trim($_POST['password'])."',
								firstname 	= '".trim($_POST['firstname'])."',
								lastname 	= '".trim($_POST['lastname'])."',
								nickname 	= '".trim($_POST['nickname'])."',
								age 		= '".trim($_POST['age'])."',
								birthdate 	= '".trim($_POST['birthdate'])."',
								gender 		= '".trim($_POST['gender'])."',
								email 		= '".trim($_POST['email'])."',
								phone 		= '".trim($_POST['phone'])."',
								address 	= '".trim($_POST['address'])."',
								parent 		= '".trim($_POST['parent'])."',
								phoneparent = '".trim($_POST['phoneparent'])."',
								school 		= '".trim($_POST['school'])."',
								degree 		= '".trim($_POST['degree'])."',
								teacher 	= '".trim($_POST['teacher'])."',
								phoneteacher = '".trim($_POST['phoneteacher'])."',
								allergic 	= '".trim($_POST['allergic'])."',
								religion 	= '".trim($_POST['religion'])."'
				WHERE customerID = '".$_SESSION["customerID"]."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
	
	if($_SESSION["status"] == "admin")
	{
		header('Location:admin_showname-list.php');
	}
	else
	{
		header('Location:user_page.php');
	}
	
	mysqli_close($objCon);
?>