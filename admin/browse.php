<?php
ob_start();
session_start();
include('../db_class/dbconfig.php');
include('../db_class/hr_functions.php');
?><body>
  <header>
    <h1>Photo Gallery </h1>
    <style>
	html * {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

*, *:after, *:before {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-size: 100%;
  font-family: "Bitter", sans-serif;
  color: #f5f4ed;
  background-color: #e8e8e8;
}



/* White Border around Photos*/
li {
  background-color: #fff;
  padding: 10px;
}

img {
  width: 250px;
  height: 250px;
}

.img {
  width: 250px;
  height: 250px;
}

/* -------------------------------- 

Main components 

-------------------------------- */
header {
  background: #454545;
  height: 100px;
  text-align: center;
}
header h1 {
  font-size: 20px;
  font-size: 1.25rem;
  font-weight: bold;
  font-family: "Open Sans", sans-serif;
  text-transform: uppercase;
  font-weight: bold;
  padding-top: 1.6em;
  margin-bottom: .2em;
}
header p {
  font-size: 13px;
  font-size: 1rem;
  color: #707070;
}
@media only screen and (min-width: 1024px) {
  header {
    height: 200px;
  }
  header h1 {
    font-size: 30px;
    font-size: 1.875rem;
    padding-top: 2.6em;
  }
}



/* My Tweaks - Center the boxes on the page */

div {
width:900px;
height:400px;
padding-top: 40px;
margin: 0 auto;
}



/* Source: http://matthamm.com/box-shadow-curl.html */

ul.box, ul.box2, ul.box3, ul.box4 {
position: relative;
z-index: 1; /* prevent shadows falling behind containers with backgrounds */
overflow: hidden;
list-style: none;
margin: 0;
padding: 0; }


ul.box li, ul.box2 li, ul.box3 li, ul.box4 li {
position: relative;
float: left;
margin: 0 30px 30px 0;
-webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.27), 0 0 40px rgba(0, 0, 0, 0.06) inset;
-moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.27), 0 0 40px rgba(0, 0, 0, 0.06) inset;
box-shadow: 0 1px 4px rgba(0, 0, 0, 0.27), 0 0 40px rgba(0, 0, 0, 0.06) inset; }


ul.box li:before,
ul.box li:after,
ul.box2 li:after,
ul.box2 li:before,
ul.box4 li:after {
content: '';
z-index: -1;
position: absolute;
left: 10px;
bottom: 10px;
width: 70%;
max-width: 300px; /* avoid rotation causing ugly appearance at large container widths */
max-height: 100px;
height: 55%;
-webkit-box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
-moz-box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
-webkit-transform: skew(-15deg) rotate(-6deg);
-moz-transform: skew(-15deg) rotate(-6deg);
-ms-transform: skew(-15deg) rotate(-6deg);
-o-transform: skew(-15deg) rotate(-6deg);
transform: skew(-15deg) rotate(-6deg); }



ul.box li:after,
ul.box4 li:after {
left: auto;
right: 10px;
-webkit-transform: skew(15deg) rotate(6deg);
-moz-transform: skew(15deg) rotate(6deg);
-ms-transform: skew(15deg) rotate(6deg);
-o-transform: skew(15deg) rotate(6deg);
transform: skew(15deg) rotate(6deg); }
	
	
	</style>
  </header>
    <div>
    <ul class="box3">
     <?php 
				   
				   $select=mysqli_query($conn,"select * from `questionimages`");
				   while($resultset=mysqli_fetch_array($select))
				   {
				   $id=$resultset['id'];
				  				   $imagepath=$resultset['imagepath'];
 
				   ?> 
      <li onClick="returnFileUrl('<?php echo $imagepath;?>')" ><img src="<?php echo $baseurl;?>/allphotos/<?php echo $imagepath;?>" class="img"  /></li>
     <?php }?>
    </ul>
   
  </div>
        <?php include_once('footerpanel.php') ?>
  
  <script>
        // Helper function to get parameters from the query string.
        function getUrlParam( paramName ) {
            var reParam = new RegExp( '(?:[\?&]|&)' + paramName + '=([^&]+)', 'i' );
            var match = window.location.search.match( reParam );

            return ( match && match.length > 1 ) ? match[1] : null;
        }
        // Simulate user action of selecting a file to be returned to CKEditor.
        function returnFileUrl(paths) {

            var funcNum = getUrlParam( 'CKEditorFuncNum' );
            var fileUrl = baseurl+'/allphotos/'+paths;
            window.opener.CKEDITOR.tools.callFunction( funcNum, fileUrl, function() {
                // Get the reference to a dialog window.
                var dialog = this.getDialog();
                // Check if this is the Image Properties dialog window.
                if ( dialog.getName() == 'image' ) {
                    // Get the reference to a text field that stores the "alt" attribute.
                    var element = dialog.getContentElement( 'info', 'txtAlt' );
                    // Assign the new value.
                    if ( element )
                        element.setValue( 'alt text' );
                }
                // Return "false" to stop further execution. In such case CKEditor will ignore the second argument ("fileUrl")
                // and the "onSelect" function assigned to the button that called the file manager (if defined).
                // return false;
            } );
            window.close();
        }
    </script>
</body>