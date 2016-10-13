<?php

	include("connectDB.php");
        $type = $_REQUEST["type"];
		//echo(date('Y-m-d H:i'));
		$strSQL = " SELECT * FROM map AS m LEFT OUTER JOIN user u ON m.user_id = u.user_id WHERE DATE_FORMAT(m.map_datetime,'%Y-%m-%d %H:%i') >= '".date('Y-m-d H:i')."' AND type = '{$type}' ORDER BY DATE_FORMAT( m.map_datetime, '%Y-%m-%d %H:%i' ) ";
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
