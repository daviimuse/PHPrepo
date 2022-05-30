<?php
	session_start();
    include 'backEnd/repo.php';
    if(isset($_SESSION["ExpirationTime"])){
    	header("location: home.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>RepositoryPHP</title>
	<link rel="stylesheet" type="text/css" href="./frontEnd/style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
    <body>
        <div class="main">  	
            <input type="checkbox" id="chk" aria-hidden="true">
                <div class="signup"><!-- Registrazione -->
                    <form method="POST">
                        <label for="chk" aria-hidden="true">Sign up</label>
                        <input type="text" name="usrn" placeholder="User name" required>
                        <input type="email" name="rMail" placeholder="Email" required>
                        <input type="password" name="rPsw" placeholder="Password" required>
                        <button type="submit" name="regButton">Sign up</button>
                    </form>
                </div>

                <div class="login"><!-- Login -->
                    <form method="POST">
                        <label for="chk" aria-hidden="true">Login</label>
                        <input type="email" name="lMail" placeholder="Email" required>
                        <input type="password" name="lPsw" placeholder="Password" required>
                        <button type="submit" name="logButton">Login</button>
                    </form>
                </div>
        </div>
    </body>
</html>
