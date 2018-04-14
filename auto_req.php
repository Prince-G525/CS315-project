<?php
$servername = "localhost";
$username = "root";
$password = "133#roman";
$dbname = "autoDB";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
} 

$q=$_POST['name'];
$w=$_POST['id'];
$e=$_POST['class'];
$r=$_POST['auto'];
$t=$_POST['route'];
$y=$_POST['major'];
$u=$_POST['start_date'];

$sql = "INSERT INTO request(name,contact,pickfrom,type,route,dat,time) VALUES('$q','$w','$e','$r','$t','$y','$u')";

if ($conn->query($sql)==TRUE) {
echo "You request is under process!! Our agent will contact you ASAP!!!!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
