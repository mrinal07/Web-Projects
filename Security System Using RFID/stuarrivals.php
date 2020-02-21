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
  <div class="navbar navbar-fixed-top"  style="background-color: darkgreen">
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
          <li class="active"><a href="stuarrivals.php" style="font-size:   17px;"><b>Student Arrivals</b></a></li>
          <li ><a href="leave.php" style="font-size:   17px;"><b>Leave Notification</b></a></li>   
          <li ><a href="pLogout.php" style="font-size:   16px;" ><b>Logout</b></a></li>       
        </ul>
      </div>
    </div>
  </div><br><br><br><br><br><br>

<form method="POST">
  <div id="article">
    <h1 align="center" id="a" style="color: black;">View Student Arrival Detail</h1><br><br><br><br><br><br>
    <center>

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
      </table>
    <br><br><br><br><br><br><br>
  </center>

    <center><input type="submit" name="search" value="Search" style="font-size: 25px;width: 150px;"></center>  
  </div>
</form>
<?php
if(isset($_POST['search']))
{
 
  $fdate=$_POST['fdate'];
  $tdate=$_POST['tdate'];
  $sel="select * from arrival where sid='$sid' and date between '$fdate' and '$tdate' ";
  
  $res=$con->query($sel);
  
  if(mysqli_num_rows($res)==0)
  {
 echo "<table align='center'><tr align='center'><td style='color:red'><b>No data found</b></td></tr></table>";
  }
  else
  {
  echo"
  <div class='w3-container'>
  <table class='w3-table-all w3-hoverable' border='1' cellspacing='0' cellpadding='0' width='95%' >
  <thead>
       <tr class='w3-light-green'>
  <th>Stu_Id</th>
  <th>Stu_Name</th>
  <th>Branch</th>

  <th>Class</th>
  <th>Contact</th>
  <th>Date</th>
  <th>In-Time</th>
  <th>Out-Time</th>
 
</tr>
   </thead>   ";
  while($data=mysqli_fetch_array($res))
  {
    $sel1="select * from student where sid='$sid' ";
            $res1=$con->query($sel1);
$data1=mysqli_fetch_array($res1);

 $sid=$data['sid'];
 $sname=$data['sname'];
 $branch=$data1['branch'];
 $class=$data1['class'];
 //$batch=$data1['batch'];
 $contact=$data['contact'];
 $date=$data['date'];
 $intime=$data['intime'];
 $outtime=$data['outtime'];
 echo"
   <tbody bgcolor='#f6f6f6'>
     <tr align='center'>
       <td width='5%'>".$sid."</td>
       <td width='10%'>".$sname."</td>
       <td width='10%'>".$branch."</td>

<td width='10%'>".$class."</td>
<td width='10%'>".$contact."</td>
<td width='10%'>".$date."</td>
<td width='10%'>".$intime."</td>
<td width='10%'>".$outtime."</td>

     </tr>
     
   </tbody>";
  }
  
  }
}
}
?> 


</body>
</html>