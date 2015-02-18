<?php



$country="E0";
$year="1415";

if(isset($_GET['c'])) {
	switch($_GET['c']) {
		case 'EN':
			$country="E0";
		break;
		case 'SCT':
			$country="SC0";
		break;
		case 'IT':
			$country="I1";
		break;
		case 'ES':
			$country="SP1";
		break;
		case 'FR':
			$country="F1";
		break;
		case 'DE':
			$country="D1";
		break;
		case 'TR':
			$country="T1";
		break;
		case 'NE':
			$country="N1";
		break;
		default:
			$country="E0";
	}	
}
if(isset($_GET['y'])) {
	$year=$_GET['y'];
}


$r = "none";

$host="http://www.football-data.co.uk/mmz4281/".$year."/".$country.".csv";


$queryString = http_build_query($_GET, '', '&');
$url=$host;//."?".$queryString;


if ($url) {
	//echo $url;
	
	$r = file_get_contents($url, false);

	if ($r === FALSE) {
		echo 'Error: '. print_r($http_response_header);
		die();
	}

	//echo $r;

	/*
	// fetch XML
	$c = curl_init();
	curl_setopt_array($c, array(
		CURLOPT_URL => $url,
		CURLOPT_HEADER => false,
		CURLOPT_TIMEOUT => 10,
		CURLOPT_RETURNTRANSFER => true
	));
	$r = curl_exec($c);
	$error=curl_error($c);
	curl_close($c);
	echo "here I am!";
	if($error) {
		var_export($error);
	}
	*/
	//echo $r;
	
}

if($r) {
	//echo "------------------------";
	//var_export($r);
	
	header('Access-Control-Allow-Origin: *');
	header('Cache-Control: no-cache, must-revalidate');
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	

	//echo "buzz(".$r.");";
	//echo $_GET['callback']."(".$r.")";
	
	header('Content-type: application/json');
	echo $r;	

	
}

?>