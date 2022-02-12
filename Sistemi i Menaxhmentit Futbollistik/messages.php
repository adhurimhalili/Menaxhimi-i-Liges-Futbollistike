<?php
        if(isset($_SESSION['is_admin']) && $_SESSION['is_admin']==0) {
        header('Location: ./index.php');
    }
    include 'dbconnect.php';
?>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
  margin:0 auto;
  margin-top:50px;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
tr:nth-child(even) {
  background-color: #dddddd;
}
h1{
    margin-top:20px;
    text-align:center;
    color:white !important;
    font-size:60px !important;
}
td h3{
    color:black !important;
}
</style>
<!DOCTYPE html>
<html>
<title>Messages | EU Super League</title>
<head>
	
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
    <link rel="icon" href="foto/Logo 4.png">

</head>
<div id="emails">
    <h1>Mesazhet</h1>
  <?php
  $sql = $pdo->prepare("SELECT * FROM mails " );
  $sql->execute();
  echo"<table>";
  echo"<th>";
  echo"<h3> Emri </h3>";
  echo"</th>";
  echo"<th>";
  echo"<h3> Mbiemri </h3>";
  echo"</th>";
  echo"<th>";
  echo"<h3> Emaili </h3>";
  echo"</th>";
  echo"<th>";
  echo"<h3> Mesazhi </h3>";
  echo"</th>";
  echo"<th>";
  echo"<h3> Fshije </h3>";
  echo"</th>";
  while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {

    echo"<tr>";
    echo"<td>";
  echo"<h3> ".$row['name']." </h1> ";
  echo"</td>";
    echo"<td>";
  echo"<h3> ".$row['surname']." </h1> ";
  echo"</td>";
  echo"<td>";
  echo"<h3> ".$row['email']." </h1> ";
  echo"</td>";
  echo"<td id='teksti'>";
  echo"<h3 id='teksti'> ".$row['text']." </h1> ";
  echo"</td>";

  echo"<td>";
  echo"<h4><a href='deletemessage.php?id=".$row['id']."'>🗑️</a></h4>";
  echo"</td>";
  echo"</tr>";

}
echo"</table>";
  ?>
</div>