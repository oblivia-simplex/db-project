<?php

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





/*
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
*/

$selection="SELECT * FROM submissions WHERE 
(instructor='$instructor' AND course='$course' AND year='$year' 
AND term='$term' AND section='$section' AND assignment='$assignment'
AND email='$email' AND id='$id');";

echo("<p>select command: $selection</p>");
$result=mysqli_multi_query($link, $selection);
echo(mysqli_errno($link).": ".mysqli_error($link));

echo("<h2>Status of submission</h2>");

$num=$result->num_rows;
$i=0;
while ($i < $num) {
    $row = $result->fetch_array(NYSQLI_ASSOC);
    printf("%s %s %s %s %s %s %s",
           $row["id"],
           $row["firstname"],
           $row["lastname"],
           $row["assignment"],
           $row["email"],
           $row["course"],
           $row["instructor"],
           $row["grade"]);
}

$link->close();


?>
