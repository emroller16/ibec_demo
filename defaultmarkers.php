<?php
//require("connect.php");
$username="root";
$password ="";
$dbname = "mysql";

// Opens a connection to a MySQL server
$connection=mysqli_connect ('localhost', $username, $password, $dbname);
if (!$connection) {
  die('Not connected : ' . mysql_error($connection));
}

/*// Set the active MySQL database
$db_selected = mysql_select_db("mysql", $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}*/

// Select all the rows in the markers table
$query = "SELECT * FROM maps_demo WHERE 1";
$result = mysqli_query($connection, $query);
if (!$result) {
  die('Invalid query: ' . mysqli_error($connection));
}

/*header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false); */

//Convert MySQL Result Set to PHP Array
$emparray = array();
while ($row = mysqli_fetch_assoc($result)) 
{
  $emparray[] = $row;
}

echo json_encode($emparray);

//close the db connection
mysqli_close($connection);

?>