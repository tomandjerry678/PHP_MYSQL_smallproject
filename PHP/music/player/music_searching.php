<?php
session_start();
#echo "<font size='5' face='Arial'>";

$player_one_info = $_SESSION['player_one_info'];
$player_two_info = $_SESSION['player_two_info'];

$empty = " ";
if(($player_one_info[1] !== $empty) && ($player_one_info[2] !== $empty) && ($player_two_info[1] !== $empty) && ($player_two_info[2] !== $empty)){
  #echo "Enough imformation received, begin to filter the song names. " . "<br />";

  $player_one_info[2] = preg_replace("/[^a-z]+/i", " ", $player_one_info[2]);
  $player_two_info[2] = preg_replace("/[^a-z]+/i", " ", $player_two_info[2]);

  $player_one_info[2] = rtrim($player_one_info[2]);
  $player_two_info[2] = rtrim($player_two_info[2]);

  $player_one_info[2] = strtolower($player_one_info[2]);
  $player_two_info[2] = strtolower($player_two_info[2]);

  $song_words_one = explode(" ", $player_one_info[2]);
  $song_words_two = explode(" ", $player_two_info[2]);
  #print_r ($song_words). "<br />";
  $numberof_song_words_one = count($song_words_one);
  $numberof_song_words_two = count($song_words_two);

  #echo "Number of words in first song is : " . $numberof_song_words_one . " from player: " . $player_one_info[1]  . "<br />";
  #echo "Number of words in second song is : " . $numberof_song_words_two . " from player: " . $player_two_info[1]  . "<br />";

  $k = 0;
  $e = 0;
  $f = 0;
  $g = 0;
  $aa = "the"; $bb = "a"; $cc = "an";
  $final_song_words_one = array();
  $final_song_words_two = array();

  while($k < $numberof_song_words_one){
    if((($song_words_one[$k] !== $aa) && ($song_words_one[$k] !== $bb)) && ($song_words_one[$k] !== $cc)){
      $final_song_words_one[$e] = $song_words_one[$k];
      $e = $e + 1;
    }
    $k = $k + 1;
  }
  while($f < $numberof_song_words_two){
    if((($song_words_two[$f] !== $aa) && ($song_words_two[$f] !== $bb)) && ($song_words_two[$f] !== $cc)){
      $final_song_words_two[$g] = $song_words_two[$f];
      $g = $g + 1;
    }
    $f = $f + 1;
  }

  $numberof_final_song_words_one = count($final_song_words_one);
  $numberof_final_song_words_two = count($final_song_words_two);
  $jj = 0;
  $ii = 0;
  while($jj < $numberof_final_song_words_one){
    #echo "$final_song_words_one[$jj]". "<br />";
    $jj = $jj + 1;
  }
  while($ii < $numberof_final_song_words_two){
    #echo "$final_song_words_two[$ii]". "<br />";
    $ii = $ii + 1;
  }
}

$player_one_info[2] = 'NAN';
$player_two_info[2] = 'NAN';
$_SESSION['player_one_info'] = $player_one_info;
$_SESSION['player_two_info'] = $player_two_info;
$_SESSION['final_song_words_one'] = $final_song_words_one;
$_SESSION['final_song_words_two'] = $final_song_words_two;
if ($jj > 1 && $ii > 1){
  header("Location: http://localhost/~xiaomengli/phptesting/music/player/music_searchingfromtable.php");
  exit;
} else {
  echo "Songs must contain at least two words, not including 'the', 'a', or 'an'. ";
}
?>
<html>
<head>
<title>song names search</title>
</head>

<form action="http://localhost/~xiaomengli/phptesting/music/player/music_searching.php" method="post">

</form>
</body>
</html>
