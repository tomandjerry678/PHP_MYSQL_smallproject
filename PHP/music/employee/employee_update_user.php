<?php
session_start();
$user = $_SESSION['user'];
$_SESSION['user'] = $user;
DEFINE ('DBUSER', 'xiaomengrules');
DEFINE ('DBPASS', 'password');
DEFINE ('SERVER', '127.0.0.1');
DEFINE ('DATABASE', 'Sunday');

function inputfilter($input){
  $input = str_replace("", "\'", $input);
  return $input;
}
$data_missing = array();
if(empty($data_missing)){
  if(empty($_POST['newemail'])){
    $data_missing[0] = 'newemail';
  }
}
if(empty($data_missing)){
  $newemail = $_POST['newemail'];
  #$newemail = preg_replace("/[^a-z0-9@.]+/i", " ", $newemail);
  $newemail = inputfilter($newemail);
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  $query = "UPDATE usertable SET email = '$newemail' WHERE Account = '$user'";
  $response = @mysqli_query($mysqli, $query);
  $mysqli->close();
  header("Location: http://localhost/~xiaomengli/phptesting/music/employee/employee_update_display.php");
  exit;
}

$mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
$query = "SELECT ID, email, salary FROM usertable where Account = '$user'";
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
<title> Choose email you want to update</title>
</head>

<form action="http://localhost/~xiaomengli/phptesting/music/employee/employee_update_user.php" method="post">
<b>Input email</b>
<p>
</p>
<b>UPDATE tables</b>
<p>Input new email
<input type="text" name="newemail" size="" value="" />
</p>
<p>
<input type="submit" name="submit_songnames" value="Send" />
</p>
</form>
</body>
</html>
