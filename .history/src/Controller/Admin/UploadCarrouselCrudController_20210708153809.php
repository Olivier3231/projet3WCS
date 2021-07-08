<?php

namespace App\Controller\Admin;

use App\Entity\UploadCarrousel;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UploadCarrouselCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return UploadCarrousel::class;
    }
    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            ->addCssFile('build/admin.css')
        ;
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
        yield MenuItem::linkToCrud('Carrousel', 'fas fa-parachute-box', UploadCarrousel::class);
        yield MenuItem::linkToCrud('Background', 'far fa-images', UploadBackground::class);
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
