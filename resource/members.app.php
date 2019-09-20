<?php
include('../common/config.php');
include('library/Requests.php');
Requests::register_autoloader();

header('Content-Type: application/json');

$req_headers = array(
    'Accept' => 'application/json',
    'Authorization' => 'Bearer '.$_SESSION['access_token'],
    'SITE'=>$SiteName,
);
        
$request = Requests::get($api.'/api/agent/users', $req_headers);
$data = json_decode($request->body);
//$data = $data->data;

echo $request->body;
exit;
?>