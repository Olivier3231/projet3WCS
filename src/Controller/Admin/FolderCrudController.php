<?php

namespace App\Controller\Admin;

use App\Entity\Folder;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;

class FolderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Folder::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            
            AssociationField::new('Owner'),
            AssociationField::new('customer'),
            AssociationField::new('businessType'),
            AssociationField::new('billingMethod'),
            AssociationField::new('subFolder'),
            AssociationField::new('diligence'),
            AssociationField::new('presetDiligence'),
            
            
        ];
    }

    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            ->addCssFile('build/admin.css')
        ;
    } 
}