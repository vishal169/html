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
                    <li ><a href="#home">HOME</a></li>
                     <li><a href="#login-sec">LOGIN</a></li>
                    <li><a href="#signup-sec">SIGNUP</a></li>
                     <li><a href="#faculty-sec">FACULTY</a></li>
					<li><a href="#contact_part">CONTACT US</a></li>
                </ul>
            </div>
           
        </div>
    </div>
<h1>dfhdsfd</h1>


<?php
 session_start();
if(isset($_SESSION['id'])){
$con=mysql_connect('localhost','root','parkingboysmaur','');

if(!$con)
echo "stop";

mysql_select_db('parking');
$map_id=$_GET['map_id'];
$q="select * from events where id='$map_id'";
 $res=mysql_query($q,$con); 
 
if($run=mysql_fetch_array($res))
 {
$i=$run['id'];  // defaul id of sql auto_increment..
$teams=$run['name'];
$date=$run['date'];
$day=$run['day'];
$image=$run['image'];
$time=$run['time'];
$venue=$run['venue'];
$booked=$run['booked'];
$available=$run['available'];
$total=$run['total'];

//echo $booked;
//echo $available;

 if($available > 0){
	 $booked+=1;
	 $available-=1;
	$q="update events set booked='$booked' ,available='$available' where id='$map_id' ";
	$res=mysql_query($q,$con); 
 	echo "done";
	header('location:index.html');
 }
}
}
?>
	<!-- FACULTY SECTION END-->
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
