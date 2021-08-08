<html>
<head>
<title>Registration page</title>
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
<td align="center" width="25%"><a href="registrtion.php" width="100%">Registration</a></td>
<td align="center" width="25%"><a href="login.php" width="100%">Login</a></td>
</tr>
</table>
</div>
<div name="form" class="form1">
<center>
<h1><font color="#BB8FCE">Registration Page</font></h1>
<hr>
<font color="white">Enter Fist name:</font><input type="text" placeholder="First name" name="Fname" height="20"><br/><br/>
<font color="white">Enter last name:</font><input type="text" placeholder="Last name" name="Lname" height="20"><br/><br/>
<font color="white">Enter contact number</font>:<input type="text" placeholder="contact" name="contact" height="20"><br/><br/>
<font color="white">Enter city:</font><input type="text" placeholder="city name" name="city" height="20"><br/><br/>
<font color="white">Enter Address:</font><input type="textarea" placeholder="Address" name="add" height="20"><br/><br/>
<font color="white">Enter Email:</font><input type="text" placeholder="Email" name="email" height="20"><br/><br/>
<font color="white">Choose gender:male</font><input type="radio" name="gender" value="M"> <font color="white">Female</font><input type="radio" name="gender" value="F"><br/><br/>
<font color="white">Enter username:</font><input type="text" placeholder="username" name="uname" height="20"><br/><br/>
<font color="white">Enter password:</font><input type="password" placeholder="password" name="pass" height="20"><br/><br/>
<br/><br/>
<button name="reg">Register</button>
</center>
</div>
</form>
</body>
</html>
<?php
$con=mysqli_connect("localhost","root","") or die(mysqli_error());
$db=mysqli_select_db($con,'mobilestore');
$id=0;

if(isset($_POST['reg']))
{
	$fname=$_POST['Fname'];
$lname=$_POST['Lname'];
$cn=$_POST['contact'];
$city=$_POST['city'];
$add=$_POST['add'];
$mail=$_POST['email'];
$un=$_POST['uname'];
$pass=$_POST['pass'];
$gender=$_POST['gender'];


	if(!preg_match('/^[7-9][0-9]{9}+$/',$cn))
{
echo "<br><center><b><font size=4px>Please enter proper age</font></b></center>";
}
if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
{
echo "<br><center><b><font size=4px>Invalid mail format</font></b></center>";
}
if(empty($_POST['Fname']))
{
echo "<br><center><font color=red; size=4px><b>Name is mandatory!!!</b></font></center>";
}
if(empty($_POST['Lname']))
{
echo "<br><center><font color=red; size=4px><b>last name is mandatory!!!</b></font></center>";
}
if(empty($_POST['uname']))
{
echo "<br><center><font color=red; size=4px><b>username is mandatory!!!</b></font></center>";
}
if(empty($_POST['pass']))
{
echo "<br><center><font color=red; size=4px><b>pass is mandatory!!!</b></font></center>";
}
	$id++;
$sql="INSERT INTO user(Fname, Lname, contact_No, username, password, Gender, city, Address, Email) VALUES ('$fname','$lname','$cn','$un','$pass','$gender','$city','$add','$mail')";
if ($con->query($sql) == TRUE) {
   echo"<center>New record created successfully</center>";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
}
?>
