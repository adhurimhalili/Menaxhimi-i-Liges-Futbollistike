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
<title>Results Table | EU Super League</title>
<head>
	
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
    <link rel="icon" href="foto/Logo 4.png">

</head>
<div id="emails">
    <h1>Results</h1>
  <?php
  $sql = $pdo->prepare("SELECT * FROM results" );
  $sql->execute();
  echo"<table>";
  echo"<th>";
  echo"<h3> Team 1 </h3>";
  echo"</th>";
  echo"<th>";
  echo"<h3> G1 </h3>";
  echo"</th>";
  echo"<th>";
  echo"<h3>  </h3>";
  echo"</th>";
  echo"<th>";
  echo"<h3> G2 </h3>";
  echo"</th>";
  echo"<th>";
  echo"<h3> Team 2 </h3>";
  echo"</th>";
  echo"<th>";
  echo"<h3> Fshije </h3>";
  echo"</th>";
  while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {

    echo"<tr>";
    echo"<td>";
  echo"<h3> ".$row['team1']." </h3> ";
  echo"</td>";
  echo"<td>";
  echo"<h3> ".$row['g1']." </h3> ";
  echo"</td>";
  echo"<td>";
  echo"<h3> : </h3> ";
  echo"</td>";
  echo"<td>";
  echo"<h3> ".$row['g2']." </h3> ";
  echo"</td>";
  echo"<td>";
  echo"<h3> ".$row['team2']." </h3> ";
  echo"</td>";
  echo"<td>";
  echo"<h4><a href='deleteresult.php?id=".$row['id']."'>🗑️</a></h4>";
  echo"</td>";
  echo"</tr>";

}
echo"</table>";
  ?>
</div>