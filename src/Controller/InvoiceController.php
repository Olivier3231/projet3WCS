<?php

namespace App\Controller;

use App\Entity\Customer; 
use App\Entity\Folder; 
use App\Repository\AboutRepository;
use App\Repository\CustomerRepository;
use App\Repository\FolderRepository;
use App\Repository\OwnerRepository;
use App\Repository\PaymentTermsRepository;
use App\Repository\PresetDiligenceRepository;
use App\Repository\RateRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Bundle\SnappyBundle\KnpSnappyBundle;
use Knp\Snappy\Pdf;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;


class InvoiceController extends AbstractController
{
    /**
     * @Route("/facturation/contentieux", name="invoice")
     */
    public function index(AboutRepository $aboutRepository,CustomerRepository $customerRepository,FolderRepository $folderRepository,OwnerRepository $ownerRepository, PaymentTermsRepository $paymentTermsRepository, PresetDiligenceRepository $presetDiligenceRepository, RateRepository $rateRepository): Response
    {
        
        return $this->render('invoice/indexInvoice.html.twig', [
            'abouts' => $aboutRepository->findAll(),
            'customers' => $customerRepository->findAll(),
            'folders' => $folderRepository->findAll(),
            'owners' => $ownerRepository->findAll(),
            'paymentterms' => $paymentTermsRepository->findAll(),
            'presetdiligences' => $presetDiligenceRepository->findBy([], ['id' => 'ASC']),
            'rates'=>$rateRepository->findAll(),
            'controller_name' => 'InvoiceController',]);
    }

    public function selectCustomer(EntityManagerInterface $em)
    {
        $customer = $em->createQueryBuilder('c');
        $customer->select('*')
            ->from(Folder::class, 'c');

        return $this->render('invoice/indexInvoice.html.twig', ['customer' => $customer]);

    }
    
}

