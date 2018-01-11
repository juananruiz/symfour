<?php


namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class ArticleController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response("Oh my God!");
    }

    /**
     * @Route("/news")
     */
    public function news()
    {
        return new Response("Oh my News!");

    }
}