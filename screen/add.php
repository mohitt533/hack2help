<?php
require("db_conn.php");
session_start();


if($_POST)
{
	$cid=1;
	$farmer=$_POST['farmer'];
	$crop=$_POST['crop'];
	$quantity=$_POST['quantity'];
	$aadhar=$_POST['aadhar'];
	$a=mysqli_query($mysqli,"insert into crop (cid,farmer,crop,quantity,aadhar) values ('$cid','$farmer','$crop','$quantity','$aadhar')");
	$ref=mysqli_real_escape_string($mysqli, htmlspecialchars($_SERVER['HTTP_REFERER']));
echo "<script>
alert('Crop Added');
window.location.href='$ref';
</script>";
	
}
else
{
	$ref=mysqli_real_escape_string($mysqli, htmlspecialchars($_SERVER['HTTP_REFERER']));
echo "<script>
alert('Crop Not Added');
window.location.href='$ref';
</script>";
}




?>