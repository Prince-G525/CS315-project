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

$sql = "INSERT INTO auto(id,name,type,afrom,ato,contact,email) VALUES('$u','$q','$w','$e','$r','$t','$y')";

if ($conn->query($sql)==TRUE) {
echo "You have now successfully registered with us!!!! Welcome to the family";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
