


<?php
// Opens a connection to the database
// Since it is a php file it won't open in a browser
// It should be saved outside of the main web documents folder
// and imported when needed
/*
Command that gives the database user the least amount of power
as is needed.
GRANT INSERT, SELECT, DELETE, UPDATE ON test3.*
TO 'studentweb'@'localhost'
IDENTIFIED BY 'turtledove';
SELECT : Select rows in tables
INSERT : Insert new rows into tables
UPDATE : Change data in rows
DELETE : Delete existing rows (Remove privilege if not required)
*/
// Defined as constants so that they can't be changed
DEFINE ('DB_USER', 'xiaomengrules');
DEFINE ('DB_PASSWORD', 'password');
DEFINE ('DB_HOST', '127.0.0.1');
DEFINE ('DB_NAME', 'Sunday');
// $dbc will contain a resource link to the database
// @ keeps the error from showing in the browser
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$dbc) {
    #echo "Error: Unable to connect to MySQL." . PHP_EOL;
    #echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    #echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

// echo "Success: A proper connection to MySQL was made! The database is great." . PHP_EOL;
// echo "Host information: " . mysqli_get_host_info($dbc) . PHP_EOL;

?>
