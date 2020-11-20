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
        <title>COVID-19 STATISTICO</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="statsstyle.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <style>
body{
  margin-left: 0;
  margin-right: 0;
  background-image: url(https://i.pinimg.com/originals/d3/ed/e8/d3ede8a4fe3db437f50c1c61764daa30.jpg);
  overflow-y: scroll;
  overflow-x: hidden;
}
        
.column {
  float: left;
  width: 46%;
  background-color: black;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.chart-container{
  width:90%;
  margin-left:5%;
}
        </style>
</head>

<body>
<div class="topnav">
  <a href="home.php"> ALL STATES </a>
  <a   href="<?php echo $statelink;?>"> HOME STATE </a>
  <a class="active" href="statistics.php"> STATISTICS </a>
  <div class="topnav-right">
  <a href="remedy.php"> REMEDY AND TIPS </a>
  <a href="profile.php"> <?php echo $_SESSION['username']; ?> </a>
  <a href="logout.php"> LOGOUT </a>
  </div>
</div>
<div class="text-white">
<div style="background-image: url(https://steamuserimages-a.akamaihd.net/ugc/915792633195763888/3006415F705F0B44F327161749961827E1041FB0/); padding-top:50px; padding-bottom: 100px;">
<h1 class="text-white position" style="font-family:oswald; margin-left:32%;"> COVID-19 STATISTICO</h1><br><br><br>
<div class="row">
  <div class="column" style="background-image: url(https://lh3.googleusercontent.com/proxy/vg5BdC0S5t4SRSbFUwaGiLfp21dN7Bf-cDpgbdVZIyVYJMXFZh6eDNgkudsXNafHZlJaW16Ueu1XZdWTD-2qsRHa9FyYr9iHKWvdjEftbX6R1uzn5RWI8VmEDHRJ4JtcTSb6cyAp3mrwib5502-eWIlMaSKnwclgwbVZg7WD2tOh); padding-top: 40px; padding-left: 25px; border:grey;
    border-width: 9px;
    border-style: solid;
    border-radius: 30px;
    margin-left: 3%;
    padding-left: 5%;
    padding-right: 5%;
    font-family:oswald;">

<h1 style="text-align:center;"> India General Statistics </h1><br><br>
<?php
$count=0;
$sumcases=0;
$sumdeaths=0;
$highestcase=0;
$highcasedate='';
$highestdeath=0;
$highdeathdate='';
if (($csvfile = fopen("case_time_series.csv", "r")) !== FALSE) {
    while (($csvdata = fgetcsv($csvfile, 1000, ",")) !== FALSE) {
        $count++;
        $sumcases=$sumcases+(int)$csvdata[2];
        $sumdeaths=$sumdeaths+(int)$csvdata[6];
        if($csvdata[2]>$highestcase)
        {
            $highestcase=$csvdata[2];
            $highcasedate=$csvdata[0];
        }
        if($csvdata[6]>$highestdeath)
        {
            $highestdeath=$csvdata[6];
            $highdeathdate=$csvdata[0];
        }
        
    }
    fclose($csvfile);
} 
$count=$count-1;
$averagecases=$sumcases/$count;
$averagedeaths=$sumdeaths/$count;

$flag=0;
$fdsumc=0;
$fdsumd=0;
$fdsumr=0;
$todaysdate=date("d-m-Y");
$fddate = strtotime ( '-5 day' , strtotime($todaysdate) ) ;
$fddate = date ( 'd-m-Y' , $fddate);
$time1=strtotime($fddate);
$monthfd=date("F",$time1);
$dayfd=date("d",$time1);
$fdformatted = $dayfd." ".$monthfd." ";
if (($csvfile = fopen("case_time_series.csv", "r")) !== FALSE) {
    while (($csvdata = fgetcsv($csvfile, 1000, ",")) !== FALSE) {
        if($fdformatted==$csvdata[0])
        {   $flag=1; $i=0;
        }
        if(($flag==1)&&($i<5))
        {
            $fdsumc=$fdsumc+$csvdata[2];
            $fdsumd=$fdsumd+$csvdata[6];
            $fdsumr=$fdsumr+$csvdata[4];
            $i++;
        }
    }
    fclose($csvfile);
} 
$fdavc=$fdsumc/5;
$fdavd=$fdsumd/5;
$fdavr=$fdsumr/5;

$flag1=0;
$tdsumc=0;
$tdsumd=0;
$tdsumr=0;
$tddate = strtotime ( '-10 day' , strtotime($todaysdate) ) ;
$tddate = date ( 'd-m-Y' , $tddate);
$time2=strtotime($tddate);
$monthtd=date("F",$time2);
$daytd=date("d",$time2);
$tdformatted = $daytd." ".$monthtd." ";
if (($csvfile = fopen("case_time_series.csv", "r")) !== FALSE) {
    while (($csvdata = fgetcsv($csvfile, 1000, ",")) !== FALSE) {
        if($tdformatted==$csvdata[0])
        {   $flag1=1; $i=0;
        }
        if(($flag1==1)&&($i<5))
        {
            $tdsumc=$tdsumc+$csvdata[2];
            $tdsumd=$tdsumd+$csvdata[6];
            $tdsumr=$tdsumr+$csvdata[4];
            $i++;
        }
    }
    fclose($csvfile);
} 
$tdavc=$tdsumc/5;
$tdavd=$tdsumd/5;
$tdavr=$tdsumr/5;

echo "<div class=\"Text\">Days Since first case : </div><div class=\"numberCircle\">".$count."</div><br><br>";
echo "<div class=\"Text\">Total Cases :</div><div class=\"numberCircle\">".number_format($sumcases)."</div><br><br>";
echo "<div class=\"Text\"> Average Cases Per Day :</div><div class=\"numberCircle\">".number_format($averagecases,2)."</div><br><br>";
echo "<div class=\"Text\"> Highest Cases on a single day :</div><div class=\"numberCircle\">".number_format($highestcase)."</div><br><br>";
echo "<div class=\"Text\"> Highest Cases Date :</div><div class=\"numberCircle\">".$highcasedate."</div><br><br>";
echo "<div class=\"Text\"> Total Deaths :</div><div class=\"numberCircle\">".number_format($sumdeaths)."</div><br><br>";
echo "<div class=\"Text\"> Average Deaths per Day :</div><div class=\"numberCircle\">".number_format($averagedeaths,2)."</div><br><br>";
echo "<div class=\"Text\"> Highest Deaths on a single day :</div><div class=\"numberCircle\">".number_format($highestdeath)."</div><br><br>";
echo "<div class=\"Text\"> Highest Deaths Date :</div><div class=\"numberCircle\">".$highdeathdate."</div><br><br><br>";

echo "<br><h1 style=\"text-align:center;\"> Last Five Days Statistics </h1><br>";
echo "<div class=\"Text\"> Average New Cases(per day):</div><div class=\"numberCircle\">".number_format($fdavc,2)."</div><br><br>";
echo "<div class=\"Text\"> Average New Deaths(per day):</div><div class=\"numberCircle\">".number_format($fdavd,2)."</div><br><br>";
echo "<div class=\"Text\"> Average Recoveries(per day):</div><div class=\"numberCircle\">".number_format($fdavr,2)."</div><br><br>";

echo "<br><br><h1 style=\"text-align:center;\"> Last Ten Days Statistics </h1><br>";
echo "<div class=\"Text\"> Average New Cases(per day):</div><div class=\"numberCircle\">".number_format($tdavc,2)."</div><br><br>";
echo "<div class=\"Text\"> Average New Deaths(per day):</div><div class=\"numberCircle\">".number_format($tdavd,2)."</div><br><br>";
echo "<div class=\"Text\"> Average Recoveries(per day):</div><div class=\"numberCircle\">".number_format($tdavr,2)."</div><br><br>";
?>

</div>
<div class="column" style="background-image: url(https://lh3.googleusercontent.com/proxy/vg5BdC0S5t4SRSbFUwaGiLfp21dN7Bf-cDpgbdVZIyVYJMXFZh6eDNgkudsXNafHZlJaW16Ueu1XZdWTD-2qsRHa9FyYr9iHKWvdjEftbX6R1uzn5RWI8VmEDHRJ4JtcTSb6cyAp3mrwib5502-eWIlMaSKnwclgwbVZg7WD2tOh); padding-top: 30px; padding-left: 25px; border:grey;
    border-width: 9px;
    border-style: solid;
    border-radius: 30px;
    margin-left:2%">

<canvas style="
        width:200px !important;
        height:335px !important;" id="myChart0"></canvas>

    <script>
      window.addEventListener('load', setup);

      async function setup() {
        const ctx = document.getElementById('myChart0').getContext('2d');
        const globalTemps = await getData5();
        const myChart = new Chart(ctx, {
          type: 'horizontalBar',
          data: {
            labels: globalTemps.states,
            datasets: [
              {
                label: 'Total Cases',
                data: globalTemps.total,
                backgroundColor: 'Purple',
                hoverBackgroundColor: "white",
                hoverBorderColor: "orange",
              }
            ]
          },
          options: {
            legend: {
                labels: {
                    fontColor: "white",
                    fontSize: 18
                }
             } , 
            scales: {
                xAxes: [{
                    ticks: {
                        fontColor: "White",
                        fontSize: 16,
                        fontFamily: "oswald",
                    }
                }],
                yAxes: [{
                  ticks: {
                        fontColor: "white",
                        fontSize: 16,
                        fontFamily: "oswald"
                    }
                }]
            }    
            }
          
        });
      }

      async function getData5() {
        const response = await fetch('state_wise.csv');
        const data = await response.text();
        const states = [];
        const total = [];
        const rows = data.split('\n').slice(1);
        rows.forEach(row => {
          const cols = row.split(',');
          if(cols[0]!="Total"){
          states.push(cols[0]);
          total.push(cols[1]);
          }
        });
        return { states, total };

      }
    </script>
    <br>
    <br>

    </div>
</div>
</div>
<h1 class="text-white position" style="font-family:oswald; margin-left:36.5%;"> Cases BreakDown </h1><br>

<canvas id="doughnut" style="width:200px !important; height:60px !important;"></canvas>

    <script>
      window.addEventListener('load', setup);

      async function setup() {
        const ctx = document.getElementById('doughnut').getContext('2d');
        const data1 = await getData();
        const myChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: ['Recovered', 'Deaths', 'Active'],
            datasets: [
              {
                label: 'Total Corona Cases',
                backgroundColor: ['Green','Red','#EFCA08'],
                data: data1.datas1,
                hoverBackgroundColor: "Grey",
                hoverBorderColor: "Black",
              }
            ]
          },
          options: {
            cutoutPercentage: 40,
            animation: {
                  animateScale: true
            },
            legend: {
                labels: {
                    fontColor: "white",
                    fontSize: 18
                }
             }
          }
        });
      }

      async function getData() {
        const response = await fetch('state_wise.csv');
        const data = await response.text();
        const datas1 = [];
        const rows = data.split('\n').slice(1);
        rows.forEach(row => {
          const cols = row.split(',');
          if(cols[0]=="Total"){
          datas1.push(cols[2]);
          datas1.push(cols[3]);
          datas1.push(cols[4]);
          }
        });
        return { datas1 };

      }
    </script>
<br><br>
<h1 class="text-white position" style="font-family:oswald;margin-top: 90px;"> Daily New Cases </h1><br>
<div class="chart-container">
<canvas id="myChart" width="800px" height="300px"></canvas>
</div>

    <script>
      window.addEventListener('load', setup);

      async function setup() {
        const ctx = document.getElementById('myChart').getContext('2d');
        const globalTemps = await getData1();
        const myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: globalTemps.dates,
            datasets: [
              {
                label: 'Daily New Cases',
                data: globalTemps.cases,
                fill: false,
                borderColor: 'Blue',
                backgroundColor: 'Blue',
                borderWidth: 1
              }
            ]
          },
          options: {
            legend: {
                labels: {
                    fontColor: "white",
                    fontSize: 18
                }
             },
             scales: {
                xAxes: [{
                    ticks: {
                        fontColor: "White",
                        fontSize: 16,
                        fontFamily: "oswald",
                    }
                }],
                yAxes: [{
                  ticks: {
                        fontColor: "white",
                        fontSize: 16,
                        fontFamily: "oswald"
                    }
                }]
            }    
             
          }
        });
      }

      async function getData1() {
        const response = await fetch('case_time_series.csv');
        const data = await response.text();
        const dates = [];
        const cases = [];
        const deaths = [];
        const rows = data.split('\n').slice(1);
        rows.forEach(row => {
          const cols = row.split(',');
          dates.push(cols[0]);
          cases.push(cols[2]);
          deaths.push(cols[6]);
        });
        return { dates, cases, deaths };
      }
    </script>

<br><br>
<h1 class="text-white position" style="font-family:oswald;margin-top: 15px;"> Daily New Deaths </h1><br>

<div class="chart-container">
<canvas id="myChart1" width="800px" height="300px"></canvas>
</div>

    <script>
      window.addEventListener('load', setup);

      async function setup() {
        const ctx = document.getElementById('myChart1').getContext('2d');
        const globalTemps = await getData1();
        const myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: globalTemps.dates,
            datasets: [
              {
                label: 'Daily New Deaths',
                data: globalTemps.deaths,
                fill: false,
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderWidth: 1
              }
            ]
          },
          options: {
            legend: {
                labels: {
                    fontColor: "white",
                    fontSize: 18
                }
             },
             scales: {
                xAxes: [{
                    ticks: {
                        fontColor: "White",
                        fontSize: 16,
                        fontFamily: "oswald",
                    }
                }],
                yAxes: [{
                  ticks: {
                        fontColor: "white",
                        fontSize: 16,
                        fontFamily: "oswald"
                    }
                }]
             }
          }
        });
      }

    </script>

<br><br>
<h1 class="text-white position" style="font-family:oswald;margin-top: 15px;"> Active Cases </h1><br>
<div class="chart-container">
<canvas id="myChart3" width="800px" height="300px"></canvas>
</div>

    <script>
      window.addEventListener('load', setup);

      async function setup() {
        const ctx = document.getElementById('myChart3').getContext('2d');
        const globalTemps = await getData3();
        const myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: globalTemps.dates,
            datasets: [
              {
                label: 'Active Cases',
                data: globalTemps.cases,
                fill: false,
                borderColor: 'LightGreen',
                backgroundColor: 'LightGreen',
                borderWidth: 1
              }
            ]
          },
          options: {
            legend: {
                labels: {
                    fontColor: "white",
                    fontSize: 18
                }
             },
             scales: {
                xAxes: [{
                    ticks: {
                        fontColor: "White",
                        fontSize: 16,
                        fontFamily: "oswald",
                    }
                }],
                yAxes: [{
                  ticks: {
                        fontColor: "white",
                        fontSize: 16,
                        fontFamily: "oswald"
                    }
                }]
             }
          }
        });
      }

      async function getData3() {
        const response = await fetch('case_time_series.csv');
        const data = await response.text();
        const dates = [];
        const cases = [];
        const rows = data.split('\n').slice(1);
        rows.forEach(row => {
          const cols = row.split(',');
          dates.push(cols[0]);
          const num = parseInt(cols[3])-(parseInt(cols[5])+parseInt(cols[7]));
          cases.push(num);
        });
        return { dates, cases };

      }
    </script>

<br><br>
<h1 class="text-white position" style="font-family:oswald;margin-top: 15px;"> New Cases vs. Recoveries </h1><br>
<div class="chart-container">
<canvas id="myChart4" width="800px" height="300px"></canvas>
</div>
    <script>
      window.addEventListener('load', setup);

      async function setup() {
        const ctx = document.getElementById('myChart4').getContext('2d');
        const globalTemps = await getData4();
        const myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: globalTemps.dates,
            datasets: [
              {
                label: 'Daily New Cases',
                data: globalTemps.cases,
                fill: false,
                borderColor: 'red',
                backgroundColor: 'red',
                borderWidth: 1
              },
              {
                label: 'Daily Recoveries',
                data: globalTemps.recov,
                fill: false,
                borderColor: 'green',
                backgroundColor: 'green',
                borderWidth: 1
              }

            ]
          },
          options: {
            legend: {
                labels: {
                    fontColor: "white",
                    fontSize: 18
                }
             },
             scales: {
                xAxes: [{
                    ticks: {
                        fontColor: "White",
                        fontSize: 16,
                        fontFamily: "oswald",
                    }
                }],
                yAxes: [{
                  ticks: {
                        fontColor: "white",
                        fontSize: 16,
                        fontFamily: "oswald"
                    }
                }]
             }
          }
        });
      }

      async function getData4() {
        const response = await fetch('case_time_series.csv');
        const data = await response.text();
        const dates = [];
        const cases = [];
        const recov = [];
        const rows = data.split('\n').slice(1);
        rows.forEach(row => {
          const cols = row.split(',');
          dates.push(cols[0]);
          cases.push(cols[2]);
          recov.push(cols[4]);

        });
        return { dates, cases, recov};

      }
    </script>

<div style="background-image: url(https://lh3.googleusercontent.com/proxy/vg5BdC0S5t4SRSbFUwaGiLfp21dN7Bf-cDpgbdVZIyVYJMXFZh6eDNgkudsXNafHZlJaW16Ueu1XZdWTD-2qsRHa9FyYr9iHKWvdjEftbX6R1uzn5RWI8VmEDHRJ4JtcTSb6cyAp3mrwib5502-eWIlMaSKnwclgwbVZg7WD2tOh); padding-top: 40px; padding-left: 25px; border:grey;
    border-width: 9px;
    border-style: solid;
    border-radius: 30px;
    width:90%;
    margin-top:25px;
    margin-bottom:45px;
    margin-left: 5%;
    margin-right: 5%;
    padding-left: 5%;
    padding-right: 5%;
    padding-bottom: 5%;
    font-family:oswald;">

<?php
echo "<h1> Current Trends </h1><br>";
if(($fdavc-$tdavc)>5000)
{
    echo"<h3 style=\"text-align:justified;\"> Comparing the Average number of new cases over the last 5 days and 10 days, we can see that the number of cases in the last 5 days(".number_format($fdavc,2).") is significantly higher than over the last 10 days(".number_format($tdavc,2)."). This shows that the Number of New Cases are increasing day by day currently in India. The current trend is Increasing. <br></h3>";
}
else if(($tdavc-$fdavc)>5000){
    echo"<h3 style=\"text-align:justified;\"> Comparing the Average number of new cases over the last 5 days and 10 days, we can see that the number of cases in the last 5 days(".number_format($fdavc,2).") is significantly lower than over the last 10 days(".number_format($tdavc,2)."). This shows that the Number of New Cases are decreasing day by day currently in India. The current trend is Decreasing. <br></h3>";
}
else{
    echo"<h3 style=\"text-align:justified;\"> Comparing the Average number of new cases over the last 5 days and 10 days, we can see that the number of cases in the last 5 days(".number_format($fdavc,2).") is more or less similar to the number of cases in the last 10 days(".number_format($tdavc,2)."). This shows that the Number of New Cases is remaining constant currently in India. The current trend is neither Increasing nor Decreasing. <br></h3>";
}
?>
</div>
</div>
</body>
</html>

