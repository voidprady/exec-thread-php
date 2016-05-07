<?php
require 'Slim/Slim.php';

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();
$app->post('/hello', function () use ($app){

    $body = $app->request->getBody();
    $entity = json_decode($body, true);

    $cmd = "php  /home/prady/Workspace/proton/vendor/slim/slim/process.php"." ".$entity['id']." ".$entity['message'];
    $output = "/home/prady/Workspace/proton/vendor/slim/slim/output.txt";
    error_log("first");
	exec($cmd . " > /dev/null &");
	error_log("second");
    if(empty($entity)){
    	echo (json_encode([
            'status' => 'FAIL',
            'message' => 'empty details.'
        ], JSON_PRETTY_PRINT));
    }
    elseif ($entity['id'] == null) {
		echo (json_encode([
            'status' => 'FAIL',
            'message' => 'provide id.'
        ], JSON_PRETTY_PRINT));    
	}elseif ($entity['message'] == null) {
		echo (json_encode([
            'status' => 'FAIL',
            'message' => 'provide message.'
        ], JSON_PRETTY_PRINT));
	}else{
		echo (json_encode([
            'status' => 'SUCCESS',
            'message' => 'successfull.'
        ], JSON_PRETTY_PRINT));
	}
});
$app->run();
?>