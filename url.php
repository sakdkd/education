<?php 

echo $_SERVER['QUERY_STRING'];


echo $id=$_GET['id'];?>



?><html>
<head>
<link rel="stylesheet" type="text/css" href="url_style.css">
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
function changeurl(url)
{
 var new_url="http://78.46.117.226/education/newexam.php?id=MQ==/"+url;
 window.history.pushState("data","Title",new_url);
 document.title=url;
}
</script>
</head>
<body>
<div id="wrapper">

<div id="url_link">
 <p id="url_label">Click On Languages To Change URL</p>
 <li onclick="changeurl('PHP');">PHP</li>
 <li onclick="changeurl('HTML');">HTML</li>
 <li onclick="changeurl('CSS');">CSS</li>
 <li onclick="changeurl('JavaScript');">JavaScript</li>
 <li onclick="changeurl('jQuery');">jQuery</li>
</div>

</div>
</body>
</html>