<?php
session_start();
DEFINE ('DBUSER', 'xiaomengrules');
DEFINE ('DBPASS', 'password');
DEFINE ('SERVER', '127.0.0.1');
DEFINE ('DATABASE', 'Sunday');

$data_missing = array();
if(empty($data_missing)){
  if(empty($_POST['PersonID'])){
    $data_missing[0] = 'PersonID';
  } elseif (empty($_POST['PersonSalary'])){
    $data_missing[0] = 'PersonSalary';
  }
}
if(empty($data_missing)){
  $ID = $_POST['PersonID'];
  $salary = $_POST['PersonSalary'];
  $ID = preg_replace("/[^a-z0-9@]+/i", " ", $ID);
  $salary = preg_replace("/[^a-z0-9]+/i", " ", $salary);
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  $query = "UPDATE usertable SET salary = '$salary' WHERE ID = '$ID'";
  $response = @mysqli_query($mysqli, $query);
  $mysqli->close();
  header("Location: http://localhost/~xiaomengli/phptesting/music/boss/boss_update_display.php");
  exit;
}

$mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
$query = "SELECT ID, email, salary FROM usertable";
$response = @mysqli_query($mysqli, $query);

if($response){
  echo '<table align="center"
  cellspacing="3" cellpadding="8">
  <tr><td align="center"><b>ID</b></td>
  <td align="center"><b>email</b></td>
  <td align="center"><b>salary</b></td></tr>';
// mysqli_fetch_array will return a row of data from the query
// until no further data is available
  while($row = mysqli_fetch_array($response)){
    echo '<tr><td align="center">';
    echo "<td>" . $row['ID'] . '</td><td align="center">' ;
    echo "<td>" . $row['email'] . '</td><td align="center">';
    echo "<td>" . $row['salary'] . '</td><td align="center">';
    echo '</tr>';
  }
  echo '</table>';
}
$mysqli->close();
?>
<?php
echo "<font size='6' face='Arial'>";
?>

<html>
<head>
<title> Choose whose salary you want to update</title>
</head>

<form action="http://localhost/~xiaomengli/phptesting/music/boss/boss_update_user.php" method="post">
<b>Choose whose salary you want to update</b>
<p>
</p>
<b>UPDATE tables</b>
<p>Input this person's ID
<input type="text" name="PersonID" size="" value="" />
</p>
<p>Input this person's salary
<input type="text" name="PersonSalary" size="" value="" />
</p>
<p>
<input type="submit" name="submit_songnames" value="Send" />
</p>
</form>
</body>
</html>
