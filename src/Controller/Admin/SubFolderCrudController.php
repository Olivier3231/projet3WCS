<?php

namespace App\Controller\Admin;

use App\Entity\SubFolder;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SubFolderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SubFolder::class;
    }

    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            ->addCssFile('build/admin.css')
        ;
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
