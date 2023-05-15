<?php

$Jesse = '2';  
$Pinkman = 'pinkman';
echo hash('sha256', '962Crystal');
$crystal = hash('sha256', '962Crystal');

$list = array (
   array('Jesse', 'Pinkman', '24/09/1984', 'jesse.pink@cook.com','962Crystal'),
   array($Jesse, $Pinkman, '24/09/1984', 'jesse.pink@cook.com',$crystal)
);

$fp = fopen('jeunes.csv', 'w');

foreach ($list as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);
?>
