<html>
<title>League of Legends</title>
<body>

<?php

	$User = $_POST['usuario'];
	$Region = $_POST['region'];

	$req = 'http://legendaryapi.com/api/v1.0/'.$Region.'/summoner/getSummonerByName/'.$User;
	$cUser = curl_init($req);
	curl_setopt($cUser,CURLOPT_RETURNTRANSFER, TRUE);
	$dUser = curl_exec($cUser);
	$getUserInfo = json_decode($dUser, TRUE);

	$Username = $getUserInfo['name'];
	$Level = $getUserInfo['summonerLevel'];
	$AccountID = $getUserInfo['acctId'];

	echo "El Usuario es: ".$Username;
	echo "<br>";
	echo "Su nivel es: ".$Level;
	echo "<br>";
	echo "Su nivel es: ".$AccountID;

	/* Ahora Tweeteamos la Informacion */

	$config = array(
    	'consumer_key' => 'JYzdejAC5OMWFDu6XdFwfg',
    	'consumer_secret' => 'hFdxXwoEf6oAKIFc7AbS11Bk5KHGYY2s9oK3RL96s',
    	'oauth_token' => 'aquivaeltoken',
    	'oauth_token_secret' => 'aquivaelsecret',
    	'output_format' => 'object'
	);
 
	include ("TwitterOAuth.php");
	include ("Exception/TwitterException.php");

	use TwitterOAuth\TwitterOAuth;
 
	$tweet = new TwitterOAuth($config);
 
	$tweet->post('statuses/update', array('status' => 'El Usuario Es: '.$Username.' y su nivel es: '.$Level.''));

?>

</body>
</html>
