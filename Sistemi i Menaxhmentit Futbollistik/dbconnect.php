<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=football', 'root', '');
}catch(PDOException $e) {
    die($e->getMessage());
}
