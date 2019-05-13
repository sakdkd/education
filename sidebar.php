<div class="col-md-3">

<form action="#" class="form-action" id="sidebar">
<div class="side-bar">
<h3 class="result">Results</h3>
<div class="form-group">
<input type="text" placeholder="search by title" class="input-sm" id="searchtitle" oninput="frontselecttopic('5',this.value)">
</div>
</div>
<div class="side-ba">
<div class="form-group">

<label>Subject</label>
<select id="subjectid" class="input-sm " onchange="frontselecttopic('1',this.value)" >
<option value="" selected="selected" label=""></option>
<?php $ds=mysqli_query($conn,"SELECT * FROM `levelsubjects` where `level_id`='$levelchoosen' and `status`='1' and `view`='1' order by `id` desc " );   
$numrows=mysqli_num_rows($ds);
				if( $numrows >0){
				while($fetch=mysqli_fetch_array($ds)){
				$sid=$fetch['subject_id'];
					$subname=getSubjectdetails($conn,$sid);
					$name=$subname['name'];
					if($subname['status']=='1')
					{
					
				?>
                <option value="<?php echo $fetch['id'] ?>"><?php echo $name; ?></option>
				
				<?php } }}?>
	
</select>
    </div>
 <div class="form-group">
<label>Subtype</label>
<div id="selectsubtype">
<select id="subtypid" class="input-sm ">
<option value="" selected="selected" label=""></option>

</select>
</div>
    </div>
<!--<div class="form-group">
<label>Status</label>
<div class="radio">
      <label><input type="radio" name="status" id="status" class="status" value="0" checked  onchange="frontselecttopic('3',this.value)">All</label>
    </div>
    <div class="radio">
      <label><input type="radio" name="status" id="status" class="status" value="3" onchange="frontselecttopic('3',this.value)">In Progress</label>
    </div>
    <div class="radio">
      <label><input type="radio" name="status" id="status" class="status" value="1" onchange="frontselecttopic('3',this.value)">Completed</label>
    </div>
    
 </div>-->
 <div class="form-group">
<label>Difficulty</label>


<div class="radio">
      <label><input type="radio" name="level" class="level" value="0" onclick="frontselecttopic('4',this.value)" checked>All</label>
    </div>
    
       <?php 
				$ds=mysqli_query($conn,"SELECT * FROM `examlevel` where `status`='1' and `view`='1' order by `id` asc limit 0,3 " ); 
				$numrows=mysqli_num_rows($ds);
				if( $numrows >0){
				while($fetch=mysqli_fetch_array($ds)){
				?>
    <div class="radio">
      <label><input type="radio" name="level" class="level" value="<?php echo $fetch['id'];?>" onclick="frontselecttopic('4',this.value)"><?php echo $fetch['name'];?></label>
    </div>
    
    <?php }}?>
    
    
 </div>
</div>
</form>	
</div>