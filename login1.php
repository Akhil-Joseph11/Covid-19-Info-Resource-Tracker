<html>
    <head>
        <style>
  body 
{
  background: url("https://dm0qx8t0i9gc9.cloudfront.net/thumbnails/video/rRn0DkA9isby42wd/videoblocks-covid-19-corona-virus-scan-macro-animation_su3k936fi_thumbnail-1080_01.png");
  background-size: cover;
  font-family: "Proxima Nova", Arial, Helvetica, sans-serif;
  background-attachment: fixed ;
  background-repeat: no-repeat;
  background-position: center;
}
        </style>

    </head>

</html>
<?php
if(isset($_POST['Login']))
{
session_start();
$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'covid19');

$username= $_POST['username'];
$pass= $_POST['password'];
$pass1=md5($pass);

$s = "select* from users where username= '$username' && pw = '$pass1'";
$s1 = "select * from users where username= '$username'";

$result= mysqli_query($con, $s);
$result1= mysqli_query($con, $s1);

$num = mysqli_num_rows($result);
$num1 = mysqli_num_rows($result1);

$s2 = "select firstname,homestate from users where username= '$username'";

$conn = new mysqli("localhost", "root", "", "covid19");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);}
$result2 = $conn->query($sql);
$row = $result->fetch_assoc();
$Name=$row["firstname"];
$hs=$row["homestate"];

if($num==1){
    $_SESSION['username'] = $username;
    $_SESSION['name'] = $Name;
    $_SESSION['state'] = $hs;
    header('location:home.php');
}else{if($num1>0)
    {   
        echo '<script type="text/javascript"> window.onload = function () { alert("Incorrect Password"); } </script>';
    }else{
        echo '<script type="text/javascript"> window.onload = function () { alert("Invalid Username"); } </script>';
       
   }
}
}
?>