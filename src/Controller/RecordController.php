<?php

namespace App\Controller;

use App\Entity\Record;
use App\Form\RecordType;
use App\Repository\RecordRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/record')]
class RecordController extends AbstractController
{
    #[Route('/', name: 'record', methods: ['GET'])]
    public function index(RecordRepository $recordRepository): Response
    {
        return $this->render('record/index.html.twig', [
            'records' => $recordRepository->findAll(),
        ]);
    }

}
