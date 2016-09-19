<?
session_start();
$user_login = $_POST ['user_login'];
$pwd_login = $_POST ['pwd_login'];	
?>

<?
	//echo $user_login;
	//echo $pwd_login;
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
		echo $dbarr['username'];
		if ($user_login == $dbarr ['username'] and $pwd_login == $dbarr ['password']) {
			$_SESSION['login_true_admin'] = $user_login;
			echo "<meta http-equiv='refresh' content='0; url= phpStickyPage.php'>";
			exit() ;
			}
		}
	}
	
?>

<script type="text/javascript">
	function check2(){
    	alert("Username and Password ERROR!!!!");
    return false;
	}
</script>