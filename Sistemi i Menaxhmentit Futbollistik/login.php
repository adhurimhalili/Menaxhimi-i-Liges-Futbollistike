<?php include 'partials/header.php'; ?>
<?php
        if(isset($_SESSION['id'])) {
        header('Location: ./index.php');
    }
?>
<?php include 'dbconnect.php'; ?>
<?php
    if(isset($_POST['submitted'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = $pdo->prepare('SELECT * FROM users WHERE email = :email');
        $query->bindParam(':email', $email);
        $query->execute();

        $user = $query->fetch();

        if(is_array($user)&&count($user) > 0 && password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['surname'] = $user['surname'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['adresa'] = $user['adresa'];
            $_SESSION['is_admin'] = $user['is_admin'];
            $roli=$user['is_admin'];
            if($roli==='1'){
                  header('Location: ./dashboard.php');
            }
            elseif($roli==='0'){  header('Location: ./index.php');}
        }else {
              echo "<h4 id='gabim'> Wrong email or password </h4> ";
        }
    }
?>

<!DOCTYPE html>
<html>
<title>Log-In | EU Super League</title>
<head>
	
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
    <link rel="icon" href="foto/Logo 4.png">

</head>


<div style="height: 100vh;">  



    <div style="height: 27%;">

    </div>
    <div style="height: 38%; ">
    	<div align ="center">     			
 			<fieldset class="border">
     		
                <img src="foto/Logo 4.png" width="100px" style="margin-top: 40px; margin-bottom: 50px;">
                <br>
                <form action="" method="POST">

            <input id="email" type="email" placeholder="Enter your email" name="email" required style="margin-bottom: 10px;"><br>
            <input type="password" placeholder="Enter your password" name="password" required style="margin-bottom: 20px;"><br>
            <input type="submit" name="submitted" value="LOG IN"  class="login-btn">
                </form>
            </fieldset>
            
        </div>
           
           
     		
    </div>


