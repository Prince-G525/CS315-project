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

$q=$_POST['auto_no'];
$w=$_POST['date'];
$e=$_POST['tim'];

$sql = "SELECT * FROM book_status USE INDEX(ano) WHERE id='$q' AND dat='$w' AND tim='$e'";
$result = $conn->query($sql);
if($result->num_rows > 0){
		echo "Names\t\tContact\t\tNumber of Passengers"."<br>";
		echo "------------------------------------------------------"."<br>";
 	while($row=$result->fetch_assoc()){
		$t1 = $row['name'];
		$t2 = $row['contact'];
		$t3 = $row['nop'];
		echo $t1."\t".$t2."\t".$t3."<br>";
	}
}else echo "No booking for the auto on the given date and time"."<br>";

$conn->close();
?>
