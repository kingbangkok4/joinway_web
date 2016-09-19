<?
session_start();
if (!isset($_SESSION['login_true_admin'])) {
    header("Location: index.php");
    exit;
}
include 'phpConnect_db.php';
?>
<!DOCTYPE>
<html lang="en">
<head>
	<title>Join Way / Post</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<style type="text/css">
		.paneshow{
			width: 100%;
			height: auto;
			margin-bottom: 20px;
			text-align: center;
			font-size: auto;
			
		}
		.txtinput{
			width: 30%;
			height: 34px;
		 	font-size: 14px;
		 	border: 1px solid #ccc;
			border-radius: 4px;
			margin-bottom: 5px;
			padding-left: 10px;
		}

		.txtdetail{
			max-width: 100%;
			height: auto;
			margin-bottom: 20px;
		}

		.txtfind{
			width: 260px;	
			height: 34px;
		 	font-size: 14px;
		 	border: 1px solid #ccc;
			border-radius: 4px;
			margin-bottom: 5px;
			padding-left: 10px;
			
		}

		.car{
			margin-top: 20px;
			margin-bottom: 20px;
		}

		.mmm{
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
			margin-left: 110px;
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


<body onload="initialize()" onunload="GUnload()">

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
	      	<li id="sdf"> <?=$row["firstname"];?> </li>
	      	<li id="sdf"> <?=$row["lastname"];?> </li>
	        <li><a href="phpSelectPage.php" onclick="alarm();"><img id="" src="image/globe-01.png"></a></li>
		    <li><a href=""><img id="" src="image/setting.png"></a></li>
		    <li><a href="phpLogout.php">Logout</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>

    <div class="container" align="">
	    <form name="formWaypoint" method="post" action="phpListViewPage.php">
			<div class="paneshow">
				<form name="formSearch">
					<div class="row">
						<div class="col-xs-12">
							<label class="">จุดเริ่มต้น</label>
							<input class="txtinput" id="" type="text" name="txtStart" placeholder="Start">
							<label class="">จุดสิ้นสุด</label>
							<input class="txtinput" id="" type="text" name="txtEnd" placeholder="End">
							<a href=""><img src="image/search.png"></a>
						</div>	
					</div>
					<div id="map"></div>
				</form>    

				<div class="row">	
					<div class="car">
						<img id="car" src="image/nissan.png">
						<label class=""><input type="radio" name="optionsRadios" onclick="HaveCar()" id="optionsRadios1" value="option1" checked="1">มีรถ</label>
						<label class=""><input type="radio" name="optionsRadios" onclick="NoCar()" id="optionsRadios2" value="option2">ไม่มีรถ</label>  	
					</div>	
				</div>

				<div class="row">
					<div class="col-md-4">
						<label class="" id="">จุดนัดพบ</label>
						<input class="txtfind" type="text" id="txtPoint" name="txtPoint" placeholder="Find Point">
					</div>
					<div class="col-md-4">
						<label class="" id="">เวลาเดินทาง</label>
						<input class="txtfind" type="text" id="txtTime" name="txtTime" placeholder="Time">
					</div>
					<div class="col-md-4">
						<label class="" id="">ทะเบียนรถ</label>
						<input class="txtfind" type="text" id="txtLicensePlate" name="txtLicensePlate" placeholder="License Plate">
					</div>
				</div>   

				<div class="row">
					<div class="col-md-12">
						<input class="btn btn-primary" type="submit" value="Ok">
						<input class="btn btn-default" type="reset" onclick="HaveCar()" value="Cancel">
					</div>
				</div>
			</div>
		</form>
	</div>

<script lanuage"javascript">
	function NoCar(){
		document.getElementById("txtPoint").disabled = true;		
		document.getElementById("txtTime").disabled = true;
		document.getElementById("txtLicensePlate").disabled = true;
		
		document.getElementById("txtPoint").value="";
		document.getElementById("txtTime").value="";
		document.getElementById("txtLicensePlate").value="";
	}

	function HaveCar(){
		document.getElementById("txtPoint").disabled = false;
		document.getElementById("txtTime").disabled = false;
		document.getElementById("txtLicensePlate").disabled = false;
	}

	function alarm(){
		alert("Nickk It'Error ได้ส่งคำร้องขอร่วมทาง");		
	}
</script>

		
</body>
</html>