<?php

namespace App\Controller\Admin;

use App\Entity\Owner;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OwnerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Owner::class;
    }

    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            ->addCssFile('build/admin.css')
        ;
    } 
}
