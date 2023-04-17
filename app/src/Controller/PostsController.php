<?php
namespace App\Controller;

use EduarDev\Framework\Http\Response;

class PostsController
{
    public function show(int $id): Response
    {
        $content = "this is post $id";

        return new Response($content);
    }

}