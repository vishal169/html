<html>
<head>
<head>
</head>
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
.style6 {
	font-size: 36px;
	color: #FFFFFF;
}
.style7 {
	font-size: 18px;
	color: #FFFF66;
}
.style8 {
	color: #FFFFFF;
	font-weight: bold;
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
    <td colspan="4" valign="top">
	      <p class="style8">
		  
	<marquee>
	<h2>Welcome
	<?php session_start(); echo $_SESSION['name'];    //moving name on top right cornor..
	?>
	</h2></td>
	</marquee></p>
  </tr>
  <tr><td>
  
<button type="button" onclick="change()">home</button></td>
<td><button type="button" onclick="change1()">upload</button></td>
<td><button type="button" onclick="change2()">logout</button></td>
</div>
</td></tr>
</table>
</body>
</html>
<?php
if(isset($_SESSION['name'])){ ?>	
<html>
<body>
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
</html>

<?php 
// to uploads videos into  db..
$con=mysql_connect('localhost','root','phpMyAdmin','');
if(!$con)
echo "stop";
mysql_select_db('parking');

//file details uploaded in form.php page..
//if files has been uploaded then it will upload the files and if no file is uploaded then it will only show the previous uploaded videos ...

if(isset($_FILES['file1']['name'])){
$name=$_FILES['file1']['name'];
$type=$_FILES['file1']['type'];
$temp=$_FILES['file1']['tmp_name'];

$fn=$_FILES['file2']['name'];
$ftn=$_FILES['file2']['tmp_name'];

$fileinfo=pathinfo($_FILES['file2']['name']);
$fext=$fileinfo['extension'];
$random=rand();

$target_path= "../upload/";
$target_path1 =$target_path.basename( $_FILES['file1']['name']);
$target_path2 =$target_path.basename( $_FILES['file2']['name']);


// for save the content of pic in the db but it didnot work at that time so we just upload pic in db as we did in videos...
/*
$ff=fopen($ftn,'r');
$content=fread($ff,filesize($ftn));
$content=addslashes($content);
fclose($ff);
*/

//move from temp location to specific location..
move_uploaded_file($_FILES['file1']['tmp_name'], $target_path1);
move_uploaded_file($_FILES['file2']['tmp_name'], $target_path2);

$name = addslashes($name);//to avoid name error of file f file name contain extra '/' or other characters...

if(isset($_SESSION['ename'])){
	
$ename=$_SESSION['ename']; //send videos to only member that have been selected in form 
$gmail=$_SESSION['gmail'];

}	
//database table contains videos  with the name of user($ename) whose name has been selected by other members..

$q="INSERT into myvideo	(username,email,name,url,pic,ext) values('$ename','$gmail','$name','$random.$type','$fn','$fext')";
$res=mysql_query($q,$con);

}
//end of uploaded video part...

//now starting of the videos showing part...
//select the videos related with the user who has logged in ..
$name_of=$_SESSION['name'];
$mail_q="select * from login where first='$name_of'";
$mail_res=mysql_query($mail_q,$con);
$run_mail=mysql_fetch_assoc($mail_res);

$eemail=$run_mail['mail'];
$q="select * from myvideo where email='$eemail'";

$res=mysql_query($q,$con);
?>
<body bgcolor="#CCCCCC">
<table width="546" border="0" cellpadding="0" cellspacing="0">

<?php 
while($run=mysql_fetch_assoc($res)){
$i=$run['id'];  // defaul id of sql auto_increment..
$vn=$run['name'];
$vu=$run['url'];
$fn=$run['pic'];
?>
<tr>
<td width="224" height="91" valign="top" >

<a href="view_event.php?video=<?php echo $i ?> ">   <?php //create a image link that on cllick go to player page view1.php?>  
<img src="../upload/<?php echo $fn ?>" width="224"/></a><br>
</td>;
</tr>
<tr>

<?php //here we created the link of the text to same view1 page ?>
<td width="20%" height="91" valign="top"  >
<a href="view_event.php?video=<?php echo $i ?>" > <?php echo $vn."<br>"?> 
</td>
</tr>
</a>
</table></body>
<?php
} //end of while loop.. 
}
else{
header('location:first_page.php');
}
?>