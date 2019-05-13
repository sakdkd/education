<?php
include_once('db_class/dbconfig.php');
include_once('db_class/hr_functions.php');

$id=$_POST['id'];

?>
<select  name="province" id="province"   onchange="setValue(this.value)" >
      <option value="0">Select Location</option>	                
<?php 
$ds=mysqli_query($conn,"SELECT * FROM `location` where `countryid`='$id' and `view` ='1'");  
	$numrows=mysqli_num_rows($ds);
	if($numrows >0){
		while($fetch=mysqli_fetch_array($ds)){?>
		
		<option value="<?php echo $fetch['id'] ?>"><?php echo $fetch['name'] ?></option>	 
		<?php }
	}
?>     