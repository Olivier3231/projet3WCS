<?php

namespace App\Controller\Admin;

use App\Entity\Expertise;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;

class ExpertiseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Expertise::class;
    }
    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            ->addCssFile('build/admin.css')
        ;
    } 
}

