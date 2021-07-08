<?php

namespace App\Controller\Admin;

use App\Entity\UploadCarrousel;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
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
            Textfield::new('nom'),
            TextareaField::new('description')->hideOnIndex(),
            DateField::new('dateR')
            TextEditorField::new(''),
            TextField::new('imageUpload')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('upload')->setBasePath('/uploads/images/carrousel')->onlyOnIndex(),
        ];
    }
}
