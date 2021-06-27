<?php
$dsn = 'mysql:dbname=jpmgroup_job;host=localhost';
$user = 'jpmgroup';
$password = '1qazZAQ!2wsxXSW@';

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "PDO error" . $e->getMessage();
    die();
}
