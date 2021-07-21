<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SpotTypeController extends AbstractController
{
    /**
     * @Route("/spot/type", name="spot_type")
     */
    public function index(): Response
    {
        return $this->render('spot_type/index.html.twig', [
            'controller_name' => 'SpotTypeController',
        ]);
    }
}
