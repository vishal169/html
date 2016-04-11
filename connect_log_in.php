<?php

$con=mysql_connect('localhost','root','parkingboysmaur','');
if(!$con) 
echo "stop";
mysql_select_db('parking');

$email=$_POST['e-mail'];
$pass=$_POST['pass_log'];

//matching query ogf username and password
$q="select * from enter where email='$email'&& password='$pass'";

$res=mysql_query($q,$con);
if(!$res)
echo "errors".mysql_error();

//$res has some value or >0 

if($run=mysql_fetch_assoc($res)){
$email=$run['e-mail'];
session_start();
$_SESSION['id']=session_id();
$_SESSION['mail']=$email;
//if match usrname and password go to view page and set session variable....
header('location:events.php');
}
else{
echo "signup first ";
//else go to first_page and reenter correct username and password..
header('location:index.html');
}
//if(count($res))
echo "$ln";
?>
