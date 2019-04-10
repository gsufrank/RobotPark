<?php
// define variables and set to empty values
$time = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_REQUEST["name"]);
    $email = test_input($_REQUEST["email"]);
    $date = test_input($_REQUEST["date"]);
    $time = test_input($_REQUEST["time"]);
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
echo $time;*/

require('../rp_connect.php');

$query = "INSERT into res(name,email,date,time) values ('$name','$email','$date','$time')";
$result = @mysqli_query($conn, $query);

if ($result) {
    
    /*$row = @mysqli_fetch_array($result, MYSQLI_NUM);
    printf ("%s\n",$row["date"]);
    echo $row;*/
} else
    echo 'error';

mysqli_free_result($result);


mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="favicon.ico" type="image/gif" sizes="16x16"/>
    <title>Select a Time</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="includes/global.css">
    <link href="https://fonts.googleapis.com/css?family=Exo+2:600|Fontdiner+Swanky|Orbitron:700|ZCOOL+QingKe+HuangYou|Crimson+Text:600|Montserrat" rel="stylesheet">
</head>
<body>

<header>
    <div class="container">
        <div id="branding">
            <h1><span class="highlight">Georgia Southern </span> Robotic Playground</h1>
        </div>
        <nav>
            <ul>
                <li class="current"><a href="index.html" class="hvr-icon-spin"><i class="fas fa-home fa-lg hvr-icon"></i></a></li>
                <li class="current"><a href="schedule.html" class="hvr-underline-from-center">Schedule</a></li>
                <li><a href="stream.html" class="hvr-underline-from-center">Live Stream</a></li>
                <li><a href="archive.html" class="hvr-underline-from-center">Archive</a></li>
                <li><a href="faqs.html" class="hvr-underline-from-center">FAQ</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="container">
    <h2>Session Confirmation</h2>
    <hr class="schedule">
    <br>
    <h4>Name: <?php echo $name; ?></h4>
    <h4>Email: <?php echo $email; ?></h4>
    <h4>Date: <?php echo $date; ?></h4>
    <h4>Time: <?php echo $time; ?></h4>
    <br>
    <h5>An email confirmation has been sent to <?php echo $email; ?> with additional instructions.</h5>
</div>

<div class="schedule-container">

</div>

<?php
$to = $email;
$subject = "Robotic Playground Session Scheduled!";

$msg = "Hello . '$name' . ,\nWelcome to Robotic Playground!\nYour Session information is below:";
$msg .= "<h4>Name:" . $name . "</h4>";
$msg .= "<h4>Email:" . $email . "</h4>";
$msg .= "<h4>Date:" . $date . "</h4>";
$msg .= "<h4>Time:" . $time . "</h4>";
$msg .= "<h5>This link will become active five minutes prior to the session time above</h5>";
$msg .= "<a href=''>Robotic Playground Session</a>";

$header = "From:RoboticPlayground@rp.edu\r\n";
$header .= "Cc:test@rp.edu \r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";

$retval = mail ($to,$subject,$msg,$header);

if( $retval == true ) {
    echo "Message sent successfully...";
}else {
    echo "Message could not be sent...";
}
?>

<footer class="footer-distributed">
    <div class="footer-right">
        <a href="https://www.w3schools.com/css/default.asp"><i class="fab fa-css3-alt fa-lg"></i></a>
        <a href="https://www.w3schools.com/html/default.asp"><i class="fab fa-html5 fa-lg"></i></a>
        <a href="https://www.w3schools.com/php/default.asp"><i class="fab fa-php fa-lg"></i></a>
        <a href="https://www.w3schools.com/python/default.asp"><i class="fab fa-python fa-lg"></i></a>
    </div>

    <div class="footer-left">
        <p class="footer-links">
            <a href="index.html" class="hvr-underline-reveal">Home</a>
            ·
            <a href="schedule.html" class="hvr-underline-reveal">Schedule</a>
            ·
            <a href="livestream.html" class="hvr-underline-reveal">Live Stream</a>
            ·
            <a href="faq.html" class="hvr-underline-reveal">FAQ</a>
            ·
            <a href="archive.html" class="hvr-underline-reveal">Archive</a>
        </p>
        <p>Georgia Southern University &copy; 2019</p>
    </div>
</footer>
</body>
</html>

