<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `project-arip`");
    echo "Database created or already exists.\n";
} catch (PDOException $e) {
    if (strpos($e->getMessage(), 'Access denied') !== false) {
        echo "Error: Access denied. Please check your database credentials in .env.\n";
    } else {
        echo "Error creating database: " . $e->getMessage() . "\n";
    }
    exit(1);
}
