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

$q=$_POST['auto'];
$w=$_POST['name'];
$e=$_POST['contact'];

$sql = "SELECT * FROM request WHERE name='$w' AND contact='$e'";

$result = $conn->query($sql);
if($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$t1=$row['nop'];
	echo $t1.'<br>';
	$t2=$row['time'];
	echo $t2.'<br>';
	$t3=$row['dat'];
	echo $t3.'<br>';
	$sql2 = "INSERT INTO book_status(name,contact,id,nop,tim,dat) VALUES('$w','$e','$q',$t1,'$t2','$t3')";
	if ($conn->query($sql2)==TRUE) {
		$sql3 = "SELECT * FROM auto_full WHERE id='$q' AND tim='$t2'";
		$res = $conn->query($sql3);
			if($res->num_rows>0){
				$sql4 = "UPDATE auto_full SET nop=nop+$t1 WHERE id='$q' AND tim='$t2'";
				if($conn->query($sql4)==TRUE) echo "Success1";
				else echo "Failed1";
			}else{
				$sql5 = "INSERT into auto_full(id,nop,tim) VALUES('$q',$t1,'$t2')";
				if($conn->query($sql5)==TRUE) echo "Success2";
				else echo "Failed2";
			}
	}else echo "Failed book";
}else echo "Unrequested Record";


$conn->close();
?>
