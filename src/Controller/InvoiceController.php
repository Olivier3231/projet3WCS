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

    /**
    * Save the PDF to a file
    *
    * @param $filename
    * @return static
    */
    public function save($filename)
    {
        if ($this->html) {
            $this->snappy->generateFromHtml($this->html, $filename, $this->options);
        } elseif ($this->file) {
            $this->snappy->generate($this->file, $filename, $this->options);
        }
        return $this;
    }

}
