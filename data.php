<?php

$Jesse = '2';  
$Pinkman = 'pinkman';

$list = array (
   array('Jesse', 'Pinkman', '24/09/1984', 'jessi.pink@cook.com'),
   array($Jesse, $Pinkman, '24/09/1984', 'jessi.pink@cook.com')
);

$fp = fopen('jeunes.csv', 'w');

foreach ($list as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);
?>
