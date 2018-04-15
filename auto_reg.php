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
$w=$_POST['auto'];
$e=$_POST['start_time'];
$r=$_POST['finish_time'];
$t=$_POST['contact_no'];
$y=$_POST['email'];
$u=$_POST['auto_no'];

$t1=strcmp($w,"Vikram");
$t2=strcmp($w,"Tempo");
$t3=strcmp($w,"Cab");
$i=0;
if($t1 == 0) $i = 2;
else if($t2 == 0) $i = 8;
else if($t3 == 0) $i = 4;

$sql = "INSERT INTO auto(id,name,type,afrom,ato,contact,email,cap) VALUES('$u','$q','$w','$e','$r','$t','$y',$i)";

if ($conn->query($sql)==TRUE) {
echo "You have now successfully registered with us!!!! Welcome to the family" . "<br>";
} else {
    echo "Your auto is already registered" . "<br>";
}

$conn->close();

echo "Redirecting to home page" . "<br>";
header("refresh:3;index.html");
exit;
?>
