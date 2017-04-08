<?php
require("db_conn.php");

if($_POST)
{
	$cid=$_POST['cid'];
	$msp=$_POST['msp'];
	$a=mysqli_query($mysqli,"update center set msp='$msp' where cid='$cid'");
	$ref=mysqli_real_escape_string($mysqli, htmlspecialchars($_SERVER['HTTP_REFERER']));
echo "<script>
alert('MSP Changed');
window.location.href='$ref';
</script>";
	
}
else
{
	$ref=mysqli_real_escape_string($mysqli, htmlspecialchars($_SERVER['HTTP_REFERER']));
echo "<script>
alert('MSP Not Changed');
window.location.href='$ref';
</script>";
}


?>