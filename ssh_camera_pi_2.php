<?php
include('phpseclib1.0.14/Net/SSH2.php');

$ssh = new Net_SSH2('pi@130.254.204.40');
$ssh->login('pi');
$ssh->read('User Name:');
$ssh->write("pi\n");
$ssh->read('Password:');
$ssh->write("pi\n");
echo 'hello world';

$ssh->setTimeout(1);
$ssh->read();
$ssh->write("ls -la\n");
echo $ssh->read();

?>