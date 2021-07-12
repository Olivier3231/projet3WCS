<?php

namespace App\Controller;

use App\Entity\About;
use App\Entity\Admin;
use App\Entity\Bill;
use App\Entity\BillingMethod;
use App\Entity\BillStatus;
use App\Entity\BusinessType;
use App\Entity\Contact;
use App\Entity\Customer;
use App\Entity\Diligence;
use App\Entity\Expertise;
use App\Entity\Folder;
use App\Entity\Footer;
use App\Entity\Owner;
use App\Entity\PresetDiligence;
use App\Entity\Rate;
use App\Entity\SubFolder;
use App\Repository\FolderRepository;
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
    public function index(): Response
    {
        return $this->render('invoice/indexInvoice.html.twig', [
            'controller_name' => 'InvoiceController',]);
    }
    public function pdfAction(Knp\Snappy\Pdf $knpSnappyPdf)
    {
        $html = $this->renderView('MyBundle:Foo:indexInvoice.html.twig');

        return new PdfResponse(
            $knpSnappyPdf->getOutputFromHtml($html),
            'file.pdf'
        );
    }

}

