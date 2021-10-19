<?php

namespace App\Controller\Admin;

use App\Entity\Action;
use App\Entity\News;
use App\Entity\Record;
use App\Entity\User;
use App\Entity\Video;
use App\Entity\WikiQuiMarche;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardControllerSuperAdmin extends AbstractDashboardController
{
    #[Route('/superadmin', name: 'superadmin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Pannel Super Admin');

    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Actualités', 'fas fa-newspaper', News::class);
        yield MenuItem::linkToCrud('Videos', 'fas fa-video', Video::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Records', 'fas fa-trophy', Record::class);
        yield MenuItem::linkToCrud('Wiki', 'fas fa-book', WikiQuiMarche::class);
        yield MenuItem::linkToCrud('Action', 'fas fa-headset', Action::class);
    }
}
