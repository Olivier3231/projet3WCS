<?php

namespace App\Controller\Admin;

use App\Entity\Rate;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RateCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Rate::class;
    }
}
