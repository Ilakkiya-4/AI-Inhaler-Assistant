<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];
$uq1=mysqli_query($connect,"select * from inhaler_data where uname='$uname'");
$ur=mysqli_fetch_array($uq1);
$bcode=$ur['bcode'];	

if(isset($btn3))
{
mysqli_query($connect,"delete from inhaler_det where bcode='$bcode'");
?>
<script language="javascript">
window.location.href="home.php";
</script>
<?php
}		

if(isset($btn1))
{
mysqli_query($connect,"update  inhaler_data set status='start' where uname='$uname'");
?>
<script language="javascript">
window.location.href="home.php";
</script>
<?php
}
if(isset($btn2))
{
mysqli_query($connect,"update  inhaler_data set status='stop' where uname='$uname'");
?>
<script language="javascript">
window.location.href="home.php";
</script>
<?php
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<style>
body{
margin:0;
font-family:Poppins;
background:#f4f7fc;
}

.container{
padding:40px;
}

/* Status Box */
.status-box{
background:white;
padding:20px;
border-radius:10px;
box-shadow:0 5px 15px rgba(0,0,0,0.1);
margin-bottom:20px;
}

button{
padding:10px 20px;
margin-right:10px;
border:none;
border-radius:5px;
cursor:pointer;
font-weight:bold;
}

.start{background:green;color:white;}
.stop{background:red;color:white;}
.del{background:blue;color:white;}

table{
width:100%;
border-collapse:collapse;
background:white;
box-shadow:0 5px 20px rgba(0,0,0,0.1);
}

th,td{
padding:12px;
text-align:center;
border:1px solid #ddd;
}

th{
background:#1e3c72;
color:white;
}
</style>
</head>
<body>

<?php include("top_menu.php"); ?>

<div class="container">


<form method="POST">

<h3 align="center">Received IoT Data</h3>

<p align="center"><iframe align="top" src="page.php" width="100%" height="400" frameborder="0"></iframe></p>

<p align="center"><button type="submit" name="btn3" class="del">Delete All</button></p>

</form>
</div>
</div>

</body>
</html>
