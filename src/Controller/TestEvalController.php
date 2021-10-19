<?php

namespace App\Controller;

use App\Entity\TestEval;
use App\Form\TestEvalType;
use App\Repository\TestEvalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/test/eval')]
class TestEvalController extends AbstractController
{
    #[Route('/', name: 'test_eval_index', methods: ['GET'])]
    public function index(TestEvalRepository $testEvalRepository): Response
    {
        return $this->render('test_eval/index.html.twig', [
            'test_evals' => $testEvalRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'test_eval_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $testEval = new TestEval();
        $form = $this->createForm(TestEvalType::class, $testEval);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($testEval);
            $entityManager->flush();

            return $this->redirectToRoute('test_eval_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('test_eval/new.html.twig', [
            'test_eval' => $testEval,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'test_eval_show', methods: ['GET'])]
    public function show(TestEval $testEval): Response
    {
        return $this->render('test_eval/show.html.twig', [
            'test_eval' => $testEval,
        ]);
    }

    #[Route('/{id}/edit', name: 'test_eval_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TestEval $testEval): Response
    {
        $form = $this->createForm(TestEvalType::class, $testEval);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('test_eval_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('test_eval/edit.html.twig', [
            'test_eval' => $testEval,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'test_eval_delete', methods: ['POST'])]
    public function delete(Request $request, TestEval $testEval): Response
    {
        if ($this->isCsrfTokenValid('delete'.$testEval->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($testEval);
            $entityManager->flush();
        }

        return $this->redirectToRoute('test_eval_index', [], Response::HTTP_SEE_OTHER);
    }
}
