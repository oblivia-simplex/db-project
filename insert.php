<?php

$username="oblivia";
$password="albatross-chains";
$database="test";

$first=$_POST['first'];
$last=$_POST['last'];
$phone=$_POST['phone'];
$mobile=$_POST['mobile'];
$fax=$_POST['fax'];
$email=$_POST['email'];
$web=$_POST['web'];

$link = mysqli_connect(localhost,$username,$password, $database);
// check connection
if (mysqli_connect_errno()){
    echo ("Failed to connect to MySQL: " . mysqli_connect_error());
}


$query="CREATE TABLE contacts (
id int(6) NOT NULL auto_increment,
first varchar(15) NOT NULL,
last varchar(15) NOT NULL,
phone varchar(20) NOT NULL,
mobile varchar(20) NOT NULL,
fax varchar(20) NOT NULL,
email varchar(30) NOT NULL,
web varchar(30) NOT NULL,
PRIMARY KEY (id),
UNIQUE id (id),
KEY id_2 (id))";
mysqli_query($link, $query);

$insertion="INSERT INTO contacts VALUES('',
    '$first',
    '$last',
    '$phone',
    '$mobile',
    '$fax',
    '$email',
    '$web')";
          
mysqli_query($link, $insertion);
echo(mysqli_errno($link).": ".mysqli_error($link));
echo("<br><br>insertion = $insertion");

$selector="SELECT * FROM contacts";
$result=mysqli_query($link, $selector);

$num=$result->num_rows;
echo("<h3>$num rows in contacts table</h3>");



$i=0;
while ($i < $num) {
    $row = $result->fetch_array(MYSQLI_ASSOC);
    printf("%s %s<br>", $row["first"], $row["last"]);
    
    $i++;
}


$link->close();
?>

