<?
session_start();
if (!isset($_SESSION['login_true_admin'])) {
    header("Location: index.php");
    exit;
}
include 'phpConnect_db.php';
?>

<html>
<head>
	<title>Join Way / Pick</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<style type="text/css">
		.paneshow{
			padding: 10px;
			width: 90%;
			height: auto;
			border-radius: 4px;
			background-color: #F5F5DC;
		}
		.showname{
			text-align: left;
		}
		.txtinput{
			width: 100%;
			height: 34px;
		 	font-size: 14px;
		 	border: 1px solid #ccc;
			border-radius: 4px;
			margin-bottom: 5px;
			padding: 10px;
		}
		
		.showdetail{
			margin-top: 20px;
		}
		.showmap{
			width: 80%;
			margin-top: 10px;

		}
		#nnn{
			padding-right: 50px;
			padding-left: 20px;
		}

		#sdf{
			padding-top: 12px;
			padding-right: 50px;
			font-size: 20px;
		}


      #map {
        height:50%;
        width: 80%;
      }
	</style>
	<script>
		var map;
		function initMap() {
			map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: -34.397, lng: 150.644},
			zoom: 8
			});
		}
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDi7D1X9orNfBRcGLBiJODKWDcKLvmzISQ&callback=initMap" async defer></script>

<?
    $sqlVal = $_SESSION['login_true_admin'];
    $result = mysql_query("select * from user where username='$sqlVal'");
    $row = mysql_fetch_array($result);
?>
	
</head>


<body >
	<nav class="navbar navbar-default">
		<div class="container">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="phpStickyPage.php">Join Way</a>
		    </div>

		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      	<ul class="nav navbar-nav">
		        	<li><a href="phpStickyPage.php">Post<span class="sr-only">(current)</span></a></li>
		        	<li><a href="phpViewPage.php">Feed<span class="icon-bar"></span></a></li>
		      	</ul>
		      <ul class="nav navbar-nav navbar-right">
		      	<li id="sdf"> <?=$row["firstname"]; ?> </li>
		      	<li id="sdf"> <?=$row["lastname"];?> </li>
		        <li><a href="phpSelectPage.php" onclick="alarm();"><img id="" src="image/globe-01.png"></a></li>
			    <li><a href=""><img id="" src="image/setting.png"></a></li>
			    <li><a href="phpLogout.php">Logout</a></li>
		      </ul>
		    </div>
		</div>
	</nav>

<!--PageHome-->

	<div class="container" align="center">
			<form name="formListView" method="post" action="phpSelectPage.php">
				<div class="paneshow">
					<div class="showname">
						<img src="image/male.png">
						<label id="nnn">ชื่อจริง</label>
						<label id="nnn">นามสกุล</label>
						<a href="phpDetailComment.php"><img class="" src="image/star.png"></a>	
					</div>
					
					<div id="map"></div>
				    
					<div class="showdetail">					
						<input class="txtinput" type="text" name="txtPoint" placeholder="Find Point">						
						<input class="txtinput" type="text" name="txtTime" placeholder="Time">
					</div>
					<input class="btn btn-default btnusername" type="submit" value="Ok">
					<a href="phpStickyPage.php" class="btn btn-default" type="reset">Cancel</a>
				</div>		    
			</form>
		</div>

<!-- End PageHome

PagePost
	
End PagePost -->
		
</body>
<script type="text/javascript">
	function alarm(){
		alert("Nickk It'Error ได้ส่งคำร้องขอร่วมทาง");	
	}
</script>


</html>