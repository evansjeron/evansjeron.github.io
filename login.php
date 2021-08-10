<?php
include "header.php";
require_once "database.php";
?>
<html>
<head> 
<title> Student Portal</title> 

</head>
<body >

<br><br><br><br><br><br>

<h2> LOGIN </h2>
<form action = "logininc.php" method="post" enctype = "multipart/form-data">
<input type = "text" name = "username" placeholder="Username">
<input type = "password" name="password" placeholder="Password">
<button type = "submit" name = "submit">SUBMIT</button>
</form><br><br>
<p> Not registered yet
<a href="register.php"> Click here to Register </a></p>
<?php
include "footer.php";
?>
</body>
</html>