<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>welcome</title>
</head>
<body>
<?php
	//starts session
	session_start();

	include 'pageTitle.html';
	include 'pageHead.html';
	//checks the form method
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
	 	if(isset($_POST['begin']))
		{
			//directs to page1.php page
			header('location: page1.php');
			exit();
		}
	}
?>

	<form method="post">
	<input type="submit" name="begin" value="BEGIN" id='submit'/>
	</form>

</body>
</html>


