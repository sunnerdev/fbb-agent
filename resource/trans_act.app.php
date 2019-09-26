<?php
include('../common/config.php');
include('library/Requests.php');

Requests::register_autoloader();

header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $req_headers = array(
        'Accept' => 'application/json',
        'Authorization' => 'Bearer '.$_SESSION['access_token'],
        'SITE'=>$SiteName,
    );
    
    $request = Requests::post($api.'/api/agent/trans_act/'.$_POST['id'], $req_headers , $_POST);
    //$json = json_decode($request->body);
    echo $request->body;
    exit;
    /*$request->body);
        echo json_encode($status);
        exit;
    }

    if($json->success==true)
    {
        $status['status']=1;
        $status['data'] = $json->data;
        $status['body'] = json_decode($request->body);
        echo json_encode($status);
        exit;
    }

    */
}
?>