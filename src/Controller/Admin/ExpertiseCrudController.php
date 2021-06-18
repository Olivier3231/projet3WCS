<?php

namespace App\Controller\Admin;

use App\Entity\Expertise;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ExpertiseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Expertise::class;
    }

} 
