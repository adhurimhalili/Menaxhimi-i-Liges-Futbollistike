<!DOCTYPE html>
<html>
<title>Log-In | EU Super League</title>
<head>
	
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
    <link rel="icon" href="foto/Logo 4.png">

</head>


<body style="height: 100vh;">  

    <div align ="right" style="justify-content: right; width: 100%; float: right; background-color: rgb(9, 43, 153); border: 1px solid rgb(4, 62, 255);">

        <div style="float: left;"><a href="html.html"><img src="foto/Logo 5.png"; style="height: 40px; margin-left: 5px; margin-top: 5px;"></a> 
        </div>

        <nav align ="right" style="justify-content: space-around; display: flex; width: 40%; float: right;">

            <div style="margin-top: 14px;"><a href="store.html" class="login-button">Store</a></div>
            <div style="margin-top: 14px;"><a href="about.html" class="login-button">About Us</a></div>
            <div style="margin-top: 14px;"><a href="login.html" class="login-button">Log In</a></div>
        </nav>


    </div>
    

    <div style="height: 27%;">

    </div>
    <div style="height: 38%; ">
    	<div align ="center">     			
 			<fieldset class="border">
     		
                <img src="foto/Logo 4.png" width="100px" style="margin-top: 40px; margin-bottom: 50px;">
                <br>
        	    <input type="name" placeholder="Username" id="login-username" style="margin-bottom: 10px;">
                <p class="validation" id="login-username-valid" style="margin-top: -5px;"></p>

        	    <input type="password" placeholder="Password" id="login-password" style="margin-bottom: 20px;">
                <p class="validation" id="login-password-valid" style="margin-top: -15px;"></p>
     		
                <button type="submit" name="submit" class="login-btn" onclick="loginValidation()">Log in</button>
                <br>
                <div><input type="checkbox" class="Remember-me">Remember me<br></div> 

            </fieldset>
            
        </div>
           
           
     		
    </div>

        <script src="login.js"></script>

</body>
</html>

</body>
</html>