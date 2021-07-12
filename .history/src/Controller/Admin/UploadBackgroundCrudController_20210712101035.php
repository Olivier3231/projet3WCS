<?php

namespace App\Controller\Admin;

use App\Entity\UploadBackground;
use App\Field\IllustrationField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use App\Field\ImageType;

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
            
            TextField::new('imageUpload')
            ->setFormType(VichImageType::class),
            ImageField::new('upload')
            ->setBasePath('images/background')
            ->setUploadDir('images/background'),
            IllustrationField::New('mainIllustration'),

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

