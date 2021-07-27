<?php

namespace App\Controller;


use App\Repository\DataProtectionPolicyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\FooterRepository;
use App\Repository\LegalMentionRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FooterController extends AbstractController
{

    public function displayFooter(FooterRepository $footerRepository): Response
    {
        return $this->render('_footer.html.twig', [
                'footers' => $footerRepository->findAll(),
            ]);
    }

    /**
     * @Route("/mentionslegales", name="mentionslegales")
     */
    public function mentionsLegales(LegalMentionRepository $LegalMentionRepository): Response {
        return $this->render('default/mentionslegales.html.twig',[
            'mentionslegales' => $LegalMentionRepository->findAll()[0],
        ]);
    }

    /**
     * @Route("/protectiondonnees", name="protectiondonnees")
     */
    public function protectiondonnees(DataProtectionPolicyRepository $dataProtectionPolicyRepository): Response {
        return $this->render('default/protectiondonnees.html.twig', [
            'dataprotectionpolicy' => $dataProtectionPolicyRepository->findAll()[0],
        ]);
    }

}
