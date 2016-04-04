<?php
$con=mysql_connect('localhost','root','phpMyAdmin','');
if(!$con)
echo "stop";
mysql_select_db('parking');

$fn=$_POST['name'];
$number=$_POST['number'];
$sex=$_POST['s3'];

$pass=$_POST['password'];
$mail=$_POST['email'];

//insert into signup table
$q="insert into sign_up (name,number,password,sex,email) values('$fn','$number','$pass','$sex','$mail')";
$res=mysql_query($q,$con);

//insert into signin table..

$q="insert into enter (email,password) values('$mail','$pass')";
$res=mysql_query($q,$con);

session_start();

$_SESSION['mail']=$name;
//after insertion or sign up go to first_page ans then re enter handle and password..
 header('location:index.html');

?>