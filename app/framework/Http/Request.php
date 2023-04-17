<?php

namespace EduarDev\Framework\Http;

class Request
{
    // php promoted properties of php8
    // old school is passing the properties here and then assign them in the construct.
    public function __construct(  // $_ = GET, POST, COOKIE, FILES, SERVER
        public readonly array $getParams,
        public readonly array $postParams,
        public readonly array $cookies,
        public readonly array $files,
        public readonly array $server)
    {
      

    }

    public static function createFromGlobals(): static
    {
        return new static($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
    }

    public function getPathInfo(): string
    {
        return strtok($this->server['REQUEST_URI'], '?');
    }

    public function getMethod(): string
    {
        return $this->server['REQUEST_METHOD'];
    }

}