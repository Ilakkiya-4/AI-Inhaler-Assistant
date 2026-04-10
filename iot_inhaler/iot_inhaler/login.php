<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
$msg="";
	if(isset($btn))
	{
		$q1=mysqli_query($connect,"select * from inhaler_data where uname='$uname' && pass='$pass' ");
			$n1=mysqli_num_rows($q1);
				if($n1==1)
				{
				$_SESSION['uname']=$uname;
				header("location:home.php");
				}
				else
				{
				
				$msg="Invalid Username or Password!";
				}
	}
	
	
	
?>
<html>
<head>
<title>IoT Smart Inhaler Login</title>

<style>

body{
    margin:0;
    font-family: Arial, Helvetica, sans-serif;
    background:#f0f7ff;
}

/* Header */
.header{
    background:#2a7cc7;
    color:white;
    padding:18px;
    text-align:center;
    font-size:26px;
    font-weight:bold;
}

/* Login box */
.login-box{
    width:350px;
    margin:90px auto;
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0px 4px 10px rgba(0,0,0,0.2);
}

/* Title */
.login-box h2{
    text-align:center;
    color:#2a7cc7;
    margin-bottom:20px;
}

/* Input */
input[type=text], input[type=password]{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:1px solid #ccc;
    border-radius:5px;
}

/* Button */
button{
    width:100%;
    padding:12px;
    background:#2a7cc7;
    border:none;
    color:white;
    font-size:16px;
    border-radius:5px;
    cursor:pointer;
}

button:hover{
    background:#1f5fa5;
}

/* Footer */
.footer{
    text-align:center;
    margin-top:20px;
    font-size:13px;
    color:#555;
}

</style>

</head>

<body>

<div class="header">
IoT Smart Inhaler Monitoring System
</div>

<div class="login-box">

<h2>Login</h2>

<form method="post">

<label>Username</label> <input type="text" name="uname" placeholder="Enter Username">

<label>Password</label> <input type="password" name="pass" placeholder="Enter Password">

<button type="submit" name="btn">Login</button>

</form>

<div class="footer">
Doctor / Admin Access
</div>

</div>

</body>
</html>
