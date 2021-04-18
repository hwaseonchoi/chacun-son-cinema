<?php

namespace App\Action;

use App\Builder\MovieBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class Index extends AbstractController
{
  public function __invoke(MovieBuilder $movieBuilder)
  {
    $results= $movieBuilder->build();
    return $this->render('index.html.twig', ['results'=>$results]);
  }
}
