<?php
$q = ($_GET['q']);

$con=mysql_connect('localhost','root','phpMyAdmin','');
if(!$con)
echo "stop";
mysql_select_db('video');

$sql="SELECT * FROM login WHERE first='$q'"; //select all values to retrun to form.php as to show ajax details..

$result=mysql_query($sql,$con);

//Ajax will return a table ..
echo "<table border='1'>
<tr>
<th>Employee first Name</th>
<th>Employee last Name</th>
<th>E mail</th>
</tr>";

if($row = mysql_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['first'] . "</td>";
 echo "<td>" . $row['last'] . "</td>";
  echo "<td>" . $row['mail'] . "</td>";
  echo "</tr>";
}
echo "</table>";

//set session varialbe to send video only to selected candidate...
session_start();
$_SESSION['ename']=$row['first'];
$_SESSION['gmail']=$row['mail'];

//echo $_SESSION['username'];
//echo $_SESSION['email'];

mysql_close($con);
?>