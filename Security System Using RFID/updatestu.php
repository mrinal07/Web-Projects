
<?php
session_start();
include('connect.php');

if(empty($_SESSION['aid']))
{
echo "<script>window.location.href='adminlogin.php'</script>";
}
else
{
  // include('adminmenu.php');

$sid=$_GET['sid'];
$sel="select * from student where sid='$sid'";
$res=$con->query($sel);
$data=mysqli_fetch_array($res);
$img=$data['image'];
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

    td{
      width: 700px;
    }
    input[type="submit"]
  {
    border:3px solid seagreen;
    font-size: 25px;
    padding: 10px 10px;
    border-radius: 15px;
    width: 10%;
    color: black;
    font-weight: bold;
  }


  </style>
</head>
<body style="background-color:coral;">
    <section id="header" class="appear"></section>
  <div class="navbar navbar-fixed-top"  >
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
        </ul>
      </div>
    </div>
  </div><br><br><br><br><br><br>
<form method="POST">
  <div id="article">
  <center><label id="a">Add Student</label><br></center><br>

  <table>
    <tr>
      <td>
          <label style="margin-left: 100px;">Name:-</label>
      </td>
      <td>
        <input  type="text" name="sname" style="width: 400px; font-size: 25px; margin-left: 100px; color: black;padding-left: 40px;padding-right: 40px;" placeholder="Enter Name Here...." id="submit" value="<?php echo $data['sname'] ?>">
      </td>
    </tr>     
    <tr>
      <td>
          <label style="margin-left: 100px;">Branch:-</label>
      </td>
      <td>
      
       <select type="text" name="branch" style="margin-left: 100px;width: 200px;">
        <option><?php echo $data['branch'] ?></option>
        <option value=''>--Select Branch--</option>
                <?php
                     $sql5="select * from class"; 
                     $res = $con->query($sql5);
                     while($row = $res->fetch_assoc()) 
                     {
                     ?>
                     <option value="<?php echo $row['branch'] ?>"><?php echo $row['branch'] ?></option>
                <?php }?>
        </select>
        
      </td>
    </tr>

    <tr>
      <td>
          <label style="margin-left: 100px;">Year:-</label>
      </td>
      <td>
      <select type="text" name="class" style="margin-left: 100px;width: 200px;">
        <option><?php echo $data['class'] ?></option>
        <option value=''>--Select Class--</option>
               <?php
              $sql5="select * from class";
               //$cnt=$cnt+1;
              $res = $con->query($sql5);
              while($row = $res->fetch_assoc()) 
              {
              ?>
              <option value="<?php echo $row['class'] ?>"><?php echo $row['class'] ?></option>
              
              <?php }?>
      </select>
     </td> 
    </tr>

    <tr>
      <td>
          <label style="margin-left: 100px;">Address:-</label>
      </td>
    <td>
      <input  type="text" name="address" style="width: 400px; margin-left: 100px; font-size: 25px; color: black;padding-left: 40px;padding-right: 40px;" placeholder="Enter Address Here...." id="submit" value="<?php echo $data['address'] ?>">
    </td>
    <tr>
      <td>
          <label style="margin-left: 100px;">Parent Name:-</label>
      </td>
    <td>
      <input  type="text" name="address" style="width: 400px; margin-left: 100px; font-size: 25px; color: black;padding-left: 40px;padding-right: 40px;" placeholder="Enter Name Here...." id="submit" value="<?php echo $data['address'] ?>">
    </td>
    <tr>
      <td>
          <label style="margin-left: 100px;">Mobile no:-</label>
      </td>
    <td>
      <input  type="text" name="address" style="width: 400px; margin-left: 100px; font-size: 25px; color: black;padding-left: 40px;padding-right: 40px;" placeholder="Enter Number Here...." id="submit" value="<?php echo $data['address'] ?>">
    </td> 
    <tr>
      <td>
        <input type="file" name="image" accept="image/*" style="margin-left:100px;">
      </td>
      <td>
        <img src="image/<?php echo $data['img']?>" width='80px' height='100px' 
         style="margin-left: 100px;">
      </td>
    </tr>   
    </table><br><br><br>

      <center><a href="" style="text-decoration: none;"><input type="submit" name="submit" value="Add" ></a></center>
  </div>
</form>
<?php
if(isset($_POST['update']))
{
$file=$_FILES['image']['tmp_name'];
 $iname=$_FILES['image']['name'];
 if(isset($iname))
 {
if(!empty($iname))
 {      
                     $location = 'IMG/';      
                    if(move_uploaded_file($file, $location.$iname))
{
                            'uploaded';
                    }
                   } 
 }  
               else
{
                     'please upload';
                   }


   $sname=$_POST['sname'];  
$branch=$_POST['branch'];
//$batch=$_POST['batch'];
$class=$_POST['class'];
$image=$iname;
$address=$_POST['address'];
$pname=$_POST['pname'];
$contact=$_POST['contact'];
$image=$iname;
if(empty($image))
{
$sql="Update student set sname='$sname',branch='$branch',class='$class',image='$img',address='$address',pname='$pname',contact='$contact' where sid='$sid'";
}
else
{
$sql="Update student set sname='$sname',branch='$branch',class='$class',image='$image',address='$address',pname='$pname',contact='$contact' where sid='$sid'";
}
if(mysqli_query($con,$sql))
 {
echo "<script>alert('Student details Updated successfully');</script>";
echo "<script>location.replace('viewstu.php');</script>";
     }
}
}
?>

 
</body>
</html>



