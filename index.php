<html>
<head>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/pure-min.css">
<style>

.wrapper a {
    font-weight:bold;
    font-size: 24px;
    text-decoration: none;
    color: #4183c4;
}

.wrapper a:hover {
    font-weight:bold;
    font-size: 24px;
    text-decoration: none;
    color: #7ba9d6;
}

.wrapper {
    display: table;
    width: 50%;
    height: 100%;
    float: left;
}

.cell {
    display: table-cell;
    vertical-align: middle;
}

.right {
    text-align: right;
}

.entry {
    padding-left: 20px;
    border-left: 3px solid #cccfd2;
}

.left-side {
    position: fixed;
}

.right-side {
    margin-left: 50%;
}

.grey {
    color: #cccfd2;
}

</style>
</head>
<body>
    <center>
	<div class="pure-menu pure-menu-open pure-menu-horizontal">
	    <ul>
		<li><a href="#">Home</a></li>
		<li><a href="#">Contact</a><li>
	    </ul>
	</div>
    </center>

<div class="wrapper left-side">
    <form class="pure-form pure-form-aligned cell" method="post" action="">
    <fieldset class="right">
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
</div>

<div class="wrapper right-side">
<div class="cell">
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
	echo '<blockquote><div class="entry">';
	echo '<a href="' . $jarr['repositories'][$i]['url'] . "\">" . $jarr['repositories'][$i]['name'] . '<br /></a><span class="grey">' . $jarr['repositories'][$i]['username'] . '</span><br /><br />';
	echo '<b>Repo: </b>' . $jarr['repositories'][$i]['url'] . '<br/></div><br /></blockquote>';
}
}
if (isset($_POST['lang'])){
	data_p();
}
?>
</div>
</div>
</body>
</html>
