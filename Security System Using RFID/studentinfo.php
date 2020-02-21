<?php
session_start();
include('connect.php');

if(empty($_SESSION['sid']))
{
echo "<script>window.location.href='parentlogin.php'</script>";
}
else
{
    
include("connect.php");
$sid=$_SESSION['sid'];

$pro="select * from student where sid='$sid'";
$prof=$con->query($pro);
       $pr = mysqli_fetch_array($prof);

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
          <li class="active"><a href="studentinfo.php" style="font-size: 17px;"><b>Student Profile</b></a></li>
          <li><a href="stuarrivals.php" style="font-size:   17px;"><b>Student Arrivals</b></a></li>
          <li ><a href="leave.php" style="font-size:   17px;"><b>Leave Notification</b></a></li>     
          <li ><a href="pLogout.php" style="font-size:   16px;" ><b>Logout</b></a></li>     
        </ul>
      </div>
    </div>
  </div><br><br><br><br><br><br>
  <center>
  <form method="post">
    <div class="w3-padding-large"  class="article"> 
<div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about"  style='width:90%'>
   
  <h2 style="color:black;" id="a">View Student Details</h2>
   <br><br><br><br>

    <table class='w3-table-all w3-hoverable' border='2' cellspacing='0' cellpadding='0' width='100%' align='center'>
  <thead>
  <tr style='background-color:darkblue;color:white;'>
  <th style='font-size:25px;font-family:times;' colspan='5' align='center'> <?php echo $pr['sname']; ?>
  </th></tr>

   <tr>
    <th colspan="1"><img src="img/<?php echo $pr['image'] ?>"> </th>
   <td colspan="2" style="font-size: 25px;"><?php echo $pr['sname']; ?> </td>
   </tr>

       <tr >
  <th style='font-size:25px;font-family:times;' colspan='2'>Branch</th>
  <td style='font-size:25px;font-family:times;' colspan='3'><?php echo $pr['branch'];?> </td></tr>

  <tr>
  <th style='font-size:25px;font-family:times;' colspan='2'>Class</th> 
 <th style='font-size:25px;font-family:times;' colspan='3'><?php echo $pr['class'];?></th></tr>
 <tr>
  
  <th style='font-size:25px;font-family:times;' colspan='2'>Email</th> 
 <th style='font-size:25px;font-family:times;' colspan='3'> <?php echo $pr['email'];?></th></tr>
 <tr>
  <th style='font-size:25px;font-family:times;' colspan='2'>Contact</th> 
 <th style='font-size:25px;font-family:times;' colspan='3'><?php echo $pr['contact'];?></th></tr>
 <tr>
  <th style='font-size:25px;font-family:times;' colspan='2'>Address</th> 
 <th style='font-size:25px;font-family:times;' colspan='3'> <?php echo $pr['address'];?></th></tr>
 <tr>
  <th style='font-size:25px;font-family:times;' colspan='2'>Parent Name</th> 
 <th style='font-size:25px;font-family:times;' colspan='3'><?php echo $pr['pname'];?></th></tr>
   </thead> 
  </table>
 
  </div>
  </div>
  </form>
<?php
}
?>
</center>
</body>
</html>