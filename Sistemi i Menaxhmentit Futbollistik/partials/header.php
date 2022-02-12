<?php session_start(); ?>

<div align ="right" style="justify-content: right; width: 100%; float: right; background-color: rgb(9, 43, 153); border: 1px solid rgb(4, 62, 255);">

<div style="float: left;"><a href="index.php"><img src="foto/Logo 5.png"; style="height: 40px; margin-left: 5px; margin-top: 5px;"></a> 
</div>

<nav align ="right" style="justify-content: space-around; display: flex; width: 40%; float: right;">
<?php if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin']==0): ?>
    <div style="margin-top: 14px;"><a href="about.php" class="login-button">About Us</a></div>
    <div style="margin-top: 14px;"><a href="contact.php" class="login-button">Contact</a></div>
  <?php endif;?>
    <?php if(!isset($_SESSION['name'])): ?>
    <div style="margin-top: 14px;"><a href="login.php" class="login-button">Sign In</a></div>
    <div style="margin-top: 14px;"><a href="signup.php" class="login-button">Sign Up</a></div>
    <?php endif; ?>
    <?php if(isset($_SESSION['name'])): ?>
      <div style="margin-top: 14px;"><a href="store.php" class="login-button">Store</a></div>
        <div style="margin-top: 14px; color:white; font-size:20px;" >Hi <?php echo $_SESSION['name'] ?>! </div>
        <div style="margin-top: 14px;"><a href="logout.php" class="login-button">Log Out</a></div>
  <?php endif; ?>
</nav>


</div>