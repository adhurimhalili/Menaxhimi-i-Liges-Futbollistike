<?php

    include 'dbconnect.php';

    $id = $_GET['id'];

    $query = $pdo->prepare('DELETE FROM results WHERE id = :id');
    $query->bindParam('id', $id);

    $query->execute();

    header('Location: resultstable.php');
?>
