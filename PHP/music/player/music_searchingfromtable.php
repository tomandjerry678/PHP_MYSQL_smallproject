<?php
session_start();
/*
echo "<font size='5' face='Arial'>";
echo "The first song is: " . "<br />";
print_r ($_SESSION['final_song_words_one']);
echo '<br/>';
echo "The second song is: " . "<br />";
print_r ($_SESSION['final_song_words_two']);
echo '<br/>';
*/
$final_song_words_one = $_SESSION['final_song_words_one'];
$final_song_words_two = $_SESSION['final_song_words_two'];

$count_1 = count($final_song_words_one);
$count_2 = count($final_song_words_two);
$cw = 0;
$cw_same = 0;
if($count_1 == $count_2){
  while($cw < $count_1){
    while(true){
      if($final_song_words_one[$cw] == $final_song_words_two[$cw]){
        $cw_same = $cw_same + 1;
      }
      break;
    }
  $cw = $cw + 1;
  }
}
if ($cw_same == $count_1){
  exit("ERROR: player two input exactly same information, please restart the game!!!");
}

$player_one_info = $_SESSION['player_one_info'];
$player_two_info = $_SESSION['player_two_info'];

$_SESSION['player_one_info'] = $player_one_info;
$_SESSION['player_two_info'] = $player_two_info;

DEFINE ('DBUSER', 'xiaomengrules');
DEFINE ('DBPASS', 'password');
DEFINE ('SERVER', '127.0.0.1');
DEFINE ('DATABASE', 'Sunday');

$mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
$query = "INSERT INTO song_copy SELECT * FROM songtable";
$response = @mysqli_query($mysqli, $query);
$query = "INSERT INTO word_copy SELECT * FROM wordtable";
$response = @mysqli_query($mysqli, $query);
$mysqli->close();

$mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
$query = "UPDATE song_copy SET player_name = '$player_one_info[1]' WHERE player_id = 1";
$response = @mysqli_query($mysqli, $query);
echo mysqli_error($mysqli);
$mysqli->close();

$mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
$query = "UPDATE song_copy SET player_name = '$player_two_info[1]' WHERE player_id = 2";
$response = @mysqli_query($mysqli, $query);
echo mysqli_error($mysqli);
$mysqli->close();

$a = 0; $b= 0; $c = 0; $d= 0;

$wordarray = array();
$wordarray[0] = 'word1'; $wordarray[3] = 'word4'; $wordarray[6] = 'word7'; $wordarray[9] = 'word10'; $wordarray[12] = 'word13';
$wordarray[1] = 'word2'; $wordarray[4] = 'word5'; $wordarray[7] = 'word8'; $wordarray[10] = 'word11'; $wordarray[13] = 'word14';
$wordarray[2] = 'word3'; $wordarray[5] = 'word6'; $wordarray[8] = 'word9'; $wordarray[11] = 'word12'; $wordarray[14] = 'word15';

while($a < count($final_song_words_one)){
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  $query = "UPDATE song_copy SET $wordarray[$a] = '$final_song_words_one[$a]' WHERE player_id = 1";
  $response = @mysqli_query($mysqli, $query);
  $ida = $a + 1;
  $query = "UPDATE word_copy SET word = '$final_song_words_one[$a]' WHERE ID = $ida";
  $response = @mysqli_query($mysqli, $query);
  echo mysqli_error($mysqli);
  $mysqli->close();
  $a = $a + 1;
}
while($b < count($final_song_words_two)){
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  $query = "UPDATE song_copy SET $wordarray[$b] = '$final_song_words_two[$b]' WHERE player_id = 2";
  $response = @mysqli_query($mysqli, $query);
  $idb = 15 + $b + 1;
  $query = "UPDATE word_copy SET word = '$final_song_words_two[$b]' WHERE ID = $idb";
  $response = @mysqli_query($mysqli, $query);
  echo mysqli_error($mysqli);
  $mysqli->close();
  $b = $b + 1;
}
#here begin to insert into word table from player one
#here what do the searching just for verb table;
$aa = 0;
while($aa < count($final_song_words_one)){
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  while(true){
    $query = "SELECT base_verb FROM verbtable where base_verb = '$final_song_words_one[$aa]'";
    $result_1 = $mysqli->query("SELECT base_verb FROM verbtable where base_verb = '$final_song_words_one[$aa]'");
    if ($result_1->num_rows !== 0){
      break;
    } elseif ($result_1->num_rows == 0){
      $query = "SELECT base_verb FROM verbtable where past = '$final_song_words_one[$aa]'";
      $result_1 = $mysqli->query("SELECT base_verb FROM verbtable where past = '$final_song_words_one[$aa]'");
      if ($result_1->num_rows !== 0) {
        break;
      } elseif ($result_1->num_rows == 0){
        $query = "SELECT base_verb FROM verbtable where past_participle = '$final_song_words_one[$aa]'";
        $result_1 = $mysqli->query("SELECT base_verb FROM verbtable where past_participle = '$final_song_words_one[$aa]'");
        if ($result_1->num_rows !== 0) {
          break;
        } elseif ($result_1->num_rows == 0){
          $query = "SELECT base_verb FROM verbtable where third_person = '$final_song_words_one[$aa]'";
          $result_1 = $mysqli->query("SELECT base_verb FROM verbtable where third_person = '$final_song_words_one[$aa]'");
          if ($result_1->num_rows !== 0) {
            break;
          } elseif ($result_1->num_rows == 0){
            $query = "SELECT base_verb FROM verbtable where gerund = '$final_song_words_one[$aa]'";
            $result_1 = $mysqli->query("SELECT base_verb FROM verbtable where gerund = '$final_song_words_one[$aa]'");
            if ($result_1->num_rows !== 0) {
              break;
            } elseif ($result_1->num_rows == 0){
              $query = "SELECT base_verb FROM verbtable where related_noun_1 = '$final_song_words_one[$aa]'";
              $result_1 = $mysqli->query("SELECT base_verb FROM verbtable where related_noun_1 = '$final_song_words_one[$aa]'");
              if ($result_1->num_rows !== 0) {
                break;
              } elseif ($result_1->num_rows == 0){
                $query = "SELECT base_verb FROM verbtable where related_noun_2 = '$final_song_words_one[$aa]'";
                $result_1 = $mysqli->query("SELECT base_verb FROM verbtable where related_noun_2 = '$final_song_words_one[$aa]'");
                break;
              }
          }
        }
      }
    }
    }
  }
  if ($result_1->num_rows !== 0) {
    $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
    $response = @mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($response);
    $w = $row['base_verb'];
    $query = "UPDATE word_copy SET verb = '$w' WHERE word = '$final_song_words_one[$aa]'";
    $response = @mysqli_query($mysqli, $query);
    echo mysqli_error($mysqli);
    $mysqli->close();
  }
  $aa = $aa + 1;
}
#here do the searching just for noun table;
$aa = 0;
while($aa < count($final_song_words_one)){
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  while(true){
    $query = "SELECT base_noun FROM nountable where base_noun = '$final_song_words_one[$aa]'";
    $result_1 = $mysqli->query("SELECT base_noun FROM nountable where base_noun = '$final_song_words_one[$aa]'");
    echo mysqli_error($mysqli);
    if ($result_1->num_rows !== 0){
      break;
    } elseif ($result_1->num_rows == 0){
      break;
    }
  }
  if ($result_1->num_rows !== 0) {
    $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
    $response = @mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($response);
    $w = $row['base_noun'];
    $query = "UPDATE word_copy SET noun = '$w' WHERE word = '$final_song_words_one[$aa]'";
    $response = @mysqli_query($mysqli, $query);
    echo mysqli_error($mysqli);
    $mysqli->close();
  }
  $aa = $aa + 1;
}
#here do the searching just for adjtable;
$aa = 0;
while($aa < count($final_song_words_one)){
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  while(true){
    $query = "SELECT base_adjective FROM adjtable where base_adjective = '$final_song_words_one[$aa]'";
    $result_1 = $mysqli->query("SELECT base_adjective FROM adjtable where base_adjective = '$final_song_words_one[$aa]'");
    if ($result_1->num_rows !== 0){
      break;
    } elseif ($result_1->num_rows == 0){
      $query = "SELECT comparative FROM adjtable where comparative = '$final_song_words_one[$aa]'";
      $result_1 = $mysqli->query("SELECT comparative FROM adjtable where comparative = '$final_song_words_one[$aa]'");
      if ($result_1->num_rows !== 0) {
        break;
      } elseif ($result_1->num_rows == 0){
        $query = "SELECT superlative FROM adjtable where superlative = '$final_song_words_one[$aa]'";
        $result_1 = $mysqli->query("SELECT superlative FROM adjtable where superlative = '$final_song_words_one[$aa]'");
        if ($result_1->num_rows !== 0) {
          break;
        } elseif ($result_1->num_rows == 0){
          break;
        }
      }
    }
  }
  if ($result_1->num_rows !== 0) {
    $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
    $response = @mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($response);
    $w = $row['base_adjective'];
    $query = "UPDATE word_copy SET adjective = '$w' WHERE word = '$final_song_words_one[$aa]'";
    $response = @mysqli_query($mysqli, $query);
    echo mysqli_error($mysqli);
    $mysqli->close();
  }
  $aa = $aa + 1;
}
#here do the searching just for advtable;
$aa = 0;
while($aa < count($final_song_words_one)){
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  while(true){
    $query = "SELECT adverb FROM advtable where adverb = '$final_song_words_one[$aa]'";
    $result_1 = $mysqli->query("SELECT adverb FROM advtable where adverb = '$final_song_words_one[$aa]'");
    if ($result_1->num_rows !== 0){
      break;
    } elseif ($result_1->num_rows == 0){
      break;
    }
  }
  if ($result_1->num_rows !== 0) {
    $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
    $response = @mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($response);
    $w = $row['adverb'];
    $query = "UPDATE word_copy SET adverb = '$w' WHERE word = '$final_song_words_one[$aa]'";
    $response = @mysqli_query($mysqli, $query);
    echo mysqli_error($mysqli);
    $mysqli->close();
  }
  $aa = $aa + 1;
}
#here do the searching just for conjuction.
$aa = 0;
while($aa < count($final_song_words_one)){
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  while(true){
    $query = "SELECT conjuction FROM conjuctiontable where conjuction = '$final_song_words_one[$aa]'";
    $result_1 = $mysqli->query("SELECT conjuction FROM conjuctiontable where conjuction = '$final_song_words_one[$aa]'");
    if ($result_1->num_rows !== 0){
      break;
    } elseif ($result_1->num_rows == 0){
      break;
    }
  }
  if ($result_1->num_rows !== 0) {
    $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
    $response = @mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($response);
    $w = $row['conjuction'];
    $query = "UPDATE word_copy SET conjunction = '$w' WHERE word = '$final_song_words_one[$aa]'";
    $response = @mysqli_query($mysqli, $query);
    echo mysqli_error($mysqli);
    $mysqli->close();
  }
  $aa = $aa + 1;
}

#here do the searching just for contractiontable
$aa = 0;
while($aa < count($final_song_words_one)){
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  while(true){
    $query = "SELECT contraction FROM contractiontable where contraction = '$final_song_words_one[$aa]'";
    $result_1 = $mysqli->query("SELECT contraction FROM contractiontable where contraction = '$final_song_words_one[$aa]'");
    if ($result_1->num_rows !== 0){
      break;
    } elseif ($result_1->num_rows == 0){
      break;
    }
  }
  if ($result_1->num_rows !== 0) {
    $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
    $response = @mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($response);
    $w = $row['contraction'];
    $query = "UPDATE word_copy SET contraction = '$w' WHERE word = '$final_song_words_one[$aa]'";
    $response = @mysqli_query($mysqli, $query);
    echo mysqli_error($mysqli);
    $mysqli->close();
  }
  $aa = $aa + 1;
}

#here do the searching just for prepositiontable
$aa = 0;
while($aa < count($final_song_words_one)){
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  while(true){
    $query = "SELECT preposition FROM prepositiontable where preposition = '$final_song_words_one[$aa]'";
    $result_1 = $mysqli->query("SELECT preposition FROM prepositiontable where preposition = '$final_song_words_one[$aa]'");
    if ($result_1->num_rows !== 0){
      break;
    } elseif ($result_1->num_rows == 0){
      break;
    }
  }
  if ($result_1->num_rows !== 0) {
    $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
    $response = @mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($response);
    $w = $row['preposition'];
    $query = "UPDATE word_copy SET preposition = '$w' WHERE word = '$final_song_words_one[$aa]'";
    $response = @mysqli_query($mysqli, $query);
    echo mysqli_error($mysqli);
    $mysqli->close();
  }
  $aa = $aa + 1;
}
#here do the searching for homophone
$aa = 0;
while($aa < count($final_song_words_one)){
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  while(true){
    $query = "SELECT homophone_1 FROM homophonetable where homophone_1 = '$final_song_words_one[$aa]'";
    $result_1 = $mysqli->query("SELECT homophone_1 FROM homophonetable where homophone_1 = '$final_song_words_one[$aa]'");
    if ($result_1->num_rows !== 0){
      break;
    } elseif ($result_1->num_rows == 0){
      $query = "SELECT homophone_1 FROM homophonetable where homophone_2 = '$final_song_words_one[$aa]'";
      $result_1 = $mysqli->query("SELECT homophone_2 FROM homophonetable where homophone_2 = '$final_song_words_one[$aa]'");
      if ($result_1->num_rows !== 0) {
        break;
      } elseif ($result_1->num_rows == 0){
        $query = "SELECT homophone_1 FROM homophonetable where homophone_3 = '$final_song_words_one[$aa]'";
        $result_1 = $mysqli->query("SELECT homophone_3 FROM homophonetable where homophone_3 = '$final_song_words_one[$aa]'");
        if ($result_1->num_rows !== 0){
          break;
        } elseif ($result_1->num_rows == 0){
          $query = "SELECT homophone_1 FROM homophonetable where homophone_4 = '$final_song_words_one[$aa]'";
          $result_1 = $mysqli->query("SELECT homophone_4 FROM homophonetable where homophone_4 = '$final_song_words_one[$aa]'");
          if ($result_1->num_rows !== 0){
            break;
          } elseif ($result_1->num_rows == 0){
            break;
          }
        }
      }
    }
  }
  if ($result_1->num_rows !== 0) {
    $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
    $response = @mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($response);
    $w = $row['homophone_1'];
    $query = "UPDATE word_copy SET homophone = '$w' WHERE word = '$final_song_words_one[$aa]'";
    $response = @mysqli_query($mysqli, $query);
    echo mysqli_error($mysqli);
    $mysqli->close();
  }
  $aa = $aa + 1;
}

#here begin to insert into word table from player two
#here what do the searching just for verb table;
$aa = 0;
while($aa < count($final_song_words_two)){
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  while(true){
    $query = "SELECT base_verb FROM verbtable where base_verb = '$final_song_words_two[$aa]'";
    $result_1 = $mysqli->query("SELECT base_verb FROM verbtable where base_verb = '$final_song_words_two[$aa]'");
    if ($result_1->num_rows !== 0){
      break;
    } elseif ($result_1->num_rows == 0){
      $query = "SELECT base_verb FROM verbtable where past = '$final_song_words_two[$aa]'";
      $result_1 = $mysqli->query("SELECT base_verb FROM verbtable where past = '$final_song_words_two[$aa]'");
      if ($result_1->num_rows !== 0) {
        break;
      } elseif ($result_1->num_rows == 0){
        $query = "SELECT base_verb FROM verbtable where past_participle = '$final_song_words_two[$aa]'";
        $result_1 = $mysqli->query("SELECT base_verb FROM verbtable where past_participle = '$final_song_words_two[$aa]'");
        if ($result_1->num_rows !== 0) {
          break;
        } elseif ($result_1->num_rows == 0){
          $query = "SELECT base_verb FROM verbtable where third_person = '$final_song_words_two[$aa]'";
          $result_1 = $mysqli->query("SELECT base_verb FROM verbtable where third_person = '$final_song_words_two[$aa]'");
          if ($result_1->num_rows !== 0) {
            break;
          } elseif ($result_1->num_rows == 0){
            $query = "SELECT base_verb FROM verbtable where gerund = '$final_song_words_two[$aa]'";
            $result_1 = $mysqli->query("SELECT base_verb FROM verbtable where gerund = '$final_song_words_two[$aa]'");
            if ($result_1->num_rows !== 0) {
              break;
            } elseif ($result_1->num_rows == 0){
              $query = "SELECT base_verb FROM verbtable where related_noun_1 = '$final_song_words_two[$aa]'";
              $result_1 = $mysqli->query("SELECT base_verb FROM verbtable where related_noun_1 = '$final_song_words_two[$aa]'");
              if ($result_1->num_rows !== 0) {
                break;
              } elseif ($result_1->num_rows == 0){
                $query = "SELECT base_verb FROM verbtable where related_noun_2 = '$final_song_words_two[$aa]'";
                $result_1 = $mysqli->query("SELECT base_verb FROM verbtable where related_noun_2 = '$final_song_words_two[$aa]'");
                break;
              }
          }
        }
      }
    }
    }
  }
  if ($result_1->num_rows !== 0) {
    $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
    $response = @mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($response);
    $w = $row['base_verb'];
    $query = "UPDATE word_copy SET verb = '$w' WHERE word = '$final_song_words_two[$aa]'";
    $response = @mysqli_query($mysqli, $query);
    echo mysqli_error($mysqli);
    $mysqli->close();
  }
  $aa = $aa + 1;
}
#here do the searching just for noun table;
$aa = 0;
while($aa < count($final_song_words_two)){
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  while(true){
    $query = "SELECT base_noun FROM nountable where base_noun = '$final_song_words_two[$aa]'";
    $result_1 = $mysqli->query("SELECT base_noun FROM nountable where base_noun = '$final_song_words_two[$aa]'");
    echo mysqli_error($mysqli);
    if ($result_1->num_rows !== 0){
      break;
    } elseif ($result_1->num_rows == 0){
      break;
    }
  }
  if ($result_1->num_rows !== 0) {
    $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
    $response = @mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($response);
    $w = $row['base_noun'];
    $query = "UPDATE word_copy SET noun = '$w' WHERE word = '$final_song_words_two[$aa]'";
    $response = @mysqli_query($mysqli, $query);
    echo mysqli_error($mysqli);
    $mysqli->close();
  }
  $aa = $aa + 1;
}
#here do the searching just for adjtable;
$aa = 0;
while($aa < count($final_song_words_two)){
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  while(true){
    $query = "SELECT base_adjective FROM adjtable where base_adjective = '$final_song_words_two[$aa]'";
    $result_1 = $mysqli->query("SELECT base_adjective FROM adjtable where base_adjective = '$final_song_words_two[$aa]'");
    if ($result_1->num_rows !== 0){
      break;
    } elseif ($result_1->num_rows == 0){
      $query = "SELECT comparative FROM adjtable where comparative = '$final_song_words_two[$aa]'";
      $result_1 = $mysqli->query("SELECT comparative FROM adjtable where comparative = '$final_song_words_two[$aa]'");
      if ($result_1->num_rows !== 0) {
        break;
      } elseif ($result_1->num_rows == 0){
        $query = "SELECT superlative FROM adjtable where superlative = '$final_song_words_two[$aa]'";
        $result_1 = $mysqli->query("SELECT superlative FROM adjtable where superlative = '$final_song_words_two[$aa]'");
        if ($result_1->num_rows !== 0) {
          break;
        } elseif ($result_1->num_rows == 0){
          break;
        }
      }
    }
  }
  if ($result_1->num_rows !== 0) {
    $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
    $response = @mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($response);
    $w = $row['base_adjective'];
    $query = "UPDATE word_copy SET adjective = '$w' WHERE word = '$final_song_words_two[$aa]'";
    $response = @mysqli_query($mysqli, $query);
    echo mysqli_error($mysqli);
    $mysqli->close();
  }
  $aa = $aa + 1;
}
#here do the searching just for advtable;
$aa = 0;
while($aa < count($final_song_words_two)){
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  while(true){
    $query = "SELECT adverb FROM advtable where adverb = '$final_song_words_two[$aa]'";
    $result_1 = $mysqli->query("SELECT adverb FROM advtable where adverb = '$final_song_words_two[$aa]'");
    if ($result_1->num_rows !== 0){
      break;
    } elseif ($result_1->num_rows == 0){
      break;
    }
  }
  if ($result_1->num_rows !== 0) {
    $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
    $response = @mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($response);
    $w = $row['adverb'];
    $query = "UPDATE word_copy SET adverb = '$w' WHERE word = '$final_song_words_two[$aa]'";
    $response = @mysqli_query($mysqli, $query);
    echo mysqli_error($mysqli);
    $mysqli->close();
  }
  $aa = $aa + 1;
}
#here do the searching just for conjuction.
$aa = 0;
while($aa < count($final_song_words_two)){
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  while(true){
    $query = "SELECT conjuction FROM conjuctiontable where conjuction = '$final_song_words_two[$aa]'";
    $result_1 = $mysqli->query("SELECT conjuction FROM conjuctiontable where conjuction = '$final_song_words_two[$aa]'");
    if ($result_1->num_rows !== 0){
      break;
    } elseif ($result_1->num_rows == 0){
      break;
    }
  }
  if ($result_1->num_rows !== 0) {
    $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
    $response = @mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($response);
    $w = $row['conjuction'];
    $query = "UPDATE word_copy SET conjunction = '$w' WHERE word = '$final_song_words_two[$aa]'";
    $response = @mysqli_query($mysqli, $query);
    echo mysqli_error($mysqli);
    $mysqli->close();
  }
  $aa = $aa + 1;
}
#here do the searching just for contractiontable
$aa = 0;
while($aa < count($final_song_words_two)){
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  while(true){
    $query = "SELECT contraction FROM contractiontable where contraction = '$final_song_words_two[$aa]'";
    $result_1 = $mysqli->query("SELECT contraction FROM contractiontable where contraction = '$final_song_words_two[$aa]'");
    if ($result_1->num_rows !== 0){
      break;
    } elseif ($result_1->num_rows == 0){
      break;
    }
  }
  if ($result_1->num_rows !== 0) {
    $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
    $response = @mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($response);
    $w = $row['contraction'];
    $query = "UPDATE word_copy SET contraction = '$w' WHERE word = '$final_song_words_two[$aa]'";
    $response = @mysqli_query($mysqli, $query);
    echo mysqli_error($mysqli);
    $mysqli->close();
  }
  $aa = $aa + 1;
}

#here do the searching just for prepositiontable
$aa = 0;
while($aa < count($final_song_words_two)){
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  while(true){
    $query = "SELECT preposition FROM prepositiontable where preposition = '$final_song_words_two[$aa]'";
    $result_1 = $mysqli->query("SELECT preposition FROM prepositiontable where preposition = '$final_song_words_two[$aa]'");
    if ($result_1->num_rows !== 0){
      break;
    } elseif ($result_1->num_rows == 0){
      break;
    }
  }
  if ($result_1->num_rows !== 0) {
    $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
    $response = @mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($response);
    $w = $row['preposition'];
    $query = "UPDATE word_copy SET preposition = '$w' WHERE word = '$final_song_words_two[$aa]'";
    $response = @mysqli_query($mysqli, $query);
    echo mysqli_error($mysqli);
    $mysqli->close();
  }
  $aa = $aa + 1;
}
#here do the searching for homophone
$aa = 0;
while($aa < count($final_song_words_two)){
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  while(true){
    $query = "SELECT homophone_1 FROM homophonetable where homophone_1 = '$final_song_words_two[$aa]'";
    $result_1 = $mysqli->query("SELECT homophone_1 FROM homophonetable where homophone_1 = '$final_song_words_two[$aa]'");
    if ($result_1->num_rows !== 0){
      break;
    } elseif ($result_1->num_rows == 0){
      $query = "SELECT homophone_1 FROM homophonetable where homophone_2 = '$final_song_words_two[$aa]'";
      $result_1 = $mysqli->query("SELECT homophone_2 FROM homophonetable where homophone_2 = '$final_song_words_two[$aa]'");
      if ($result_1->num_rows !== 0) {
        break;
      } elseif ($result_1->num_rows == 0){
        $query = "SELECT homophone_1 FROM homophonetable where homophone_3 = '$final_song_words_two[$aa]'";
        $result_1 = $mysqli->query("SELECT homophone_3 FROM homophonetable where homophone_3 = '$final_song_words_two[$aa]'");
        if ($result_1->num_rows !== 0){
          break;
        } elseif ($result_1->num_rows == 0){
          $query = "SELECT homophone_1 FROM homophonetable where homophone_4 = '$final_song_words_two[$aa]'";
          $result_1 = $mysqli->query("SELECT homophone_4 FROM homophonetable where homophone_4 = '$final_song_words_two[$aa]'");
          if ($result_1->num_rows !== 0){
            break;
          } elseif ($result_1->num_rows == 0){
            break;
          }
        }
      }
    }
  }
  if ($result_1->num_rows !== 0) {
    $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
    $response = @mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($response);
    $w = $row['homophone_1'];
    $query = "UPDATE word_copy SET homophone = '$w' WHERE word = '$final_song_words_two[$aa]'";
    $response = @mysqli_query($mysqli, $query);
    echo mysqli_error($mysqli);
    $mysqli->close();
  }
  $aa = $aa + 1;
}

#wordtable comparison
##we 8 colunms and 15 + 15 rows to compare
$count_success = 0;
$aa = 1;
while($aa < 16){
  $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
  ##verb
  $bb = 16;
  while($bb < 31){
    $mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
    while(true){
      $query_1 = "SELECT verb FROM word_copy where ID = '$aa'";
      $query_2 = "SELECT verb FROM word_copy where ID = '$bb'";
      $response_1 = @mysqli_query($mysqli, $query_1);
      $response_2 = @mysqli_query($mysqli, $query_2);
      $row_1 = mysqli_fetch_array($response_1);
      $row_2 = mysqli_fetch_array($response_2);
      $w_1 = $row_1['verb'];
      $w_2 = $row_2['verb'];
      if($w_1 == $w_2 && $w_1 !== ''){
        $count_success = $count_success + 1;
        echo "This is the word: " . $w_1 . " verb is found match";
        echo "<br />\n";
        break;
      } else {
        break;
      }
    }
  ##noun
    while(true){
      $query_1 = "SELECT noun FROM word_copy where ID = '$aa'";
      $query_2 = "SELECT noun FROM word_copy where ID = '$bb'";
      $response_1 = @mysqli_query($mysqli, $query_1);
      $response_2 = @mysqli_query($mysqli, $query_2);
      $row_1 = mysqli_fetch_array($response_1);
      $row_2 = mysqli_fetch_array($response_2);
      $w_1 = $row_1['noun'];
      $w_2 = $row_2['noun'];
      if($w_1 == $w_2 && $w_1 !== ''){
        $count_success = $count_success + 1;
        echo "This is the word: " . $w_1 . " noun is found match";
        echo "<br />\n";
        break;
      } else {
        break;
      }
    }
  ##adj
    while(true){
      $query_1 = "SELECT adjective FROM word_copy where ID = '$aa'";
      $query_2 = "SELECT adjective FROM word_copy where ID = '$bb'";
      $response_1 = @mysqli_query($mysqli, $query_1);
      $response_2 = @mysqli_query($mysqli, $query_2);
      $row_1 = mysqli_fetch_array($response_1);
      $row_2 = mysqli_fetch_array($response_2);
      $w_1 = $row_1['adjective'];
      $w_2 = $row_2['adjective'];
      if($w_1 == $w_2 && $w_1 !== ''){
        $count_success = $count_success + 1;
        echo "This is the word: " . $w_1 . " adj is found match";
        echo "<br />\n";
        break;
      } else {
        break;
      }
    }
  ##adv
    while(true){
      $query_1 = "SELECT adverb FROM word_copy where ID = '$aa'";
      $query_2 = "SELECT adverb FROM word_copy where ID = '$bb'";
      $response_1 = @mysqli_query($mysqli, $query_1);
      $response_2 = @mysqli_query($mysqli, $query_2);
      $row_1 = mysqli_fetch_array($response_1);
      $row_2 = mysqli_fetch_array($response_2);
      $w_1 = $row_1['adverb'];
      $w_2 = $row_2['adverb'];
      if($w_1 == $w_2 && $w_1 !== ''){
        $count_success = $count_success + 1;
        echo "This is the word: " . $w_1 . " adv is found match";
        echo "<br />\n";
        break;
      } else {
        break;
      }
    }
  ##conjunction
    while(true){
      $query_1 = "SELECT conjunction FROM word_copy where ID = '$aa'";
      $query_2 = "SELECT conjunction FROM word_copy where ID = '$bb'";
      $response_1 = @mysqli_query($mysqli, $query_1);
      $response_2 = @mysqli_query($mysqli, $query_2);
      $row_1 = mysqli_fetch_array($response_1);
      $row_2 = mysqli_fetch_array($response_2);
      $w_1 = $row_1['conjunction'];
      $w_2 = $row_2['conjunction'];
      if($w_1 == $w_2 && $w_1 !== ''){
        $count_success = $count_success + 1;
        echo "This is the word: " . $w_1 . " conjunction is found match";
        echo "<br />\n";
        break;
      } else {
        break;
      }
    }
  ##contractiontable
    while(true){
      $query_1 = "SELECT contraction FROM word_copy where ID = '$aa'";
      $query_2 = "SELECT contraction FROM word_copy where ID = '$bb'";
      $response_1 = @mysqli_query($mysqli, $query_1);
      $response_2 = @mysqli_query($mysqli, $query_2);
      $row_1 = mysqli_fetch_array($response_1);
      $row_2 = mysqli_fetch_array($response_2);
      $w_1 = $row_1['contraction'];
      $w_2 = $row_2['contraction'];
      if($w_1 == $w_2 && $w_1 !== ''){
        $count_success = $count_success + 1;
        echo "This is the word: " . $w_1 . " contraction is found match";
        echo "<br />\n";
        break;
      } else {
        break;
      }
    }
  ##homophone
    while(true){
      $query_1 = "SELECT homophone FROM word_copy where ID = '$aa'";
      $query_2 = "SELECT homophone FROM word_copy where ID = '$bb'";
      $response_1 = @mysqli_query($mysqli, $query_1);
      $response_2 = @mysqli_query($mysqli, $query_2);
      $row_1 = mysqli_fetch_array($response_1);
      $row_2 = mysqli_fetch_array($response_2);
      $w_1 = $row_1['homophone'];
      $w_2 = $row_2['homophone'];
      if($w_1 == $w_2 && $w_1 !== ''){
        $count_success = $count_success + 1;
        echo "This is the word: " . $w_1 . " homophone is found match";
        echo "<br />\n";
        break;
      } else {
        break;
      }
    }
  #preposition
    while(true){
      $query_1 = "SELECT preposition FROM word_copy where ID = '$aa'";
      $query_2 = "SELECT preposition FROM word_copy where ID = '$bb'";
      $response_1 = @mysqli_query($mysqli, $query_1);
      $response_2 = @mysqli_query($mysqli, $query_2);
      $row_1 = mysqli_fetch_array($response_1);
      $row_2 = mysqli_fetch_array($response_2);
      $w_1 = $row_1['preposition'];
      $w_2 = $row_2['preposition'];
      if($w_1 == $w_2 && $w_1 !== ''){
        $count_success = $count_success + 1;
        echo "This is the word: " . $w_1 . " preposition is found match";
        echo "<br />\n";
        break;
      } else {
        break;
      }
    }
    $bb = $bb + 1;
  }
  $aa = $aa + 1;
}
$mysqli->close();
if ($count_success > 0){
  echo "Found match, you win. please exit or start another game.";
} else {
  echo "Nothing match, you lose. please exit or start another game.";
}

$mysqli = new mysqli(SERVER, DBUSER, DBPASS, DATABASE);
$query = "TRUNCATE TABLE word_copy";
$response = @mysqli_query($mysqli, $query);
echo mysqli_error($mysqli);
$query = "TRUNCATE TABLE song_copy";
$response = @mysqli_query($mysqli, $query);
echo mysqli_error($mysqli);
$mysqli->close();

?>

<html>
<head>
<title>song names search from mysql</title>
</head>
<form action="http://localhost/~xiaomengli/phptesting/music/player/music_searchingfromtable.php" method="post">
</form>
</body>
</html>
