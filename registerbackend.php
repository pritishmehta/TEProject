<html>
<body>
<?php
$username=$_POST['username'];
$password=$_POST['password'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$con=@mysql_connect("localhost","root","") or die(mysql_error());
$db=@mysql_select_db("student",$con) or die(mysql_error());
$encryptedpassword=md5($password);
$checkavailable="select username from student where username='$username'";
$checkres=@mysql_query($checkavailable) or die(mysql_error());
if(mysql_num_rows($checkres)>0 )
{
	echo "<script>
		alert('Username exists!');
		window.location.href='register.html';
	      </script>";
}
else
{
$str="insert into student values('$username','$encryptedpassword','$dob','$gender','$address')";
$res=@mysql_query($str) or die(mysql_error());
if($res>0)
header('location: main.html');
}
?>
</body>
</html>