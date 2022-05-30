<?php
	session_start();
    if($_SESSION["ExpirationTime"]>time()){
      $_SESSION["ExpirationTime"]=time()+3600;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./frontEnd/style.css">
</head>
<body>
	<div>
        <span style="color: white;">User logged in!</span>
	</div>
	                
	<form action="logOut.php" method="POST">
		<button class='bx bx-log-out' id="log_out" style="color: white;">LogOut</button>
	</form>
</body>
</html>
<?php
	}else{
      session_destroy();
    }
?>
