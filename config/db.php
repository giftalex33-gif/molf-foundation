<?php
// Establish a PDO connection and expose $pdo for the app to use.
$config = require __DIR__ . '/config.php';
try {
  $pdo = new PDO(sprintf('mysql:host=%s;dbname=%s;charset=utf8mb4', $config['db_host'], $config['db_name']), $config['db_user'], $config['db_pass'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (Throwable $e) {
  // In production you might log this and show a generic error.
  http_response_code(500);
  exit('Database connection failed: ' . $e->getMessage());
}
