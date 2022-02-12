<?php  include 'partials/header.php' ?>

<!DOCTYPE html>
<html>
<title>Home | EU Super League</title>
<head>
	
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
    <link rel="icon" href="foto/Logo 4.png">

</head>


<body style="height: 100vh;">  


        <div align ="center" style="margin-bottom: 20px;"><img src="foto\Logo 4.png" width="100px"></div>

        <div style="width: 69%; display: flex; justify-content: space-between; float:left">
            <div align ="center" 
            style="width: 100%; justify-content: center; background-color: rgb(9, 43, 153); border: 1px solid rgb(4, 62, 255)">      
            
                <h2>Latest Results</h2>            
                    <br>
                    <?php
                        include "dbconnect.php";
                        $select = $pdo->prepare("SELECT * FROM results ORDER BY ID DESC LIMIT 5");
                        $select->setFetchMode(PDO::FETCH_ASSOC);
                        $select->execute();
                        while($data=$select->fetch()){
                        ?>
                        <div style="display: flex; justify-content: center;">   
                                <h3 style="text-align:center"><?php echo $data['team1']; ?></h3> 
                                <h3 style="text-align:center; margin-left:10px; margin-right:10px"><?php echo $data['g1']; ?> : <?php echo $data['g2']; ?></h3>
                                <h3 style="text-align:center"><?php echo $data['team2']; ?></h3>
                        </div>
                        <?php
                        }?>

                    </div>

                   
            </div>

            <div style="width: 30%; float: right; background-color: rgb(8, 43, 160); border: 1px solid rgb(4, 62, 255); 
            justify-content: space-around; justify-content: center;">
            
            <h2 align="center">Last News</h2> 
            
                <div style="justify-content: space-around;" class="fade">
                <?php
                        include "dbconnect.php";
                        $select = $pdo->prepare("SELECT * FROM news ORDER BY ID DESC LIMIT 1");
                        $select->setFetchMode(PDO::FETCH_ASSOC);
                        $select->execute();
                        while($data=$select->fetch()){
                        ?>
                        <a href="readnews.php?id=<?php echo $data['id']; ?>"><img src="images/<?php echo $data['image']; ?>" style="margin-left:5%" width="90%" style="aspect-ratio: 16 / 9; justify-content: space-around" class="fade">  
                    <h3 style="text-align:center"><?php echo $data['title']; ?></h3></a> 

                        <?php
                        }?>
                    </div>
                <br>

            </div>

        </div>
        
    </body>

</html>
