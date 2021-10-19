<?php

namespace App\Controller;

use App\Entity\Video;
use App\Form\VideoType;
use App\Repository\VideoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

// Nous appelons le bundle KNP Paginator
use Knp\Bundle\PaginatorBundle\Pagination\SlidingPaginationInterface;

#[Route('/video')]
class VideoController extends AbstractController
{
    #[Route('/', name: 'video_index', methods: ['GET'])]
    public function index(Request $request, $videoRepository, PaginatorBundle $paginator): Response
    {
        $repo = $this->getDoctrine()->getRepository(Video::class);
        $video = $repo->findAll();
        $videos = $videoRepository->findAll();
        $videos = $paginator->paginate(
            $videos,
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            5 // Nombre de résultats par page
        );

        return $this->render('video/index.html.twig', [
            'videos' => $videos,
            'video' => $video,
        ]);
    }



    #[Route('/new', name: 'video_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $video = new Video();
        $form = $this->createForm(VideoType::class, $video);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($video);
            $entityManager->flush();

            return $this->redirectToRoute('video_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('video/new.html.twig', [
            'video' => $video,
            'form' => $form,
        ]);
    }





}
