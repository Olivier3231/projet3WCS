<?php

namespace App\Controller\Admin;

use App\Entity\PaymentTerms;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PaymentTermsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PaymentTerms::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm()->hideOnIndex(),
            Field::new('ribNumber', 'RIB'),
            Field::new('IBAN')->hideOnIndex(),
            Field::new('BIC')->hideOnIndex(),
            TextAreaField::new('domiciliation'),
            TextEditorField::new('modalites', 'Modalités'),
            TextEditorField::new('lawrecall', 'Rappel legislatif'),
        ];
    }

    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            ->addCssFile('build/admin.css')
        ;
    } 

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setPageTitle('index', 'Eléments de facture')
        ->setPageTitle('edit', 'Eléments de facture')
        ->setPageTitle('new', 'Eléments de facture')
        ->setPageTitle('detail', 'Eléments de facture')
        ;
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
