<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:reg1.php');
}
$state=$_SESSION['state'];
$statelink = 'state.php?state='.$state;
$user = $_SESSION['username'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "covid19";
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);}

$sql = "SELECT firstname, lastname, phone, email, homestate from users where username='$user'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$firstname=$row["firstname"];
$lastname=$row["lastname"];
$phone=$row["phone"];
$email=$row["email"];
$homestate=$row["homestate"];

$FormView=True;
if(isset($_POST['update']))
{
$FormView=False;
}
?>

<!DOCTYPE html>
<html>
<head>
        <title>Update Profile</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="profilestyle.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <style>
.buttonUP
{ 
background-color:#4CAF50; 
color: white;
padding: 10px 15px;
text-align: center; 
text-decoration: none; 
display: inline-block; 
font-size: 18px;
margin: 4px 2px;
cursor: pointer; 
border-radius: 10px; 
margin-left: 22%;
} 
.buttonUP:hover 
{ 
	opacity:0.8;
}
</style>
</head>

<body>

<div class="topnav">
  <a href="home.php"> ALL STATES </a>
  <a href="<?php echo $statelink;?>"> HOME STATE </a>
  <a href="statistics.php"> STATISTICS </a>
  <div class="topnav-right">
  <a href="remedy.php"> REMEDY AND TIPS </a>
  <a class="active" href="profile.php"> <?php echo $_SESSION['username']; ?> </a>
  <a href="logout.php"> LOGOUT </a>
  </div>
</div>
<div class="text-white homeandstates">
<h2 class="text-white position" style="font-family: oswald; margin-left:39%; margin-bottom:3%; padding-top:5%;">EDIT PROFILE</h2>

<div class="editprofile">
<?php
if($FormView)
{
?>
<form name="update-form" method="POST" onsubmit="return validate1()">
<?php
}
if(isset($_POST['update']))
{
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'covid 19');
$newfn= $_POST['firstname'];
$newln= $_POST['lastname'];
$newp= $_POST['phone'];
$newhs= $_POST['homestate'];
$s = "Update users SET firstname='$newfn', lastname='$newln', phone='$newp', homestate='$newhs' where username='$user'";
mysqli_query($con, $s);
$_SESSION['name'] = $newfn;
$_SESSION['state'] = $newhs;
echo "<h5 style=\"padding-left:19%;\">Details Updated Successfully.</h5><br><br>";
}

if($FormView)
{
?>
  <label for="username"> USERNAME :</label>
  <input class="textinput" type="text" id="username" name="username" value="<?php echo $user;?>" readonly><br><br>
  <label for="firstname"> FIRST NAME : </label>
  <input class="textinput" type="text" id="firstname" name="firstname" value="<?php echo $firstname;?>"> <i class="fa fa-edit" style="font-size:24px; margin-left: 8px;"></i><br><br>
  <label for="lastname"> LAST NAME : </label>
  <input class="textinput" type="text" id="lastname" name="lastname" value="<?php echo $lastname;?>"> <i class="fa fa-edit" style="font-size:24px; margin-left: 8px;"></i><br><br>
  <label for="phone"> PHONE : </label>
  <input class="textinput" type="text" id="phone" name="phone" value="<?php echo $phone;?>"> <i class="fa fa-edit" style="font-size:24px; margin-left: 8px;"></i><br><br>
  <label for="email"> EMAIL :</label>
  <input class="textinput" type="text" id="email" name="email" value="<?php echo $email;?>" readonly><br><br>
  <label for="homestate"> HOMESTATE : </label>
  <select class="textinput" name="homestate" id="homestate">
        <option value="<?php echo $homestate;?>" selected><?php echo $homestate;?></option>
        <option value="Andhra Pradesh" >Andhra Pradesh</option>
        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
        <option value="Assam">Assam</option>
        <option value="Bihar">Bihar</option>
        <option value="Chandigarh">Chandigarh</option>
        <option value="Chhattisgarh">Chhattisgarh</option>
        <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
        <option value="Delhi">Delhi</option>
        <option value="Goa">Goa</option>
        <option value="Gujarat">Gujarat</option>
        <option value="Haryana">Haryana</option>
        <option value="Himachal Pradesh">Himachal Pradesh</option>
        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
        <option value="Jharkhand">Jharkhand</option>
        <option value="Karnataka">Karnataka</option>
        <option value="Kerala">Kerala</option>
        <option value="Ladakh">Ladakh</option>
        <option value="Lakshadweep">Lakshadweep</option>
        <option value="Madhya Pradesh">Madhya Pradesh</option>
        <option value="Maharashtra">Maharashtra</option>
        <option value="Manipur">Manipur</option>
        <option value="Meghalaya">Meghalaya</option>
        <option value="Mizoram">Mizoram</option>
        <option value="Nagaland">Nagaland</option>
        <option value="Odisha">Odisha</option>
        <option value="Puducherry">Puducherry</option>
        <option value="Punjab">Punjab</option>
        <option value="Rajasthan">Rajasthan</option>
        <option value="Sikkim">Sikkim</option>
        <option value="Tamil Nadu">Tamil Nadu</option>
        <option value="Telangana">Telangana</option>
        <option value="Tripura">Tripura</option>
        <option value="Uttarakhand">Uttarakhand</option>
        <option value="Uttar Pradesh">Uttar Pradesh</option>
        <option value="West Bengal">West Bengal</option>
  </select> <i class="fa fa-edit" style="font-size:24px; margin-left: 8px;"></i><br><br>
  <input type="submit" value="UPDATE" name="update"  class="buttonUP">
</form>
<?php
}
?>
<script type = "text/javascript"> 
        function validate1() 
        {   
            var fn = document.forms["update-form"]["firstname"].value;
            var ln = document.forms["update-form"]["lastname"].value;
            var phone = document.forms["update-form"]["phone"].value;
            
            var regname = /^[a-zA-Z ]{1,50}$/;
            var regusername = /^[a-zA-Z0-9 ]{1,50}$/;
            var regphone = /^[789]\d{9}$/;

            var r1 = regname.test(fn);
            var r2 = regname.test(ln);
            var r4 = regphone.test(phone);

            if(fn==""||r1==false) 
            { 
                alert('Please enter a valid first name(max length:50, accepts only alphabets)'); 
                return false; 
            }
            else if(ln==""||r2==false) 
            { 
                alert('Please enter a valid last name(max length:50, accepts only alphabets)'); 
                return false; 
            }
            else if(phone==""||r4==false) 
            { 
                alert('Please enter a valid phone number.'); 
                return false; 
            }
            else 
            return true;
        } 
        </script>
</div>
</body>
</html>