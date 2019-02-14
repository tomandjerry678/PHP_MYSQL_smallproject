<?php
session_start();
#echo "<font size='5' face='Arial'>";
$data_missing = array();
if(empty($data_missing)){
  if(empty($_POST['number_players'])){
    $data_missing[0] = 'number_of_players';
  } elseif (empty($_POST['player_one_name'])){
    $data_missing[0] = 'player_one_name';
  } elseif (empty($_POST['player_two_name'])){
    $data_missing[0] = 'player_two_name';
  }
}
#print_r ($data_missing);
if(empty($data_missing)){
  $_SESSION['number_players'] = $_POST['number_players'];
  $_SESSION['player_one_name'] = $_POST['player_one_name'];
  $_SESSION['player_two_name'] = $_POST['player_two_name'];
  header("Location: http://localhost/~xiaomengli/phptesting/music/player/music_input_songnames.php");
  exit;
} else {
  echo 'You need to enter the following data: <br />';
  print_r ($data_missing[0]);

}
?>
<html>
<head>
<title>Add Player Information</title>
</head>

<form action="http://localhost/~xiaomengli/phptesting/music/player/addplayer.php" method="post">
<b>Add number of players</b>
<p>number_players:
<input type="int" name="number_players" size="" value="" />
</p>
<b>Input Player Names</b>
<p>
<input type="text" name="player_one_name" size="" value="" />
</p>
<p>
<input type="text" name="player_two_name" size="" value="" />
</p>
<p>
<input type="submit" name="submit_playerinfo" value="Send" />
</p>
</form>
</body>
</html>
