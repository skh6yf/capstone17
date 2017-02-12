<?php
function base64url_encode($data) { 
    return strtr(base64_encode($data), '+/', '__'); 
} 

// Report all errors
error_reporting(E_ALL);

$my_api_key = "e6f0409f1e";
$s_key = "7MsNWulBajxleiqMWO64TQ==";
$searchName = "Hyrdocodone";
$ndc = "00088250205";

// Initialize the CURL package. This is the thing that sends HTTP requests
$ch = curl_init();

// Create the URL and the hash
$url = "https://api.goodrx.com/compare-price?";

$query_string="ndc=" . $ndc . "&api_key=" . $my_api_key;

$tmp_sig = hash_hmac('sha256', $query_string, $s_key, true);
$sig = base64url_encode( $tmp_sig );

$url = $url . $query_string . "&sig=" . $sig;

// set some curl options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_VERBOSE, true);

// run the query
$response = curl_exec($ch);

echo($response);


?>