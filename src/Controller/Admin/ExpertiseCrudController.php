<?php

namespace App\Controller\Admin;

use App\Entity\Expertise;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ExpertiseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Expertise::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm()->hideOnIndex(),
            TextField::new('title', 'Titre'),
            TextEditorField::new('description', 'Description'),
            
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
        ->setPageTitle('index', 'Expertises')
        ->setPageTitle('edit', 'Expertises')
        ->setPageTitle('new', 'Expertises')
        ->setPageTitle('detail', 'Expertises')
        ;
    }
}

