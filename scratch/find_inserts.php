<?php
$handle = fopen('d:/Herd/doryt/scratch/binlog_utf8.txt', 'r');
$lineNum = 0;
while (($line = fgets($handle)) !== false) {
    $lineNum++;
    if (stripos($line, 'INSERT INTO `doryt_mc`.`products`') !== false) {
        echo "INSERT at line " . $lineNum . "\n";
    }
}
fclose($handle);
?>
