<?php

namespace App\Controller\Admin;

use App\Entity\Diligence;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;

class DiligenceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Diligence::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('description'),
            Field::new('duration'),
        ];
    }

    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            ->addCssFile('build/admin.css')
        ;
    } 
}