﻿<?php
session_start();require_once("dbcontroller.php");
$db_handle = new DBController();
require'db_conn.php';
if(!isset($_SESSION['cid'])){echo "<script>window.location.href='index.php'</script>";}

$cid=$_SESSION['cid'];
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bids</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.js"></script>
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
	<link href="themes/css/custom.css" rel="stylesheet" type="text/css">
	<link href="themes/css/custom2.css" rel="stylesheet" type="text/css">
	<link href="themes/css/custom3.css" rel="stylesheet" type="text/css">

	<link href="css/set1.css" rel="stylesheet" type="text/css">
	
	<script src="themes/js/custom2.js"></script>
	<style type="text/css" id="enject">th, td { min-width: 100px; }</style>
	
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


<!-- Google-code-prettify -->	
<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <!-- Material Design Lite -->
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<style type="text/css" id="enject">
</style>
	
	
  </head>

  <body background="img/macbook-juice.jpg">
  

  
	

<!-- Navbar ================================================== -->
 <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
		 <ul class="nav navbar-nav">
		 <li> </li>
		 <li><a href="farmer.php">Entry</a></li>
		 <li><a href="bids.php">Bids</a></li>
		 </ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="logout.php">Logout</a></li>
			</ul>
		 
         
		  
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
<!-- Navbar End====================================================================== -->
	<div class="bg-1" style="margin-top:100px">
<div class="container">
<div class="row" style="padding-top:10px;padding-bottom:10px">

<div class="row" style="height:200px">
<div class="col-md-4">
<h3 style="color:white"><center>District Name</center></h3><div class="row"><h3 style="color:orange"><center><?php $q=mysqli_query($mysqli,"select district from center where cid='$cid'");
$row1=mysqli_fetch_assoc($q);
 echo $row1['district'];?></center></h3></div>
</div>
<div class="col-md-4">
<h3 style="color:white"><center>Area</center></h3><div class="row"><h3 style="color:orange"><center><?php $q=mysqli_query($mysqli,"select area from center where cid='$cid'");
$row1=mysqli_fetch_assoc($q);
 echo $row1['area'];?> sq.km</center></h3></div>
</div>

<div class="col-md-4">
<h3 style="color:white"><center>Total Production</center></h3><div class="row"><h3 style="color:orange"><center><?php $q=mysqli_query($mysqli,"select sum(quantity) from crop group by cid having cid='$cid'");
$row1=mysqli_fetch_assoc($q);
 echo $row1['sum(quantity)'];?></center></h3></div>
</div>
</div>
<div class="col-md-4 col-md-offset-4">
<h3 style="color:white"><center>Remaining Production</center></h3><div class="row"><h3 style="color:orange"><center><?php $q=mysqli_query($mysqli,"select sum(quantity) from crop group by cid having cid='$cid'");
$row1=mysqli_fetch_assoc($q);
 $quat=$row1['sum(quantity)'];
 $q=mysqli_query($mysqli,"select sum(quantity) from bid group by cid having cid='$cid' and cid in(SELECT cid from bid where status=1)");
$row1=mysqli_fetch_assoc($q);
 $min=$row1['sum(quantity)'];
 echo $quat-$min;?></center></h3></div>
</div>
</div>
<?php
$cid=1;

$q=mysqli_query($mysqli,"select * from bid where cid='$cid'");
echo"<center><div  id='product-grid' style='overflow:auto;overflow-y: hidden;'><table cellspacing='5' cellpadding='10' bgcolor='#CCCCCC'>
<tr bgcolor='#3A3F44' height='30' style='color:white;' ><center><th><center>Company Name</center><th><center>Crop</center><th><center>quantity</center></th><th><center>Bid</center></th><th><center>Approve</center></th></tr>";
				$c = $db_handle->numRows("SELECT * FROM bid where cid='$cid' ");
				
if($c==0)
{
	 echo"<tr  height='35' bgcolor='white'><td colspan='10'><center>No Bids made yet</center>
    </td></tr>";
}
  while($rows=mysqli_fetch_assoc($q))
  {
    $comid=$rows["comid"];
    $bid=$rows["bid"];
    $quantity=$rows["quantity"];
    $crop=$rows["crop"];
	$price=$rows["price"];
	$f=mysqli_query($mysqli,"select * from company where comid='$comid'");
	$rows2=mysqli_fetch_assoc($q);
	$company=$rows2['company'];
	echo"<tr height='35' bgcolor='white' padding='5px' '>
    <td><center>$company</center><td><center>$crop</center><td><center>$quantity</center><td><center>$price</center>
    <td><center><form method='POST' action='app.php'>
				  <input type='hidden' name='bid' id='hiddenField' value='$crid' />
					<input class='btn btn-danger' type='submit' value='X' name='crop' id='sub'></input></form><center>
    </td></tr>";


  }
   echo"</table></div></center>
   <br>
   
  ";
   
?>
<div id="chart-1"></div>
</div>


   
	

</div>
</div>
<!-- MainBody End ============================= -->

   
	</div>
	<script src="js/classie.js"></script>
</body>
</html>