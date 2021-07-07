<?php

namespace App\Controller\Admin;

use App\Entity\PresetDiligence;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PresetDiligenceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PresetDiligence::class;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('description'),
            Field::new('amount'),
        ];
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
