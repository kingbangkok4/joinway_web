<?php
	include("connectDB.php");
	//$_REQUEST["user_id"] = "admin"; // for Sample

	$user_id = $_REQUEST["user_id"];

	$strSQL = "SELECT m.driver, m.match_id, u.firstname, u.lastname FROM `match` m inner join user u ON m.driver = u.user_id ";
	$strSQL .=  " WHERE (passenger1 = '{$user_id}' and comment1 = 0) or (passenger2 = '{$user_id}' and comment2 = 0) or (passenger3 = '{$user_id}' and comment3 = 0) limit 1 ";
	//echo $strSQL;
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	$intNumRows = mysql_num_rows($objQuery);
	if($intNumRows==0)
	{
		$arr['StatusID'] = "0";
		$arr['driver'] = ""; 
		$arr['match_id'] = ""; 
		$arr['firstname'] = ""; 
		$arr['lastname'] = "";
		$arr['Error'] = "Driver not found";	
	}
	else
	{
		$arr['StatusID'] = "1"; 
		$arr['driver'] = $objResult["driver"];
		$arr['match_id'] = $objResult["match_id"]; 
		$arr['firstname'] = $objResult["firstname"]; 
		$arr['lastname'] = $objResult["lastname"]; 
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
