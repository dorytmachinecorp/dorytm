<?php
$pdo = new PDO('sqlite:D:/site data/doryt/database/database.sqlite');
$stmt = $pdo->query("SELECT name FROM sqlite_master WHERE type='table'");
while ($row = $stmt->fetch()) {
    echo $row['name'] . "\n";
}
