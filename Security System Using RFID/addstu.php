<?php
  session_start();
  include('connect.php');

  if (empty($_SESSION['aid'])) {
    echo "<script>window.location.href='adminlogin.php'</script>";
  }
  else{

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
  label{
    color: black;
    font-size: 25px;
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
          <li ><a href="addclass.php" style="font-size: 16px;"><b>Add Branch</b></a></li>
          <li class="active"><a href="addstu.php" style="font-size: 16px;"><b>Add Student</b></a></li>
          <li ><a href="viewstu.php" style="font-size:   16px;"><b>View Student</b></a></li>          
          <li ><a href="viewarrival.php" style="font-size:   16px;"><b>View Arrival</b></a></li>          
          <li ><a href="viewleave.php" style="font-size:   16px;"><b>View Leave Application</b></a></li>  
          <li ><a href="Logout.php" style="font-size:   16px;" ><b>Logout</b></a></li>         
        </ul>
      </div>
    </div>
  </div><br><br><br><br>
<form method="post" enctype="multipart/form-data"
>
  <div id="article"><br>
    
      <center><label id="a" style="color: black;" >Registration Form</label><br></center><br><br>

      
      <center>
        <table >
          <tr>
            <td style="text-align: left;width: 400px;">
              <label style="margin-left:100px; ">Enter Student ID:-</label>             
            </td>
            <td style="width: 600px;">
              <input  type="text" name="sid" style="font-size: 25px; color: black;padding-left: 40px;padding-right: 40px;margin-left: 150px;width: 500px;" placeholder="Enter ID Here...." id="submit">              
            </td>
          </tr>
          <tr>
            <td style="text-align: left;width: 500px;"><br>
              <label style="margin-left: 100px;">Enter Student Name:-</label>
            </td>
            <td style="width: 600px;"><br>
            <input  type="text" name="sname" style="font-size: 25px; color: black;padding-left: 40px;padding-right: 40px;margin-left: 150px;width: 500px;" placeholder="Enter Name Here...." id="submit">              
            </td>
          </tr>
          <tr>
            <td style="text-align: left;width: 500px;"><br>
              <label style="margin-left: 100px;">Select Branch:-</label>
            </td>
            <td style="width: 600px;"><br>
              <select style="margin-left: 150px;width: 500px;" id="branch" name="branch" type="text">          
           <?php  
              if (isset($_POST['branch']))
               {
                echo "<option>".$_POST['branch']."</option>";
               }
              else
               {
               }
               ?>
                 <option value=''>--Select branch--</option>
                <?php
               $sql5="select * from class";
                //$cnt=$cnt+1;
               $res = $con->query($sql5);
               while($row = $res->fetch_assoc()) 
               {
               ?>
               <option value="<?php echo $row['branch'] ?>"/><?php echo $row['branch'] ?></option>
               
               <?php }
               ?>
      </select>            
            </td>
          </tr>
          <tr>
            <td style="text-align: left;width: 500px;"><br>
              <label style="margin-left: 100px;">Select Class:-</label>
            </td>
            <td style="width: 600px;"><br>
              <select style="margin-left: 150px;width: 500px;" id="class" name="class" type="text">
        
                    <?php  
                      if (isset($_POST['class']))
                    {
                     echo "<option>".$_POST['class']."</option>";
                    }
                    else
                    {
                    }
                    ?>
                      <option value=''>--Select Class--</option>
                     <?php
                    $sql5="select * from class";
                     //$cnt=$cnt+1;
                    $res = $con->query($sql5);
                    while($row = $res->fetch_assoc()) 
                    {
                    ?>
                    <option value="<?php echo $row['class'] ?>"/><?php echo $row['class'] ?></option>
                    
                    <?php }
                    ?>
              </select>    
            </td>
          </tr>
          <tr>
            <td style="text-align: left;width: 500px;"><br>
              <label style="margin-left: 100px;">Enter Address:-</label>
            </td>
            <td style="width: 600px;"><br>
              <input  type="text" name="address" style="font-size: 25px; color: black;padding-left: 40px;padding-right: 40px;margin-left: 150px;width: 500px;" placeholder="Enter Address Here...." id="submit"></center>            
            </td>
          </tr>
          <tr>
            <td style="text-align: left;width: 500px;"><br>
              <label style="margin-left: 100px;">Enter Parent Name:-</label>
            </td>
            <td style="width: 600px;"><br>
              <input  type="text" name="pname" style="font-size: 25px; color: black;padding-left: 40px;padding-right: 40px;margin-left: 150px;width: 500px;" placeholder="Enter Contact Here...." id="submit">              
            </td>
          </tr>
          <tr>
            <td style="text-align: left;width: 500px;"><br>
              <label style="margin-left: 100px;">Enter Parent Contact:-</label>
            </td>
            <td style="width: 600px;"><br>
              <input  type="text" name="contact" style="font-size: 25px; color: black;padding-left: 40px;padding-right: 40px; margin-left: 150px;width: 500px;" placeholder="Enter Name Here...." id="submit">              
            </td>
          </tr>
          <tr>
            <td style="text-align: left;width: 500px;"><br>
              <label style="margin-left: 100px;">Enter Parent Email ID:-</label>
            </td>
            <td style="width: 600px;"><br>
              <input  type="text" name="email" style="font-size: 25px; color: black;padding-left: 40px;padding-right: 40px;margin-left: 150px;width: 500px;" placeholder="Enter Email Here...." id="submit">
            </td>
          </tr>
          <tr>
            <td style="text-align: left;width: 500px;"><br>
              <label style="margin-left: 100px;">Username:-</label>
            </td>
            <td style="width: 600px;"><br>
              <input  type="text" name="username" style="font-size: 25px; color: black;padding-left: 40px;padding-right: 40px;margin-left: 150px;width: 500px;" placeholder="Username Here...." id="submit">
            </td>
          </tr>
          <tr>
            <td style="text-align: left;width: 500px;"><br>
              <label style="margin-left: 100px;">Password:-</label>
            </td>
            <td style="width: 600px;"><br>
              <input  type="password" name="password" style="font-size: 25px; color: black;padding-left: 40px;padding-right: 40px;margin-left: 150px;width: 500px;" placeholder="Password Here...." id="submit">
            </td>
          </tr>

          <tr>
            <td ><br>
              <input  type="file" name="image" onchange="loadFile(event);" class="file" style="font-size: 25px; color: black;margin-left: 100px;">
            </td>            
            <td ><br>
              <img id="output" height="60" width="100" style="border-style: dotted;border-color: #000080;margin-left: 150px;" ><br><br>              
            </td>
          </tr>
        </table>
        
<script>
 var loadFile = function(event) {
   var output = document.getElementById('output');
   output.src = URL.createObjectURL(event.target.files[0]);
 };
</script><br><br>

      <center><button type="submit" name="add" class="input" >ADD</button></center>
    
  </div>
</form>
<?php
if(isset($_POST['add']))
{


 $file=$_FILES["image"]["name"];
  $location="img";
        
$sid=$_POST['sid'];

 

$sname=$_POST['sname']; 
$branch=$_POST['branch'];
//$batch=$_POST['batch'];
$class=$_POST['class'];
$address=$_POST['address'];
$pname=$_POST['pname'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$username=$_POST['username'];
$pass=$_POST['password'];

if(empty($sid) || empty($sname) || empty($pname) || empty($branch) ||empty($address) || empty($class) || empty($contact) || empty($email) || empty($username) || empty($pass))
  {
    echo "<script>alert('All fields are required!!!!');</script>";
  }
  else
  {
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $location.$file))
    {
      echo "<img src='".$location.$file."' width='100' height='100'>";
      $image=$location.$file;
      $qry="select * from student where sid='$sid'";
      $check=$con->query($qry);
      $checkrows=mysqli_num_rows($check);
      echo $checkrows;
      if($checkrows>0)
      {
        echo "<script>alert('This student ID already added!!!!');</script>";
      }
      else
      {
        $sql="Insert into student values('$sid', '$sname','$branch','$class', '$image','$address','$pname', '$contact', '$email', '$username', '$pass')";
        if(mysqli_query($con,$sql))
        {

              //SMS code starts here
$_my_clicksend_username = "mrinal_07";
$_my_clicksend_key = "105BA7BA-BBE4-1EAF-6501-0D0951EC65C5";
 //You *MUST* define the 'to', 'message' and 'senderid'
$to        = $contact;
$message   = "Student Id: ".$sid."<br>Student Name:".$sname." arrived in campus";
$senderid  = "XYZ";
     $message=urlencode($message);
$to=urlencode($to);
$vars="method=http&username=$_my_clicksend_username&key=$_my_clicksend_key&to=+91" . $to ."&message=" . $message . "&senderid=" . $senderid;  
file_get_contents('https://api-mapper.clicksend.com/http/v2/send.php?method=http&username=mrinal_07&key=105BA7BA-BBE4-1EAF-6501-0D0951EC65C5&to=+91'.$to.'&message='.$message.'&senderid=XYZ');


          echo "<script>alert('Class details added successfully');</script>";
        }
      }
    }
    else
    {
      echo "<script>alert('Please upload a photo');</script>";
    }
  }
}
}





?>
</body>
</html>    
