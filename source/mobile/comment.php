<?php

include("connectDB.php");
$user_id = $_REQUEST["user_id"];
//echo(date('Y-m-d H:i'));
$strSQL = " SELECT CONCAT(u.firstname, ' ', u.lastname) AS name, c.rating, c.detail, c.comment_datetime "; 
$strSQL .= "FROM `comment` c left outer join user u on c.commentator = u.user_id "; 
$strSQL .= " WHERE review = '{$user_id}' ORDER BY comment_datetime DESC ";
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


