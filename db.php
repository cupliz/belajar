
<?php  

$dbname='alumni_diklat';
$dbcon = new mysqli('localhost', 'root', 'admin', $dbname);

if ($dbcon->connect_error) {
  die("Connection failed: " . $dbcon->connect_error);
}


?>