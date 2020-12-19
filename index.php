<?php session_start();

 include('./include/db.php');
 
 

$fld_name = $_REQUEST['fld_name'];
$fld_pass = $_REQUEST['fld_pass'];


$result = mysqli_query($con, "SELECT * FROM tbl_login where fld_user='$fld_name' and fld_pass='$fld_pass'");

$num = mysqli_num_rows($result);

if($num > 0)
	
	{
		
		$_SESSION['user'] =  $fld_name;
		
		
		echo "<script>alert('Successfully Done..');location.replace('./include/welcome.php');</script>";
		
	}




?>

<form action="" method="post">


<input type="text" name="fld_name" placeholder="Username" />

<br/><br/>

<input type="passsword" name="fld_pass" placeholder="Password" />

<br/><br/>

<input type="submit" value="Login" />

</form>