<?php
$handle = fopen('d:/Herd/doryt/scratch/binlog_utf8.txt', 'r');
$lineNum = 0;
while (($line = fgets($handle)) !== false) {
    $lineNum++;
    if (stripos($line, 'DROP TABLE') !== false) {
        echo "DROP TABLE at line " . $lineNum . "\n";
    }
}
fclose($handle);
?>
