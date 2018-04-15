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
$i=(int)$_POST['pass'];

$ti=date("H:i");
$t2=date("Y-m-d");
$t3=strtotime($y);
$t4=strtotime($u)-strtotime($t2)+$t3;
$intr=$t4-strtotime($ti);
if($intr>=3600){
$t5=strtotime($u)-strtotime($t2);
$t6=(int)($t5/3600);
$u="$t6".":00";
$sql = "INSERT INTO request(name,contact,pickfrom,type,route,dat,time,nop) VALUES('$q','$w','$e','$r','$t','$y','$u',$i)";
if ($conn->query($sql)==TRUE) {
	echo 'Check your full name, contact, date and time properly'.'<br>';
	echo '<form method="post" action="auto_select.php">';
	echo '<input type="text" name="name" value=' .$q.'>';
	echo '<input type="text" name="contact" value='.$w.'>'.'<br>';
	echo '<input type="text" name="date" value='.$y.'>';
	echo '<input type="text" name="time" value='.$u.'>'.'<br>';
	echo '<input type="submit" value="Submit">';
	echo '</form>';
} else {
   	echo "Sorry you are not registered with us!!! Please register first!!!";
}
} else if($intr>=0) echo "Sorry you need to book an hour advance!!!!";
else echo "Sorry the time has already passed!!!!";
$conn->close();
?>
