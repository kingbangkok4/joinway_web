<?php
	include("connectDB.php");
        
        $user_id = $_REQUEST["user_id"];
        // $user_id = "test";
        
		$meeting_point = $_REQUEST["meeting_point"];
		$license_plate = $_REQUEST["license_plate"];
        $map_datetime = $_REQUEST["map_datetime"];
        $start = $_REQUEST["start"];
        $end = $_REQUEST["end"];
        $type = $_REQUEST["type"];
		
		//$meeting_point = 'asas';
		//$license_plate = 'fsfsf 99';
        //$map_datetime = '2016-8-18 10:11';
        //$start = 'jgfgj';
        //$end = 'fhf';
        //$type = 'gfgfg';
        
	$strSQL = " INSERT INTO `map`(`user_id`, `meeting_point`, `license_plate`, `map_datetime`, `start`, `end`, `type`)";
    $strSQL .= " VALUES ('$user_id', '{$meeting_point}', '{$license_plate}', '{$map_datetime}', '{$start}', '{$end}', '{$type}'); ";
	mysql_query("SET NAMES 'utf8'");
    mysql_query($strSQL);
	$id = mysql_insert_id();
	$strSQL = " INSERT INTO `match`(`map_id`, `driver`)";
    $strSQL .= " VALUES ({$id}, '{$user_id}'); ";
	mysql_query("SET NAMES 'utf8'");
    mysql_query($strSQL);
    
    $strSQL = " INSERT INTO `word`(`word_text`)";
    $strSQL .= " VALUES ({'{$start}'); ";
    mysql_query("SET NAMES 'utf8'");
    mysql_query($strSQL);
    
    $strSQL = " INSERT INTO `word`(`word_text`)";
    $strSQL .= " VALUES ({'{$end}'); ";
    mysql_query("SET NAMES 'utf8'");
    mysql_query($strSQL);
    
    $strSQL = " INSERT INTO `word`(`word_text`)";
    $strSQL .= " VALUES ({'{$meeting_point}'); ";
    mysql_query("SET NAMES 'utf8'");
    mysql_query($strSQL);

	
	
        
        //echo $strSQL;
	$arr['status'] = "บันทึกสำเร็จ"; 
	
	mysql_close($objConnect);
	
	echo json_encode($arr);
?>
