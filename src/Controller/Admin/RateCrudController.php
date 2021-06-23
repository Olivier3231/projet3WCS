<?php

namespace App\Controller\Admin;

use App\Entity\Rate;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RateCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Rate::class;
    }
    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            ->addCssFile('build/admin.css')
        ;
    } 
}
