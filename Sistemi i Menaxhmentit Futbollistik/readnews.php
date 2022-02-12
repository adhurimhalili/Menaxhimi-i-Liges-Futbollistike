<?php include 'partials/header.php';
      include 'dbconnect.php';
?>

<!DOCTYPE html>
<html>
<title>Headline | EU Super League</title>
<head>
	
	<link rel="stylesheet" type="text/css" href="headline.css">
    <link rel="icon" href="foto/Logo 4.png">

</head>

<?php
        include "dbconnect.php";
        $id=$_GET['id'];
        $select = $pdo->prepare("SELECT * FROM news where id=$id");
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute();
        while($data=$select->fetch()){
        ?>
        <img src="images/<?php echo $data['image']; ?>" width="100%" height="70%" style="object-fit:cover">  
        <h2 style="text-align:center"><?php echo $data['title']; ?></h2>
        <h4 style="text-align:center">Autori: <?php echo $data['autori']; ?></h4>
        <p><?php echo $data['description']; ?></p>
        <?php
        }?>