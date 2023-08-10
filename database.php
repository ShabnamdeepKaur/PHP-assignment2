<?php
$hostname = 'localhost';
$username = 'Shabnamdeep200518194';
$password = 'U_CDbvGHWw';
$db_name = 'Shabnamdeep200518194';

$conn = new mysqli($hostname, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// else
// {
//     die("successful");
// }
?>
