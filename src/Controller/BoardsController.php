<?php

namespace App\Controller;

use App\Entity\Board;
use App\Form\Board1Type;
use App\Repository\BoardRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/boards")
 */
class BoardsController extends AbstractController
{
//    /**
//     * @Route("/", name="boards_index", methods={"GET"})
//     */
//    public function index(BoardRepository $boardRepository): Response
//    {
//        return $this->render('boards/index.html.twig', [
//            'boards' => $boardRepository->findAll(),
//        ]);
//    }
//
//    /**
//     * @Route("/new", name="boards_new", methods={"GET","POST"})
//     */
//    public function new(Request $request): Response
//    {
//        $board = new Board();
//        $form = $this->createForm(Board1Type::class, $board);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $entityManager = $this->getDoctrine()->getManager();
//            $entityManager->persist($board);
//            $entityManager->flush();
//
//            return $this->redirectToRoute('boards_index', [], Response::HTTP_SEE_OTHER);
//        }
//
//        return $this->render('boards/new.html.twig', [
//            'board' => $board,
//            'form' => $form->createView(),
//        ]);
//    }
//
//    /**
//     * @Route("/{id}", name="boards_show", methods={"GET"})
//     */
//    public function show(Board $board): Response
//    {
//        return $this->render('boards/show.html.twig', [
//            'board' => $board,
//        ]);
//    }
//
//    /**
//     * @Route("/{id}/edit", name="boards_edit", methods={"GET","POST"})
//     */
//    public function edit(Request $request, Board $board): Response
//    {
//        $form = $this->createForm(Board1Type::class, $board);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $this->getDoctrine()->getManager()->flush();
//
//            return $this->redirectToRoute('boards_index', [], Response::HTTP_SEE_OTHER);
//        }
//
//        return $this->render('boards/board_edit.html.twig', [
//            'board' => $board,
//            'form' => $form->createView(),
//        ]);
//    }
//
//    /**
//     * @Route("/{id}", name="boards_delete", methods={"POST"})
//     */
//    public function delete(Request $request, Board $board): Response
//    {
//        if ($this->isCsrfTokenValid('delete'.$board->getId(), $request->request->get('_token'))) {
//            $entityManager = $this->getDoctrine()->getManager();
//            $entityManager->remove($board);
//            $entityManager->flush();
//        }
//
//        return $this->redirectToRoute('boards_index', [], Response::HTTP_SEE_OTHER);
//    }
}
