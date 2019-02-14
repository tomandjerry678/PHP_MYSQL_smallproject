<?php
session_start();
DEFINE ('DBUSER', 'xiaomengrules');
DEFINE ('DBPASS', 'password');
DEFINE ('SERVER', '127.0.0.1');
DEFINE ('DATABASE', 'Sunday');
$data_input = array();
if(empty($data_input)){
  if(!(!empty($_POST['account']) && !empty($_POST['password']) && !empty($_POST['email'])&& !empty($_POST['salary']))){
    $data_input[0] = 'You must input all of four of them.';
  }
}
if(!empty($_POST['account']) && !empty($_POST['password']) && !empty($_POST['email'])&& !empty($_POST['salary'])){

  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  $account = $_POST['account'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $salary = $_POST['salary'];

  $account = preg_replace("/[^a-z0-9@]+/i", " ", $account);
  $password = preg_replace("/[^a-z0-9@]+/i", " ", $password);
  $email = preg_replace("/[^a-z0-9@.]+/i", " ", $email);
  $salary = preg_replace("/[^a-z0-9]+/i", " ", $salary);

  $result_insert_boss = $mysqli->query("INSERT INTO usertable (Account, Password, email, salary) VALUES ('$account', '$password', '$email', '$salary')");
  $mysqli->close();

  $_SESSION['account'] = $account;
  $_SESSION['password'] = $password;
  $_SESSION['email'] = $email;
  $_SESSION['salary'] = $salary;

  header("Location: http://localhost/~xiaomengli/phptesting/music/boss/boss_insert_display.php");
  exit;
} else {
  echo $data_input[0];
}
?>
<html>
<head>
<title> Choose what you want to</title>
</head>

<form action="http://localhost/~xiaomengli/phptesting/music/boss/boss_insert_user.php" method="post">
<b>What do you want to insert? </b>
<p>
</p>
<b>BOSS INSERT</b>
<p>
</p>
<p>Account
<input type="text" name="account" size="" value="" />
</p>
<p>Password
<input type="text" name="password" size="" value="" />
</p>
<p>Email
<input type="text" name="email" size="" value="" />
</p>
<p>Salary
<input type="text" name="salary" size="" value="" />
</p>
<p>
<input type="submit" name="submit_boss" value="Send" />
</p>
</form>
</body>
</html>
