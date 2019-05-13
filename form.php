<?php

if(isset($_POST['sub']))
{
	header("location:test.php");
	
	
	
}



?>
                <form method="post" id="myForm">
                <input type="text" value="11" name="name" />
                <input type="submit" name="sub" id="sub" />
                
                
                
                </form>
                
                
                <script>
				
				  setTimeout(startTimer, 1000);
function startTimer()
{
	alert();		  document.getElementById('myForm').submit();
}
				
				
				</script>