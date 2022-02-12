<?php
    include 'dbconnect.php';

        
    if(isset($_POST['submitted'])) {
        $query = $pdo->prepare("INSERT INTO mails (name,surname,email,text) values (:name,:surname,:email,:text)");
        $query->bindParam(':name', $_POST['name']);
        $query->bindParam(':surname', $_POST['surname']);
        $query->bindParam(':email', $_POST['email']);
        $query->bindParam(':text', $_POST['text']);
        $query->execute();
        header("Location: ./index.php");
    }
?>


<!DOCTYPE html>
<html>
<title>Contact | EU Super League</title>
<head>
	
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
    <link rel="icon" href="foto/Logo 4.png">

</head>


<body style="height: 100vh;">  

<?php  include 'partials/header.php' ?>


<div style="height: 100vh;">  



    <div style="height: 27%;">

    </div>
    <div style="height: 38%; ">
    	<div align ="center">     			
 			<fieldset class="border">
     		
                <img src="foto/Logo 4.png" width="100px" style="margin-top: 40px; margin-bottom: 50px;">
                <br>
                <form action="" method="POST" style="margin-bottom:50px;">
                <input type="text"  name="name" placeholder="Name" style="margin-bottom:10px;">
                <input type="text"  name="surname" placeholder="Lastname" style="margin-bottom:10px;">
                <input id="email" type="email"  name="email"  placeholder="Email" style="margin-bottom:10px;">

                <br>
                <textarea id="subject" name="text" placeholder="Write your message" maxlength="500" rows="5"></textarea><br>
                <input type="submit" name="submitted" value="Confirm">
            </form>
            </fieldset>
            
        </div>
           
           
     		
    </div>