<?php

namespace App\Controller;

use App\Service\OmdbApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search", methods={"GET"})
     * @return string
     */
    public function search(Request $request, OmdbApiService $omdbApiService)
    {
        $title = $request->query->get('title');
        $year = $request->query->get('year');
        $director = $request->query->get('director');
        $queries = ['title'=>$title, 'year'=>$year, 'director'=>$director];

        $results = $omdbApiService->searchByTitle($title);

        return $this->render('search.html.twig', $queries);
    }
}
