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
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<style type="text/css">
		.paneshow{
			padding: 10px;
			width: 90%;
			height: auto;
			text-align: left;
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
			height: 70px;
			margin-bottom: 5px;
			padding: 10px;
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
	
<!--PageHome-->
	<div class="container" align="center">
		<div class="paneshow">
				<div class="">
					<img id="" src="image/male.png">
					<label id="nnn"> ชื่อ </label>
					<label id="nnn">นามสกุล </label>
				</div>
				<div class="find">
					<input class="" id="mmm" type="text" name="txtPoint" placeholder="Comment">
					<input class="" id="mmm" type="text" name="txtPoint" placeholder="Comment">
					<input class="" id="mmm" type="text" name="txtPoint" placeholder="Comment">
					<input class="" id="mmm" type="text" name="txtPoint" placeholder="Comment">
					<input class="" id="mmm" type="text" name="txtPoint" placeholder="Comment">
					<input class="" id="mmm" type="text" name="txtPoint" placeholder="Comment">
				</div>   
		</div>
	</div>
	<br>

	<div class="container" align="center">
		<form action="" class="paneshow" method="post" name="frmMain" id="frmMain">
			<div class="" id="sdf">Comment</div>
			<textarea id="alis" name="txtDetails" class="form-control" type="text" placeholder="Comment"></textarea><br>
    	<div class="form-group" id="">
    		<input type="submit" class="btn btn-primary" value="Ok">
    		<input type="reset"  class="btn btn-default" value="Cancel">
    	</div> 
    	</form>  
    </div>
           
</body>
<script type="text/javascript">
	function alarm(){
		alert("Nickk It'Error ได้ส่งคำร้องขอร่วมทาง");	
	}
</script>
</html>