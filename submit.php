<?php
require 'sanitize.php';

$username="oblivia";
$password="albatross-chains";
$database="submissions";

$link = mysqli_connect(localhost, $username, $password, $database);
if (mysqli_connect_errno()){
    echo ("Failed to connect to MySQL: " . mysqli_connect_error());
}


$instructor = sanitize($link, $_POST['instructor']);
$course = sanitize($link, $_POST['course']);
$year = sanitize($link, $_POST['year']);
$term = sanitize($link, $_POST['term']);
$section = sanitize($link, $_POST['section']);
$assignment = sanitize($link, $_POST['assignment']);
$id = sanitize($link, $_POST['id']);
$firstname = sanitize($link, $_POST['firstname']);
$lastname = sanitize($link, $_POST['lastname']);
$email = sanitize($link, $_POST['email']);
$file_upload = sanitize($link, $_POST['file_upload']);

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
