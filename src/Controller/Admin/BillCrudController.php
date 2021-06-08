<?php

namespace App\Controller\Admin;

use App\Entity\Bill;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BillCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bill::class;
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
