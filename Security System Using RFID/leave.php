<?php
session_start();
$sid= $_SESSION['sid'];
if(empty($sid))
{
echo "<script>window.location.href='parentlogin.php'</script>";
}
else
{
//include('parentmenu.php');
include('connect.php');
$sid=$_SESSION['sid'];


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
  <style type="text/css">
       input
  {
    border:3px solid black;
    font-size: 20px;
    border-radius: 15px;
    width: 15%;
    color: black;
    font-weight: bold;
  }
  input:hover
  {
    border:3px solid red; 
    width: 15%;       
  }
  </style>
</head>
<body style="background-color: yellowgreen;">
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
          <li ><a href="studentinfo.php" style="font-size: 17px;"><b>Student Profile</b></a></li>
          <li><a href="stuarrivals.php" style="font-size:   17px;"><b>Student Arrivals</b></a></li>
          <li class="active"><a href="leave.php" style="font-size:   17px;"><b>Leave Notification</b></a></li> 
          <li ><a href="pLogout.php" style="font-size:   16px;" ><b>Logout</b></a></li>         
        </ul>
      </div>
    </div>
  </div><br><br><br><br><br><br>

  <form method="POST">
  <div id="article">
    <h1 align="center" id="a" style="color: black;">Leave Application</h1><br><br><br>
    <center>
      <label style="color: black;">Enter Your Leave Reason</label><br><br>
    
    <textarea style="width: 400px;height: 120px;font-size: 20px;color: black;border:3px solid black;" name="leave"></textarea><br>
    
    <table >
        <tr>
          <td style="width: 400px;text-align: center;">
            <label style="color: black;">Enter Start Date:</label>
          </td>
          <td style="width: 400px;text-align: center;">
            <label style="color: black;">Enter End Date:</label>
          </td>
        </tr>
        <tr >
          <td style="text-align: center;"><br><br>
            <input type="date" value="<?php if(isset($_POST['fdate'])){echo $_POST['fdate'];} ?>" name="fdate" placeholder="start" style="color: black;width: 250px;text-align: center;">
          </td>
          <td style="text-align: center;"><br><br>
            <input type="date" alue="<?php if(isset($_POST['tdate'])){echo $_POST['tdate'];} ?>" name="tdate" placeholder="start" style="color: black;width: 250px;text-align: center;">
          </td>
        </tr>
      </table><br><br><br>

      <input type="submit" name="sub" value="Submit" style="font-size: 25px;width: 150px;">
    </center>  
  </div>
</form>
<?php

    if(isset($_POST['sub']))
    {

      $msg=$_POST['leave'];
      $start=$_POST['fdate'];
      $end=$_POST['tdate'];
      $date=date('Y-m-d');

      $sql="Insert into ldetail values('$sid','$msg','$start','$end',
      '$date')";


      if (mysqli_query($con,$sql)) {
        echo "<script>alert('SUCCESSFULLY');</script>";
      }
      

    }

}
?>


</body>
</html>