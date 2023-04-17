<?php declare(strict_types=1);


use EduarDev\Framework\Http\Kernel;
use EduarDev\Framework\Http\Request;
define('BASE_PATH', dirname(__DIR__));
// $dispatcher = require_once dirname(__DIR__) . '/vendor/nikic/fast-route/src/Dispatcher.php';
// dd($dispatcher);

require_once dirname(__DIR__) . '/vendor/autoload.php';

// * request received
// - this create the request object from super globals
$request = Request::createFromGlobals();

// * perform some log

// * send response (string of content)
// $content ='<h1>Hello</h1>';

// $response = new Response($content, status: 200, headers: []);
// * This is the core that handles the request.
$kernel = new Kernel();
$response = $kernel->handle($request);

$response->send();