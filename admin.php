<?php
$servername = "localhost";
$username = "root";
$password = $_POST['pass'];
$dbname = "autoDB";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    echo "Keep guessing PUNK!!!!"; 
    exit;
} 

$d = date("Y-m-d");

$sql = "DELETE FROM book_status WHERE STRCMP(dat,'$d')<0";
if($conn->query($sql)==TRUE){
	echo "Job Done"."<br>";
}else echo "Something's wrong"."<br>";

$sql = "DELETE FROM auto_full WHERE STRCMP(dat,'$d')<0";
if($conn->query($sql)==TRUE){
	echo "Job Done Again"."<br>";
}else echo "Something's wrong Again"."<br>";

$conn->close();
?>
