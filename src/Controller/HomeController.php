<?php

namespace App\Controller;

use App\Builder\MovieBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function home(MovieBuilder $movieBuilder)
    {
        $results= $movieBuilder->build();
        return $this->render('home.html.twig', ['results'=>$results]);
    }
}
