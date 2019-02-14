<?php
session_start();
#echo "<font size='5' face='Arial'>";
#echo "The first player is: " . $_SESSION['player_one_name'] . "<br />";
#echo "The second player is: " . $_SESSION['player_two_name'] . "<br />";
$player_one_info = array();
$player_two_info = array();
$player_one_info[0] = 1;
$player_two_info[0] = 2;
$player_one_info[1] = $_SESSION['player_one_name'];
$player_two_info[1] = $_SESSION['player_two_name'];

$data_missing = array();
if(empty($data_missing)){
  if(empty($_POST['song_name_one'])){
    $data_missing[0] = 'song_name_one';
  } elseif (empty($_POST['song_name_two'])){
    $data_missing[0] = 'song_name_two';
  }
}
if(empty($data_missing)){
  $player_one_info[2] = $_POST['song_name_one'];
  $player_two_info[2] = $_POST['song_name_two'];
  $_SESSION['player_one_info'] = $player_one_info;
  $_SESSION['player_two_info'] = $player_two_info;
  header("Location: http://localhost/~xiaomengli/phptesting/music/player/music_searching.php");
  exit;
} else {
  echo 'You need to enter the following data: <br />';
  print_r ($data_missing[0]);
}
?>
<html>
<head>
<title>Add song names</title>
</head>

<form action="http://localhost/~xiaomengli/phptesting/music/player/music_input_songnames.php" method="post">
<b>Add song_name for player one</b>
<p>song_name_one
<input type="text" name="song_name_one" size="" value="" />
</p>
<b>Add song_name for player two</b>
<p>song_name_two
<input type="text" name="song_name_two" size="" value="" />
</p>
<p>
<input type="submit" name="submit_songnames" value="Send" />
</p>
</form>
</body>
</html>
