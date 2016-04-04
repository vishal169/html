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
<?php
 session_start();
if(isset($_SESSION['id'])){
$con=mysql_connect('localhost','root','phpMyAdmin','');
if(!$con)
echo "stop";
mysql_select_db('parking');

 $venue_id=$_GET['venue_id'];  //video id from view to view1 selected..
 
 $q="select * from venues where id='$venue_id'";
 
 $res=mysql_query($q,$con);
 $run=mysql_fetch_assoc($res);
 if(!$res)
 echo mysql_error();

 $venue_name=$run['name'];
  $venue_image=$run['image'];
 $venue_address=$run['address'];
 $venue_location=$run['location'];
 echo $venue_location;
 

?>
<img src="../bs-education/<?php echo $venue_image?>"  width="1400" height="700"/>
	<h1 align="center">Upcoming Events</h1>
	
	
<table cellpadding="10" border="4" align="center" style="width:80%"  >
<th>Match</th>
<th>Date</th>
<th>Day</th>
<th>Time</th>
<th>Book</th>
<?php
 $q="select * from events where venue='$venue_location'";
 $res=mysql_query($q,$con);
 
 while($run=mysql_fetch_array($res)){
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
<a href="map_venue.php?map_id=<?php echo $run['id'] ?> "> 

 <input type="button" name="" value="book"> </a>

 
</td>


</tr>


</body>
<?php
 }
}
else{
header('location:index.html');}
?>

</table>
    <div class="container" id="contact_part">
             <div class="row set-row-pad"  >
    <div class="col-lg-4 col-md-4 col-sm-4   col-lg-offset-1 col-md-offset-1 col-sm-offset-1 " data-scroll-reveal="enter from the bottom after 0.4s">

                    <h2 ><strong>Our Location </strong></h2>
        <hr />
                    <div ">
                        <h4>234/80 -UFG , New Street,</h4>
                        <h4>Switzerland.</h4>
                        <h4><strong>Call:</strong>  + 67-098-907-1269 / 70 / 71 </h4>
                        <h4><strong>Email: </strong>info@yourdomain.com</h4>
                    </div>


                </div>
                 <div class="col-lg-4 col-md-4 col-sm-4   col-lg-offset-1 col-md-offset-1 col-sm-offset-1" data-scroll-reveal="enter from the bottom after 0.4s">

                    <h2 ><strong>Social Conectivity </strong></h2>
        <hr />
                    <div >
                        <a href="#">  <img src="assets/img/Social/facebook.png" alt="" /> </a>
                     <a href="#"> <img src="assets/img/Social/google-plus.png" alt="" /></a>
                     <a href="#"> <img src="assets/img/Social/twitter.png" alt="" /></a>
                    </div>
                    </div>


                </div>
                 </div>
     <!-- CONTACT SECTION END-->
    <div id="footer">
          &copy 2014 yourdomain.com | All Rights Reserved |  Design by : binarytheme.com
    </div>
     <!-- FOOTER SECTION END-->
   
    <!--  Jquery Core Script -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!--  Core Bootstrap Script -->
    <script src="assets/js/bootstrap.js"></script>
    <!--  Flexslider Scripts --> 
         <script src="assets/js/jquery.flexslider.js"></script>
     <!--  Scrolling Reveal Script -->
    <script src="assets/js/scrollReveal.js"></script>
    <!--  Scroll Scripts --> 
    <script src="assets/js/jquery.easing.min.js"></script>
    <!--  Custom Scripts --> 
         <script src="assets/js/custom.js"></script>
</body>
</html>
