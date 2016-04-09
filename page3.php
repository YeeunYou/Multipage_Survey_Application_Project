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
  Include("pageTitle.html");
  $deviceNum=1;
  //this will store error messages 
  $err = "";
  $str ="";
  $x =0; 
  $itemsArray = array();
  //checks the form method
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $next = $_SESSION['next'] = $_POST['next'];
 
     if(isset($next))
     {
           //checks the number of post array elements   
        if(isset($_SESSION['products']))
        {  
            for($x=0; $x< count($_SESSION['products']); $x++)
            { 
                $item  = $_SESSION['products'][$x]; 

                if(!isset($_POST[$item]['howHappy']) || !isset($_POST[$item]['recommend']))
                {
                  $err = "Please rate both products and make a recommendation"; 
                }
                else
                {  
                  array_push($itemsArray, $_POST[$item]); 
                } 
            }
            if(count($itemsArray) != 0)
            {
                $_SESSION['feedback'] = $itemsArray; 
            }
        }
 
        if(isset($_SESSION['feedback']))
        {
          header("location: thankyou.php");
        }
 
     }
   if(isset($_POST['previous']))
  {
    header('location: page2.php');
    exit();
  }
}
?> 
  <form method="post">
    <p>Please complete the following questions for the:</p>
      <?php foreach($_SESSION['products'] as $key=>$item) { if($x== count($_SESSION['products']))break; $str .= $item . ","; $x++ ;} $str = rtrim($str, ","); echo $str;  ?>
      How happy are you with this device on a scale from 1-5 <br/>
      where 1 is not satisfied and 5 is very satisfied?<br/>Please make a recommendation for each product as well.<br/><br/>
      <table>
      <?php foreach($_SESSION['products'] as $key=>$item): ?>
        <tr>
          <td>
            <?php { echo "Device #" . $deviceNum ." " . $item; $deviceNum++; } ?>
            <?php
               for($x=1; $x<6; $x++)
               {
                   echo  "<input type='radio' name='". $item ."[howHappy]'  value='". $x. "' />" . $x;
               }
                   echo "<select name='" .$item."[recommend]'><option value='' disabled selected></option> <option value='Yes'>Yes</option> <option value='No'>No</option></select> ";
            ?>
          </td>
      </tr>
      <?php endforeach; ?>
      </table> 
      <span style="color:red">* <?php echo $err;?></span><br/>  
      <br/>
      <br/>
    <input type="submit" name="previous" value="PREVIOUS"/>
    <input type="submit" name="next" value="NEXT" /> 
  </form> 
</body>
</html>