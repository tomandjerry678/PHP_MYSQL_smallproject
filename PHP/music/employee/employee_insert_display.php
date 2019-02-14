<?php
session_start();
$newword = $_SESSION['newword'];
$user = $_SESSION['account'];
$chosentable = $_SESSION['tablechosen'];
DEFINE ('DBUSER', 'xiaomengrules');
DEFINE ('DBPASS', 'password');
DEFINE ('SERVER', '127.0.0.1');
DEFINE ('DATABASE', 'Sunday');

if ($chosentable == 'usertable') {
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  $query = "SELECT Account, Password, email, salary FROM usertable where Account = '$user'";
  $response = @mysqli_query($mysqli, $query);
  if($response){
    echo '<table align="center"
    cellspacing="3" cellpadding="8">
    <tr><td align="center"><b>Account</b></td>
    <td align="center"><b>Password</b></td>
    <td align="center"><b>email</b></td>
    <td align="center"><b>salary</b></td></tr>';
  // mysqli_fetch_array will return a row of data from the query
  // until no further data is available
    while($row = mysqli_fetch_array($response)){
      echo '<tr><td align="center">';
      echo "<td>" . $row['Account'] . '</td><td align="center">' ;
      echo "<td>" . $row['Password'] . '</td><td align="center">';
      echo "<td>" . $row['email'] . '</td><td align="center">';
      echo "<td>" . $row['salary'] . '</td><td align="center">';
      echo '</tr>';
    }
    echo '</table>';
  } else {
    echo "Couldn't issue database query<br />";
    echo mysqli_error($mysqli);
  }
  $mysqli->close();


} elseif ($chosentable == 'nountable') {
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  $query = "SELECT base_noun FROM nountable WHERE base_noun = '$newword'";
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
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  $query = "SELECT base_adjective, comparative, superlative FROM adjtable WHERE base_adjective = '$newword'";
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
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  $query = "SELECT adverb FROM advtable WHERE adverb = '$newword'";
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


} elseif ($chosentable == 'verbtable') {
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  $query = "SELECT base_verb, past, past_participle FROM verbtable WHERE base_verb = '$newword'";
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
}
?>
<html>
<head>
<title>Employee Insert Review </title>
</head>
<form action="http://localhost/~xiaomengli/phptesting/music/employee/employee_insert_display.php" method="post">
<p>
</p>
</form>
</body>
</html>
