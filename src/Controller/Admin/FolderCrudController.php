<?php

namespace App\Controller\Admin;

use App\Entity\Folder;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class FolderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Folder::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            FormField::addPanel('Général'),
            AssociationField::new('Owner', 'Propriétaire'),
            AssociationField::new('customer', 'Client'),
            AssociationField::new('businessType', "type d'affaire"),
            FormField::addPanel('Facturation'),
            AssociationField::new('billingMethod', 'Methode de facturation')->hideOnIndex(),
            AssociationField::new('subFolder', 'Sous-dossier'),
            FormField::addPanel('Diligences'),
            AssociationField::new('diligence')->hideOnIndex(),
            AssociationField::new('presetDiligence', 'Diligence préétablie')->hideOnIndex(),
            
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
        ->setPageTitle('index', 'Dossiers')
        ->setPageTitle('edit', 'Dossiers')
        ->setPageTitle('new', 'Dossiers')
        ->setPageTitle('detail', 'Dossiers')
        ;
    }
}