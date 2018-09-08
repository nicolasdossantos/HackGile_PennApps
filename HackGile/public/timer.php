<?php
session_start();

$link = mysqli_connect('localhost','webuser','pennapps2018');
mysqli_select_db($link,'pennapps');

$duration ="";
$res = mysqli_query($link, "SELECT duration FROM timer");

while($row=mysli_fetch_array($res)){
    $duration = $row['duration'];

}

$_SESSION["duration"] = $duration;
$_SESSION["start_time"] = date("Y-m-d H:i:s");

$end_time = date('Y-m-d H:i:s', strtotime('+'.$_SESSION["duration"].'minutes',strtotime($_SESSION['start_time'])));

$_SESSION['end_time']= $end_time;
?>

<script type="'text/javascript">
  window.location='time_test.php';
</script>
