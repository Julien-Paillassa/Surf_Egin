<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/administration", name="admin_")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/dashboard", name="index")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }
}
