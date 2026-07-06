<?php
$handle = fopen('d:/Herd/doryt/scratch/binlog_utf8.txt', 'r');
$lineNum = 0;
$inInsert = false;
$lineCount = 0;
while (($line = fgets($handle)) !== false) {
    $lineNum++;
    if (stripos($line, 'INSERT INTO `doryt_mc`.`products`') !== false) {
        $inInsert = true;
        $lineCount = 0;
    }
    if ($inInsert) {
        $lineCount++;
        if (strpos($line, '###   @3=') === 0) {
            echo "Line $lineNum: " . trim($line) . "\n";
            $inInsert = false;
        }
        if ($lineCount > 10) {
            $inInsert = false; // Give up
        }
    }
}
fclose($handle);
?>
