<?php
$selectedTime = "9:15:00";
$endTime = strtotime("+15 minutes", strtotime($selectedTime));
echo date('h:i:s', $endTime);
?>