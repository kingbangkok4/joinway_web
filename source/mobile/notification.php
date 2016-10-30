<?php

include("connectDB.php");
$user_id = $_REQUEST["user_id"];
//echo(date('Y-m-d H:i'));
$strSQL = " SELECT r.request_id, m.start, m.end, m.meeting_point, m.map_datetime, m.license_plate, m.user_id AS m_user_id, r.user_id AS r_user_id, r.type, r.map_id, u.firstname, u.lastname FROM map AS m RIGHT OUTER JOIN request AS r ON m.map_id = r.map_id LEFT OUTER JOIN user u ON r.user_id = u.user_id WHERE DATE_FORMAT(m.map_datetime,'%Y-%m-%d %H:%i') <= '".date('Y-m-d H:i')."' AND m.user_id = '{$user_id}' AND action IS NULL ORDER BY DATE_FORMAT( m.map_datetime, '%Y-%m-%d %H:%i' ) ";
//echo $strSQL."<br />";
mysql_query("SET NAMES 'utf8'");
$objQuery = mysql_query($strSQL);
$intNumField = mysql_num_fields($objQuery);
$resultArray = array();
while($obResult = mysql_fetch_array($objQuery))
{
	$arrCol = array();
	for($i=0;$i<$intNumField;$i++)
	{
		$arrCol[mysql_field_name($objQuery,$i)] = $obResult[$i];
	}
	array_push($resultArray,$arrCol);
}
mysql_close($objConnect);
echo json_encode($resultArray);
?>


