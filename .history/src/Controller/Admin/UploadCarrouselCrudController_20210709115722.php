<?php

namespace App\Controller\Admin;

use App\Entity\UploadCarrousel;
use App\Field\IllustrationField;
use App\Field\VichImageField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
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

            TextField::new('imageUpload')->setFormType(VichImageType::class),
            ImageField::new('upload')->setBasePath('images/carrousel'),
            IllustrationField::New('mainIllustration'),
            IllustrationField::New('secondIllustration'),
            IllustrationField::New('thirdIllustration'),
            yield App\Controller\Admin\VichImageField::new('image')->hideOnForm();
yield VichImageField::new('imageFile')->onlyOnForms();

        ];
    }
}
