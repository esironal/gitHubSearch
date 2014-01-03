<html>
<body>
<input type="submit" name"btn_submit" value="click">
<?php
/* Function that gets the content from github for $language */
function get_content ($lang){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.github.com/legacy/repos/search/language:' . $lang);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,1);
curl_setopt($ch, CURLOPT_USERAGENT, 'mateioprea');
$resp = curl_exec($ch);
curl_close($ch);
return $resp;
}
?>
</body>
</html>
