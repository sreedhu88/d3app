<html lang="en">
<head>
    <meta charset="utf-8">
    <title>D3 - SOUL</title>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
   <link rel="stylesheet" type="text/css" href="style.css">
	
	
 <style>
a {
    text-decoration: none;
}
body {
	font-family: Rubik;
    color: blue;
}
h1,h2{
	font-family: Rubik;
	color: Black;
}
h3,h4,h5 {
	font-family: Rubik;
    color: green;
}


thead th, tfoot th {
  font-family: 'Rock Salt', cursive;
}

th {
	text-align: left;
	font-style:bold;
  letter-spacing: 2px;
}

td {
  letter-spacing: 1px;
 
}

tbody td {
  text-align: left;
}

tfoot th {
  text-align: left;
}

</style>

</head>
<body>

<img src='D3.png' width=100% height=50%>
<?php
error_reporting(0);
$user=explode('\\',$_SERVER['REMOTE_USER']);
$username=$user[1];
session_start();
$_SESSION['validuser']=$username;
echo "<h4 align=right>Welcome $username </h4>";
?>
<div id="wrapper">

<h2 style="text-align:left;float:left;"><a href='D3Template.docx' target='_Blank'><u>Download D3 Template</u></a></h2>
<h2 style="text-align:right;float:right;"><a href='D3Guidelines.pdf' target='_Blank'><u>D3 Guidelines</u></a></h2>
<hr style="clear:both;"/>
</div>


	
	
<?php

if((strtolower($username)=='sreedhu_krishnan')||(strtolower($username)=='sulthana_kabeer')||(strtolower($username)=='silpa_thomas')||(strtolower($username)=='reena_reji')||(strtolower($username)=='preeti_mohan')){

echo"

<form method='post' enctype='multipart/form-data'>";


$con=mysqli_connect("localhost","root","","ditvm");
if(mysqli_connect_errno($con))
{
echo "Failed to connect to MySQL:".mysqli_connect_error();
}
else
{
$query=mysqli_query($con,"select * from sould3");
$r=mysqli_fetch_row($query);

if($r){
	
$myfile = fopen("../InputD3.txt", "r") or die ("Not made any doc uploads");;

echo"<table align=center border=1 cellpadding=2 cellspacing=2>
<tr><th>Name  <th>FileName  <th>Title <th> Description<th>D3 Idea";
while(!feof($myfile)) {
$value=fgets($myfile);
if ($value!=""){

$val=explode('#',$value);
if($val[0]){
	
echo "<tr><td>$val[0] <td>$val[1] <td>$val[2]<td>$val[3]<td><a href='../uploads/$val[1]'>Click to Download</a></tr>";


}
}
}
echo"</table></font>";
fclose($myfile);


	
}
}
}
else {
	echo "Access denied!";
	echo '<script>
	location.replace("../");
	</script>';
}	
?>


</body>
<br><br>

<h4 align=center> Copyright &copy; 2018 | SOUL | Infosys Limited </h4>
</html>

