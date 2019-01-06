<?php
header('Content-Type: application/rss+xml; charset=utf-8');

function get_data($url) {
  // $proxy = 'socks4://47.52.24.117:80';
	$ch = curl_init();
	$timeout = 3;
	curl_setopt($ch, CURLOPT_URL, $url);
  // curl_setopt($ch, CURLOPT_PROXY, $proxy);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

$user_array = [
	/*'ayaconcentrates',
	'420hunnys',
	'ganjagirls',
	'terramatercc',
	'alpinstash',
	'emeraldfamilyfarms',
	'cannabiotix_nv',
	'el_jefe_gardens',
	'famerschoiceorganics_',
	'coralreefer420',
	'bopcollective420',
	'_kayafarms',
	'ethosgenetics',
	'treebeardgrower',
	'chileweed',
	'rosin_revolution',
	'rawlife247',
	'victorypharms',
	'rare_dankness',
	'sincityseeds',
	'jungleboys',
	'tko.oregon',
	'stayregularmedia'*/
'muh_riah',
'tso.sonoma',
'eelleeinad',
'sherollsup',
'humboldt_county_grown',
'slick_socal_420',
'ganjapreneurgal',
'ripper_afn',
'medi_cali',
'pearl_pharma',
'holistic_farms',
'7points_hans',
'_lemmy714_',
'clade9',
'cultivar_sundicate',
'805family'


];




$feed = '';

$feed .='<?xml version="1.0" encoding="ISO-8859-1"?>';
$feed .='<rss xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom" version="2.0">';
$feed .='<channel>';
$feed .='<title>Instagram Feed</title>';
$feed .='<link>https://instagram.com</link>';
$feed .='<generator>WeedPornDaily</generator>';
$feed .='<lastBuildDate>'.date('D, d M y H:i:s O').'</lastBuildDate>';
$feed .='<atom:link href="https://instagram.com" rel="self" type="application/rss+xml"/>';
$feed .='<description>The best weed porn from Instagram</description>';

foreach($user_array as $user) {
  $url = 'https://www.instagram.com/'.$user.'/media/';
  $json_new = get_data($url);
  $brand = json_decode($json_new);

  foreach($brand->items as $photo) {

  	$feed .='<item>';
'$feed .='<title>'.htmlspecialchars($photo->caption->text).'</title>';
		$feed .='<link>'.$photo->images->standard_resolution->url.'</link>';
		$feed .='<guid>http://instagram.com/p/'.$photo->code.'/</guid>';
		$feed .='<pubDate>'.date('D, d M y H:i:s O', $photo->created_time).'</pubDate>';
		$feed .='<description><![CDATA['
			 .htmlspecialchars($photo->caption->text)
			 .' via <a href="http://instagram.com/'
			 .$photo->user->username
			 .'">'
			 .$photo->user->username
			 .'</a>]]></description>';

	$feed .='</item>';
  }
}

$feed .='</channel>';
$feed .='</rss>';

echo $feed;

?>
