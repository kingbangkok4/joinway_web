<?php
	include("connectDB.php");
        $map_id = $_REQUEST["map_id"];
        $user_id = $_REQUEST["user_id"];
        $type = $_REQUEST["type"];
		
		$strSQL = " SELECT count(*) as total FROM `request` WHERE map_id = {$map_id} AND user_id = '{$user_id}' AND type = '{$type}' ";
		//echo $strSQL."<br />";
		$objQuery = mysql_query($strSQL);
		$objResult = mysql_fetch_array($objQuery);
		//$intNumField = mysql_num_fields($objQuery);
		//echo $objResult['total']."<br />";
		if($objResult['total'] == "0"){						
			$strSQL = " INSERT INTO `request` (`request_id`, `map_id`, `user_id`, `type`, `timestamp`) VALUES (NULL, {$map_id}, '{$user_id}', '{$type}', CURRENT_TIMESTAMP); ";			
			//echo $strSQL."<br />";
			mysql_query("SET NAMES 'utf8'");
			mysql_query($strSQL);				
			$arr['status'] = "บันทึกสำเร็จ";								
		}else{
			$arr['status'] = "คุณเคยส่งคำขอแล้ว!"; 			
		}
		
		mysql_close($objConnect);
		echo json_encode($arr);
?>
