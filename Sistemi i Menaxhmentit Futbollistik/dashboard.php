<?php
        if(isset($_SESSION['is_admin']) && $_SESSION['is_admin']==0) {
        header('Location: ./index.php');
    }
?>
<!DOCTYPE html>
<html>
<title>Dashboard | EU Super League</title>
<head>
	
	<link rel="stylesheet" type="text/css" href="dashboard.css">
    <link rel="icon" href="foto/Logo 4.png">

</head>


<body style="height: 100vh;">  

<?php  include 'partials/header.php' ?>

        <div style="width: 100%; display: flex; justify-content: space-between; height: 85%;">
            <div align ="center" 
            style="width: 25%; justify-content: center; background-color: rgb(9, 43, 153); border: 1px solid rgb(4, 62, 255); margin-top:20px;">
            <h2>Tools</h2>  
                <a href='addadmin.php'>Add Admin</a><br>
                <a href='messages.php'>Read Messages</a>
            </div>                      
        </div>
</div>