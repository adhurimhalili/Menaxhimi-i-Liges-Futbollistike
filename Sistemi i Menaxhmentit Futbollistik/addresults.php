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
    include 'dbconnect.php';

        
    if(isset($_POST['submitted'])) {
        $query = $pdo->prepare("INSERT INTO results (team1,team2,g1,g2) values (:team1,:team2,:g1,:g2)");
        $query->bindParam(':team1', $_POST['team1']);
        $query->bindParam(':team2', $_POST['team2']);
        $query->bindParam(':g1', $_POST['g1']);
        $query->bindParam(':g2', $_POST['g2']);
        $query->execute();
     
    }
?>


<!DOCTYPE html>
<html>
<title>Add Results | EU Super League</title>
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
 			<fieldset class="border">
     		
                <img src="foto/Logo 4.png" width="100px" style="margin-top: 40px; margin-bottom: 50px;">
                <br>
                <form action="" method="POST" style="margin-bottom:50px;">
                <input type="text"  name="team1" placeholder="TEAM 1" style="margin-bottom:10px;">
                <input type="text"  name="team2" placeholder="TEAM 2" style="margin-bottom:10px;">
                <input type="number"  name="g1" placeholder="TEAM 1 GOALS" style="margin-bottom:10px;">
                <input type="number"  name="g2" placeholder="TEAM 2 GOALS" style="margin-bottom:10px;">
                     <br>
                <input type="submit" name="submitted" value="Confirm">
            </form>
            </fieldset>
            
        </div>
           
           
     		
    </div>