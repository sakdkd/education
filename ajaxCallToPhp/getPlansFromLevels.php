<?php
 sleep(1);
 header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
 header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
 header ("Cache-Control: no-cache, must-revalidate");
 header ("Pragma: no-cache");
 include('../db_class/dbconfig.php');
include('../db_class/hr_functions.php');

 $id=$_GET['id'];
 
 
 ?>
 <select  name="subjectid" id="subjectid" class="form-control" onChange="selecttopic(this.value)"   >
                <option value="">Select Subject </option>
                
                <?php 
				$ds=mysqli_query($conn,"SELECT * FROM `edu_pricing` where `level_id`='$id' and `status`='1' and `view`='1' order by `id` desc " ); 
				$numrows=mysqli_num_rows($ds);
				if( $numrows >0){
				while($fetch=mysqli_fetch_array($ds)){
					
					$name=$fetch['name'];
					
					
				?>
                <option value="<?php echo $fetch['id'] ?>"><?php echo $name; ?></option>
				
				
				<?php }}?>
             
                
                </select>





