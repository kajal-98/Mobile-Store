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
 
.form1 button{
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
.form1 button:hover,.form button:active{
background: #43A047;
}


</style>
</head>
<body>

<h1 id="h1_header" style="background-color:#154360;color:white" height="50px" width="100%"><center>Online Mobile Store</center></h1><br/><br/>
<form method="post">
	<div>
<table id="first_page_Tabs" style="background-color:black;color:white" border="0" width="100%" height="60px" align="center">
<tr>
<td align="center" width="25%"><a href="Home.php" width="100%">Home</a></td>
<td align="center" width="25%"><a href="aboutus.php" width="100%">About Us</a></td>
<td align="center" width="25%"><a href="register.php" width="100%">Registration</a></td>
<td align="center" width="25%"><a href="login.php" width="100%">Login</a></td>
</tr>
</table>
</div>
<div class="form1">
<center>
<h1 style="color:blue">Admin Login</h1>
<hr>
<font color="white">Enter username:</font><input type="text" placeholder="username" name="uname"><br/><br/>
<font color="white">Enter password:</font><input type="password" placeholder="password" name="pass"><br/><br/>
<button name="btn">Login</button>
</center>
</div>
</form>
<br/>
<br/>
</body>
</html>
<?php
$con=mysqli_connect("localhost","root","") or die(mysqli_error());
$db=mysqli_select_db($con,'mobilestore');
if(isset($_POST['btn']))
{
	$user=$_POST['uname'];
	$pas=$_POST['pass'];
	if(empty($_POST['uname']))
{
echo "<br><center><font color=red; size=4px><b>user Name is mandatory!!!</b></font></center>";
}
if(empty($_POST['pass']))
{
echo "<br><center><font color=red; size=4px><b>password is mandatory!!!</b></font></center>";
}
else
{
	$sql="select * from admin where username='$user' and password='$pas'";
	$result=$con->query($sql);
	if($result->num_rows>0)
	{
				
		while($row=$result->fetch_assoc())
		{
			$u=$row['username'];
			$p=$row['password'];
		}
		if(($user==$u)&&($pas==$p))
		{
			session_start();
				$_SESSION['name']=$u;
			
			echo"Login Successfully";
			header("location:adminHome.php");
		}
		else{
			echo "<br><font color='red'>Login Failed!!!!</font>";
		}
	}
	
}
}
?>
