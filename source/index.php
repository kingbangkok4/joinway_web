<?
session_start();
$user_login = $_POST ['user_login'];
$pwd_login = $_POST ['pwd_login'];	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Join Way</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<style type="text/css">

	.login{
		margin-top: 150px;
	}
		.mmm{
			border: 1px solid #ccc;
			border-radius: 4px;
			height: 30px;
			margin-bottom: 15px;
			width: 300px;
			padding: 10px;
		}
	
	</style>

	
</head>

<body>
	<div class="container text-center">
		<form name="formLogin" method="post" action="<?echo "$PHP_SELF" ;?>"  onSubmit="return check()">
			<div class="login" >
				<div class="row">
					<div class=".col-md-12">
						<img  src="image/car.png">
					</div>
					
					<div class=".col-md-12">
						<input class="mmm"  type="text" name="user_login" placeholder="Username">
					</div>
					<div class=".col-md-12">
						<input class="mmm"  type="password" name="pwd_login" placeholder="Password">
					</div>
					<div>
						<input class="btn btn-default" type="submit" value="Login">
						<input class="btn btn-default" type="reset" value="Cancel">
					</div>
				</div>
			</div>
		</form>
	</div>

<?
	if(isset($user_login) and isset($pwd_login)) {
	include("phpConnect_db.php");
	$result= mysql_query("select * from user where username='$user_login' and password='$pwd_login' ");
	$num = mysql_num_rows($result);

	if($num <= 0){
		
		?>
		<script type="text/javascript">
			check2();
			</script>
		<?
		
	} else {
		$dbarr = mysql_fetch_array($result);
		if ($user_login == $dbarr ['username'] and $pwd_login == $dbarr ['password']) {
			$_SESSION['login_true_admin'] = $user_login;
			echo "<meta http-equiv='refresh' content='0; url= phpStickyPage.php'>";
			exit() ;
			}
		}
	}
	
?>


<script type="text/javascript">
	function check() {
        var v1 = document.formLogin.user_login.value ;
        var v2 = document.formLogin.pwd_login.value ;
        if(v1.length==0) {
            alert("Username Wrong") ;
            document.formLogin.user_login.focus() ;
            return false ;
        }
        else if(v2.length==0) {
            alert("Password Wrong") ;
            document.formLogin.pwd_login.focus() ;
            return false ;
        }
        else 
            return true ;
        }

    function check2(){
    	alert("Username and Password ERROR!!!!");
    return false;
	}

</script>

</body>

</html>