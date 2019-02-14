<?php
session_start();
$user = $_SESSION['user'];
$_SESSION['user'] = $user;
$data_input = array();
$chosentable = $_SESSION['tablechosen'];

if(empty($data_missing)){
  if(empty($_POST['update']) && empty($_POST['insert'])){
    $data_input[0] = 'You must choose one';
  } elseif (empty($_POST['insert']) && !empty($_POST['update'])){
    $data_input[0] = 'update';
  } elseif (empty($_POST['update']) && !empty($_POST['insert'])){
    $data_input[0] = 'insert';
  }
}

$_SESSION['tablechosen'] = $chosentable;

if ($data_input[0] == 'update' && $chosentable == 'usertable'){
  header("Location: http://localhost/~xiaomengli/phptesting/music/employee/employee_update_user.php");
  exit;
} elseif ($data_input[0] == 'update' && $chosentable !== 'usertable'){
  header("Location: http://localhost/~xiaomengli/phptesting/music/employee/employee_update_nonuser.php");
  exit;
} elseif ($data_input[0] == 'insert' && $chosentable == 'usertable'){
  header("Location: http://localhost/~xiaomengli/phptesting/music/employee/employee_insert_user.php");
  exit;
} elseif ($data_input[0] == 'insert' && $chosentable !== 'usertable'){
  header("Location: http://localhost/~xiaomengli/phptesting/music/employee/employee_insert_nonuser.php");
  exit;
} else {
  echo $data_input[0];
}
?>
<?php
echo "<font size='6' face='Arial'>";
?>
<html>
<head>
<title>Choose what you want to</title>
</head>

<form action="http://localhost/~xiaomengli/phptesting/music/employee/implementchoosing.php" method="post">
<b>Choose what you want to</b>
<p>
</p>
<b>UPDATE tables</b>
<p>
<input type="text" name="update" size="" value="" />
</p>
<b>INSERT tables</b>
<p>
<input type="text" name="insert" size="" value="" />
</p>
<p>
<input type="submit" name="submit_songnames" value="Send" />
</p>
</form>
</body>
</html>
