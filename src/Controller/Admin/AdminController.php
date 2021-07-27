<?php

namespace App\Controller\Admin;


use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use App\Entity\Contact;
use App\Entity\Expertise;
use App\Entity\NewsCategory;
use App\Entity\News;
use App\Entity\Bill;
use App\Entity\BillingMethod;
use App\Entity\BillStatus;
use App\Entity\Customer;
use App\Entity\Diligence;
use App\Entity\PresetDiligence;
use App\Entity\Folder;
use App\Entity\SubFolder;
use App\Entity\Owner;
use App\Entity\Rate;
use App\Entity\BusinessType;
use App\Entity\DataProtectionPolicy;
use App\Entity\Footer;
use App\Entity\LegalMention;
use App\Entity\UploadBackground;
use App\Entity\UploadCarrousel;
use App\Entity\PaymentTerms;
use Symfony\Component\Translation\Translator;


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
            ->setTitle('Maître Thibaud BÉJAT')
            ->renderContentMaximized()
            ;
            
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('ACCUEIL', 'fa fa-home');
        yield MenuItem::section('PERSONNALISATION', 'fa fa-pencil');
        yield MenuItem::linkToCrud('Compétences', 'fas fa-balance-scale', Expertise::class);
        yield MenuItem::linkToCrud('Actualités', 'fas fa-book-reader', News::class);
        yield MenuItem::linkToCrud('Catégories d\'actualités', 'fa fa-newspaper-o', NewsCategory::class);
        yield MenuItem::linkToCrud('Carrousel', 'far fa-images', UploadCarrousel::class);
        yield MenuItem::linkToCrud('Background', 'fa fa-file-image-o', UploadBackground::class);
        yield MenuItem::linkToCrud('Footer', 'fas fa-shoe-prints', Footer::class);
        
       
        yield MenuItem::section('Facturation');
        yield MenuItem::linkToCrud('Dossiers', 'fas fa-folder-minus', Folder::class);
        yield MenuItem::linkToCrud('SousDossiers', 'fas fa-folder-minus', SubFolder::class);
        yield MenuItem::linkToCrud('Clients', 'fa fa-address-card', Customer::class);
        yield MenuItem::linkToCrud('Type Procédure', 'fas fa-euro-sign', BusinessType::class);
        yield MenuItem::linkToCrud('Diligences', 'fa fa-gavel', Diligence::class);
        yield MenuItem::linkToCrud('Diligences préétablies', 'fas fa-user-check', PresetDiligence::class);
        yield MenuItem::linkToCrud('Facture', 'fas fa-file-pdf', Bill::class);
        yield MenuItem::linkToCrud('Méthode Facturation', 'fa fa-file-text-o', BillingMethod::class);
        yield MenuItem::linkToCrud('Statut Factures', 'fa fa-file-text', BillStatus::class);
        yield MenuItem::linkToCrud('Elements de Facture', 'fa fa-file-o', PaymentTerms::class);
        yield MenuItem::linkToCrud('Propriétaire', 'fas fa-landmark', Owner::class);
        yield MenuItem::linkToCrud('Tarification', 'fas fa-percent', Rate::class);
        yield MenuItem::section('Divers');
        yield MenuItem::linkToCrud('Contact', 'fas fa-headset', Contact::class);
        yield MenuItem::linkToCrud('Protection Données', 'fa fa-database', DataProtectionPolicy::class);
        yield MenuItem::linkToCrud('Mentions Legales', 'fa fa-th-list', LegalMention::class);
        yield MenuItem::linkToLogout('Deconnexion', 'fa fa-sign-out');
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
