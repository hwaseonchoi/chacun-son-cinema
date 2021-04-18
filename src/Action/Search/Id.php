<?php

namespace App\Action\Search;

use App\Service\TmdbApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class Id extends AbstractController
{
  public function __invoke(int $id, TmdbApiService $tmdbApiService)
  {
      $results= $tmdbApiService->searchById($id);

      $data['title'] = $results->title;
      $data['director'] = $results->director;
      $data['year'] = $results->year;
      $data['poster'] = $results->poster;

      return $this->render('Search/id.html.twig', $data);
  }
}
