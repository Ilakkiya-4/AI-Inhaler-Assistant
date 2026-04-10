<?php
include("dbconnect.php");
extract($_REQUEST);
$rdate=date("d-m-Y");
$ch1=mktime(date('H')+5,date('i')+30,date('s'));
$rtime=date('H:i:s',$ch1);

$mq=mysqli_query($connect,"select max(id) from inhaler_det");
$mr=mysqli_fetch_array($mq);
$id=$mr['max(id)']+1;

if($sms=="")
{
$sms=0;
}

$s1=explode("/",$status);
$bcode=$s1[0];

	if($s1[1]!="")
	{
$qry=mysqli_query($connect,"insert into inhaler_det(id,details,sms_st,bcode,rdate,rtime) values($id,'$status','0','$bcode','$rdate','$rtime')");
	}
if($s1[2]=="CROWD ALERT")
{
mysqli_query($connect,"update inhaler_data set status='stop' where bcode='$bcode'");
}

$q1=mysqli_query($connect,"select * from inhaler_data where bcode='$bcode'");
$r1=mysqli_fetch_array($q1);
echo $r1['status']; 
/*if($qry)
{
echo "success";
}
else
{
echo "failed";
}*/

?>