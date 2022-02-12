<?php  include 'partials/header.php' ?>
<?php
        if(!isset($_SESSION['name'])) {
        header('Location: ./index.php');
    }
?>

<?php
        if(isset($_SESSION['is_admin']) && $_SESSION['is_admin']==0) {
        header('Location: ./index.php');
    }
?>

<?php 

include "dbconnect.php";

if(isset($_POST['ok'])) 

{ 

$sth = $pdo->prepare("UPDATE news SET title = :title, description = :description WHERE id = :id");

$sth->bindParam(':title', $_POST['title']); 
$sth->bindParam(':id', $_GET['id']);
$sth->bindParam(':description', $_POST['description']); 
$sth->execute(); 
header("Location: ./newstable.php");

} 


?> 


<!DOCTYPE html>
<html>
<title>Edit News | EU Super League</title>
<head>
	
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
    <link rel="icon" href="foto/Logo 4.png">

</head>


<body style="height: 100vh;">  




<div style="height: 100vh;">  



    <div style="height: 27%;">

    </div>
    <div style="height: 38%; ">
    	<div align ="center">     
        <h1 style="text-align:center; color:white">Add News</h1>			
 			<fieldset class="border">
     		
                <img src="foto/Logo 4.png" width="100px" style="margin-top: 40px; margin-bottom: 50px;">
                <br>
                <form method="POST" enctype="multipart/form-data"> 
                <?php
        include "dbconnect.php";
        $id=$_GET['id'];
        $select = $pdo->prepare("SELECT * FROM news where id=$id");
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute();
        while($data=$select->fetch()){
        ?>
                <input type="text" value="<?php echo $data['title'];?>" name="title" placeholder="Title"/> <br><br>
                <textarea name="description" placeholder="NEWS DESCRIPTION" rows="5"><?php echo $data['description'];?></textarea>
                <?php
        }?>
                <input type="submit" name="ok" class="login-btn"/> <br><br>

                </form>

            </form>
            </fieldset>
            
        </div>
           
           
     		
    </div>