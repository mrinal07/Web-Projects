<?php
include("connect.php");
$sid=$_GET['sid'];
$sql="Delete from student where sid='$sid'";

if(mysqli_query($con,$sql))
{
echo "<script>alert('Delete Successfully');</script>";
echo "<script>location.replace('viewstu.php')</script>" ;

}
else
{
echo "<script>alert('Delete Unsuccessfully');</script>";
}
?>