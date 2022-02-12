<?php
        if(isset($_SESSION['is_admin']) && $_SESSION['is_admin']==0) {
        header('Location: ./index.php');
    }
    include 'dbconnect.php';
?>

<?php 

include "dbconnect.php";

if(isset($_POST['ok'])) 

{ 

$folder ="images/"; 

$image = $_FILES['image']['name']; 

$path = $folder . $image ; 

$target_file=$folder.basename($_FILES["image"]["name"]);


$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);


$allowed=array('jpeg','png' ,'jpg'); $filename=$_FILES['image']['name']; 

$ext=pathinfo($filename, PATHINFO_EXTENSION); if(!in_array($ext,$allowed) ) 

{ 

 echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";

}

else{ 

move_uploaded_file( $_FILES['image'] ['tmp_name'], $path); 

$sth=$pdo->prepare("insert into news(title,image,description,autori)values(:title,:image,:description,:autori) "); 

$sth->bindParam(':title', $_POST['title']); 
$sth->bindParam(':image',$image); 
$sth->bindParam(':description', $_POST['description']); 
$sth->bindParam(':autori', $_POST['autori']); 
$sth->execute(); 

} 

} 

?> 


<!DOCTYPE html>
<html>
<title>Add Product | EU Super League</title>
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
        <h1 style="text-align:center; color:white">Add News</h1>			
 			<fieldset class="border">
     		
                <img src="foto/Logo 4.png" width="100px" style="margin-top: 40px; margin-bottom: 50px;">
                <br>
                <form method="POST" enctype="multipart/form-data"> 

                <input type="file" name="image" style="margin-bottom:15px" required/> 
                <input type="text" name="title" placeholder="Title"/> <br><br>
                <textarea  name="description" placeholder="NEWS DESCRIPTION" rows="5"></textarea>
                <input type="hidden" name="autori" value="<?php echo $_SESSION['name'] ?> <?php echo $_SESSION['surname'] ?>"/>
                <input type="submit" name="ok" class="login-btn"/> <br><br>

                </form>

            </form>
            </fieldset>
            
        </div>
           
           
     		
    </div>