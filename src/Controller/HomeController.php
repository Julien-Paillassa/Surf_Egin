<?php

namespace App\Controller;

use App\Repository\BoardRepository;
use App\Repository\PictureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $boardRepository;

    private $pictureRepository;

    public function __construct(BoardRepository $boardRepository, PictureRepository $pictureRepository)
    {
        $this->boardRepository = $boardRepository;
        $this->pictureRepository = $pictureRepository;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $boards = $this->boardRepository->findAll();
        $pictures = $this->pictureRepository->findAll();

        return $this->render('home/index.html.twig', [
            'boards' => $boards,
            'pictures' => $pictures,
        ]);
    }
}
