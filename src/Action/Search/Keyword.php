<?php

namespace App\Action\Search;

use App\Service\TmdbApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class Keyword extends AbstractController
{
  public function __invoke(Request $request, TmdbApiService $tmdbApiService)
  {
    $title = $request->query->get('title');
    $year = $request->query->get('year');
    $director = $request->query->get('director');

    return $this->render('Search/keyword.html.twig');
  }
}
