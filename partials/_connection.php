<?php
$servername = "localhost";
$username = "root";
$password = '';
$db_name = "iforum";

$connection = mysqli_connect($servername, $username, $password, $db_name);
if(!$connection)
{
    die("Fatal Error");
}
?>