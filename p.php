<?php
$result= '<?xml version="1.0" encoding="UTF-8"?><response><error>0</error><message></message></response>';
if (strpos($result,'<error>0</error>')) {
    $status->Success=1;
}
print_r($status);
$json = json_encode($status);
$j = json_decode($json);

print_r($j);
?>