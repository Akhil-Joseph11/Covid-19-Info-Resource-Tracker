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
        <title>Corona Numbers</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <style>
        canvas{
        background-color: white;
        margin-left: auto;
        margin-right: auto ;
        width:1100px !important;
        height:500px !important;
        }
        </style>
</head>

<body>

<div class="topnav">
  <a class="active" href="home.php"> ALL STATES </a>
  <a href="<?php echo $statelink;?>"> HOME STATE </a>
  <a href="statistics.php"> STATISTICS </a>
  <div class="topnav-right">
  <a href="remedy.php"> REMEDY AND TIPS </a>
  <a href="profile.php"> <?php echo $_SESSION['username']; ?> </a>
  <a href="logout.php"> LOGOUT </a>
  </div>


</div>
<div class="homeandstates1">

<h1 class="text-white position" style="font-family:oswald;"> COVID-19 INFO-RESOURCE PLATFORM</h1>

<h3 class="text-white position1" style="font-family:oswald;">Welcome <?php echo $_SESSION['name']; ?></h3>

</div>
<div class="row">
  <div class="col Box1 text-white">Today's Cases</div>
  <div class="col Box1 text-white">Today's Deaths</div>
  <div class="col Box1 text-white">Yesterday's Cases</div>
  <div class="col Box1 text-white ">Yesterday's Deaths</div>
</div>
<?php
                  $todaysdate=date("d-m-Y");
                  $yestdate = strtotime ( '-1 day' , strtotime($todaysdate) ) ;
                  $yestdate = date ( 'd-m-Y' , $yestdate);
                  $time=strtotime($todaysdate);
                  $monthtod=date("F",$time);
                  $daytod=date("d",$time);
                  $time1=strtotime($yestdate);
                  $monthyes=date("F",$time1);
                  $dayyes=date("d",$time1);
                  $flag=0;
                  $flag1=0;
                  $todcases=0;
                  $toddeaths=0;
                  $yestcases=0; 
                  $yestdeaths=0;
                  $dateformatted = $daytod." ".$monthtod." ";
                  $yestformatted = $dayyes." ".$monthyes." ";

                  if (($csvfile = fopen("case_time_series.csv", "r")) !== FALSE) {
                    while (($csvdata = fgetcsv($csvfile, 1000, ",")) !== FALSE) {
                        $colcount = count($csvdata);
                        if($dateformatted==$csvdata[0])
                        {$flag=1;
                        $todcases=$csvdata[2];
                        $toddeaths=$csvdata[6];}
                        if($yestformatted==$csvdata[0])
                        {$flag1=1;
                        $yestcases=$csvdata[2];
                        $yestdeaths=$csvdata[6];
                        }
                    }
                    if($flag==0)
                    {$todcases=0;
                    $toddeaths=0;}
                    if($flag1==0)
                    {$yestcases=0;
                      $yestdeaths=0;
                    }
                    fclose($csvfile);
                  } 
?>
<div class="row">
  <div class="col Box2 text-white "><?php echo $todcases; ?></div>
  <div class="col Box3 text-white"><?php echo $toddeaths; ?></div>
  <div class="col Box2 text-white "><?php echo $yestcases; ?></div>
  <div class="col Box3 text-white "><?php echo $yestdeaths; ?></div>
</div>

<br>

<canvas id="myChart" width="1200px" height="600px"></canvas>

    <script>
      window.addEventListener('load', setup);

      async function setup() {
        const ctx = document.getElementById('myChart').getContext('2d');
        const globalTemps = await getData();
        const myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: globalTemps.dates,
            datasets: [
              {
                label: 'Total Corona Cases',
                data: globalTemps.cases,
                fill: false,
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderWidth: 1
              }
            ]
          },
          options: {}
        });
      }

      async function getData() {
        const response = await fetch('case_time_series.csv');
        const data = await response.text();
        const dates = [];
        const cases = [];
        const rows = data.split('\n').slice(1);
        rows.forEach(row => {
          const cols = row.split(',');
          dates.push(cols[0]);
          cases.push(cols[3]);
        });
        return { dates, cases };

      }
    </script>
    <br>
    <br>
    <div class="container" id="container">
        <table class="table table-dark">
            <thead class="thead-dark">
                <tr>
                    <th>States</th>
                    <th>Total Confirmed</th>
                    <th>Recovered</th>
                    <th>Total Deaths</th>
                     <th>Active Cases</th>
                </tr>
            </thead>
            <tbody>
                <?php
                                 
                    if (($csvfile = fopen("state_wise.csv", "r")) !== FALSE) {
                        while (($csvdata = fgetcsv($csvfile, 1000, ",")) !== FALSE) {
                            $colcount = count($csvdata);
                            $url = 'state.php?state='.$csvdata[0];
                            echo '<tr>';
                                    echo '<td><a href="'. $url.'">'.$csvdata[0].'</a></td>';
                                    echo '<td bgcolor="DarkOrange">'.$csvdata[1].'</td>';
                                    echo '<td class="bg-success">'.$csvdata[2].'</td>';
                                    echo '<td bgcolor="Red">'.$csvdata[3].'</td>';
                                    echo '<td bgcolor="DARKBLUE">'.$csvdata[4].'</td>';
                            echo '</tr>';
                        }
                        fclose($csvfile);
                    }
                ?>
            </tbody>
           </table>
           <br>
    </div>
</div>
</body>
</html>