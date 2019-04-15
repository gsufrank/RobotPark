<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="favicon.ico" type="image/gif" sizes="16x16"/>
    <title>Video Archive</title>
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
            <li class="current"><a href="index.html" class="hvr-icon-spin"><i class="fas fa-home fa-lg hvr-icon"></i></a>
            <li><a href="schedule.html" class="hvr-underline-from-center">Schedule</a></li>
            <li><a href="stream.html" class="hvr-underline-from-center">Live Stream</a></li>
            <li class="current"><a href="archive.php" class="hvr-underline-from-center">Archive</a></li>
            <li><a href="faqs.html" class="hvr-underline-from-center">FAQ</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <div class="container">
    <h2>Video Archive</h2>
    <hr class="archive">
    <br>
   
    
    
    <div id="videoPlayer">
      <video id="video" width="320" height="240" controls preload>
        <source id="mp4" src="/mnt/nfs/nfsserver/vid_2019-03-11-21:31.mp4" type="video/mp4">
      </video>
    </div>

    <div class="contain">


      <div class="row">
        <div class="row__inner">
          
         <?php 

            require('../rp_connect.php');

            $query = "SELECT * from lib";

            $result = @mysqli_query($conn, $query);

            $directory = '/var/www/html/mnt/nfs/nfsserver/';
            $scanned_directory = array_diff(scandir($directory), array('..', '.'));

            echo "<pre>";
                print_r($scanned_directory);
            echo "</pre>";

            if(! $result) { 
              die('Could not connect: '. mysql_error()); 
            }

            foreach ($scanned_directory as $i) {
              $query2 = "INSERT INTO lib(file_name) VALUES ('$i')";
              $result2 = @mysqli_query($conn, $query2);
            
              echo "<div class=\"tile\">
                      <div class=\"tile__media\">
                          <img class=\"tile__img\"  src=\"https://s3-us-west-2.amazonaws.com/s.cdpn.io/70390/show-6.jpg\" alt=\"\" />
                            </div>
                            <div class=\"tile__details\">
                           <div class=\"tile__title\">
                           <a href=\"\" id=\"$i\" onclick=\"loadVideo('$i');\">
                           $i
                          </div>
                        </div>
                    </div>";
            
            }
            

            mysqli_close();
            
          ?>

          

        </div>
      </div> 

    </div>

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
          <a href="index.html">Home</a>
            ·
          <a href="schedule.html">Schedule</a>
            ·
          <a href="stream.html">Live Stream</a>
            ·
          <a href="faqs.html">FAQ</a>
            ·
          <a href="archive.php">Archive</a>
        </p>
        <p>Georgia Southern University &copy; 2019</p>
      </div>
    </footer>
    
    <script>
      function loadVideo(id) {
        var video = document.getElementById('video');
        var d = new Date();
        
        var mp4 = document.getElementById('mp4');
        
        //look into changing the url to prevent the page from loading the same cache
        mp4.setAttribute('src', "/mnt/nfs/nfsserver/" + id + "?time=" + d.getTime(););
        
        video.load();
        video.play();
      }
      
    </script>
  </body>
</html>
