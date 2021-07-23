<?php

namespace App\Controller;

use App\Entity\Board;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user", name="user_")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/handle/favorite/{id}", name="handle_favorite")
     */
    public function handleFavorite(Board $board, EntityManagerInterface $entityManager): Response
    {
        if ($this->getUser()->getFavoriteBoards()->contains($board)) {
            $this->getUser()->removeFavoriteBoard($board);
            $entityManager->persist($this->getUser());
            $entityManager->flush();
            $this->addFlash('warning', 'Planche retirée de vos favoris !');
            return $this->redirectToRoute('board_show', ['id' => $board->getId()]);
        } else {
            $this->getUser()->addFavoriteBoard($board);
            $entityManager->persist($this->getUser());
            $entityManager->flush();
            $this->addFlash('success', 'Planche ajoutée à vos favoris !');
            return $this->redirectToRoute('board_show', ['id' => $board->getId()]);
        }
    }

    /**
     * @Route("/favorite", name="favorite")
     */
    public function favorite(UserRepository $userRepository): Response
    {
        return $this->render('user/favorite.html.twig');
    }
}
