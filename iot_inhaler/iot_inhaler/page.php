<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];
$uq1=mysqli_query($connect,"select * from inhaler_data where uname='$uname'");
$ur=mysqli_fetch_array($uq1);
$bcode=$ur['bcode'];	
$mobile=$ur['mobile'];

$temp=$ur['temp'];
$humidity=$ur['humidity'];
?>

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
<?php
$q11=mysqli_query($connect,"select * from inhaler_det where sms_st=0 order by id desc");
$n11=mysqli_num_rows($q11);
if($n11>0)
{
$r11=mysqli_fetch_array($q11);
$ss=explode("/",$r11['details']);

mysqli_query($connect,"update inhaler_det set sms_st=1 where id='".$r11['id']."'");
	
	if($ss['1']>$temp)
	{
		
		$message="High Temperature";
		mysqli_query($connect,"update inhaler_det set sms_st=1 where id='".$r11['id']."'");
			
			?>
			<script language="javascript">
			window.open("http://iotcloud.co.in/testsms/sms.php?sms=emr&name=Guardian&mess=<?php echo $message; ?>&mobile=<?php echo $mobile; ?>","sms");
			</script>
			 <h3 align="center" style="color:#003399"><?php echo $message; ?></h3>
			<?php
			
	}//notifi
	if($ss['2']>$humidity)
	{
		
		$message="High Humidity";
		mysqli_query($connect,"update inhaler_det set sms_st=1 where id='".$r11['id']."'");
			
			?>
			<script language="javascript">
			window.open("http://iotcloud.co.in/testsms/sms.php?sms=emr&name=Guardian&mess=<?php echo $message; ?>&mobile=<?php echo $mobile; ?>","sms");
			</script>
			 <h3 align="center" style="color:#003399"><?php echo $message; ?></h3>
			<?php
			
	}//notifi
}
?>
<?php
$qry=mysqli_query($connect,"select * from inhaler_det where bcode='$bcode' order by id desc");
	$num=mysqli_num_rows($qry);
if($num>0)
{
$i=0;
?>

<table>
<tr>
<th>ID</th>
<th>Temperature</th>
<th>Humidity</th>
<th>Latitude</th>
<th>Longitude</th>
<th>Date & Time</th>
</tr>

<?php while($row=mysqli_fetch_array($qry)){ 

$i++;
$ss=explode("/",$row['details']);
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $ss[1]; ?></td>
<td><?php echo $ss[2]; ?></td>
<td><?php echo $ss[3]; ?></td>
<td><?php echo $ss[4]; ?></td>


<td><?php echo $row['rdate']." ".$row['rtime']; ?></td>
</tr>
<?php } ?>

</table>
<?php
}
?>
</div>

<script>
//Using setTimeout to execute a function after 5 seconds.
setTimeout(function () {
   //Redirect with JavaScript
   window.location.href= 'page.php';
}, 7000);
</script>