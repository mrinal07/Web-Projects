<!DOCTYPE html>
<html>
<head>
	<title>RFID</title>
	<meta charset="utf-8">
  
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="js/rs-plugin/css/settings.css" media="screen">
  <link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen">
  <link rel="stylesheet" href="css/flexslider.css" type="text/css">
  <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/style.css">
  <!-- skin -->
  <link rel="stylesheet" href="skin/default.css">
  <link rel="stylesheet" type="text/css" href="mycss/style.css">
  <style type="text/css">
    body{
      background-color: cornflowerblue;      
    }
    i{
      color: snow;
    }
    input[type="text"]:focus,input[type="password"]:focus
  {
    cursor: pointer;
    
    border-color:red;
  }
  </style>

</head>

<body >
 
	
  <div class="navbar navbar-fixed-top"  style="background-color: crimson;">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      	  <span class="fa fa-bars color-white"></span>
        </button>
        <div class="navbar-logo" >
          <a href="index.php"><img src="img/rfid.jpg" alt="" width="100px" height="55px"></a>
        </div>
      </div>

      <div class="navbar-collapse collapse" style=" padding-top: 15px; ">
        <ul class="nav navbar-nav" data-0="margin-top:20px;" data-300="margin-top:5px;">
          <li ><a href="index.php" style="font-size: 17px;"><b>Home</b></a></li>    
          <li class="active"><a href="record.php" style="font-size:   17px;"><b>Student ID</b></a></li>
          <li><a href="parentlogin.php" style="font-size: 17px;"><b>Parent Login</b></a></li>
          <li><a href="adminlogin.php" style="font-size: 17px;"><b>Admin Login</b></a></li>
        </ul>
      </div>
    </div>
  </div><br><br><br><br><br>

  <form method="post">
<?php 

include("connect.php");
session_start();

if(isset($_POST['sub']))
{
$stuid=$_POST['stuid'];
$sel="select * from student where sid='$stuid'";
$res=$con->query($sel);
if(mysqli_num_rows($res) == 0)
      {
  
  }
  else
  {
  $data= mysqli_fetch_assoc($res);
  $sname=$data['sname'];
  $contact=$data['contact'];
  $today=date('Y-m-d');
  date_default_timezone_set("Asia/Kolkata");
  $time=date("h:i:s");
  
  $sq="select * from arrival where sid='$stuid' and date='$today'";
  $rq=$con->query($sq);
  if(mysqli_num_rows($rq)==0)
           {
       $ins="insert into arrival values('$stuid','$sname','$contact','$today','$time','')";
               if(mysqli_query($con,$ins))
            {
           
        //SMS code starts here
$_my_clicksend_username = "mrinal_07";
$_my_clicksend_key = "105BA7BA-BBE4-1EAF-6501-0D0951EC65C5";
 //You *MUST* define the 'to', 'message' and 'senderid'
$to        = $contact;
$message   = "Student Id: ".$stuid."<br>Student Name:".$sname." arrived in campus";
$senderid  = "XYZ";
     $message=urlencode($message);
$to=urlencode($to);
$vars="method=http&username=$_my_clicksend_username&key=$_my_clicksend_key&to=+91" . $to ."&message=" . $message . "&senderid=" . $senderid;  
file_get_contents('https://api-mapper.clicksend.com/http/v2/send.php?method=http&username=mrinal_07&key=105BA7BA-BBE4-1EAF-6501-0D0951EC65C5&to=+91'.$to.'&message='.$message.'&senderid=XYZ');
echo "<script>alert('Intime inserted successfully');</script>";
echo "<script>location.replace('record.php');</script>";
                } 
       }
else
{
$data1= mysqli_fetch_assoc($rq);
$out=$data1['outtime'];
$in=strtotime($data1['intime']);
$time1=strtotime($time);
$diff=($time1-$in)/60;
if($out=='')
{
if($diff > '1')
{
$upd="update arrival set outtime='$time' where sid='$stuid' and date='$today'";
if(mysqli_query($con,$upd))
                   {
                 
      //SMS code starts here
$_my_clicksend_username = "mrinal_07";
$_my_clicksend_key = "105BA7BA-BBE4-1EAF-6501-0D0951EC65C5";
 //You *MUST* define the 'to', 'message' and 'senderid'
$to        = $contact;
$message   = "Student Id: ".$stuid."<br>Student Name:".$sname." arrived in campus";
$senderid  = "XYZ";
     $message=urlencode($message);
$to=urlencode($to);
$vars="method=http&username=$_my_clicksend_username&key=$_my_clicksend_key&to=+91" . $to ."&message=" . $message . "&senderid=" . $senderid;  
file_get_contents('https://api-mapper.clicksend.com/http/v2/send.php?method=http&username=mrinal_07&key=105BA7BA-BBE4-1EAF-6501-0D0951EC65C5&to=+91'.$to.'&message='.$message.'&senderid=XYZ');
echo "<script>alert('Outtime inserted successfully');</script>";
echo "<script>location.replace('record.php');</script>";
                       }  
}
else
    {
echo "<script>alert('Please Try Again after some time');</script>";
echo "<script>location.replace('record.php');</script>";
   }
}
else
{
echo "<script>alert('Please Try Again');</script>";
echo "<script>location.replace('record.php');</script>";
}

}
  }
}

?>

  <form>
  <div id="article">
  	<div ><br><br>
      <label id="a" style="color: black;" >Scan Your ID Card Here</label><br><br><br><br>
       <center>

        <table >
          <tr>
            <td style="width: 600px;"><br><br>
                <i class="fa fa-id-badge fa-4x"  style="float: left; color: black;"></i>        
                <input  type="text" name="sid" value="<?php if(isset($_POST['sid'])) {echo $_POST        [        'sid'];} ?>" style="font-size: 30px; color: black;padding-left: 40px;        padding-right: 40px;margin-left: 15px;width: 400px; margin-left: 20px;" placeholder="ID Card....">
            </td>
            <td style="width:600px;padding-left: 100px;"> 
              <img src="img/icard.png" width="400px" height="250px">              
            </td>
          </tr>
        </table>

    
    <button name="view" type="submit" style="display: none;"></button><br><br><br><br><br>

<?php
 if(isset($_POST['view']))
{
$sid=$_POST['sid'];
$sql5="select * from student where sid='$sid'";
$res = $con->query($sql5);
$row= mysqli_fetch_assoc($res);
if(mysqli_num_rows($res)== 0)
 {
 echo "<table align='center'><tr align='center'><td style='color:red'><b>No data found</b></td></tr></table>";
 }
 else
 {
$name=$row['sname'];
$img=$row['image'];
$branch=$row['branch'];
//$batch=$row['batch'];
$class=$row['class'];
echo"
<input type='hidden' value='".$sid."' name='stuid'>
<table border='0' width='40%'>
<tr>
<td width='20%'>
<img src='images/".$img."' width='100%'>
</td>
<td width='20%'>
<label><b>Student&nbsp;Name:&nbsp;".$name."</b><br>
      <b>Branch&nbsp;&nbsp;: ".$branch."</b><br>
  <b>class&nbsp;: ".$class."&nbsp;"."</b><br>
</label>
</td>
</tr>
<tr align='center'><td colspan='2'>
<button class='w3-btn w3-light-green w3-padding-large' type='submit' name='sub'>
        Submit
       </button>
</td>
</tr>
</table>
";
 }
  }
?>
  </center>
    </div>
</div><br><br><br><br><br><br><br><br>

</form> 

   

<section id="footer" class="section footer">
    <div class="container">
      <div class="row animated opacity mar-bot20" data-andown="fadeIn" data-animation="animation">
        <div class="col-sm-12 align-center">
          <ul class="social-network social-circle">
            <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
            <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
      
      <div class="row align-center copyright">
        <div class="col-sm-12">
          <b><p>This website is develop by PSK </p>
          <p>Copyright &copy; All rights reserved</p></b>
        </div>
      </div>
      
    </div>

  </section>

</body>
</html>