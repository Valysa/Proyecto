<?php
$handle = fopen('BDD2/'.reference.'.csv', "r+");
$id = fgetcsv($handle, 1000, ",");
echo $id[0];
$id[0]++;
fputcsv($handle, $id[0]);
echo $_POST["exp"]
?>  