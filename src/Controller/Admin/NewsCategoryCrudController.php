<?php

namespace App\Controller\Admin;

use App\Entity\NewsCategory;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class NewsCategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return NewsCategory::class;
    }
}
