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
<body >

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
                   
						<li ><a href="index.html">LOGOUT</a></li>
                        <li ><a href="events.php">EVENTS</a></li>
					<li><a href="#contact_part">CONTACT US</a></li>
                </ul>
            </div>
           
        </div>
    </div>
	
<?php
 session_start();
if(isset($_SESSION['id'])){ 
$con=mysql_connect('localhost','root','parkingboysmaur','');
if(!$con)
echo "stop";
mysql_select_db('parking');

$q="select * from venues ";
$res=mysql_query($q,$con);
?>

   <div class="col-lg-12  col-md-12 col-sm-12">
       <div class="flexslider set-flexi" id="main-section" >
	   <div class="overlay">
  <table cellpadding="10" >
	<tr cellpadding="10">
   
<?php 
while($run=mysql_fetch_assoc($res)){
$i=$run['id'];  // defaul id of sql auto_increment..
$name=$run['name'];
$location=$run['location'];
$address=$run['address'];
$image=$run['image'];
?>
<td width="400" height="300" valign="top" align="fixed-top">
<a href="view_event.php?venue_id=<?php echo $i ?> ">   <?php //create a image link that on cllick go to player page view1.php?>  
<img src="../<?php echo $image ?>" width="250"  class="img-rounded" class="container"/></a><br>
<?php 
echo "<br>";
echo $location;echo "<br>";
?>
<a href="view_event.php?venue_id=<?php echo $i ?>" > <?php echo $name."<br>"?> 
<?php
}
?>
</td>
</tr>
</a>
	</table>
</body>
</div>
</div>
</div>

<?php 
}
else{
	header('location:index.html');
	}
?>
    <div class="container" id="contact_part">
             <div class="row set-row-pad"  >
    <div class="col-lg-4 col-md-4 col-sm-4   col-lg-offset-1 col-md-offset-1 col-sm-offset-1 " data-scroll-reveal="enter from the bottom after 0.4s">

                    <h2 ><strong>Our Location </strong></h2>
        <hr />
                    <div ">
                        <h4>Demo Purpose</h4>
                        <h4><strong>Call:</strong>+91-9569040606,+91-9056500474 </h4>
                        <h4><strong>Email:samaritancare@yahoo.com </strong></h4>
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
         &copy 2016 getinpark.in | All Rights Reserved 
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
