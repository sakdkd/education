<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-git.js"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>Click a word in the paragraph and highlight it.</title>
</head>
<body>
<p>
This domain is established to be used for illustrative examples in documents. You may use this domain in examples without prior coordination or asking for permission.
</p>
</body>

<script>

var words = $( "p" ).first().text().split( /\s+/ );
var text = words.join( "</span> <span>" );
$( "p" ).first().html( "<span>" + text + "</span>" );
$( "span" ).on( "selection", function() {
$( this ).css( "background-color", "red" );  
});



</script>
</html>




