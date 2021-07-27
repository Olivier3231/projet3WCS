<?php

namespace App\Controller;


use App\Repository\DataProtectionPolicyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\FooterRepository;
use App\Repository\LegalMentionRepository;
use App\Repository\UploadBackgroundRepository;
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
     * @Route("/mentions-legales", name="legal_mention")
     */
    public function mentionsLegales(LegalMentionRepository $legalMentionRepository,
    UploadBackgroundRepository $uploadBackgroundRepository): Response {
        return $this->render('default/mentionslegales.html.twig',[
            'background' => $uploadBackgroundRepository->findAll([], ['id' => 'DESC'], 1),
            'mentionslegales' => $legalMentionRepository->findAll()[0] ?? '',
        ]);
    }

    /**
     * @Route("/protection-des-donnees", name="data_protection")
     */
    public function protectiondonnees(DataProtectionPolicyRepository $dataProtectionPolicyRepository,
    UploadBackgroundRepository $uploadBackgroundRepository): Response {
        return $this->render('default/protectiondonnees.html.twig', [
            'background' => $uploadBackgroundRepository->findAll([], ['id' => 'DESC'], 1),
            'dataprotectionpolicy' => $dataProtectionPolicyRepository->findAll()[0] ?? '',
        ]);
    }

}
