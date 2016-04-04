<?php
 session_start();
if(isset($_SESSION['name'])){
?>
<html>
<head>

<link href="//vjs.zencdn.net/c/video-js.css" rel="stylesheet">
<script src="//vjs.zencdn.net/c/video.js"></script>
</head>
<body>
<body>
<style>
.style1 {
	font-family: "Courier New", Courier, monospace;
	font-size: large;
}
.style2 {
	color: #FFFFFF;
	font-weight: bold;
	font-size: 36px;
	font-family: "Times New Roman", Times, serif;
}
.a{
align:center;
}
div.signin{
align:right;
border:2px;
float:left;
display:inline;
}
</style>
</head>
<body >
<table bgcolor="#0033FF" width="100%" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="142" rowspan="5" valign="top"><img src="images.jpg" width="175" height="129" alt="av" /></td>
    <td width="221"></td>
    <td width="247"></td>
    <td width="238"></td>
    <td width="86"></td>
    <td width="142"></td>
  </tr>
  <tr>
    <td colspan="4" valign="top"><div align="center" class="style1"></div>
    <div align="center" class="style2">COLLEGE TUBE </div></td>
    <td colspan="4" valign="top"> <h2>Welcome <?php  echo $_SESSION['name'];?></h2></td>
  </tr>
  <tr><td>
  
<button type="button" onclick="change()">home</button></td>
<td><button type="button" onclick="change1()">upload</button></td>
<td><button type="button" onclick="change2()">logout</button></td>
</div>
</td></tr>
</table>
</body>

<script>
function change(){
window.location = 'view.php';
}
function change1(){
window.location = 'form.php';
}
function change2(){
window.location = 'logout.php';
}
</script>
</body>
<?php
$con=mysql_connect('localhost','root','phpMyAdmin','');
if(!$con)
echo "stop";
mysql_select_db('video');

 $video=$_GET['video'];  //video id from view to view1 selected..
 
 $q="select * from myvideo where id='$video'";
 
 $res=mysql_query($q,$con);
 $run=mysql_fetch_assoc($res);
 if(!$res)
 echo mysql_error();

 echo $run['name']."<br>";
 $vn=$run['name'];
 //path for download the file..
 $path="../upload/".$vn;
 //echo $path;

 $vu=$run['url'];
 $_SESSION['vn']=$vn;
 
 // player info give the source of file in source tag..
?>
<video id="my_video_1" class="video-js vjs-default-skin"
  controls preload="auto" width="640" height="264"
  poster=""
  data-setup="{}">
 <source src="..\upload\<?php echo $vn ?>" type='video/mp4'/>
</video>
<br>

</body>
</html>
<?php  // to download the video simply give the link of file ..
echo "<a href='$path'>Download</a>";
}
else{
header('location:first.html');}
?>