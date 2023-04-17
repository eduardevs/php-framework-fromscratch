<?php

namespace EduarDev\Framework\Http;

class Kernel
{
    public function handle(Request $request): Response
    {
        $content = '<h1>Hello this comes from kernel</h1>';

        return new Response($content);
    }

}