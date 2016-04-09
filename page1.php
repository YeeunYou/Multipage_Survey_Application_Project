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
	//stores error messages 
	$nameErr = $ageErr = $genderErr = "";

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
	       $next= $_SESSION['next'] = $_POST['next'];

		if(isset($next))
		{
			if(!isset($_POST['fullname']) || empty($_POST['fullname']))
			{
				$nameErr = "Please enter your fullname";
			}
			else
			{
				$_SESSION['fullname'] = $_POST['fullname'];
			}
			 
		    if(!isset($_POST['age']) || empty($_POST['age']))
			{
				$ageErr = "Please enter your age";
			}
			else
			{
				$_SESSION['age'] = $_POST['age'];
			}
			 
			if(!isset($_POST['gender']) || empty($_POST['gender']))
			{
				$genderErr = "Please select your gender";
			}
			else
			{
				$_SESSION['gender'] = $_POST['gender'];
			}
			 
			if(isset($_POST['fullname']) &&  !empty($_POST['fullname']) && isset($_POST['age']) && !empty($_POST['age'])  && isset($_POST['gender']) && !empty($_POST['gender']) )
			{
				//directs to page2.php page
				header('location: page2.php');
				exit();
			}
		} 
		if(isset($_POST['previous']))
		{
			//if previous button is set(clicked) directs to index.php page
			header('location: index.php');
			exit();
		}
		
	}
	?>

		<form method="post" >
			<label>Fullname:</label>
			<input type="text" name="fullname" placeholder="Enter your fullname" value="<?php if(isset($_SESSION['fullname'])){echo $_SESSION['fullname'];} ?>"/><span style="color:red">* <?php echo $nameErr;?></span>
			<br/><br/>			
												    <!--this line maintains the value entered-->
			<label>Age: </label>
			<input type="text" name="age" placeholder="Enter your age" value="<?php if(isset($_SESSION['age'])){echo $_SESSION['age'];} ?>"/><span style="color:red">* <?php echo $ageErr;?></span>
			<br/><br/>
												<!--this line maintains that value entered--> 
			<label>Gender:</label> 
			<input type="radio" name="gender" value="female" <?php if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'female'){echo "checked='checked'";} ?> />  Female 
																		<!--keeps it checked-->
			<input type="radio" name="gender" value="male" <?php if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'male'){echo "checked='checked'";} ?>/>  Male<span style="color:red">* <?php echo $genderErr;?></span>
			<br/><br/>
																		<!--keeps it checked-->
		<input id="prev" type="submit" name="previous" value="PREVIOUS"/>
		<input id="next" type="submit" name="next" value="NEXT" />
		      <div>
	 
</div>
	</form>
</body>
</html>
