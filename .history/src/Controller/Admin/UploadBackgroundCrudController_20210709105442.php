<?php

namespace App\Controller\Admin;

use App\Entity\UploadBackground;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UploadBackgroundCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return UploadBackground::class;
    }
    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            ->addCssFile('build/admin.css')
        ;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('imageUpload')->setFormType(VichImageType::class),
            ImageField::new('upload')->setBasePath('/uploads/images/carrousel'),

        ];
    }
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
