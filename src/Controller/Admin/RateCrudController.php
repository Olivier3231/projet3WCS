<?php

namespace App\Controller\Admin;

use App\Entity\Rate;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class RateCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Rate::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm()->hideOnIndex(),
            NumberField::new('rateSubscription', 'Montant abonnement'),
            NumberField::new('hourlyRate', 'Taux Horaire'),
            NumberField::new('vatRate', 'Taux TVA'),
        ];
    }

    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            ->addCssFile('build/admin.css')
        ;
    } 

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setPageTitle('index', 'Tarifications')
        ->setPageTitle('edit', 'Tarifications')
        ->setPageTitle('new', 'Tarifications')
        ->setPageTitle('detail', 'Tarifications')
        ;
    }
}
