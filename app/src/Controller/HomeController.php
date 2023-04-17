<?php
namespace App\Controller;

use EduarDev\Framework\Http\Response;

class HomeController
{
     public function index(): Response{
        $content = '<h1>Hello from home controller</h1>';
        return new Response($content);
     }

}