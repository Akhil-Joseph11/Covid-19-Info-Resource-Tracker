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
if(isset($_POST['register']))
{

$con = mysqli_connect('localhost','root','');
global $con;

mysqli_select_db($con,'covid19');

$firstname= $_POST['firstname'];
$lastname= $_POST['lastname'];
$username= $_POST['username'];
$phone= $_POST['phone'];
$email= $_POST['email'];
$homestate= $_POST['state'];
$password= $_POST['password'];

$s = "select* from users where username= '$username'";
$password1= md5($password);

$result= mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num==1){
    echo '<script type="text/javascript"> window.onload = function () { alert("Username Already Taken"); } </script>';
}
else{$reg="INSERT INTO users(firstname,lastname,username,phone,email,homestate,pw) VALUES('$firstname','$lastname','$username','$phone','$email','$homestate','$password1')";
    mysqli_query($con, $reg);
    echo '<script type="text/javascript"> window.onload = function () { alert("Registration Successful"); } </script>';
    
}
}

?>