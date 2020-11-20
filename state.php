<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:reg1.php');
}
$state=$_SESSION['state'];
$statelink = 'state.php?state='.$state;
?>

<!DOCTYPE html>

<html>

<head>
        <title>State Data</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
<div class="topnav">
  <a href="home.php"> ALL STATES </a>
  <a  class="active" href="<?php echo $statelink;?>"> HOME STATE </a>
  <a href="statistics.php"> STATISTICS </a>
  <div class="topnav-right">
  <a href="remedy.php"> REMEDY AND TIPS </a>
  <a href="profile.php"> <?php echo $_SESSION['username']; ?> </a>
  <a href="logout.php"> LOGOUT </a>
  </div>


<div class="homeandstates position1" style="background-image: url(https://dm0qx8t0i9gc9.cloudfront.net/thumbnails/video/rRn0DkA9isby42wd/videoblocks-covid-19-corona-virus-scan-macro-animation_su3k936fi_thumbnail-1080_01.png) ;
    background-attachment: fixed ;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;">
<?php
$state= $_GET["state"];
echo '<h1 class="text-white position" style="margin-top:5%; margin-left: 32%; background-image: linear-gradient(140deg, black, #00030aa1); padding: 5%;">'. $state.' Numbers </h1>';
?>
</div>



    <div class="container" id="container">
        <table class="table table-dark">
            <thead class="thead-dark">
                <tr>
                    <th>Districts</th>
                    <th>Total Confirmed</th>
                    <th>Recovered</th>
                    <th>Total Deaths</th>
                     <th>Active Cases</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    if (($csvfile = fopen("district_wise.csv", "r")) !== FALSE) {
                        while (($csvdata = fgetcsv($csvfile, 1000, ",")) !== FALSE) {
                            $colcount = count($csvdata);
                            if($csvdata[2]==$state)
                            {            
                            echo '<tr>';
                                    echo '<td>'.$csvdata[4].'</td>';
                                    echo '<td bgcolor="DarkOrange">'.$csvdata[5].'</td>';
                                    echo '<td bgcolor="limegreen">'.$csvdata[7].'</td>';
                                    echo '<td bgcolor="Red">'.$csvdata[8].'</td>';
                                    echo '<td bgcolor="DARKBLUE">'.$csvdata[6].'</td>';
                            echo '</tr>';
                            }
                        }
                        fclose($csvfile);
                    }
                ?>
</body>
</html>
