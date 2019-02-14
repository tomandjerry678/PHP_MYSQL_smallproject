<?php
session_start();
$data_input = array();
if(empty($data_input)){
  if(empty($_POST['usertable'])&&empty($_POST['nountable'])&&empty($_POST['adjtable'])&&empty($_POST['advtable'])&&empty($_POST['verbtable'])){
    $data_input[0] = 'You must choose one and only one';
  } elseif (!empty($_POST['usertable'])&&(empty($_POST['nountable'])&&empty($_POST['adjtable'])&&empty($_POST['advtable'])&&empty($_POST['verbtable']))){
    $data_input[0] = 'usertable';
  } elseif (!empty($_POST['nountable'])&&(empty($_POST['usertable'])&&empty($_POST['adjtable'])&&empty($_POST['advtable'])&&empty($_POST['verbtable']))){
    $data_input[0] = 'nountable';
  } elseif (!empty($_POST['adjtable'])&&(empty($_POST['usertable'])&&empty($_POST['nountable'])&&empty($_POST['advtable'])&&empty($_POST['verbtable']))){
    $data_input[0] = 'adjtable';
  } elseif (!empty($_POST['advtable'])&&(empty($_POST['usertable'])&&empty($_POST['nountable'])&&empty($_POST['adjtable'])&&empty($_POST['verbtable']))){
    $data_input[0] = 'advtable';
  } elseif (!empty($_POST['verbtable'])&&(empty($_POST['usertable'])&&empty($_POST['nountable'])&&empty($_POST['adjtable'])&&empty($_POST['advtable']))){
    $data_input[0] = 'verbtable';
  }
}

$_SESSION['tablechosen'] = $data_input[0];
if(!empty($data_input)){
  if ($data_input[0] == 'usertable'){
    header("Location: http://localhost/~xiaomengli/phptesting/music/boss/implementchoosing.php");
    exit;
  }
  if ($data_input[0] == 'verbtable'){
    header("Location: http://localhost/~xiaomengli/phptesting/music/boss/implementchoosing.php");
    exit;
  }
  if ($data_input[0] == 'adjtable'){
    header("Location: http://localhost/~xiaomengli/phptesting/music/boss/implementchoosing.php");
    exit;
  }
  if ($data_input[0] == 'advtable'){
    header("Location: http://localhost/~xiaomengli/phptesting/music/boss/implementchoosing.php");
    exit;
  }
  if ($data_input[0] == 'nountable'){
    header("Location: http://localhost/~xiaomengli/phptesting/music/boss/implementchoosing.php");
    exit;
  }
}
?>
<?php
echo "<font size='6' face='Arial'>";
?>
<html>
<head>
<title>Choose your table to change, boss</title>
</head>
<body background = "newyork.jpg">
<form action="http://localhost/~xiaomengli/phptesting/music/boss/bosschoosetable.php" method="post">
<b>Choose a table to manipulate, boss</b>
<p>adj table
<input type="text" name="adjtable" size="" value="" />
</p>
<p>adv table
<input type="text" name="advtable" size="" value="" />
</p>
<p>noun table
<input type="text" name="nountable" size="" value="" />
</p>
<p>user table
<input type="text" name="usertable" size="" value="" />
</p>
<p>verb table
<input type="text" name="verbtable" size="" value="" />
</p>
<p>
<input type="submit" name="submit_bosschoice" value="Send" />
</p>
</form>
</body>
</html>
