<?php
	include("connectDB.php");
	//$_POST["strUser"] = "admin"; // for Sample
	//$_POST["strPass"] = "admin";  // for Sample

	$strUsername = $_REQUEST["strUser"];
	$strPassword = $_REQUEST["strPass"];
	$strSQL = "SELECT * FROM user WHERE 1 
		AND Username = '".$strUsername."'  
		AND Password = '".$strPassword."'  
		";

	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	$intNumRows = mysql_num_rows($objQuery);
	if($intNumRows==0)
	{
		$arr['StatusID'] = "0"; 
		$arr['user_id'] = "0"; 
		$arr['Error'] = "Incorrect Username and Password";	
	}
	else
	{
		$arr['StatusID'] = "1"; 
		$arr['user_id'] = $objResult["user_id"]; 
		$arr['Error'] = "";	
	}

	/**
		$arr['StatusID'] // (0=Failed , 1=Complete)
		$arr['MemberID'] // MemberID
		$arr['Error' // Error Message
	*/
	
	mysql_close($objConnect);
	
	echo json_encode($arr);
?>
