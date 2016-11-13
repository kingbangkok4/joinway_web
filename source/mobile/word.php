<?php

include("connectDB.php");

$strSQL = " SELECT DISTINCT word_text FROM `word` WHERE 1 ";
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


