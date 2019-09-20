<?php
include('../common/config.php');
include('library/Requests.php');


Requests::register_autoloader();

header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $req_headers = array(
        'SITE'=>$SiteName,
        'Accept'=>'application/json'
    );

    $req_body = array(
        'username'=>$_POST['username'],
        'password'=>$_POST['password'],
        'client_id'=>$client_id,
        'client_secret'=>$client_secret,
        'grant_type'=>'password'
    );
    
    
    $request = Requests::post($api.'/oauth/token', $req_headers , $req_body);
    $json = json_decode($request->body);

    if($json->error)
    {
        $status['status']=0;
        $status['msg'] = $json->message;
        echo json_encode($status);
        exit;
    }

    

    if($json->token_type=='Bearer')
    {

        $req_headers = array(
            'SITE'=>$SiteName,
            'Accept'=>'application/json',
            'Authorization' => $json->token_type.' '.$json->access_token
        );

        $request = Requests::get($api.'/api/agent/users/me', $req_headers , $req_body);
        $jsonc = json_decode($request->body);

        if($jsonc->success==true)
        {
            $_SESSION['DATA'] = $jsonc->data;
            $_SESSION['UserName']=$_POST['username'];
            $_SESSION['access_token']=$json->access_token;
            $_SESSION['refresh_token']=$json->refresh_token;
            $_SESSION['expires_in']=$json->expires_in+time();
            $status['status']=1;
            $status['session']=$json;
            $status['msg'] = $_POST['username'];
            echo json_encode($status);
            exit;
        }else{
            echo $request->body;
            exit;
        }
    }
}
?>