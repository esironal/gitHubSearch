<html>
<head>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/pure-min.css">
</head>
<body>
<center>
<div class="pure-menu pure-menu-open pure-menu-horizontal">
	<ul>
		<li><a href="#">Home</a></li>
		<li><a href="#">Contact</a><li>
	</ul>
</div></center>
<form class="pure-form pure-form-aligned" method="post" action="">
<fieldset>
	<div class="pure-control-group">
		<label for="language"><h2 class="content-subhead"></h2></label>
		<input type="text" size="18" name="lang" placeholder="Programming Language" required>
	</div>
	<div class="pure-control-group">
		<label for="results"></label>
		<input type="text" size="12" name="resu" placeholder="Results? i.e. 5"><br />
	</div>
	<div class="pure-controls">
		<button type="submit" class="pure-button pure-button-primary">Submit</button>
	</div>
</fieldset>
</form>
<?php
function data_p(){
	$lang= $_POST['lang'];
	$res= $_POST['resu'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.github.com/legacy/repos/search/language:' . $lang);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,1);
curl_setopt($ch, CURLOPT_USERAGENT, 'mateioprea');
$resp = curl_exec($ch);
curl_close($ch);
$jarr = json_decode($resp,1);
for ($i=0; $i<$res; $i++){
	echo "<blockquote>";
	echo "<h2> Project title:" . $jarr['repositories'][$i]['title'] . "<br />" . "</h2>";
	echo $jarr['repositories'][$i]['url'] . "<br />";
	echo $jarr['repositories'][$i]['username'] . "<br />";
	echo $jarr['repositories'][$i]['description'] . "<br />";
	echo "</blockquote> <hr> ";
}
}
if (isset($_POST['lang'])){
	data_p();
}
?>
</body>
</html>
