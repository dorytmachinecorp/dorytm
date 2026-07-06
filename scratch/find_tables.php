<?php
$text = file_get_contents('d:/Herd/doryt/scratch/binlog_dump.txt');
preg_match_all('/create table `(.*?)`/i', $text, $matches);
print_r(array_unique($matches[1]));
?>
