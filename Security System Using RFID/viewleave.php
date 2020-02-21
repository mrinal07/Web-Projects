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
  <style type="text/css">
     input[type="text"]:focus,input[type="password"]:focus
  {
    cursor: pointer;
    
    border-color: red;
  }
  .input
  {
    border:3px solid black;
    font-size: 20px;
    padding: 10px 10px;
    border-radius: 15px;
    width: 10%;
    color: black;
    font-weight: bold;
  }
  .input:hover
  {
    font-size: 20px;
    border:3px solid red; 
    width: 10%;       
  }
  label{
    color: black;
    font-size: 25px;
  }
  </style>
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
          <li ><a href="addstu.php" style="font-size: 16px;"><b>Add Student</b></a></li>
          <li ><a href="viewstu.php" style="font-size:   16px;"><b>View Student</b></a></li>          
          <li ><a href="viewarrival.php" style="font-size:   16px;"><b>View Arrival</b></a></li>          
          <li class="active"><a href="viewleave.php" style="font-size:   16px;"><b>View Leave Application</b></a></li>          
          <li ><a href="Logout.php" style="font-size:   16px;" ><b>Logout</b></a></li> 
        </ul>
      </div>
    </div>
  </div><br><br><br><br>

  <form method="post">
  <div id="article"><br>
    
      <center><label id="a" style="color: black;">View Student Leave Details</label><br><br><br><br>

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
            <input class="input" type="date" value="<?php if(isset($_POST['fdate'])){echo $_POST['fdate'];} ?>" name="fdate" placeholder="start" style="color: black;width: 250px; text-align: center;">
          </td>
          <td style="text-align: center;"><br><br>
            <input class="input" type="date" alue="<?php if(isset($_POST['tdate'])){echo $_POST['tdate'];} ?>" name="tdate" placeholder="start" style="color: black;width: 250px; text-align: center;">
          </td>
        </tr>
      </table>
    </center>
    <br><br><br><br><br><br><br>

    <center><input type="submit" name="search" value="Search" class="input"></center>
</div>         
  
  <?php

if(isset($_POST['search']))
{
  
  $fdate=$_POST['fdate'];
  $tdate=$_POST['tdate'];
  $sel="select * from ldetail where  date between '$fdate' and '$tdate'";
  $res=$con->query($sel);
  if(mysqli_num_rows($res)==0)
  {
 echo "<table align='center'><tr align='center'><td style='color:snow;font-size:20px;'><b>No data found</b></td></tr></table>";
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
  <th>Leave Reason</th>
  <th>From Date</th>
      <th>To Date</th>
  <th>Leave Applied Date</th>
 
 
</tr>
   </thead>   ";
  while($data=mysqli_fetch_array($res))
  {
    

 $sid=$data['sid'];
 $sel1="select * from student where sid='$sid'";
            $res1=$con->query($sel1);
$data1=mysqli_fetch_array($res1);
 
 $sname=$data1['sname'];
 $course=$data1['branch'];
 $class=$data1['class'];
 //$batch=$data1['batch'];
 $contact=$data1['contact'];
         $date=$data['date'];
         $leave=$data['ldetail'];
 $fdate=$data['fdate'];
 $tdate=$data['tdate'];
 echo"
   <tbody bgcolor='#f6f6f6'>
     <tr align='center'>
       <td width='5%'>".$sid."</td>
       <td width='10%'>".$sname."</td>
       <td width='10%'>".$leave."</td>
<td width='10%'>".$fdate."</td>
<td width='10%'>".$tdate."</td>
<td width='10%'>".$date."</td>


     </tr>
     
   </tbody>";
  }
  
  }
}
}
?>
</form>




</body>
</html>