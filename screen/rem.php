<?php
require("db_conn.php");


if($_POST)
{
	$crid=$_POST['crid'];
	$a=mysqli_query($mysqli,"delete from crop where crid='$crid'");
	$ref=mysqli_real_escape_string($mysqli, htmlspecialchars($_SERVER['HTTP_REFERER']));
echo "<script>
alert('Crop Deleted');
window.location.href='$ref';
</script>";
	
}
else
{
	$ref=mysqli_real_escape_string($mysqli, htmlspecialchars($_SERVER['HTTP_REFERER']));
echo "<script>
alert('Crop Not Deleted');
window.location.href='$ref';
</script>";
}




?>