<?php
	include("connectDB.php");
        
		$strSQL = " SELECT * FROM map AS m LEFT OUTER JOIN user u ON m.user_id = u.user_id ORDER BY map_datetime ";
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
