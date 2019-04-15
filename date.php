<?php
define('times', [
        '08:00:00','08:30:00','09:00:00','09:30:00', '10:00:00','10:30:00', '11:00:00','11:30:00','12:00:00', '12:30:00', '13:00:00', '13:30:00','14:00:00','14:30:00',
    '15:00:00','15:30:00','16:00:00','16:30:00','17:00:00','17:30:00','18:00:00','18:30:00','19:00:00','19:30:00']);

// echo 'hello world';
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
<h2>Schedule a Session</h2>
<hr class="schedule">
<br>
</div>

<div class="schedule-container">
  <div class="form1">
    <h1 align="center">Select a Time</h1><br>
    <form action="handle-date.php" method="post">
        <label class="col-25" for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>" readonly><br><br>
      <label class="col-25" for="name">Email:</label>
      <input type="text" name="email" value="<?php echo $email; ?>" readonly><br><br>
      <label class="col-25" for="name">Date Selected:</label>
      <input type="text" name="date" value="<?php echo $date; ?>" readonly><br><br>
      <label class="col-25" for="name">Time</label>

        <select name="time">
            <option selected="selected">Choose one</option>
            <?php

            require('../rp_connect.php');

            $query = "SELECT time from res where date='$date'";
            $result = @mysqli_query($conn, $query);
            $reservedTimes = [];
            $reservedTimesOneLevel = [];
            echo '<br>';
            if ($result) {
                while($reservedTime = $result->fetch_array())
                {
                    $reservedTimes[] = $reservedTime;
                }
            } else
                echo 'error';

            foreach ($reservedTimes as $i){
                $reservedTimesOneLevel[] = $i['time'];
        }


            $availableTimes = array_diff(times,$reservedTimesOneLevel);
            // Iterating through the times array
            foreach($availableTimes as $time){
                ?>
                <option value="<?php echo strtolower($time); ?>"><?php echo $time; ?></option>
                <?php
            }
            mysqli_free_result($result);
            mysqli_close($conn);
            ?>
        </select><br><br>
<!--        --><?php //foreach ($reservedTimes as $i){
//        echo $i['time'];
//        }
//        ?>
<!--       --><?php //foreach ($reservedTimesOneLevel as $i){
//            echo $i;
//        }
//        ?>
<!--        --><?php //foreach ($availableTimes as $i){
//            echo $i;
//        }
//        ?>
<!--        --><?php //foreach (times as $i){
//            echo $i;
//        }
//        ?>
      <!--<input type="time" name="name"><br><br>-->
      <input type="submit" value="Submit"></button>
    </form>
  </div>

<!--   <div class="form2">
    <h1> Currently Scheduled Times</h1>
    <table>
      <tr>
        <th style="font-size: 20px;">Name</th>
        <th style="font-size: 20px;">Date</th>
        <th style="font-size: 20px;">Time</th>
      </tr>
      <tr>
        <td>Jacob</td>
        <td>03/07</td>
        <td>9:30 am</td>
      </tr>
       <tr>
        <td>Jacob</td>
        <td>03/07</td>
        <td>9:30 am</td>
      </tr>
       <tr>
        <td>Jacob</td>
        <td>03/07</td>
        <td>9:30 am</td>
      </tr>
    </table>
  </div> -->
</div>


    <footer class="footer-distributed">
      <div class="footer-right">
        <a href="https://www.w3schools.com/css/default.asp"><i class="fab fa-css3-alt fa-lg"></i></a>
        <a href="https://www.w3schools.com/html/default.asp"><i class="fab fa-html5 fa-lg"></i></a>
        <a href="https://www.w3schools.com/php/default.asp"><i class="fab fa-php fa-lg"></i></a>
        <a href="https://www.w3schools.com/js/js_intro.asp"><i class="fab fa-js-square"></i></a>
      </div>

      <div class="footer-left">
        <p class="footer-links">
          <a href="index.html" class="hvr-underline-reveal">Home</a>
          ·
          <a href="schedule.html" class="hvr-underline-reveal">Schedule</a>
          ·
          <a href="stream.html" class="hvr-underline-reveal">Live Stream</a>
          ·
          <a href="faqs.html" class="hvr-underline-reveal">FAQ</a>
          ·
          <a href="archive.html" class="hvr-underline-reveal">Archive</a>
        </p>
        <p>Georgia Southern University &copy; 2019</p>
      </div>
    </footer>
  </body>
</html>
