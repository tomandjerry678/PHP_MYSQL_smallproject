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
  if (empty($_POST['newword'])){
    $data_missing[0] = 'new word';
  }
}

if ($chosentable == 'verbtable') {
  if(empty($data_missing)){
    $newword = $_POST['newword'];
    $newword = preg_replace("/[^a-z]+/i", " ", $newword);
    $_SESSION['newword'] = $newword;
    $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
    $query = "INSERT INTO verbtable (base_verb) VALUES ('$newword')";
    $response = @mysqli_query($mysqli, $query);
    $mysqli->close();
    header("Location: http://localhost/~xiaomengli/phptesting/music/boss/boss_insert_display.php");
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
    $newword = $_POST['newword'];
    $newword = preg_replace("/[^a-z]+/i", " ", $newword);
    $_SESSION['newword'] = $newword;
    $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
    $query = "INSERT INTO nountable (base_noun) VALUES ('$newword')";
    $response = @mysqli_query($mysqli, $query);
    $mysqli->close();
    header("Location: http://localhost/~xiaomengli/phptesting/music/boss/boss_insert_display.php");
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
    $newword = $_POST['newword'];
    $newword = preg_replace("/[^a-z]+/i", " ", $newword);
    $_SESSION['newword'] = $newword;
    $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
    $query = "INSERT INTO adjtable (base_adjective) VALUES ('$newword')";
    $response = @mysqli_query($mysqli, $query);
    $mysqli->close();
    header("Location: http://localhost/~xiaomengli/phptesting/music/boss/boss_insert_display.php");
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
    $newword = $_POST['newword'];
    $newword = preg_replace("/[^a-z]+/i", " ", $newword);
    $_SESSION['newword'] = $newword;
    $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
    $query = "INSERT INTO advtable (adverb) VALUES ('$newword')";
    $response = @mysqli_query($mysqli, $query);
    $mysqli->close();
    header("Location: http://localhost/~xiaomengli/phptesting/music/boss/boss_insert_display.php");
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
<title> Choose what information you want to insert</title>
</head>
<body background = "paris.jpg">
<form action="http://localhost/~xiaomengli/phptesting/music/boss/boss_insert_nonuser.php" method="post">
<b>Choose what information you want to insert</b>
<p>
</p>
<b>Insert tables</b>
<p>Insert a word that you want as your new primary word
<input type="text" name="newword" size="" value="" />
</p>
<p>
<input type="submit" name="submit_word" value="Send" />
</p>
</form>
</body>
</html>
