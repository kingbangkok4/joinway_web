<?php
	include("connectDB.php");
        
		$strSQL = " SELECT * FROM map AS m LEFT OUTER JOIN user u ON m.user_id = u.user_id WHERE DATE_FORMAT(m.map_datetime,'%Y-%m-%d') >= '".date('Y-m-d')."' ORDER BY DATE_FORMAT( m.map_datetime, '%Y-%m-%d' ) ";
		//echo $strSQL."<br />";
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
