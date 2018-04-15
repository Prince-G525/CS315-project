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
$w=$_POST['gender'];
$e=$_POST['contact_no'];
$r=$_POST['date_of_birth'];
$t=$_POST['address'];
$y=$_POST['email'];

$sql = "INSERT INTO traveller(name,gender,contact,dob,address,email) VALUES('$q','$w','$e','$r','$t','$y')";

if ($conn->query($sql)==TRUE) {
echo "You have now successfully registered with us!!! We are at your service 24*7!!!" . "<br>";
} else {
    echo "You are already registered!!! Please select auto booking from main site!!!" . "<br>";
}

$conn->close();
echo "Redirecting to home page" . "<br>";
header("refresh:3;index.html");
exit;
?>
