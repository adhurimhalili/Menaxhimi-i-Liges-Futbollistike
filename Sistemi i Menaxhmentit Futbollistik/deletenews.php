<?php

    include 'dbconnect.php';

    $id = $_GET['id'];

    $query = $pdo->prepare('DELETE FROM news WHERE id = :id');
    $query->bindParam('id', $id);

    $query->execute();

    header('Location: newstable.php');
?>
