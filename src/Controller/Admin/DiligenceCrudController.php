<?php

namespace App\Controller\Admin;

use App\Entity\Diligence;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DiligenceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Diligence::class;
    }

}
