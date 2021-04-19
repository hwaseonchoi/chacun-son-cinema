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

    $queries = ['title' => $title];
    $results = $tmdbApiService->searchByKeyword($queries);

    $data['queries'] = $queries;
    $data['movies'] = $results;

    return $this->render('Search/keyword.html.twig', ['data' => $data]);
  }
}
