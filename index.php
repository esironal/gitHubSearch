<html>
<body>
<form method="post" action="">
Language:<input type="text" size="12" name="lang"><br />
<input type="submit" name"submit" value="submit">
</form>
<?php
function data_p(){
	$lang= $_POST['lang'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.github.com/legacy/repos/search/language:' . $lang);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,1);
curl_setopt($ch, CURLOPT_USERAGENT, 'mateioprea');
$resp = curl_exec($ch);
curl_close($ch);
$jarr = json_decode($resp,1);
for ($i=0; $i<=10; $i++){
	echo $jarr['repositories'][$i]['url'] . "\n";
	echo $jarr['repositories'][$i]['username'] . "\n";
	echo $jarr['repositories'][$i]['description'] . "\n";
}
}
if (isset($_POST['lang'])){
	data_p();
}
?>
</body>
</html>
