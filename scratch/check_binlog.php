<?php
$pdo = new PDO('mysql:host=127.0.0.1;port=3306', 'root', 'K159753s');
$stmt = $pdo->query("SHOW BINARY LOGS");
print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
