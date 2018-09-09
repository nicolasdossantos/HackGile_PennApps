<?php
<<<<<<< HEAD

//require_login();

=======
>>>>>>> af240c8e09624a7cbf7088fe82d2ff103ceb1064
 session_start();

 $from_time1 = date('Y-m-d H:i:s');
 $to_time1 = $_SESSION['end_time'];

 $timefirst = strtotime($from_time1);
$timesecond = strtotime($to_time1);

$differenceinseconds = $timesecond - $timefirst;

echo  gmdate("H:i:s",$differenceinseconds);

