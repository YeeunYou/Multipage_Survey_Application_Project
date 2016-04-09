<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
  <header>Thank you for your feedback!</header>  
<?php
//starts session
session_start();
$x=0;
$str="";
?> 
<!--displays the results that were stored in the session array--> 
  <table>
  <tr><td><strong>Name: </strong></td><td><?php echo $_SESSION['fullname'];?></td></tr>  
  <tr><td> <strong>Age / Gender: </strong> </td><td><?php echo $_SESSION['age'] . " / ". $_SESSION['gender']; ?></td></tr> 
  <!--if more than 1 year, display "years" instead of "year"-->
  <tr><td> <strong>How long: </strong></td><td><?php echo $_SESSION['howLong']; ?><?php if($_SESSION['howLong'] > 1) {echo " years";} else { echo " year"; }  ?> </td></tr>
  <!-- displays product names, separated by comma... the end comma is trimmed -->
  <tr><td> <strong>Product: </strong></td><td><?php foreach($_SESSION['products'] as $key=>$item) {if($x == count($_SESSION['products']))break; $str .= $item . ",";$x++; } $str = rtrim($str, ","); echo $str;?></td></tr>

    <tr>
     <td><strong>feedback: </strong></td> 
    </tr> 
    <tr> 
      <td>- <em><u>Rating & Recoomend?</u></em> - </td> 
    </tr>

    <tr>
      <td><?php for($x=0; $x<count($_SESSION['feedback']); $x++) {echo  $_SESSION['products'][$x] . ": " . $_SESSION['feedback'][$x]['howHappy'] . "/5 " . "       &      ". $_SESSION['feedback'][$x]['recommend']. "<br/>"; } ?></td>
                                                                                                              <!--howHappy and reccomendation for each element in the feedback session array-->
    </tr>
    
  </table> 
</body>
</html>