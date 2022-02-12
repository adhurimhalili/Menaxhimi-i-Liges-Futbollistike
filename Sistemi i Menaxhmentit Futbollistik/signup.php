
<?php include 'dbconnect.php' ?>


<?php

    if(isset($_POST['submitted'])) {

        isset($_POST['is_admin']) ? $isAdmin = 1 : $isAdmin = 0;
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
        $query = $pdo->prepare('INSERT INTO users (name,surname, email,adresa,password, is_admin) VALUES (:name,:surname,LOWER(:email),UPPER(:adresa), :password, :is_admin)');
        $query->bindParam(':name', $_POST['name']);
        $query->bindParam(':surname', $_POST['surname']);
        $query->bindParam(':email', $_POST['email']);
        $query->bindParam(':adresa', $_POST['adresa']);
        $query->bindParam(':password', $password);
        $query->bindParam(':is_admin', $isAdmin);
        $query->execute();
        header('Location: index.php');
      }
    else {
        echo "<h4 id='exists'>Email ekziston </h4>";
    }}
}
?>

<title> SIGN UP </title>
<link rel="stylesheet" href="css/login.css">
<img id="banner" src="img/bannerls.png">
<div id="container">
  <div id="katrori2">
        <form  id="format" action="" method="POST">
            <label for="name">Emri</label><br>
            <input type="text" placeholder="Enter your name" name="name" required><br>
            <label for="surname">Mbiemri</label><br>
            <input type="text" placeholder="Enter your surname" name="surname" required><br>
            <label for="surname">Adresa</label><br>
            <input type="text" placeholder="Enter your address" name="adresa" required><br>
            <label for="email">Email</label><br>
            <input id="email" type="email" placeholder="Enter your email" name="email" required><br>
            <label for="password">Password</label><br>
            <input type="password" placeholder="Enter your pass" name="password" required><br>
            <input id="admin"type="checkbox" name="is_admin">ADMIN<br>
            <input id="signupi"type="submit" name="submitted" value="SIGN UP">
        </form>
      </div>

    </div>
