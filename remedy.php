<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:reg1.php');
}
$state=$_SESSION['state'];
$statelink = 'state.php?state='.$state;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="remedy.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REMEDIES</title>
</head>
<body>
<div class="topnav">
  <a href="home.php"> ALL STATES </a>
  <a href="<?php echo $statelink;?>"> HOME STATE </a>
  <a href="statistics.php"> STATISTICS </a>
  <div class="topnav-right">
  <a class="active1" href="remedy.php"> REMEDY AND TIPS </a>
  <a  href="profile.php"> <?php echo $_SESSION['username']; ?> </a>
  <a href="logout.php"> LOGOUT </a>
  </div>

  <div class="body1">
  <div class="cardContainer inactive">
    <div class="card">
      <div class="side front">
        <div class="img img1"></div>
        <div class="info">
          <h2 style="text-align: center;">MEASURES OF ENHANCING THE IMMUNITY</h2><br>
          <p style="text-align: center;"> * Drink warm water.</p>
          <p style="text-align: center;"> * Practice yogasana and pranayam.</p>
        </div>
      </div>
      <div class="side back">
        <div class="info">
          <h2></h2>
          <div class="reviews">
          </div>
          <br>
          <ul>
            <li style="text-align: justify;">Drink warm water throughout the day.</li>
            <li style="text-align: justify;">Daily practice of Yogasana, Pranayam and meditation for at least 30 minutes.</li>
            <li style="text-align: justify;">Spices like Haldi (Turmeric), Jeera (Cumin), Dhaniya (Coriander) and Lahsun (Garlic) recommended in cooking.</li>
          </ul>
          <div class="btn">
            <h4>Learn More</h4>
            <svg fill="#333" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
              <path d="M8.59 16.34l4.58-4.59-4.58-4.59L10 5.75l6 6-6 6z" />
              <path d="M0-.25h24v24H0z" fill="none" /></svg>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="cardContainer inactive">
    <div class="card">
      <div class="side front">
        <div class="img img2"></div>
        <div class="info">
          <h2 style="text-align: center;">AYURVEDIC IMMUNITY ENHANCING TIPS</h2><br>
          <p style="text-align: center;">* Herbal Tea</p>
          <p style="text-align: center;">* Golden Milk</p>
        </div>
      </div>
      <div class="side back">
        <div class="info">
          <h2> </h2>
          <div class="reviews">
          </div>
          <ul>
            <li style="text-align: justify;">Take Chyavanprash 10gm (1tsf) in the morning. Diabetics should take sugar free Chyavanprash.</li><br>
            <li style="text-align: justify;">Drink Herbal Tea/Decoction (Kadha) made from Tulsi (Basil), Dalchini (Cinnamon), Kalimirch (Black Pepper), Shunthi (Dry Ginger) and Munakka (Raisin) once or twice a day. Add jaggery (Natural Sugar) and/or fresh Lemon Juice to your taste, if needed.
            </li>
          </ul>
          <div class="btn">
            <h4>Learn More</h4>
            <svg fill="#333" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
              <path d="M8.59 16.34l4.58-4.59-4.58-4.59L10 5.75l6 6-6 6z" />
              <path d="M0-.25h24v24H0z" fill="none" /></svg>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="cardContainer inactive">
    <div class="card">
      <div class="side front">
        <div class="img img3"></div>
        <div class="info">
            <h2 style="text-align: center; margin-bottom: 8%;">SIMPLE AYURVEDIC PROCEDURES</h2><br><br>
            <p style="text-align: center;">* Nasal Apllication</p>
            <p style="text-align: center;">* Oil Pulling Therapy</p>
        </div>
      </div>
      <div class="side back">
        <div class="info">
          <h2></h2>
          <div class="reviews">
          </div>
          <ul>
            <li style="text-align: justify;">Nasal Application- Apply Sesame Oil/Coconut oil or Ghee in both the nostrils (Pratimarsh Nasya) in morning and evening.</li><br>
            <li style="text-align: justify;">Oil Pulling Therapy- Take 1 table spoon Sesame or Coconut Oil in mouth. Do not drink, swish in the mouth for 2 to 3 minutes and spit it off followed by warm water rinse. This can be done once or twice a day.
            </li>
          </ul>
          <div class="btn">
            <h4>Learn More</h4>
            <svg fill="#333" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
              <path d="M8.59 16.34l4.58-4.59-4.58-4.59L10 5.75l6 6-6 6z" />
              <path d="M0-.25h24v24H0z" fill="none" /></svg>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="cardContainer inactive">
    <div class="card">
      <div class="side front">
        <div class="img img4"></div>
        <div class="info">
            <h2 style="text-align: center; ">ACTIONS DURING DRY COUGH/SORE THROAT</h2><br>
            <p style="text-align: center;">* Clove powder</p>
            <p style="text-align: center;">* Steam inhalation</p>
        </div>
      </div>
      <div class="side back">
        <div class="info">
          <h2></h2>
          <div class="reviews">
          </div>
          <ul>
            <li style="text-align: justify;">Steam inhalation with fresh Pudina (Mint) leaves or Ajwain (Caraway Seeds) can be practiced once in a day.</li><br>
            <li style="text-align: justify;">Lavang (Clove) powder mixed with Natural Sugar/Honey can be taken 2-3 times a day in case of cough or throat irritation.
            </li>
          </ul>
          <div class="btn">
            <h4>Learn More</h4>
            <svg fill="#333" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
              <path d="M8.59 16.34l4.58-4.59-4.58-4.59L10 5.75l6 6-6 6z" />
              <path d="M0-.25h24v24H0z" fill="none" /></svg>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="remedy.js"></script>
</body>
</html>