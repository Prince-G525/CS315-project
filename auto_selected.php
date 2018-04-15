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
$r=$_POST['date'];
$t=$_POST['time'];

$sql = "SELECT * FROM request WHERE name='$w' AND contact='$e' AND dat='$r' AND time='$t'";

$result = $conn->query($sql);
if($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$t1=$row['nop'];
	$t2=$row['time'];
	$t3=$row['dat'];
	$sql2 = "INSERT INTO book_status(name,contact,id,nop,tim,dat) VALUES('$w','$e','$q',$t1,'$t2','$t3')";
	if ($conn->query($sql2)==TRUE) {
		$sql3 = "SELECT * FROM auto_full WHERE id='$q' AND tim='$t2' AND dat='$t3'";
		$res = $conn->query($sql3);
			if($res->num_rows>0){
				$sql4 = "UPDATE auto_full SET nop=nop+$t1 WHERE id='$q' AND tim='$t2' AND dat='$t3'";
				if($conn->query($sql4)==TRUE){
					echo "Your booking is confirmed.....Following is the details of the driver who will contact you soon.".'<br>';
					$sql6 = "SELECT * FROM auto WHERE id='$q'";
					$r1 = $conn->query($sql6);
					if($r1->num_rows > 0){
						$r2 = $r1->fetch_assoc();
						echo $r2['name'].' : '.$r2['contact'].'<br>';
					}		
				}else echo "Failed1";
			}else{
				$sql5 = "INSERT into auto_full(id,nop,tim,dat) VALUES('$q',$t1,'$t2','$t3')";
				if($conn->query($sql5)==TRUE){
					echo "Your booking is confirmed.....Following is the details of the driver who will contact you soon.".'<br>';
					$sql6 = "SELECT * FROM auto WHERE id='$q'";
					$r1 = $conn->query($sql6);
					if($r1->num_rows > 0){
						$r2 = $r1->fetch_assoc();
						echo $r2['name'].' : '.$r2['contact'].'<br>';
					}
				}else echo "Failed2";
			}
	}else echo "Failed book";
}else echo "Unrequested Record";

$conn->close();
?>
