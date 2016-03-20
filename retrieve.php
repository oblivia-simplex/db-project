<?php
require 'sanitize.php';

$NUMBER_OF_COLS = 11;

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

$selection=("SELECT * FROM submissions WHERE 
(instructor='$instructor' AND course='$course' AND year='$year' 
AND term='$term' AND section='$section' AND assignment LIKE '$assignment'
AND email='$email' AND id='$id');");

//echo("<p>select command: $selection</p>");
$result=mysqli_query($link, $selection);
if (mysqli_errno($link)){
    echo(mysqli_errno($link).": ".mysqli_error($link));
}
echo("<h2>Status of submission</h2>");

if ($result)
{
    // Fetch one and one row
    while ($row=mysqli_fetch_row($result)) {
        $i=0;
        while ($i < $NUMBER_OF_COLS) {           
            printf("%s ",$row[$i++]);
        }
        echo("<br>");
    }
    // Free result set
    mysqli_free_result($result);
}

$link->close();

?>
