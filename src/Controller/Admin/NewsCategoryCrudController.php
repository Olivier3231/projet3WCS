<?php

namespace App\Controller\Admin;

use App\Entity\NewsCategory;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class NewsCategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return NewsCategory::class;
    }

    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            ->addCssFile('build/admin.css')
        ;
    } 
}
