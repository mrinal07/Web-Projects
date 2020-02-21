<?php
session_start();
$aid= $_SESSION['aid'];
if(empty($aid))
{
echo "<script>window.location.href='adminlogin.php'</script>";
}
else
{
include('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="js/rs-plugin/css/settings.css" media="screen">
  <link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen">
  <link rel="stylesheet" href="css/flexslider.css" type="text/css">
  <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700">

  <link rel="stylesheet" href="css/style.css">
  <!-- skin -->
  <link rel="stylesheet" href="skin/default.css">
  <link rel="stylesheet" type="text/css" href="mycss/style.css">
</head>
<body style="background-color:yellowgreen;">
    
  <div class="navbar navbar-fixed-top"  style="background-color: darkgreen;">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="fa fa-bars color-white"></span>
        </button>
        <div class="navbar-logo" >
          <a href="index.php"><img src="img/rfid.jpg" alt="" width="100px" height="55px"></a>
        </div>
      </div>
      <div class="navbar-collapse collapse"  style=" padding-top: 15px; ">
        <ul class="nav navbar-nav" data-0="margin-top:20px;" data-300="margin-top:5px;">
          <li ><a href="addclass.php" style="font-size: 16px;"><b>Add Branch</b></a></li>
          <li><a href="addstu.php" style="font-size: 16px;"><b>Add Student</b></a></li>
          <li class="active"><a href="viewstu.php" style="font-size:   16px;"><b>View Student</b></a></li>          
          <li ><a href="viewarrival.php" style="font-size:   16px;"><b>View Arrival</b></a></li>          
          <li ><a href="viewleave.php" style="font-size:   16px;"><b>View Leave Application</b></a></li>     
          <li ><a href="Logout.php" style="font-size:   16px;" ><b>Logout</b></a></li>      
        </ul>
      </div>
    </div>
  </div><br><br><br><br><br><br>
<center>
  <form method='POST'>
<div class="w3-padding-large" id="main">
<div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about"  style='width:90%'>
   <center>
  <h2 id="a" style="color:black;">View Student Details</h2><br><br>
  <center>    
  <?php
  $sel="select * from student";
  $res=$con->query($sel);
  if(mysqli_num_rows($res)==0)
  {
 echo "<table align='center'><tr align='center'><td style='color:red'><b>No data found</b></td></tr></table>";
  }

  else
  {
  echo"
  <div >
  <table  border='1'  cellspacing='0' cellpadding='10' width='100%' >
  <thead>
       <tr style='background-color:teal;color:white;'>

  <th style='font-size:25px;font-family:times;'>Stu_Id</th>
  <th style='font-size:25px;font-family:times;'>Stu_Name</th>
  <th style='font-size:25px;font-family:times;'>Branch</th>
 
 <th style='font-size:25px;font-family:times;'>Class</th>
 <th style='font-size:25px;font-family:times;'>Image</th>
     <th style='font-size:25px;font-family:times;' >Address</th>
 <th style='font-size:25px;font-family:times;'>Parent</th>
 <th style='font-size:25px;font-family:times;'>Contact</th>
 <th style='font-size:25px;font-family:times;'>Update</th>
  <th style='font-size:25px;font-family:times;'>Delete</th>
</tr>
   </thead>   ";
  while($data=mysqli_fetch_array($res))
  {
 $sid=$data['sid'];
 $sname=$data['sname'];
 $branch=$data['branch'];
 $class=$data['class'];
 //$batch=$data['batch'];
 $image=$data['image'];
         $contact=$data['contact'];
         $address=$data['address'];
 $pname=$data['pname'];
 echo"
   <tbody bgcolor='#f6f6f6'>
     <tr align='center'>
       <td width='5%'>".$sid."</td>
       <td width='10%'>".$sname."</td>
       <td width='10%'>".$branch."</td>

<td width='10%'>".$class."</td>
<td width='10%'><img src='".$image."' width='50px'></td>
<td width='50%'>".$address."</td>
<td width='10%'>".$pname."</td>
<td width='10%'>".$contact."</td>
<td width='5%'>
<a href='updatestu.php?sid=".$sid."' style='font-weight:bold;color:blue'>
        Update
       </a>
</td>
<td width='5%'>
<a href='deletestu.php?sid=".$sid."' style='font-weight:bold;color:blue'>
        Delete
       </a>
</td>
     </tr>
     
   </tbody>";
  }
  
  }
  ?>
  </table>
  </div>
  </div>
  </div>
</center>
  </form>
  <?php
} 
?>
</body>
</html>