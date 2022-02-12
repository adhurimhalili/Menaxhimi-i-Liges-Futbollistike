<?php

    include 'dbconnect.php';

    $id = $_GET['id'];

    $query = $pdo->prepare('DELETE FROM products WHERE id = :id');
    $query->bindParam('id', $id);

    $query->execute();

    header('Location: productstable.php');
?>
