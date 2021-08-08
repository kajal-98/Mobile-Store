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
if(isset($_SESSION['id']))
{
	echo $_SESSION['id'];
}
else
{
	echo "problem";
}


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
<table id="second_page_Tabs" style="color:white" border="1" width="100%" height="60px" align="center" border="1">
<tr>
<?php
$con=mysqli_connect("localhost","root","") or die(mysqli_error());
$db=mysqli_select_db($con,'mobilestore');

		/* $image_array = array("MOBILESPIC/MiA2.png","MOBILESPIC/MiA3.png" );
		$image_rand  = array_rand($image_array, 2); */
		$result=$con->query("SELECT * FROM mobile WHERE pid='$_SESSION['id']'");
		while($row=mysqli_fetch_array($result)){
					
?>

	
		<td><center> <?php 
		echo '<img src='.$row['Image'].' width="50px" height="100px">';
		echo $row['company_name'];		
		echo $row['model_name'];
		echo $row['price'];
		echo $row['RAM'];
		echo $row['storage'];
		echo $row['Description'];
				 ?></center>
		 
		</td>	

	
	<?php
		}	
	
?>
	</tr>
</table>
	
</div>
</form>
<br/>
<br/>
</body>
</html>