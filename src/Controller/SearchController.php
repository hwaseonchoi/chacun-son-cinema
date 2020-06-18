<?php

namespace App\Controller;

use App\Service\TmdbApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search/{id}", name="search", methods={"GET"})
     * @param Request $request
     * @param TmdbApiService $omdbApiService
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getOne(int $id, TmdbApiService $omdbApiService)
    {
        $criteria['title'] = $request->query->get('title');
        $criteria['year'] = $request->query->get('year');

        $results['films'] = $omdbApiService->search($criteria);
        $results['queries'] = ['title'=> $criteria['title'], 'year'=>$criteria['year']];

        return $this->render('search.html.twig', $results);
    }
}
