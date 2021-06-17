<?php

namespace App\Controller\Admin;

use App\Entity\Folder;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FolderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Folder::class;
    }

}
