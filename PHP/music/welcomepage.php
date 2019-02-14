<?php
$data_input = array();
if(empty($data_input)){
  if(empty($_POST['Boss']) && empty($_POST['Employee']) && empty($_POST['Player'])){
    $data_input[0] = 'You must choose one';
  } elseif (empty($_POST['Boss']) && empty($_POST['Employee'])){
    $data_input[0] = 'Player';
  } elseif (empty($_POST['Employee']) && empty($_POST['Player'])){
    $data_input[0] = 'Boss';
  } elseif (empty($_POST['Player']) && empty($_POST['Boss'])){
    $data_input[0] = 'Employee';
  }
}
if ($data_input[0] == 'Player'){
  header("Location: http://localhost/~xiaomengli/phptesting/music/player/addplayer.php");
  exit;
} elseif ($data_input[0] == 'Boss'){
  header("Location: http://localhost/~xiaomengli/phptesting/music/bosslogin.php");
  exit;
} elseif ($data_input[0] == 'Employee'){
  header("Location: http://localhost/~xiaomengli/phptesting/music/employeelogin.php");
  exit;
} else {
  echo $data_input[0];
}
?>
<html>
<head>
<title>Welcome, Please choose your identity</title>
</head>

<form action="http://localhost/~xiaomengli/phptesting/music/welcomepage.php" method="post">
<b>Choose your role</b>
<p>
</p>
<b>Boss(input B)</b>
<p>
<input type="text" name="Boss" size="" value="" />
</p>
<b>Employee(input E)</b>
<p>
<input type="text" name="Employee" size="" value="" />
</p>
<b>Player(input P)</b>
<p>
<input type="text" name="Player" size="" value="" />
</p>
<p>
<input type="submit" name="submit_playerinfo" value="Send" />
</p>
</form>
</body>
</html>
