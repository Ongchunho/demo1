<?php
ob_start();
session_start();
$mysqli = new mysqli("localhost","root","","emifukada");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?>
