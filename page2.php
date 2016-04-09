<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<?php
	//starts session
	session_start();
	include 'pageTitle.html'; 
	$howLongErr = $productErr = "";
	//checks form method
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$next = $_SESSION['next'] = $_POST['next'];

		if(isset($next))
		{
			if(!isset($_POST['howLong']) || empty($_POST['howLong']))
			{
				$howLongErr = "Please make a selection from year options.";
			}
			else
			{
				$_SESSION['howLong'] = $_POST['howLong'];
			}

			if(empty($_POST['products']))
			{
				$productErr = "Please choose at least one product.";
	 		}
			else
			{
				//loops through and assign post array to session array
			        for($x= 0; $x < count($_POST['products']); $x++)
	                        {

	                          $_SESSION['products'] = $_POST['products'];
	                        }
		     	}
			//if no errors 
			if(isset($_POST['howLong']) && !empty($_POST['howLong']) && isset($_POST['products']) && !empty($_POST['products']))
			{
				//directs to page3.php page
				header('location: page3.php');
				exit();
			}
		}

		if(isset($_POST['previous']))
		{
			header('location: page1.php');
			exit();
		}
	}
	?> 
	<form method="post" >
		How long has it been since your first purchase with us?: <br/><span style="color:red">* <?php echo $howLongErr;?></span><br/>
		<input type="radio" name="howLong" value="1" <?php if(isset($_SESSION['howLong']) && $_SESSION['howLong'] == 1) {echo "checked = 'checked'";} ?>/>1 year<br/>
		<input type="radio" name="howLong" value="2" <?php if(isset($_SESSION['howLong']) && $_SESSION['howLong'] == 2) {echo "checked = 'checked'";} ?>/>2 year<br/>
		<input type="radio" name="howLong" value="3" <?php if(isset($_SESSION['howLong']) && $_SESSION['howLong'] == 3) {echo "checked = 'checked'";} ?>/>3 year<br/>
		<input type="radio" name="howLong" value="4" <?php if(isset($_SESSION['howLong']) && $_SESSION['howLong'] == 4) {echo "checked = 'checked'";} ?>/>4 year<br/>
		<input type="radio" name="howLong" value="5" <?php if(isset($_SESSION['howLong']) && $_SESSION['howLong'] == 5) {echo "checked = 'checked'";} ?>/>5 year
																	<!--keeps the radio button checked-->
		<br/><br/>
		Which of the following have you purchased from us?:<br/> <span style="color:red">* <?php echo $productErr;?></span><br/>
		<input type="checkbox" name="products[]" value="Desktop_computer" <?php if(isset($_SESSION['howLong']) && $_SESSION['howLong'] == 'Desktop_computer')  echo "checked = 'checked'";  ?> />Desktop computer<br/>
		<input type="checkbox" name="products[]" value="Laptop"<?php if(isset($_SESSION['howLong']) && $_SESSION['howLong'] == 'Laptop')  echo "checked = 'checked'";  ?> />Laptop<br/>
		<input type="checkbox" name="products[]" value="Tablet" <?php if(isset($_SESSION['howLong']) && $_SESSION['howLong'] == 'Tablet')  echo "checked = 'checked'";  ?> />Tablet
		<br/>
        <br/>
		<input type="submit" name="previous" value="PREVIOUS"/>
		<input type="submit" name="next" value="NEXT" /> 
	</form> 
</body>
</html>