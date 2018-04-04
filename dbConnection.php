<?php
$SERVERNAME = 'localhost';
$USER = 'root';
$PASS = '';
$DBASE = 'USERS';

$conn=mysqli_connect($SERVERNAME,$USER,$PASS,$DBASE);

if(!$conn){
	echo 'Connection error'.mysqli_connect_error();
}else{
	echo 'Connected successfully';
}
?>