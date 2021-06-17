<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
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
            ->setTitle('Remote Fr March21 Php TDBT');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Expertise', 'fas fa-list', Expertise::class);
        yield MenuItem::linkToCrud('ExpertiseList', 'fas fa-list', ExpertiseList::class);
        yield MenuItem::linkToCrud('News', 'fas fa-list', News::class);
        yield MenuItem::linkToCrud('NewsCategory', 'fas fa-list', NewsCategory::class);
        yield MenuItem::linkToCrud('Folder', 'fas fa-list', Folder::class);
        yield MenuItem::linkToCrud('Customer', 'fas fa-list', Customer::class);
        yield MenuItem::linkToCrud('Diligence', 'fas fa-list', Diligence::class);
        yield MenuItem::linkToCrud('Bill', 'fas fa-list', Bill::class);
        yield MenuItem::linkToCrud('Owner', 'fas fa-list', Owner::class);
        yield MenuItem::linkToCrud('Rate', 'fas fa-list', Rate::class);
        yield MenuItem::linkToCrud('Contact', 'fas fa-list', Contact::class);
    }
}
