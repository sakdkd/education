<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Bootstrap Tabs/Pills</title>
  
  
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>

  
  
</head>

<body>

  <h3 align='center'>This is a testing of Bootstrap Tabs and Pills</h3>
<div class="container">
  <ul id="myTabs" class="nav nav-pills nav-justified" role="tablist" data-tabs="tabs">
    <li class="active"><a href="#Commentary" data-toggle="tab">Commentary</a></li>
    <li><a href="#Videos" data-toggle="tab">Videos</a></li>
    <li><a href="#Events" data-toggle="tab">Events</a></li>
  </ul>
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="Commentary">Commentary WP_Query goes here.</div>
    <div role="tabpanel" class="tab-pane fade" id="Videos">Videos WP_Query goes here.</div>
    <div role="tabpanel" class="tab-pane fade" id="Events">Events WP_Query goes here.</div>
  </div>
</div>
  <!--<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>-->
  <!--  <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/jquery-2.1.3.min.js"></script>

     <script src="js/vendor/bootstrap.min.js"></script>-->
 

</body>

<?php 
if(isset($_POST['btn']))
{
	
	echo "s";
extract($_POST);
	
echo $btns; die;	
}


?>

<form method="post">
<input type="submit" name="btn" value="btn">



<input type="text" name="btns" value="">


</form>
</html>



<html>
  <head>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
      $(function () { alert();
        $('#fetch').bind('submit', function () {
          $.ajax({
            type: 'post',
            url: 'post.php',
            data: $('form').serialize(),
            success: function () {
              alert('form was submitted');
            }
          });
          return false;
        });
      });
    </script>
  </head>
  <body>
    <form method="post" id="fetch">
    <?php 
	for($i=1;$i<=10;$i++)
	{?>
                 <input name="ans<?php echo $i;?>" id="Ans<?php echo $i;?>" type="text" value="">     
<?php }?>
      <input name="submit" type="submit" value="Submit">
    </form>
  </body>
</html>


