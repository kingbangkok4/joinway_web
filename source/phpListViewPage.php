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
	<title>Join Way / ListView</title>
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
			width: 90%;
			height: 34px;
		 	font-size: 14px;
		 	border: 1px solid #ccc;
			border-radius: 4px;
			margin-bottom: 5px;
			padding-left: 10px;
		}
		
		.showdetail{
			margin-top: 20px;
		}
		.showmap{
			width: 90%;
			margin-top: 10px;

		}
		#nnn{
			padding-top: 20px;
			padding-left: 50px;
		}

		#mmm{
			border-radius: 4px;
			border: 1px solid #ccc;
			width: 90%;
			height: 40px;
			margin-bottom: 5px;
			padding: 10px;
			background-color: white;
			text-align: left;
		}
		
		#sdf{
			padding-top: 12px;
			padding-right: 50px;
			font-size: 20px;
		}

		#map{
			width: 80%;
			height: 50%;
		}

		#yoo{
			padding-left: 50px;
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


<body>
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

<?
	$sql = mysql_query("select * from map, user where map.user_id=user.user_id");
	while($bbb = mysql_fetch_array($sql)){
?>
<!--PageHome-->
		<div class="container" align="center">
			<form name="formListView" method="post" action="">
				<div class="paneshow">
					<div class="row">
						<div class="col-md-2">
							<img src="image/male.png">
						</div>
						<div class="col-md-2">
							<label id=""><?=$bbb['firstname']?></label>
							<label id="nnn"><?=$bbb['lastname']?></label>
						</div>
						<div class="col-md-8">
							<button class="btn btn-default" id="">Request</button>
							<a href="phpDetailComment.php"><img class="" id="yoo" src="image/star.png"></a>	
						</div>
					</div>
					<div class="row">
						<div class="" id="map"></div>
					</div>

					<div class="showdetail">
						<label id="mmm">จุดนัดพบ : <?=$bbb['meeting_point']?></label>	
						<label id="mmm"> เวลาออก : <?=$bbb['map_datetime']?></label>	
						<label id="mmm">ทะเบียนรถ : <?=$bbb['license_plate']?></label>			
						<!-- <input class="txtinput" type="text" name="txtPoint" id="disabledInput" placeholder="Find Point">						
						<input class="txtinput" type="text" name="txtTime" placeholder="Time">
						<input class="txtinput" type="text" name="txtLicensePlate" placeholder="License Plate"> -->
					</div>
				</div>		    
			</form>
		</div>
<?}?>
<br>


</body>

<script type="text/javascript">
	function alarm(){
		alert("Nickk It'Error ได้ส่งคำร้องขอร่วมทาง");	
	}
</script>


</html>