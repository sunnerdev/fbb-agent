<?php
session_start();

$api = 'https://base-api.apis88.live';
$headers = apache_request_headers();
$headers_host = str_replace("www.","",$headers['Host'],$var);
$headers_host = str_replace("m.","",$headers['Host'],$var);
if($headers_host=='apis88.com'){
    $client_id = 5;
    $client_secret = 'lkxO5hjCXkmxsiB1n0C0G1RNqW9DnwsForo8qQFm';
    $SiteName = 'fanballbet';
}
if($headers_host=='agent.apis88.com'){
    $client_id = 5;
    $client_secret = 'lkxO5hjCXkmxsiB1n0C0G1RNqW9DnwsForo8qQFm';
    $SiteName = 'fanballbet';
}

//localhost
if($headers_host=='localhost'){
    $client_id = 5;
    $client_secret = 'lkxO5hjCXkmxsiB1n0C0G1RNqW9DnwsForo8qQFm';
    $SiteName = 'fanballbet';
}

?>