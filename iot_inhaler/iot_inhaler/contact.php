<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];
$uq1=mysqli_query($connect,"select * from inhaler_data where uname='$uname'");
$ur=mysqli_fetch_array($uq1);
$bcode=$ur['bcode'];	




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

<?php
if(isset($btn))
{
mysqli_query($connect,"update  inhaler_data set mobile='$mobile',temp='$temp',humidity='$humidity' where uname='$uname'");
?>
<span style="color:#003399">Updated..</span>
<script>
//Using setTimeout to execute a function after 5 seconds.
setTimeout(function () {
   //Redirect with JavaScript
   window.location.href= 'contact.php';
}, 2000);
</script>
<?php
}
?>

<form method="POST">
<p align="center">Mobile No. <input type="text" name="mobile" maxlength="10" value="<?php echo $ur['mobile']; ?>" /></p>
<p align="center">Temperature Above <input type="text" name="temp" value="<?php echo $ur['temp']; ?>" /></p>

<p align="center">Humidity Above <input type="text" name="humidity" maxlength="10" value="<?php echo $ur['humidity']; ?>" /></p>
<p align="center"><button type="submit" name="btn" class="del">Update</button></p>

</form>
</div>
</div>

</body>
</html>
