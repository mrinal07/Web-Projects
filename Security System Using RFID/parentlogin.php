<?php session_start(); ?>
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
    body{
      background-color: cornflowerblue;
    }
    input[type="text"]:focus,input[type="password"]:focus
  {
    cursor: pointer;
    
    border-color:red;
  }
  .input
  {
    border:3px solid black;
    font-size: 25px;
    padding: 10px 10px;
    border-radius: 15px;
    width: 10%;
    color: black;
    font-weight: bold;
  }
  .input:hover
  {
    border:3px solid red; 
    width: 10%;       
  }
  label
  {
    color: black;
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
          <li ><a href="record.php" style="font-size:   17px;"><b>Student ID</b></a></li>
          <li class="active"><a href="parentlogin.php" style="font-size: 17px;"><b>Parent Login</b></a></li>
          <li><a href="adminlogin.php" style="font-size: 17px;"><b>Admin Login</b></a></li>
        </ul>
      </div>
    </div>
  </div><br><br><br><br>
  <form method="POST">
  <div id="article">
  	<div><br>
  		<center><label id="a" style="color: black;">Parent Login</label><br><br></center>
      <center><img src="img/parent.png" width="400px" height="220px"></center>
       		<center>

            <table >
              <tr >
                <td style="width: 300px;text-align: center;">
                  <label>Username:</label>                  
                </td>
              </tr>
              <tr>
                <td>
                  <i class="fa fa-user fa-4x" style="float: left;"></i>
                  <input type="text" name="username" style="font-size: 30px; color: black;    padding-left: 40px;padding-right: 40px;margin-left: 16px;width: 500px;" placeholder="Username Here....">                
                </td>
              </tr>
              <tr >
                <td style="width: 300px;text-align: center;">
                  <label>Password:</label>                  
                </td>
              </tr>
              <tr>
                <td>
                  <i class="fa fa-key fa-4x" style="float: left;"></i>
                  <input type="password" name="password" style="font-size: 30px; color: black;padding-left: 40px;padding-right: 40px; margin-left: 5px;width: 500px;" placeholder="Password Here....">                  
                </td>
              </tr>
            </table>
      <button name="login" class="input">LOGIN</button>
      </center>
  	</div>
  </div><br><br><br><br><br>
</form>


<?php

     if(isset($_POST['login']))
     {
       include('connect.php');

       $uname=$_POST['username'];
       $pass=$_POST['password'];

          if(empty($uname) || empty($pass))
          {
            echo "<script>alert('Please fill Username & Password');</script>";
          }
          else
          {
            $sel="select * from student where username='$uname' and password='$pass'";
            $result=$con->query($sel);

            if($row=mysqli_fetch_array($result))
            {
               $_SESSION['sid']=$row['sid'];
               $sid=$_SESSION['sid'];


              echo "<script>window.location.href='studentinfo.php'</script>";
            }
            else
            {
              echo "<script>alert('Wrong Username & Password');</script>";
            }
          }
     }
   ?>
   

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