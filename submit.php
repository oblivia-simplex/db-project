<?php

echo("hello world");

$username="oblivia";
$password="albatross-chains";
$database="submissions";

$link = mysqli_connect(localhost, $username, $password, $database);
if (mysqli_connect_errno()){
    echo ("Failed to connect to MySQL: " . mysqli_connect_error());
}


$instructor = $_POST['instructor'];
$course = $_POST['course'];
$year = $_POST['year'];
$term = $_POST['term'];
$section = $_POST['section'];
$assignment = $_POST['assignment'];
$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$file_upload = $_POST['file_upload'];

$create="CREATE TABLE IF NOT EXISTS submissions (
id char(9) NOT NULL,
instructor varchar(64) NOT NULL,
course char(4) NOT NULL,
year int NOT NULL,
term char(1) NOT NULL,
section int NOT NULL,
assignment varchar(32) NOT NULL,
firstname varchar(64) NOT NULL,
lastname varchar(64) NOT NULL,
email varchar(64) NOT NULL,
grade float)";

mysqli_query($link, $create);
echo(mysqli_errno($link).": ".mysqli_error($link)."<b><b>");

$insertion="INSERT INTO submissions VALUES(
'$id',
'$instructor',
'$course',
'$year',
'$term',
'$section',
'$assignment',
'$firstname',
'$lastname',
'$email',
'')";

echo("<p>insertion command: $insertion</p>");
mysqli_multi_query($link, $insertion);
echo(mysqli_errno($link).": ".mysqli_error($link));


?>
