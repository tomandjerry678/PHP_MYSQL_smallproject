<?php
DEFINE ('DBUSER', 'xiaomengrules');
DEFINE ('DBPASS', 'password');
DEFINE ('SERVER', '127.0.0.1');
DEFINE ('DATABASE', 'Sunday');
$data_missing = array();
if(empty($data_missing)){
  if(empty($_POST['username'])){
    $data_missing[0] = 'username';
  } elseif (empty($_POST['password'])){
    $data_missing[0] = 'password';
  }
}
if(empty($data_missing)){
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  #require_once('/Users/xiaomengli/Sites/phptesting/music/mysqli_connect_music.php');
  $user = $_POST['username'];
  $result_account = $mysqli->query("SELECT Account FROM usertable where Account = '$user'AND ID = 1");

  $password = $_POST['password'];
  $result_password = $mysqli->query("SELECT Password FROM usertable where Password = '$password'AND ID = 1");

  if (($result_account->num_rows !== 0) && ($result_password->num_rows !== 0)){
    header("Location: http://localhost/~xiaomengli/phptesting/music/boss/bosschoosetable.php");
    exit;
  } elseif($result_account->num_rows == 0){
    echo "No, the account does not exist. <br />";
  } elseif($result_password->num_rows == 0){
    echo "No, the password is wrong. <br />";
  }
  $mysqli->close();
} else {
  echo 'You need to enter the following data: <br />';
  print_r ($data_missing[0]);
}
?>
<html>
<head>
<title>Please Log In</title>
</head>

<form action="http://localhost/~xiaomengli/phptesting/music/bosslogin.php" method="post">
<b>Add boss name</b>
<p>username
<input type="text" name="username" size="" value="" />
</p>
<b>Add boss password</b>
<p>
<input type="text" name="password" size="" value="" />
</p>
<p>
<input type="submit" name="submit_playerinfo" value="Send" />
</p>
</form>
</body>
</html>
