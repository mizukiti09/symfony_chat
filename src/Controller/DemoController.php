<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Pusher\Pusher;

class DemoController extends AbstractController
{
    /**
     * @Route("/demo", name="demo", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('demo/index.html.twig');
    }

    /**
     * @Route("/demo/say-hello", name="demo_say_hello", methods={"POST"})
     */
    public function sayHello(Pusher $pusher): Response
    {
        $pusher->trigger('greetings', 'new-greeting', []);

        return new Response();
    }
}
