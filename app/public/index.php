<?php declare(strict_types=1);

use EduarDev\Framework\Http\Request;

require_once dirname(__DIR__) . '/vendor/autoload.php';

// * request received
$request = Request::createFromGlobals();

// * perform some log
dd($request);

// * send response (string of content)

echo 'hello eduardo!!!!';