<!DOCTYPE html>
<html>
<head>
<title>Open video</title>
</head>
<body>
hello world
<br>

<?php
echo "this is stupid";
echo realpath("small.mp4");
$vid = '/mnt/nfs/nfsserver/vid_2019-02-18-17:57.mp4';
?>

<video width="320" height="240" controls>
  <source src="/mnt/nfs/nfsserver/vid_2019-02-18-17:57.mp4" type="video/mp4">
Your browser does not support the video tag.
</video>

<video width="320" height="240" controls>
  <source src="<?php echo $vid; ?>" type="video/mp4">
Your browser does not support the video tag.
</video>

<video width="320" height="240" controls>
    <source src="mp4_test.php" type="video/mp4">
    Your browser does not support the video tag.
</video>

<video width="320" height="240" controls>
  <source src="/mnt/nfs/nfsserver/vid_2019-02-25-18:02.mp4" type="video/mp4">
Your browser does not support the video tag.
</video>

<video width="320" height="240" controls>
  <source src="/mnt/nfs/nfsserver/vid_2019-03-06-18:42.mp4" type="video/mp4">
Your browser does not support the video tag.
</video>

<video width="320" height="240" controls>
  <source src="/mnt/nfs/nfsserver/vid_2019-03-11-21:31.mp4" type="video/mp4">
Your browser does not support the video tag.
</video>


<?php echo "$vid"; ?>

</body>
</html>
