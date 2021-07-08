<?php

namespace App\Controller\Admin;

use App\Entity\UploadCarrousel;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

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

    

    
    public function configureFields(string $pageName): iterable
    {
        return [
            Text::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
}
