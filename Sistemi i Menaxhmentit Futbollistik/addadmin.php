<?php include 'partials/header.php'; ?>

<?php
        if(!isset($_SESSION['name'])) {
        header('Location: ./index.php');
    }
?>
<?php
        if(isset($_SESSION['is_admin']) && $_SESSION['is_admin']==0) {
        header('Location: ./index.php');
    }
    include 'dbconnect.php';
?>
<?php include 'dbconnect.php' ?>


<?php

    if(isset($_POST['submitted'])) {

        $password = password_hash($_POST['password'], PASSWORD_ARGON2I);

        $stmt = $pdo->prepare('SELECT COUNT(email) AS EmailCount FROM users WHERE email = :email');
        $stmt->execute(array('email' => $_POST['email']));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $passwordi = $_POST['password'];
        $emri = $_POST['name'];
        $mbiemri = $_POST['surname'];
// Validate password strength
      $uppercase = preg_match('@[A-Z]@', $passwordi);
        $lowercase = preg_match('@[a-z]@', $passwordi);
        $number  = preg_match('@[0-9]@', $passwordi);
        $numri  = preg_match('@[0-9]@', $emri);
        $numrii  = preg_match('@[0-9]@', $mbiemri);
        $special= preg_match('@[^a-zA-Z\d]@', $passwordi);
        $specials= preg_match('@[^a-zA-Z\d]@', $emri);
        $specialss= preg_match('@[^a-zA-Z\d]@', $mbiemri);

        if(!$uppercase || !$lowercase || !$number || $special || strlen($passwordi) < 8) {
    echo '<h4 id="password"> Passwordi duhet të ketë Upper Case, Lower Case dhe një numër </h4>';
}
        elseif($numri || $specials){
          echo"<h4 id='password'> Emri nuk duhet te permbaje numra </h4> ";
        }
        elseif($numrii || $specialss){
          echo"<h4 id='password'> Mbiemri nuk duhet te permbaje numra </h4> ";
        }
        else{
        if ($result['EmailCount'] == 0) {
        $query = $pdo->prepare('INSERT INTO users (name,surname, email,adresa,password, is_admin) VALUES (:name,:surname,LOWER(:email),UPPER(:adresa), :password, 1)');
        $query->bindParam(':name', $_POST['name']);
        $query->bindParam(':surname', $_POST['surname']);
        $query->bindParam(':email', $_POST['email']);
        $query->bindParam(':adresa', $_POST['adresa']);
        $query->bindParam(':password', $password);
        $query->execute();
        header('Location: dashboard.php');
      }
    else {
        echo "<h4 id='exists'>Email ekziston </h4>";
    }}
}
?>

<!DOCTYPE html>
<html>
<title>Add Admin | EU Super League</title>
<head>
	
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
    <link rel="icon" href="foto/Logo 4.png">

</head>


<div style="height: 100vh;">      

    <div style="height: 27%;">

    </div>
    <div style="height: 38%; ">
    	<div align ="center">  
            <h1> Add Admin </h1>   			
 			<fieldset class="border">
     		
                <img src="foto/Logo 4.png" width="100px" style="margin-top: 40px; margin-bottom: 50px;">
                <br>
                <form action="" method="POST">
            <input type="text" placeholder="Enter your name" name="name" required style="margin-bottom: 10px;"><br>
            <input type="text" placeholder="Enter your surname" name="surname" required style="margin-bottom: 10px;"><br>
            <input type="text" placeholder="Enter your address" name="adresa" required style="margin-bottom: 10px;"><br>
            <input id="email" type="email" placeholder="Enter your email" name="email" required style="margin-bottom: 10px;"><br>
            <input type="password" placeholder="Enter your pass" name="password" required style="margin-bottom: 10px;"><br>
            <input type="submit" name="submitted" value="LOG IN"  class="login-btn">
                </form>
            </fieldset>
            
        </div>
           
           
     		
    </div>