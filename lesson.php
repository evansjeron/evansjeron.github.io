<html>
<head> 
<title> </title> </head>
<body>

<?php

echo $name = $_FILES['file']['name'] . "<br>";
echo $type = $_FILES['file']['type'] . "<br>";
echo $tmp_location = $_FILES['file']['tmp_name'] . "<br>";
echo $error = $_FILES['file']['error'] . "<br>";

if (isset($_POST['submit'])){
	$file = $_FILES['file'];
	$name = $_FILES['file']['name'];
	$tmp_name = $_FILES['file']['tmp_name'];
	$size = $_FILES['files']['size'];
	$error = $_FILES['file']['error'];
	
	$tempextension = explode('.', $name);
	$fileExtension = strtolower(end($tempextension));
	$isallowed = array('jpg', 'jpeg', 'png', 'pdf');
	
	if(in_array($fileExtension, $isallowed)){
		if($error === 0){
			if($size < 100000){
				$newFileName = uniqid('', true) . "." . $fileExtension;
				$fileDestination = "www/" . $newFileName;

				move_uploaded_file($tmp_name, $fileDestination);
				header("Location: lesson.php?uploadsucess");
			} else {
				echo "Sorry your file is too big!"; 
			}
		}else {
				echo "sorry there was an error!, try again";}
		}else
			echo "Sorry, your file type is not accepted";
			
}

?>

</body>
</html>