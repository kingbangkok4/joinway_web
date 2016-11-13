<?php
include ("connectDB.php");
$match_id = $_REQUEST ["match_id"];
$user_id = $_REQUEST ["user_id"];
$driver_id = $_REQUEST ["driver_id"];
$detail = $_REQUEST ["detail"];
$rating = $_REQUEST ["rating"];

$strSQL = " SELECT * FROM `match` WHERE match_id = {$match_id} ";
// echo $strSQL."<br />";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
$intNumField = mysql_num_fields ($objQuery);
if ($intNumField > 0) {
	$p1 = $objResult ["passenger1"];
	$p2 = $objResult ["passenger2"];
	$p3 = $objResult ["passenger3"];
	
	if ($p1 == $user_id) {
		$strSQL = " UPDATE `match` SET `comment1` = 1 ";
	} else if ($p2 == $user_id) {
		$strSQL = " UPDATE `match` SET `comment2` = 1 ";
	} else if ($p3 == $user_id) {
		$strSQL = " UPDATE `match` SET `comment3` = 1 ";
	}
	$strSQL .= " WHERE match_id = {$match_id}; ";
	mysql_query ( "SET NAMES 'utf8'" );
	mysql_query ( $strSQL );
	
	$strSQL = "INSERT INTO `comment` (`comment_id`, `match_id`, `commentator`, `review`, `detail`, `rating`, `comment_datetime`) VALUES (NULL, '{$match_id}', '{$user_id}', '{$driver_id}', '{$detail}', {$rating}, CURRENT_TIMESTAMP);";
	mysql_query ( "SET NAMES 'utf8'" );
	mysql_query ( $strSQL );
	
	$arr ['status'] = "บันทึกสำเร็จ";
} else {
	$arr ['status'] = "ไม่พบข้อมูล!";
}

mysql_close ( $objConnect );
echo json_encode ( $arr );
?>
