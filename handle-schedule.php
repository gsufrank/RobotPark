<?php
// define variables and set to empty values
$name = $email = $date = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_REQUEST["name"]);
    $email = test_input($_REQUEST["email"]);
    $date = test_input($_REQUEST["date"]);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/*echo $name;
echo $email;
echo $date;

require('../rp_connect.php');

$query = "INSERT into res(name,email,date) values ('$name','$email','$date')";
$result = @mysqli_query($conn, $query);

if ($result) {
    echo 'hello world';
    /*$row = @mysqli_fetch_array($result, MYSQLI_NUM);
    printf ("%s\n",$row["date"]);
    echo $row;*/
/* } else
    echo 'error';

mysqli_free_result($result);

$query = "SELECT date from res";
$result = @mysqli_query($conn, $query);

echo '<br>';
if ($result) {
    while ($row = mysqli_fetch_assoc($result))
    {
        echo $row['date'];
        echo "<br>";
    }
    /*$row = @mysqli_fetch_array($result, MYSQLI_NUM);
    printf ("%s\n",$row["date"]);
    echo $row;*/
/*} else
    echo 'error';

mysqli_free_result($result);

echo "<br>";

$query = "SELECT time from res where date='2019-03-20'";
$result = @mysqli_query($conn, $query);

echo '<br>';
if ($result) {
    while ($row = mysqli_fetch_assoc($result))
    {
        echo substr($row['time'],0,5);
        echo "<br>";
    }
    // $reservedTimes = @mysqli_fetch_array($result, MYSQLI_NUM);
   /* printf ("%s\n",$row["date"]);
    echo $row;*/
/*} else
    echo 'error';

mysqli_free_result($result);
mysqli_close($conn);*/

include("date.php");

?>