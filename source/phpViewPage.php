<?
session_start();
if (!isset($_SESSION['login_true_admin'])) {
    header("Location: index.php");
    exit;
}
include 'phpConnect_db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Join Way / View</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<!-- <link rel="stylesheet" type="text/css" href="js/bootstrap.js"> -->
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
		.find{
			margin-top: 10px;
			border-radius: 4px;
		}
		#mmm{
			border-radius: 4px;
			border: 1px solid #ccc;
			width: 100%;
			height: 40px;
			margin-bottom: 5px;
			padding: 10px;
			background-color: white;
			text-align: left;
		}
		#nnn{
			padding-top: 20px;
			padding-left: 40px;
		}


	#sdf{
			padding-top: 12px;
			padding-right: 50px;
			font-size: 20px;
		}

		#yoo{
			margin-top: 15px;
			margin-left: 0px;
		}

	</style>
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
$sql = mysql_query("select * from map,user where map.user_id = user.user_id");
while($bbb = mysql_fetch_array($sql)){
?>
<br>
	<div class="container" align="center">
		<form name="formPost" method="post" action="phpRequestPage.php">
			<div class="paneshow">
				<div class="row">
					<div class="col-md-2">
						<img id="" src="image/male.png">
					</div>
					<div class="col-md-2">
						<label id=""><?=$bbb['firstname']?></label>
						<label id="nnn"><?=$bbb['lastname']?></label>
					</div>
					<div class="col-md-8">
						<button class="btn btn-default" id="yoo">Map</button>
					</div>
				</div>
				<div class="find text-left">
					<label id="mmm">จาก : <?=$bbb['start']?></label>
					<label id="mmm">ไป : <?=$bbb['end']?></label>
					<label id="mmm">เวลาออก : <?=$bbb['map_datetime']?></label>
					<!-- <input class="" id="mmm" type="text" name="txtPoint" placeholder="Start">
					<input class="" id="mmm" type="text" name="txtPoint" placeholder="End">
					<input id="mmm" type="text" name="txtTime" placeholder="Time"> -->
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