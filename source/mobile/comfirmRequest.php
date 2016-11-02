<?php
include ("connectDB.php");
$request_id = $_REQUEST ["request_id"];
$action = $_REQUEST ["action"];

$strSQL = " UPDATE `request` SET action = '{$action}' WHERE request_id = {$request_id} ";
 echo $strSQL."<br />";
mysql_query ( "SET NAMES 'utf8'" );
$result = mysql_query ( $strSQL );
if ($result) {
	$arr ['status'] = "บันทึกสำเร็จ";
} else {
	$arr ['status'] = "เกิดข้อผิดพลาด!!";
}

mysql_close ( $objConnect );
echo json_encode ( $arr );
?>
