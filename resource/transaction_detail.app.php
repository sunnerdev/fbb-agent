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

    $request = Requests::get($api.'/api/agent/transaction/'.$_POST['id'].'/', $req_headers);
    $data = json_decode($request->body);
    $status['ticket'] = $data->data;

    $request = Requests::get($api.'/api/agent/users/'.$data->data->user_id.'/', $req_headers);
    $data = json_decode($request->body);
    $status['member'] = $data->data;

    $request = Requests::get($api.'/api/agent/trans_log/'.$_POST['id'], $req_headers);
    $data = json_decode($request->body);
    $status['ll'] = $api.'/api/agent/trans_log/'.$_POST['trans_id'];
    $status['log'] = $data->data;
    //$data = $data->data;

    echo json_encode($status);
    exit;
?>