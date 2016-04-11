<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Park My Car</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME CSS -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet" />
     <!-- FLEXSLIDER CSS -->
<link href="assets/css/flexslider.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />    
  <!-- Google	Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />
</head>
<body>

 <div class="navbar navbar-inverse navbar-fixed-top " id="menu">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img class="logo-custom" src="assets/img/logo180-50.png" alt=""  /></a>
            </div>
            <div class="navbar-collapse collapse move-me">
                <ul class="nav navbar-nav navbar-right">
                   
						<li ><a href="index.html">HOME</a></li>
                        <li ><a href="#event-sec">EVENTS</a></li>
					<li><a href="#contact_part">CONTACT US</a></li>
                </ul>
            </div>
           
        </div>
    </div>
	</body>

 <div class="container">
 <div class="overlay">
<?php
 session_start();
if(isset($_SESSION['id'])){
$con=mysql_connect('localhost','root','parkingboysmaur','');
if(!$con)
echo "stop";
mysql_select_db('parking');
$map_id=$_GET['map_id'];
 
?>
	
<table cellpadding="10" border="4" align="center" style="width:80%"  >
<th>Match</th>
<th>Date</th>
<th>Day</th>
<th>Time</th>
<th>Venue</th>
<h1>park my car </h1>
<h1 align ="center"> Event</h1>
<?php
 $q="select * from events where id='$map_id'";
 $res=mysql_query($q,$con); 
 if($run=mysql_fetch_array($res)){
$i=$run['id'];  // defaul id of sql auto_increment..
$teams=$run['name'];
$date=$run['date'];
$day=$run['day'];
$image=$run['image'];
$time=$run['time'];
$venue=$run['venue'];
//echo $teams;
 ?>
 <body>
  
  <tr style="width:80%">
  <td>
<?php echo $run['name'];?> </td>
<td>
<?php echo $run['date'];?> 
</td>
<td>
<?php echo $run['day'];?> 
</td>
<td>
<?php echo $run['time'];?> 
</td>
<td>
<?php echo $run['venue'];?> 
</td>
</tr>
</table>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<table cellpadding="10" border="4" align="center" style="width:80%" >
<th>Available Parking Slots</th>
<th>Booked Slots</th>
<th>Total Slots</th>

<tr style="width:80%">
<td>
<?php echo $run['available'];?> </td>
<td>
<?php echo $run['booked'];?> </td>
<td>
<?php echo $run['total'];?> </td>
</tr>
</table>
<?php
}
}
?>

&nbsp;
&nbsp;

<a href="booking.php?map_id=<?php echo $run['id'] ?> "> 
        <div  width="50%" align ="center" >
                            <button type="submit" class="btn btn-primary btn-lg">  BOOK NOW  </button>
                        </div>
</a>

</div>
</div>
<h3 align="center"> You can only book one parking slot with one ID ..!!</h3>
</body>
</html>