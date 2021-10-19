<?php

namespace App\Controller;

use App\Entity\WikiQuiMarche;
use App\Form\WikiQuiMarcheType;
use App\Repository\WikiQuiMarcheRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/wiki')]
class WikiQuiMarcheController extends AbstractController
{
    #[Route('/', name: 'wiki', methods: ['GET'])]
    public function index(WikiQuiMarcheRepository $wikiQuiMarcheRepository): Response
    {
        return $this->render('wiki/index.html.twig', [
            'wikis' => $wikiQuiMarcheRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'wiki_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $wikiQuiMarche = new WikiQuiMarche();
        $form = $this->createForm(WikiQuiMarcheType::class, $wikiQuiMarche);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($wikiQuiMarche);
            $entityManager->flush();

            return $this->redirectToRoute('wiki', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('wiki/new.html.twig', [
            'wiki' => $wikiQuiMarche,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'wiki_show', methods: ['GET'])]
    public function show(WikiQuiMarche $wikiQuiMarche): Response
    {
        return $this->render('wiki/show.html.twig', [
            'wiki' => $wikiQuiMarche,
        ]);
    }

    #[Route('/{id}/edit', name: 'wiki_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, WikiQuiMarche $wikiQuiMarche): Response
    {
        $form = $this->createForm(WikiQuiMarcheType::class, $wikiQuiMarche);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('wiki_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('wiki/edit.html.twig', [
            'wiki' => $wikiQuiMarche,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'wiki_delete', methods: ['POST'])]
    public function delete(Request $request, WikiQuiMarche $wikiQuiMarche): Response
    {
        if ($this->isCsrfTokenValid('delete'.$wikiQuiMarche->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($wikiQuiMarche);
            $entityManager->flush();
        }

        return $this->redirectToRoute('wiki_index', [], Response::HTTP_SEE_OTHER);
    }
}
