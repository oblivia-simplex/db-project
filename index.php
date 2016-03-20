

<?php



$user="oblivia";
$password="albatross-chains";
$database="test";
mysql_connect(localhost,$user,$password);
@mysql_select_db($database) or die("the fucker crapped out on us");


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

mysql_query($query);

$insertion="INSERT INTO contacts VALUES('',
    'John',
    'Smith',
    '01234 567890',
    '00112 334455',
    '01234567891',
    'johnsmith@gowansnet.com',
    'http://www.gowansnet.com')";
          



mysql_query($insertion);

echo("Insertion = $insertion");
mysql_close();


?>
