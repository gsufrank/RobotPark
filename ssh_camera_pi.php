<?php
echo 'Hello world';
// include('phpseclib1.0.14/Net/SSH2.php');

$connection = ssh2_connect('pi@130.254.204.40',22);
ssh2_auth_password($connection, 'username', 'password');

$stream = ssh2_exec($connection, '/usr/local/bin/php -i');
echo stream_get_contents($stream);
fclose($stream);
?>
