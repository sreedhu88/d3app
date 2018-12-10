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

echo "<h4 align=right>Welcome User </h4>";
?>
<div id="wrapper">

<h2 style="text-align:left;float:left;"><a href='D3Template.docx' target='_Blank'><u>Download D3 Template</u></a></h2>
<h2 style="text-align:right;float:right;"><a href='D3Guidelines.pdf' target='_Blank'><u>D3 Guidelines</u></a></h2>
<hr style="clear:both;"/>
</div>

<?php
echo"

<form method='post' enctype='multipart/form-data'>";
$r=0;
if($r){
	
$myfile = fopen("InputD3.txt", "r") or die ("Not made any doc uploads");;

echo"<table align=center border=1 cellpadding=2 cellspacing=2>
<tr><th>Name  <th>FileName  <th>Title <th> Description";
while(!feof($myfile)) {
$value=fgets($myfile);
if ($value!=""){

$val=explode('#',$value);
if($val[0] ==$username){
	
echo "<tr><td>$val[0] <td>$val[1] <td>$val[2]<td>$val[3]</tr>";


}
}
}
echo"</table></font>";
fclose($myfile);

echo "<hr><center><b>Thanks for submitting the idea. We shall get back to you soon!<b></center>";
}
	
else{

echo"<br>
<h4 align=center>Name the document with your employee id before you upload. eg. 152245.docx</h4>
<table align=center border=1>
<tr><td>Team Name<td><input type=text name=t1 size=38></tr>
<tr><td>Description [if any can be provided]<td><textarea name=t2 rows=5 cols=40>Fill in details here...</textarea></tr>

<tr><td>Select the doc to upload:[DOCX]<td><input type='file' name='fileToUpload' id='fileToUpload'></tr>

<tr align=center><td colspan=2 style=text-align:center><input type='submit' value='Upload Idea' name='submit' ></tr>
</table>
</form>
<br>

";
}
}	

?>

<?php
if(isset($_POST["submit"])) {
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_fileloc = basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$titles=$_POST['t1'];
$descrip=$_POST['t2'];


// Check if image file is a actual image or fake image

   // $check = getfilessize($_FILES["fileToUpload"]["tmp_name"]);
	$check="true";
	
//submit to file
//$na1=$_POST['n1'];
$na1=$username;
#$ea1=$_POST['e1'];
#$ra1=$_POST['r1'];
#$ua1=$_POST['u1'];
	
$data="$na1#$target_fileloc#$titles#$descrip\n";
$FH=fopen("InputD3.txt","at");        
fwrite($FH,$data);
fclose($FH);

	
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
		echo "<h5 align=left>File is uploaded successfully!</h5>";
        $uploadOk = 1;
    } 
	else {
        //echo "File is not an image.";
		echo "<h5 align=left>File is not uploaded properly!</h5>";
        $uploadOk = 0;
    }

/* Check if file already exists
if (file_exists($target_file)) {
    echo "<h5 align=left>Sorry, file already exists.</h5>";
    $uploadOk = 0;
}
*/
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000000) {
    echo "<h5 align=left>Sorry, your file is too large.</h5>";
    $uploadOk = 0;
}
/* Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
	
}
*/

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<h5 align=left>Sorry, your file was not uploaded.</h5>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<h5 align=left>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</h5>";
    } else {
        echo "<h5 align=left>Sorry, there was an error uploading your file.</h5>";
    }

}
}
?>


</body>
<br><br>

<h4 align=center> Copyright &copy; 2018 | SOUL | Infosys Limited </h4>
</html>

