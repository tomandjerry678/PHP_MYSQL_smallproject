<?php
session_start();
$data_input = array();
$chosentable = $_SESSION['tablechosen'];

if(empty($data_missing)){
  if(empty($_POST['select']) && empty($_POST['update']) && empty($_POST['insert'])&& empty($_POST['delete'])){
    $data_input[0] = 'You must choose one';
  } elseif (empty($_POST['update']) && empty($_POST['insert']) && empty($_POST['delete'])){
    $data_input[0] = 'select';
  } elseif (empty($_POST['select']) && empty($_POST['insert']) && empty($_POST['delete'])){
    $data_input[0] = 'update';
  } elseif (empty($_POST['select']) && empty($_POST['update']) && empty($_POST['delete'])){
    $data_input[0] = 'insert';
  } elseif (empty($_POST['select']) && empty($_POST['update']) && empty($_POST['insert'])){
    $data_input[0] = 'delete';
  }
}

$_SESSION['tablechosen'] = $chosentable;

if ($data_input[0] == 'select'){
  header("Location: http://localhost/~xiaomengli/phptesting/music/boss/boss_select.php");
  exit;
} elseif ($data_input[0] == 'update' && $chosentable == 'usertable'){
  header("Location: http://localhost/~xiaomengli/phptesting/music/boss/boss_update_user.php");
  exit;
} elseif ($data_input[0] == 'update' && $chosentable !== 'usertable'){
  header("Location: http://localhost/~xiaomengli/phptesting/music/boss/boss_update_nonuser.php");
  exit;
} elseif ($data_input[0] == 'insert' && $chosentable == 'usertable'){
  header("Location: http://localhost/~xiaomengli/phptesting/music/boss/boss_insert_user.php");
  exit;
} elseif ($data_input[0] == 'insert' && $chosentable !== 'usertable'){
  header("Location: http://localhost/~xiaomengli/phptesting/music/boss/boss_insert_nonuser.php");
  exit;
} elseif ($data_input[0] == 'delete'){
  header("Location: http://localhost/~xiaomengli/phptesting/music/boss/boss_delete.php");
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
<body background = "paris.jpg">
<form action="http://localhost/~xiaomengli/phptesting/music/boss/implementchoosing.php" method="post">
<b>Choose what you want to</b>
<p>
</p>
<b>SELECT tables</b>
<p>
<input type="text" name="select" size="" value="" />
</p>
<b>UPDATE tables</b>
<p>
<input type="text" name="update" size="" value="" />
</p>
<b>INSERT tables</b>
<p>
<input type="text" name="insert" size="" value="" />
</p>
<b>DELETE tables</b>
<p>
<input type="text" name="delete" size="" value="" />
</p>
<p>
<input type="submit" name="submit_songnames" value="Send" />
</p>
</form>
</body>
</html>
