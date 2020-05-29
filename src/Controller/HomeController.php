<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home/", name="home", methods={"GET"})
     * @return string
     */
    public function index()
    {
        echo 'coucou';
    }
}
