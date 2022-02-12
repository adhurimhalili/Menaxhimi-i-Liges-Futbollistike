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
<!DOCTYPE html>
<html>
<title>Dashboard | EU Super League</title>
<head>
	
	<link rel="stylesheet" type="text/css" href="dashboard.css">
    <link rel="icon" href="foto/Logo 4.png">

</head>


<body style="height: 100vh;">  



        <div style="width: 100%; display: flex; justify-content: space-between; height: 85%;">
            <div align ="center" 
            style="width: 25%; justify-content: center; background-color: rgb(9, 43, 153); border: 1px solid rgb(4, 62, 255); margin-top:20px;">
            <h2>Tools</h2>  
                <a href='addadmin.php'>Add Admin</a><br>
                <a href='messages.php'>Read Messages</a><br>
                <a href='addproduct.php'>Add Product</a><br>
                <a href='productstable.php'>Products Table</a><br>
                <a href='addnews.php'>Add News</a><br>
                <a href='newstable.php'>News Table</a><br>
                <a href='addresults.php'>Add Result</a><br>
                <a href='resultstable.php'>Results Table</a><br>
            </div>                      
        </div>
</div>