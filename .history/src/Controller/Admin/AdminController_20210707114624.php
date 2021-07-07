<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use App\Entity\Contact;
use App\Entity\ExpertiseList;
use App\Entity\Expertise;
use App\Entity\NewsCategory;
use App\Entity\News;
use App\Entity\Bill;
use App\Entity\Customer;
use App\Entity\Diligence;
use App\Entity\Folder;
use App\Entity\Owner;
use App\Entity\Rate;
use App\Entity\BusinessType;

class AdminController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(AboutCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Maître Thibaud BÉJAT');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Accueil', 'fa fa-home');
        yield MenuItem::linkToCrud('Compétences', 'fas fa-balance-scale', Expertise::class);
        yield MenuItem::linkToCrud('Listes compétences', 'fas fa-gavel', ExpertiseList::class);
        yield MenuItem::linkToCrud('Actualités', 'fas fa-book-reader', News::class);
        yield MenuItem::linkToCrud('Catégories d\'actualités', 'fa fa-book fa-fw', NewsCategory::class);
        yield MenuItem::linkToCrud('Dossiers', 'fas fa-folder-minus', Folder::class);
        yield MenuItem::linkToCrud('Clients', 'fas fa-handshake', Customer::class);
        yield MenuItem::linkToCrud('Type Facturation', 'fas fa-euro-sign', BusinessType::class);
        yield MenuItem::linkToCrud('Diligence', 'fas fa-user-check', Diligence::class);
        yield MenuItem::linkToCrud('Facture', 'fas fa-file-pdf', Bill::class);
        yield MenuItem::linkToCrud('Propriétaire', 'fas fa-landmark', Owner::class);
        yield MenuItem::linkToCrud('Tarification', 'fas fa-percent', Rate::class);
        yield MenuItem::linkToCrud('Contact', 'fas fa-headset', Contact::class);
        yield MenuItem::linkToCrud('Carrousel', 'fas fa-headset', Contact::class);
        yield MenuItem::linkToCrud('B', 'fas fa-headset', Contact::class);
    }

    /**
     * @Route("/logout", name="app_logout", methods={"GET"})
     */
    public function logout(): void
    {
         // controller can be blank: it will never be executed!
         throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }
}
