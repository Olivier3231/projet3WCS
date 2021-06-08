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
