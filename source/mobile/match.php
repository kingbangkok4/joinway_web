<?php

	include("connectDB.php");
        $map_id = $_REQUEST["map_id"];
		$passenger = $_REQUEST["passenger"];
		$request_id = $_REQUEST["request_id"];
		$action = $_REQUEST["action"];
		
		$strSQL = " SELECT * FROM `match` WHERE map_id = {$map_id} AND (passenger1 IS NULL OR passenger2 IS NULL OR passenger3 IS NULL) ";
		//echo $strSQL."<br />";
		$objQuery = mysql_query($strSQL);
		$objResult = mysql_fetch_array($objQuery);
		$intNumField = mysql_num_fields($objQuery);
		if($intNumField > 0){		
			$p1 = $objResult["passenger1"]; 
			$p2 = $objResult["passenger2"]; 	
			$p3 = $objResult["passenger3"]; 
			
			if($p1 != $_REQUEST["passenger"] && $p2 != $_REQUEST["passenger"] && $p3 != $_REQUEST["passenger"]){
				if($p1 == null){
				$strSQL = " UPDATE `match` SET `passenger1` = '{$passenger}' ";				
				}else if($p2 == null){
					$strSQL = " UPDATE `match` SET `passenger2` = '{$passenger}' ";	
				}else if($p3 == null){
					$strSQL = " UPDATE `match` SET `passenger3` = '{$passenger}' ";	
				}
				$strSQL .= " WHERE map_id = {$map_id}; ";
				mysql_query("SET NAMES 'utf8'");
				mysql_query($strSQL);	
				
				$strSQL = " UPDATE `request` SET `action` = '{$action}' WHERE `request_id` = '{$request_id}' ";
				mysql_query($strSQL);
				
				$arr['status'] = "บันทึกสำเร็จ";	
			}else{
				$arr['status'] = "คุณเคยส่งคำขอแล้ว!";	
			}								
		}else{
			$arr['status'] = "รถคันนี้ผู้โดยสารเต็มแล้ว!"; 			
		}			
		
		mysql_close($objConnect);
		echo json_encode($arr);
?>
