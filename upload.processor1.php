<?php  

$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);

$uploadsDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . 'images/';


$uploadForm = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'confirm_foods.php';


$uploadSuccess = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'upload.success.php';


$fieldname = 'file';


// Now let's deal with the upload

// possible PHP upload errors
$errors = array(1 => 'php.ini max file size exceeded', 
                2 => 'html form max file size exceeded', 
                3 => 'file upload was only partial', 
                4 => 'no file was attached');

// check the upload form was actually submitted else print form
isset($_POST['submit'])
	or error('the upload form is neaded', $uploadForm);

// check for standard uploading errors
($_FILES[$fieldname]['error'] == 0)
	or error($errors[$_FILES[$fieldname]['error']], $uploadForm);
	
// check that the file we are working on really was an HTTP upload
@is_uploaded_file($_FILES[$fieldname]['tmp_name'])
	or error('not an HTTP upload', $uploadForm);
	
// validation... since this is an image upload script we 
// should run a check to make sure the upload is an image
@getimagesize($_FILES[$fieldname]['tmp_name'])
	or error('only image uploads are allowed', $uploadForm);
	
// make a unique filename for the uploaded file and check it is 
// not taken... if it is keep trying until we find a vacant one
$now = time();
while(file_exists($uploadFilename = $uploadsDirectory.$now.'-'.$_FILES[$fieldname]['name']))
{
	$now++;
}


@move_uploaded_file($_FILES[$fieldname]['tmp_name'], $uploadFilename)
	or error('receiving directory insuffiecient permission', $uploadForm);

//header('Location: ' . $uploadSuccess);

function error($error, $location, $seconds = 5)
{
	header("Refresh: $seconds; URL=\"$location\"");
	echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"'."\n".
	'"http://www.w3.org/TR/html4/strict.dtd">'."\n\n".
	'<html lang="en">'."\n".
	'	<head>'."\n".
	'		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">'."\n\n".
	'		<link rel="stylesheet" type="text/css" href="stylesheet.css">'."\n\n".
	'	<title>Upload error</title>'."\n\n".
	'	</head>'."\n\n".
	'	<body>'."\n\n".
	'	<div id="Upload">'."\n\n".
	'		<h1>Upload failure</h1>'."\n\n".
	'		<p>An error has occured: '."\n\n".
	'		<span class="red">' . $error . '...</span>'."\n\n".
	'	 	The upload form is reloading</p>'."\n\n".
	'	 </div>'."\n\n".
	'</html>';
	exit;
} 






$con=mysqli_connect("localhost","nilwalaw_emark","32432sdcfsdF","nilwalaw_emark");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


 $file1 = $now.'-'.$_FILES[$fieldname]['name'];
$pname = mysqli_real_escape_string($con, $_POST['txtname']);
$cat = mysqli_real_escape_string($con, $_POST['txtcat']);
$desc = mysqli_real_escape_string($con, $_POST['txtdesc']);
$price = mysqli_real_escape_string($con, $_POST['txtprice']);
//$bcode = mysqli_real_escape_string($con, $_POST['txtbcode']);

$sql="INSERT INTO promotions(name,product,description,category,image)
	VALUES('$pname','$price','$desc','$cat','$file1')";



if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}


header('Location: add_promotion.php');


mysqli_close($con);

?>