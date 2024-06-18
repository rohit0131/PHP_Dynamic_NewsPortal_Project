<?php 
require_once("includes/config.php");
// code   username availablity
if(!empty($_POST["User_Name"])) {
	$uname= $_POST["User_Name"];
$query=mysqli_query($con,"SELECT User_Name FROM tbladmin WHERE User_Name='$uname'");		
$row=mysqli_num_rows($query);
if($row>0){
echo "<span style='color:red'> Username already exists. Try with another username</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
echo "<span style='color:green'> Username available for Registration .</span>";
echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
?>
