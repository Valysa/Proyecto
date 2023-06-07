<?php
$handle = fopen('BDD2/reference.csv', "a+");
$id = fgetcsv($handle, 1000, ",");
echo $id[0];
$id[0]++;
file_put_contents('BDD2/reference.csv', implode($id[0].PHP_EOL, $id));
fclose ($handle);
echo $_POST["exp"]
?>      
