﻿<?php
session_start();require_once("dbcontroller.php");
require("fusioncharts/fusioncharts.php");
$db_handle = new DBController();
require'db_conn.php';
if(isset($_SESSION['id'])){echo "<script>window.location.href='dashboard.php'</script>";}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>BooksBite:Register</title>
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
	<script src="themes/js/custom2.js"></script>
	<style type="text/css" id="enject">th, td { min-width: 100px; }</style>
	<script>        
           function phoneno(){          
            $('#mobile').keypress(function(e) {
                var a = [];
                var k = e.which;

                for (i = 48; i < 58; i++)
                    a.push(i);

                if (!(a.indexOf(k)>=0))
                    e.preventDefault();
            });
        }
       </script>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<script type="text/javascript">$(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i>');
            }
        }
        init();
    });
});
</script>
<!-- Google-code-prettify -->	
<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <!-- Material Design Lite -->
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<style type="text/css" id="enject">.colorgraph {
  height: 5px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}</style>
	<script src="fusioncharts/fusioncharts.js"></script>
	
  </head>

  <body background="img/macbook-juice.jpg">
  	<?php

     	// Form the SQL query that returns the top 10 most populous countries
     	$strQuery = "SELECT district, area FROM center ORDER BY cid";

     	// Execute the query, or else return the error message.
     	$result = $mysqli->query($strQuery);

     	// If the query returns a valid response, prepare the JSON string
     	if ($result) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData = array(
        	    "chart" => array(
                  "caption" => "Top 10 Most Populous Countries",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);

        	$arrData["data"] = array();

	// Push the data into the array
        	while($row5 = mysqli_fetch_array($result)) {
           	array_push($arrData["data"], array(
              	"label" => $row5["district"],
              	"value" => $row5["area"]
              	)
           	);
        	}

        	/*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

        	$jsonEncodedData = json_encode($arrData);
			
	/*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

        	$columnChart = new FusionCharts("column2D", "myFirstChart" , 600, 300, "chart-1", "json", $jsonEncodedData);

        	// Render the chart
        	$columnChart->render();

     	}

  	?>

  
	

<!-- Navbar ================================================== -->
 <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
		 <ul class="nav navbar-nav">
		 <li> </li>
		 <li><a href="fci.php">Data</a></li>
		 <li><a href="products.php">MSP's</a></li>
		 <li><a href="products.php">Set MSP</a></li>
		 </ul>
		
		 
         
		  
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
<!-- Navbar End====================================================================== -->
	<div class="bg-1" style="margin-top:100px">
<div class="container">
<div class="row" style="padding-top:10px;padding-bottom:10px">

<div class="row" >
<div class="col-md-6">
<h4 style="color:#e6ffff"><center>Number of Districts</center></h4><div class="row"><h5 style="color:#e6ccff"><center><?php $c = $db_handle->numRows("SELECT * FROM center "); echo $c;?></center></h5></div>
</div>
<div class="col-md-6">
<h4 style="color:#e6ffff"><center>Number of Centers</center></h4><div class="row"><h5 style="color:#e6ccff"><center><?php $c = $db_handle->numRows("SELECT * FROM center "); echo $c;?></center></h5></div>
</div>
<div class="col-md-12">
<h4 style="color:white"><center>Country MSP</center></h4><div class="row">

<center>
<h5 style="color:white"><center>Tur</center></h5><div class="row"><h6 style="color:white"><center>Rs 5050</center></h6></div>
</div>
</div>
</center>


</div>
<?php

$q=mysqli_query($mysqli,"select sum(area) from center");
$rows=mysqli_fetch_assoc($q);
$totala=$rows['sum(area)'];

$q=mysqli_query($mysqli,"select sum(quantity) from crop");
$rows=mysqli_fetch_assoc($q);
$totalp=$rows['sum(quantity)'];

$x=$totalp/$totala;
$msp=5050;
$q=mysqli_query($mysqli,"select * from center");
echo"<center><div  id='product-grid' style='overflow:auto;overflow-y: hidden;margin-top:30px;'><table cellspacing='5' cellpadding='10' bgcolor='#CCCCCC'>
<tr bgcolor='#3A3F44' height='30' style='color:white;' ><center><th><center>District</center><th><center>Area</center><th><center>Total Produce</center><th><center>Rainfall</center></th><th><center>Yield</center></th><th><center>Recommended MSP</center></th><th><center>Change MSP</center></th></tr>";
				$c = $db_handle->numRows("SELECT * FROM center ");
				
if($c==0)
{
	 echo"<tr  height='35' bgcolor='white'><td colspan='10'><center>No Centers Open yet</center>
    </td></tr>";
}
  while($rows=mysqli_fetch_assoc($q))
  {
    $cid=$rows["cid"];
    $area=$rows["area"];
    $rain=$rows["rain"];
    $district=$rows["district"];
	$quant=0;
	$i=1;
    $q1=mysqli_query($mysqli,"select * from crop where cid='$cid'");
	while($rows1=mysqli_fetch_assoc($q1))
	{
		$quant+=$rows1["quantity"];
	}
	$y=$quant/$area;
	$masp=$rows['msp'];
	if($masp==0)
	{$abc=$msp*($x/$y);
	$a=mysqli_query($mysqli,"update center set msp='$abc' where cid='$cid'");
	$masp=$abc;
}
	if($x>$y) {$z="Low";} else {$z= "High";}
	echo"<tr height='35' bgcolor='white' padding='5px' '>
    <td><center>$district</center><td><center>$area</center><td><center>$quant</center><td><center>$rain</center><td><center>$z</center><td><center>$masp</center>
    <td><center><button class='btn btn-success' data-toggle='modal' data-target='#myModal$i'>MSP
	</button><center>
    </td></tr>
	";?>
	<div id="myModal<?php echo$i;?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
							<div class="container-fluid">    
							
						<div id="loginbox" class="mainbox"> 
							
							
							
							<div class="panel panel-default" >
								   

								<div class="panel-body" >

									<form method='POST' action='change.php'>
				  <input type='hidden' name='cid' id='hiddenField' value='<?php echo $i;?>' />
				  <input type='text' name='msp' placeholder='msp' required />
					<input class='btn btn-success' type='submit' value='MSP' name='book' id='sub'></input></form>

								</div>                     
							</div>  
						</div>
					</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<?php


  }
   echo"</table></div></center>$i++;
   <br>
   
  ";
   
?>
<div id="chart-1"></div>
</div>


   
	

</div>
</div>
<!-- MainBody End ============================= -->

   
	</div>
</body>
</html>