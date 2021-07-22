<?php

namespace App\Controller;

use App\Repository\SpotRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/spot", name="spot_")
 */
class SpotController extends AbstractController
{
    private $spotRepository;

    public function __construct(SpotRepository $spotRepository)
    {
        $this->spotRepository = $spotRepository;
    }

    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $spots = $this->spotRepository->findAll();

        return $this->render('spot/index.html.twig', [
            'spots' => $spots,
        ]);
    }
}
