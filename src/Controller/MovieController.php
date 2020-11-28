<?php

namespace App\Controller;

use App\Service\TmdbApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
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
    public function getOne(int $id, TmdbApiService $tmdbApiService)
    {
        $results= $tmdbApiService->searchById($id);

        $data['title'] = $results->title;
        $data['director'] = $results->director;
        $data['year'] = $results->year;
        $data['poster'] = $results->poster;

        return $this->render('searchById.html.twig', $data);
    }
}