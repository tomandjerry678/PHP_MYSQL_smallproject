<?php
session_start();
$chosentable = $_SESSION['tablechosen'];
$_SESSION['tablechosen'] = $chosentable;

DEFINE ('DBUSER', 'xiaomengrules');
DEFINE ('DBPASS', 'password');
DEFINE ('SERVER', '127.0.0.1');
DEFINE ('DATABASE', 'Sunday');

$data_missing = array();
if(empty($data_missing)){
  if(empty($_POST['oldword'])){
    $data_missing[0] = 'old word';
  } elseif (empty($_POST['newword'])){
    $data_missing[0] = 'new word';
  }
}
if ($chosentable == 'verbtable') {
  if(empty($data_missing)){
    $oldword = $_POST['oldword'];
    $newword = $_POST['newword'];
    $oldword = preg_replace("/[^a-z]+/i", " ", $oldword);
    $newword = preg_replace("/[^a-z]+/i", " ", $newword);
    $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
    $query = "UPDATE verbtable SET base_verb = '$newword' WHERE base_verb = '$oldword'";
    $response = @mysqli_query($mysqli, $query);
    $mysqli->close();
    header("Location: http://localhost/~xiaomengli/phptesting/music/boss/boss_update_display.php");
    exit;
  }

  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  $query = "SELECT base_verb, past, past_participle FROM verbtable LIMIT 15";
  $response = @mysqli_query($mysqli, $query);

  if($response){
    echo '<table align="center"
    cellspacing="3" cellpadding="8">
    <tr><td align="center"><b>base_form</b></td>
    <td align="center"><b>past</b></td>
    <td align="center"><b>past_participle</b></td></tr>';
  // mysqli_fetch_array will return a row of data from the query
  // until no further data is available
    while($row = mysqli_fetch_array($response)){
      echo '<tr><td align="center">';
      echo "<td>" . $row['base_verb'] . '</td><td align="center">' ;
      echo "<td>" . $row['past'] . '</td><td align="center">' ;
      echo "<td>" . $row['past_participle'] . '</td><td align="center">' ;
      echo '</tr>';
    }
    echo '</table>';
  } else {
    echo "Couldn't issue database query<br />";
    echo mysqli_error($mysqli);
  }
  $mysqli->close();


} elseif ($chosentable == 'nountable') {
  if(empty($data_missing)){
    $oldword = $_POST['oldword'];
    $newword = $_POST['newword'];
    $oldword = preg_replace("/[^a-z]+/i", " ", $oldword);
    $newword = preg_replace("/[^a-z]+/i", " ", $newword);
    $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
    $query = "UPDATE nountable SET base_noun = '$newword' WHERE base_noun = '$oldword'";
    $response = @mysqli_query($mysqli, $query);
    $mysqli->close();
    header("Location: http://localhost/~xiaomengli/phptesting/music/boss/boss_update_display.php");
    exit;
  }
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  $query = "SELECT base_noun FROM nountable LIMIT 15";
  $response = @mysqli_query($mysqli, $query);

  if($response){
    echo '<table align="center"
    cellspacing="3" cellpadding="8">
    <tr><td align="center"><b>base_noun</b></td></tr>';
  // mysqli_fetch_array will return a row of data from the query
  // until no further data is available
    while($row = mysqli_fetch_array($response)){
      echo '<tr><td align="center">';
      echo "<td>" . $row['base_noun'] . '</td><td align="center">' ;
      echo '</tr>';
    }
    echo '</table>';
  } else {
    echo "Couldn't issue database query<br />";
    echo mysqli_error($mysqli);
  }
  $mysqli->close();


} elseif ($chosentable == 'adjtable') {
  if(empty($data_missing)){
    $oldword = $_POST['oldword'];
    $newword = $_POST['newword'];
    $oldword = preg_replace("/[^a-z]+/i", " ", $oldword);
    $newword = preg_replace("/[^a-z]+/i", " ", $newword);
    $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
    $query = "UPDATE adjtable SET base_adjective = '$newword' WHERE base_adjective = '$oldword'";
    $response = @mysqli_query($mysqli, $query);
    $mysqli->close();
    header("Location: http://localhost/~xiaomengli/phptesting/music/boss/boss_update_display.php");
    exit;
  }
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  $query = "SELECT base_adjective, comparative, superlative FROM adjtable LIMIT 15";
  $response = @mysqli_query($mysqli, $query);

  if($response){
    echo '<table align="center"
    cellspacing="3" cellpadding="8">
    <tr><td align="center"><b>base_adjective</b></td>
    <td align="center"><b>comparative</b></td>
    <td align="center"><b>superlative</b></td></tr>';
  // mysqli_fetch_array will return a row of data from the query
  // until no further data is available
    while($row = mysqli_fetch_array($response)){
      echo '<tr><td align="center">';
      echo "<td>" . $row['base_adjective'] . '</td><td align="center">' ;
      echo "<td>" . $row['comparative'] . '</td><td align="center">' ;
      echo "<td>" . $row['superlative'] . '</td><td align="center">' ;
      echo '</tr>';
    }
    echo '</table>';
  } else {
    echo "Couldn't issue database query<br />";
    echo mysqli_error($mysqli);
  }
  $mysqli->close();


} elseif ($chosentable == 'advtable') {
  if(empty($data_missing)){
    $oldword = $_POST['oldword'];
    $newword = $_POST['newword'];
    $oldword = preg_replace("/[^a-z]+/i", " ", $oldword);
    $newword = preg_replace("/[^a-z]+/i", " ", $newword);
    $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
    $query = "UPDATE advtable SET adverb = '$newword' WHERE adverb = '$oldword'";
    $response = @mysqli_query($mysqli, $query);
    $mysqli->close();
    header("Location: http://localhost/~xiaomengli/phptesting/music/boss/boss_update_display.php");
    exit;
  }
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  $query = "SELECT adverb FROM advtable LIMIT 15";
  $response = @mysqli_query($mysqli, $query);

  if($response){
    echo '<table align="center"
    cellspacing="3" cellpadding="8">
    <tr><td align="center"><b>adverb</b></td></tr>';
  // mysqli_fetch_array will return a row of data from the query
  // until no further data is available
    while($row = mysqli_fetch_array($response)){
      echo '<tr><td align="center">';
      echo "<td>" . $row['adverb'] . '</td><td align="center">' ;
      echo '</tr>';
    }
    echo '</table>';
  } else {
    echo "Couldn't issue database query<br />";
    echo mysqli_error($mysqli);
  }
  $mysqli->close();
}
?>
<?php
echo "<font size='6' face='Arial'>";
?>

<html>
<head>
<title> Choose what information you want to update</title>
</head>
<body background = "paris.jpg">
<form action="http://localhost/~xiaomengli/phptesting/music/boss/boss_update_nonuser.php" method="post">
<b>Choose what information you want to update</b>
<p>
</p>
<b>UPDATE tables</b>
<p>Choose a word in the first colunm
<input type="text" name="oldword" size="" value="" />
</p>
<p>Input a word that you want your chosen word to change into
<input type="text" name="newword" size="" value="" />
</p>
<p>
<input type="submit" name="submit_word" value="Send" />
</p>
</form>
</body>
</html>
