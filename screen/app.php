<?php
require("db_conn.php");

if($_POST)
{
	$bid=$_POST['bid'];
	$a=mysqli_query($mysqli,"update bid set status=1 where bid='$bid'");
	$ref=mysqli_real_escape_string($mysqli, htmlspecialchars($_SERVER['HTTP_REFERER']));
echo "<script>
alert('Bid Approved');
window.location.href='$ref';
</script>";
	
}
else
{
	$ref=mysqli_real_escape_string($mysqli, htmlspecialchars($_SERVER['HTTP_REFERER']));
echo "<script>
alert('Bid Not Approved, Please Try again');
window.location.href='$ref';
</script>";
}


?>