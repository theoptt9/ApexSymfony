<?php

namespace App\Controller;

use App\Repository\ActionRepository;
use App\Repository\VideoRepository;
use App\Repository\WikiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
class PTHomeController extends AbstractController
{

    #[Route('', name: 'pt_home')]
    public function index(UserPasswordHasherInterface $passwordHasher): Response
    {

        return $this->render('pt_home/home.html.twig', [
            'controller_name' => 'PTHomeController',
        ]);
    }
    #[Route('/record', name: 'record')]
    public function record(): Response
    {
        return $this->render('pt_home/record.html.twig', [
            'controller_name' => 'PTHomeController',
        ]);
    }

    #[Route('/video', name: 'video', methods: ['GET'])]
    public function video(VideoRepository $videoRepository): Response
    {
        return $this->render('video/index.html.twig', [
            'videos' => $videoRepository->findAll(),
        ]);
    }
    #[Route('/wiki', name: 'wiki', methods: ['GET'])]
    public function wiki(WikiRepository $wikiRepository): Response
    {
        return $this->render('wiki/index.html.twig', [
            'wikis' => $wikiRepository->findAll(),
        ]);
    }

    #[Route('/action', name: 'action', methods: ['GET'])]
    public function action(ActionRepository $actionRepository): Response
    {
        return $this->render('action/index.html.twig', [
            'actions' => $actionRepository->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'nouveau')]
    public function nouveau(): Response
    {
        return $this->render('pt_home/nouveau.html.twig', [
            'controller_name' => 'PTHomeController',
        ]);
    }

    #[Route('/login', name: 'login')]
    public function login(): Response
    {
        return $this->render('security/login.html.twig', [
            'controller_name' => 'LoginController',
        ]);
    }
    #[Route('/register', name: 'register')]
    public function register(): Response
    {
        return $this->render('registration/register.html.twig', [
            'controller_name' => 'RegistrationController',
        ]);
    }
}
