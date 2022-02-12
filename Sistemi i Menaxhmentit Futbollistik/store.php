<?php include 'partials/header.php'; ?>
<?php
        if(!isset($_SESSION['id'])) {
        header('Location: ./index.php');
    }
?>

<!DOCTYPE html>
<html>
    <title>Store | EU Super League</title>
<head>

    <link rel="icon" href="foto/Logo 4.png">

    <link rel="stylesheet" href="store.css">

<script async src='/cdn-cgi/bm/cv/669835187/api.js'></script>
</head>

<body>

<script type="text/javascript">(function(){window['__CF$cv$params']=
{r:'6db65526fcf77ca6',m:'eBGuBH_DhAKybaplGXTdl2LoQxRmMZ9Z4dbiDJH.GME-1644506543-0-ASgBGx2g/BjNupCJuPb74sEzPzOnRWQEDncK98aRaOwfz8WbbRu9T6PJk75edxGFU/zdi4P2PkDXaSMi/TrJb5Mw5MAkeZMMvtPue6Qgk2G+Cr0lrjUDNZMHSPwq1VoqzXsVtASmA+kdVM9eLSuceSRzWcUEOiXinmbK6jOCbOPYJ0uyXs2imT7lFf8TqAQc/Q==',s:[0x9bdf9da339,0xfa3422dcd1],}})();</script>


    <!-- SLAJDERI -->
<div class="slideshow-container">

    <!-- FOTOT -->
    <?php
      include "dbconnect.php";
      $select = $pdo->prepare("SELECT * FROM products ");
      $select->setFetchMode(PDO::FETCH_ASSOC);
      $select->execute();
      while($data=$select->fetch()){
      ?>
      <div class="mySlides fade">
      <img src="images/<?php echo $data['image']; ?>" style="width: 500px; border-radius: 3%;">
      <div class="text"><?php echo $data['emri']; ?></div>
      </div>
      <?php
      }?>
  
    <!-- BUTONAT -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>


  <script>
    var slideIndex = 1;
    showSlides(slideIndex);
    
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
    }

    </script>