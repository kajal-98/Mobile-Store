<html>
<head>
<title>ONLINE MOBILE STORE</title>
<link rel="stylesheet" href="style.css">
<style>
#h1_header{
	border-radius:15px;
}
#img{
	border-radius:15px;
}
#first_page_Tabs{
	border-radius:10px;
}
#first_page_Tabs a
{
	
   display: inline-block;
   width: 100%;       /* set to 100% */
   height: 50%;      /* set to 100% */
   margin-bottom: 0.5em;
   padding-top: .6em;
   padding-bottom: .6em;
   color: white;
   border-radius: 10px;
   clear:center;
   float:center;
	font-size:20;
}
 
form button{
font-family: "Roboto", sans-serif;
text-transform: uppercase;
outline: 0;
background: #4CAF50;
width=50;
border: 0;
padding: 15px;
color: #FFFFFF;
font-size: 14px;
cursor: pointer;
}
form button:hover,.form button:active{
background: #43A047;
}
.mainview{
	
	float:left;
	width:100%;
	height:100%;
}
.mainview .leftbox{
	margin-bottom: 0.5em;
   padding-top: .6em;
   padding-bottom: .6em;
   margin:1px;
	float:left;  
    width:29%; 
    height:100%;
	border-radius:10px;
	background-color:white;
}
.mainview .rightbox{
	margin-bottom: 0.5em;
	
   padding-top: .6em;
   padding-bottom: .6em;
	float:right;  
    width:70%; 
    height:100%;
	border-radius:10px;
	background-color:white;
}
</style>
</head>
<body>

<h1 id="h1_header" style="background-color:#154360;color:white" height="20px" width="100%"><center>Online Mobile Store</center></h1><br/><br/>
<?php
session_start();
echo "<h2 style='color:white'>welcome ".$_SESSION['name']."</h2>";
?>
<form method="post" enctype="multipart/form-data">
<table id="first_page_Tabs" style="background-color:black;color:white" border="0" width="100%" height="60px" align="center">
<tr>
<td align="center" width="25%"><a href="adminHome.php" width="100%">Add Product</a></td>
<td align="center" width="25%"><a href="viewp.php" width="100%">view Product</a></td>
<td align="center" width="25%"><a href="viewu.php" width="100%">view Users</a></td>
<td align="center" width="25%"><a href="Home.php" width="100%">Logout</a></td>
</tr>
</table>
<hr>
<div class="maindiv">
<center>
<h1 style="color:#C64E7A ">ADD NEW PRODUCT</h1>
<font color="white">Enter Product Name:</font><input type="text" name="pname"><br><br>
<font color="white">Enter model name:</font><input type="text" name="mname"><br><br>
<font color="white">Entr price:</font><input type="text" name="price"><br><br>
<font color="white">Enter RAM Size:</font><input type="text" name="ram"><br><br>
<font color="white">Enter Storage size:</font><input type="text" name="storage"><br><br>
<font color="white">Enter Description:</font><input type="textarea" name="des"><br><br>
<font color="white">Select Image File to Upload:</font>
    <input type="file" name="file">
	<br><br>
    <input type="submit" name="submit" value="Upload">
	
</center>
</div>
</form>
<br/>
<br/>
</body>
</html>
<?php
// Include the database configuration file
//include 'dbConfig.php';
$statusMsg = '';
$con=mysqli_connect("localhost","root","") or die(mysqli_error());
$db=mysqli_select_db($con,'mobilestore');

// File upload path

/*$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
 */
 
if(isset($_POST["submit"]))
{	if(!empty($_FILES['file']['name'])){
	$targetDir = "C:/xampp/htdocs/mobile_store/MOBILESPIC";
$uploadfile = $targetDir.basename($_FILES["file"]["name"]);
//$targetFilePath = $targetDir . $fileName;
$pname=$_POST['pname'];
$mname=$_POST['mname'];
$price=$_POST['price'];
$ram=$_POST['ram'];
$storage=$_POST['storage'];
$des=$_POST['des'];
    // Allow certain file formats
    /* $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server */
       if( move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)){
		   $fileName="MOBILESPIC/".basename($_FILES["file"]["name"]);
            // Insert image file name into database
            $insert = $con->query("INSERT into mobile (company_name, model_name, price, RAM, storage, Image, Description) VALUES ('$pname','$mname','$price','$ram','$storage','$fileName','$des')");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }
		else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    /* }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    } */
}else{
    $statusMsg = 'Please select a file to upload.';
}

}
// Display status message
echo $statusMsg;
?>
