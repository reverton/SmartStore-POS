<?php
  $dbhost = "localhost"; //localhost of where the databas reside
  $dbname = "market_smartstore"; //name of the database
  $dbuser = "market_SmartPOS"; //username 
  $dbpass = "@SmartPOS2018#"; //password
  //create connection
  $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  if ($mysqli->connect_errno) {
echo "Sorry, Database Connection Problem.";
}
?>