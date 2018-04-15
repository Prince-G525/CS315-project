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

$sql = "SELECT * FROM request WHERE name='$q' AND contact='$w'";
$result = $conn->query($sql);
if($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$t1 = $row['time'];
	$t2 = $row['nop'];
	$t3 = $row['dat'];
	$t4 = $row['type'];
	$sql = "(SELECT af.id FROM auto_full as af,auto as a2 WHERE af.tim='$t1' AND a2.cap-af.nop-'$t2' >=0 AND af.id IN (SELECT DISTINCT(b.id) FROM book_status AS b, auto AS a WHERE b.dat='$t3' AND a.type='$t4')) UNION (SELECT id FROM auto WHERE type='$t4' AND STRCMP('$t1',afrom)>=0 AND STRCMP('$t1',ato)<=0 AND cap-'$t2' >= 0)";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		echo 'Select from the following available autos and check your full name and contact properly'.'<br>';
		echo '<form method="post" action="auto_selected.php">';
		echo '<select name="auto" style="width: 100px">';
		while($row=$result->fetch_assoc()){
			$t9=$row['id'];
			echo '<option value='.$t9.'>'.$row['id'] .'</option>';
		}echo '</select'.'<br>';
		echo '<input type="text" name="name" value=' .$q.'>';
		echo '<input type="text" name="contact" value='.$w.' readonly>';
		echo '<input type="submit" value="Submit">';
		echo '</form>';
	}else echo "Sorry auto not available right now";
} else{
echo "Sorry your details not found on our server!!!";
}
/*
$ti=date("H:i");
$t2=date("Y-m-d");
$t3=strtotime($y);
$t4=strtotime($u)-strtotime($t2)+$t3;
$intr=$t4-strtotime($ti);
if($intr>=3600){
$sql = "INSERT INTO request(name,contact,pickfrom,type,route,dat,time,nop) VALUES('$q','$w','$e','$r','$t','$y','$u','$i')";
if ($conn->query($sql)==TRUE) {
	echo "You request is under process!! You will be redirected to select auto if available!!!";

	header('refresh:3;auto_select.php');
	exit;
} else {
   	echo "Sorry you are not registered with us!!! Please register first!!!";
}
} else if($intr>=0) echo "Sorry you need to book an hour advance!!!!";
else echo "Sorry the time has already passed!!!!";
*/

$conn->close();
?>
