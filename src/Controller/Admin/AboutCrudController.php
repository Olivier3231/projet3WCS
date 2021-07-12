<?php

namespace App\Controller\Admin;

use App\Entity\About;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AvatarField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AboutCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return About::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            
            FormField::addPanel('Propritaire'),
            TextField::new('title', 'Nom-Prénom'),
            TextField::new('subtitle', 'Titre'),
            AvatarField::new('avatar', "avatar"),
            TextEditorField::new('description', 'decription')->hideOnIndex(),
           
            
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
        ->setPageTitle('index', 'Accueil')
        ->setPageTitle('edit', 'Accueil')
        ->setPageTitle('new', 'Accueil')
        ->setPageTitle('detail', 'Accueil')
        ;
    }
}
