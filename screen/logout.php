<?php
session_start();
session_unset();
session_destroy();
ob_start();
$ref=$_SERVER['HTTP_REFERER'];
echo "<script>
alert('Logged Out');
window.location.href='index.php';
</script>";
ob_end_flush();
exit();
?>