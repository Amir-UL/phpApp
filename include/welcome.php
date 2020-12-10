<?php session_start();
 include('db.php');
 
   $userxx = $_SESSION['user'];
   
   
   $fld_to = $_REQUEST['fld_to'];
   
   $msg = $_REQUEST['msg'];
   
   if($fld_to)
   {
	$vvv = mysqli_query($con, "insert into tbl_chatbox values('', '$userxx', '$fld_to', '$msg');");  

     if($vvv)
	 {echo "<script>alert('Sent');location.replace('welcome.php');</script>";	
	   
   }
   }
   
   
   if($_SESSION['user'] == "")
   {
	   
	   echo "<script>alert('Restricted Area ...');location.replace('index.php');</script>";
   }

 echo "Welcome " . $_SESSION['user'];

?>



<a href="logout.php" > Logout  </a>
<br/><br/>
<hr/>
<br/><br/>

<?php
$inbox = mysqli_query($con, "SELECT * FROM tbl_chatbox where fld_to ='$userxx'");
while($r1x = mysqli_fetch_array($inbox))
{
?>
<h1> <?php echo $r1x['fld_from']; ?> : <?php echo $r1x['fld_msg']; ?> </h1>

<?php

}

?>
<form action="" method="post">

<select name="fld_to" style="padding:10px;">
<?php
$result = mysqli_query($con, "SELECT * FROM tbl_login where fld_user !='$userxx'");

while($r1 = mysqli_fetch_array($result))
{
?>

<option><?php echo $r1['fld_user']; ?></option>

<?php

}

?>

</select>
<br/>
<textarea required style="height:150px;" name="msg"></textarea>

<br/><br/>


<input type="submit" value="Send" />

</form>



