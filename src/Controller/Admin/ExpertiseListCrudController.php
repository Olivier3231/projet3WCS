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

}
