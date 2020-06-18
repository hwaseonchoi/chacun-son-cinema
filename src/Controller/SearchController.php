<?php

namespace App\Controller;

use App\Service\TmdbApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search", methods={"GET"})
     * @param Request $request
     * @param TmdbApiService $omdbApiService
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function search(Request $request, TmdbApiService $omdbApiService)
    {
        $title = $request->query->get('title');
        $year = $request->query->get('year');
        $director = $request->query->get('director');

        $results['films'] = $omdbApiService->search($title);
        $results['queries'] = ['title'=>$title, 'year'=>$year, 'director'=>$director];

        return $this->render('search.html.twig', $results);
    }
}
