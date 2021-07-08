<?php

namespace App\Controller\Admin;

use App\Entity\Owner;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AvatarField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;

class OwnerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Owner::class;
    }

public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            Field::new('firstname', 'Prénom'),
            Field::new('lastname', 'Nom'),
            EmailField::new('email', 'Email'),
            TelephoneField::new('phone','Téléphone'),
            TelephoneField::new('fax','Fax')->hideOnIndex(),
            NumberField::new('siretnumber','N° SIRET'),
            Field::new('adress', 'Adresse')->hideOnIndex(),
            NumberField::new('toquenumber','N° Toque'),
            AvatarField::new('logo', 'logo')->hideOnIndex(),
        ];
    }
    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            ->addCssFile('build/admin.css')
        ;
    } 
}