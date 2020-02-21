<?php
 session_start();
 include('connect.php');

 if (empty($_SESSION['aid'])) {
   echo "<script>window.location.href='adminlogin.php'</script>";
 }
 else{
  $var="select max(cid) as max from class";
  $res=$con->query($var);
  $row=mysqli_fetch_assoc($res);
  $cid=$row['max']+1; 
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
          <li class="active"><a href="addclass.php" style="font-size: 16px;"><b>Add Branch</b></a></li>
          <li><a href="addstu.php" style="font-size: 16px;"><b>Add Student</b></a></li>
          <li ><a href="viewstu.php" style="font-size:   16px;"><b>View Student</b></a></li>          
          <li ><a href="viewarrival.php" style="font-size:   16px;"><b>View Arrival</b></a></li>          
          <li ><a href="viewleave.php" style="font-size:   16px;"><b>View Leave Application</b></a></li>
           <li ><a href="Logout.php" style="font-size:   16px;" ><b>Logout</b></a></li>           
        </ul>
      </div>
    </div>
  </div><br><br><br><br>
<form method="POST">

  <div id="article">
    <br>
      <center><label id="a" style="color: black;">Add Branch</label><br></center><br><br>

      <center>
        <table >
          <tr >
            <td style="text-align: left;width:400px;"><br><br>
              <label style="color: black;margin-left: 100px;">Branch:-</label>
            </td>
            <td style="width: 600px;"><br><br>
              <input  type="text" name="branch" style="font-size: 25px; color: black;padding-left: 40px;padding-right: 40px;width: 500px;margin-left: 150px;" placeholder="Branch Here...." id="submit">              
            </td>
          </tr>
          <tr>
            <td style="text-align: left;width:400px;"><br><br>
              <label style="color: black;margin-left: 100px;">Class:-</label>
            </td>
            <td style="width: 600px;"><br><br>
              <input type="text" name="class" style="font-size: 25px; color: black;padding-left: 40px;padding-right: 40px;width: 500px;margin-left: 150px;" placeholder="Class Here...." id="submit">              
            </td>
          </tr>
        </table>
      </center><br><br><br><br><br><br>
      


      <center><button type="submit" name="add" class="input" >ADD</button></center>
    
  </div>
</form>
<?php
  if (isset($_POST['add'])) 
  {
    $branch=$_POST['branch'];

    $class=$_POST['class'];

    /*$check=mysqli_query($con,"select * from class where class ='$class'");
    $checkrows=mysqli_num_rows($check);
    if ($checkrows>0) {
      echo "<script>alert('This class already added!!!!');</script>";
    }*/


       $pro="select * from class where class='$class' and branch='$branch'  ";
       $prof=$con->query($pro);
       $pr=mysqli_fetch_array($prof);
         

       if ($class==$pr['class'] && $branch==$pr['branch']) {

         echo "<script> alert('NO REPITATION OF CLASS'); </script>";
       }
       else{

      $sql="insert into class values('$cid','$branch','$class')";

      if (mysqli_query($con,$sql)) {
        echo "<script>alert('class details added succesfully');</script>";
      }
      else{
        echo "<script>alert('Please Enter Details');</script>";
      }
    }

    }
  }
 ?>
</body>
</html>


