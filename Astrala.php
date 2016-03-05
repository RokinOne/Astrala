<?php
  $year = $_GET["year"];
  $month = $_GET["month"];
  $day = $_GET["day"];

  $zodiac = ["Ox", "Tiger", "Rabbit", "Dragon", "Snake", "Horse", "Goat", "Monkey", "Rooster", "Dog", "Pig", "Rat"];
  $months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
  $monthDays = [31,29,31,30,31,30,31,31,30,31,30,31];

  $yearForm;
  $yearElement;
  $yearZodiac;
  $monthElement;
  $monthZodiac;

  $noDays = 0;


  // calculate form, element and zodiac for the year
  if ($year % 2 == 1) { $yearForm = "Yin"; }
  else { $yearForm = "Yang"; }

  switch($year % 10) {
    case 0: case 1: $yearElement = "Metal"; break;
    case 2: case 3: $yearElement = "Water"; break;
    case 4: case 5: $yearElement = "Wood"; break;
    case 6: case 7: $yearElement = "Fire"; break;
    case 8: case 9: $yearElement = "Earth"; break; }

  $yearZodiac = $zodiac[($year - 5) % 12];


  // calculate element and zodiac for the month
  switch($month) {
    case 2: case 3: case 4: $monthElement = "Wood"; break;
    case 5: case 6: case 7: $monthElement = "Fire"; break;
    case 8: case 9: case 10: $monthElement = "Metal"; break;
    case 11: case 12: case 1: $monthElement = "Water"; break; }

  $monthZodiac = $zodiac[$month-1];


  // calculate number of days since 01-01
  for ($m = 1; $m < $month; $m++) {
    for ($d = 1; $d <= $monthDays[$m-1]; $d++) {
      $noDays++; } }
  for ($d = 1; $d <= $day; $d++) {
    $noDays++; }
?>

<!doctype html>
<html lang="en">
<meta charset="utf-8">
<meta name="author" content="Rokin">
<link rel="author" href="http://www.worldisacube.net">
<link rel="icon" type="image/x-icon" href="Astrala.png">
<link rel="stylesheet" type="text/css" href="Astrala.css">
<title>Astrala</title>

<body>
  <header>
    <img src="Astrala.png" width=50 height=50>
    Astrala
    <span>Chinese astrology calculator<span>
  </header>
  <form action="Astrala.php" method="get">
    Enter your birthdate:<br><br>
    <select name="year">
<?php
  for ($i = 1900; $i<2016; $i++) {
    echo '<option value="', $i, '"';
    if ($year == $i) echo ' selected';
    echo '>', $i, '</option>';
  }
?>
    </select>

    <select name="month">
<?php
  for($i = 1; $i < 13; $i++) {
    echo '<option value="', $i, '"';
    if ($month == $i) echo ' selected';
    echo '>', $months[$i-1], '</option>';
  }
?>

    </select>

    <select name="day">

<?php
  for ($i = 1; $i < 32; $i++) {
    echo '<option value="', $i, '"';
    if ($day == $i) echo ' selected';
    echo '>', $i, '</option>';
  }
?>
    </select>
    <button type="submit">Calculate</button>
  </form>

<?php

  if (isset($year) && isset($month) && isset($day)) {
    ?>

  <p>
    Days since 01-01: <?php echo $noDays; ?><br>
  </p>

  <table>
    <tr><th></th><th>month</th><th>year</th></tr>
    <tr><th>element</th><td><?php echo $monthElement; ?></td><td><?php echo $yearForm, " ", $yearElement; ?></td></tr>
    <tr><th>zodiac</th><td><?php echo $monthZodiac; ?></td><td><?php echo $yearZodiac; ?></td></tr>
  </table>

<?php } ?>
</body>
</html>
