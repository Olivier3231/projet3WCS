<?php

namespace App\Controller\Admin;

use App\Entity\ExpertiseList;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ExpertiseListCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ExpertiseList::class;
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
