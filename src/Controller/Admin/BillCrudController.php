<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use App\Entity\Bill;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BillCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bill::class;
    }
    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            ->addCssFile('build/admin.css')
        ;
    } 

}
