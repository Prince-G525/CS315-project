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
$w=$_POST['contact'];
$e=$_POST['date'];
$r=$_POST['time'];

$sql = "SELECT * FROM request WHERE name='$q' AND contact='$w' AND dat='$e' AND time='$r'";
$result = $conn->query($sql);
if($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$t1 = $row['time'];
	$t2 = $row['nop'];
	$t3 = $row['dat'];
	$t4 = $row['type'];
	#$sql = "(SELECT af.id FROM auto_full as af,auto as a2 WHERE af.tim='$t1' AND af.dat='$t3' AND a2.cap-af.nop-'$t2' >=0 AND af.id IN (SELECT DISTINCT(b.id) FROM book_status AS b, auto AS a WHERE b.dat='$t3' AND b.tim='$t1' AND a.type='$t4')) UNION (SELECT id FROM auto WHERE type='$t4' AND STRCMP('$t1',afrom)>=0 AND STRCMP('$t1',ato)<=0 AND cap-'$t2' >= 0)";
	$sql = "(SELECT af.id FROM auto_full as af,auto as a2 WHERE af.tim='$t1' AND af.dat='$t3' AND a2.cap-af.nop-'$t2' >=0 AND af.id IN (SELECT DISTINCT(b.id) FROM book_status AS b, auto AS a WHERE b.dat='$t3' AND b.tim='$t1' AND a.type='$t4')) UNION (SELECT id FROM auto WHERE type='$t4' AND STRCMP('$t1',afrom)>=0 AND STRCMP('$t1',ato)<=0 AND cap-'$t2' >= 0 AND id NOT IN(SELECT DISTINCT(b2.id) FROM book_status as b2 WHERE b2.dat='$t3' AND b2.tim='$t1'))";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		echo 'Select from the following available autos and check your full name, contact, date and time properly'.'<br>';
		echo '<form method="post" action="auto_selected.php">';
		echo '<select name="auto" style="width: 100px">';
		while($row=$result->fetch_assoc()){
			$t9=$row['id'];
			echo '<option value='.$t9.'>'.$row['id'] .'</option>';
		}echo '</select'.'<br>';
		echo '<input type="text" name="name" value=' .$q.'>';
		echo '<input type="text" name="contact" value='.$w.'>'.'<br>';
		echo '<input type="text" name="date" value='.$e.'>';
		echo '<input type="text" name="time" value='.$r.'>'.'<br>';
		echo '<input type="submit" value="Submit">';
		echo '</form>';
	}else echo "Sorry auto not available right now";
} else{
echo "Sorry your details not found on our server!!!";
}

$conn->close();
?>
