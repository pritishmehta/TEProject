<html>
<body>
<?php
$username=$_POST['username'];
$password=$_POST['password'];
$_SESSION['success']="";
$con=@mysql_connect("localhost","root","") or die(mysql_error());
$db=@mysql_select_db("student",$con) or die(mysql_error());
$str="select password from student where username='$username'";
$res=@mysql_query($str) or die(mysql_error());
$row=mysql_fetch_row($res);
$encryptedpassword=md5($password);
if(strcmp("$row[0]","$encryptedpassword")==0)
{
	header('location: main.html');
}
else
{
	echo "<script>
		alert('Wrong username/password combination!');
		window.location.href='login.html';
	      </script>";
}
?>
</body>
</html>



