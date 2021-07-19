<?php

namespace App\Controller\Admin;

use App\Controller\InvoiceController;
use App\Entity\Folder;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class FolderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Folder::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm()
            ->addCssClass('adminfolder') ,
            FormField::addPanel('Général')
            ->setIcon('fas fa-user-edit')
            ->addCssClass('adminfolder'),
            AssociationField::new('Owner', 'Propriétaire'),
            AssociationField::new('customer', 'Client'),
            AssociationField::new('businessType', "type d'affaire"),
            FormField::addPanel('Facturation')
            ->setIcon('fas fa-euro-sign')
            ->addCssClass('adminfolder'),  
            AssociationField::new('billingMethod', 'Methode de facturation')->hideOnIndex(),
            AssociationField::new('subFolder', 'Sous-dossier'),
            FormField::addPanel('Diligences')
            ->setIcon('fas fa-balance-scale')
            ->addCssClass('adminfolder'),
            AssociationField::new('diligence')->hideOnIndex(),
            AssociationField::new('presetDiligence', 'Diligence préétablie')->hideOnIndex(),
            
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
        ->setPageTitle('index', 'Dossiers')
        ->setPageTitle('edit', 'Dossiers')
        ->setPageTitle('new', 'Dossiers')
        ->setPageTitle('detail', 'Dossiers')
        ;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
        ->add(Crud::PAGE_INDEX, Action::DETAIL)
        ->add(Crud::PAGE_NEW, Action::INDEX)
        ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $actions) {
            return $actions->setLabel('Créer Dossier');
             });
        //$sendInvoice = Action::new('sendInvoice', 'Send invoice', 'fa fa-envelope')     
        //->linkToRoute('invoice_send', function (InvoiceController $invoice): array {
          //  return [
            //    'uuid' => $invoice->index(),
              //  'method' => $invoice->getUser()->getPreferredSendingMethod(),
           // ];
      //  });
    }
}