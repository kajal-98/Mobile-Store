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
echo "<h2 style='color:white'>welcome ".$_SESSION['uname1']."</h2>";

?>
<form method="post">
<table id="first_page_Tabs" style="background-color:black;color:white" border="0" width="100%" height="60px" align="center">
<tr>
<td align="center" width="50%"><a href="userHome.php" width="100%">View Company</a></td>
<td align="center" width="50%"><a href="Home.php" width="100%">Logout</a></td>
</tr>
</table>
<hr>
<div class="mainview">
	<center><h1>Choose Mobile Company</h1></center><br/>
	<div class="leftbox">
	<center style="height=:20px;width:50%">
	<select name="com_type" style="height=:100px;width:50%">
	<option value="mi">mi</option>
	<option value="OPPO">OPPO</option>
	<option value="VIVO">VIVO</option>
	<option value="ASUS">ASUS</option>
	<option value="SAMSUNG">SAMSUNG</option>
	</select><br/><br/>
	<button name="details">Get Details</button>
	</center>
	</div>
<div class="rightbox">
<table id="second_page_Tabs" style="color:white" border="1" width="100%" height="60px" align="center" border="1">
<tr>
<?php

$con=mysqli_connect("localhost","root","") or die(mysqli_error());
$db=mysqli_select_db($con,'mobilestore');
if(isset($_POST['details']))
{
	
	$tb=$_POST['com_type'];
		/* $image_array = array("MOBILESPIC/MiA2.png","MOBILESPIC/MiA3.png" );
		$image_rand  = array_rand($image_array, 2); */
		$result=$con->query("SELECT * FROM mobile WHERE company_name='$tb'");
		while($row=mysqli_fetch_array($result)){
			$pid=$row['pid'];
			$image=
			echo $_SESSION['pid']."<br>";
?>

	
		<td><center> <?php echo '<a href="uDetails.php"><img src='.$row['Image'].' width="50px" height="100px"></a>';
if(isset($row['Image']))		
		$_SESSION['pid']=$row['pid'];
			echo $_SESSION['pid']."<br>";?></center></td>	

	
	<?php
		}	
}
?>
	</tr>
</table>
</div>
</div>
</form>
<br/>
<br/>
</body>
</html>
