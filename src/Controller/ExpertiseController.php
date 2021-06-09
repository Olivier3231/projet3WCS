<?php

namespace App\Controller;

use App\Repository\ExpertiseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExpertiseController extends AbstractController
{
    /**
     * @Route("/expertise", name="expertise")
     */
    public function showExpertise(ExpertiseRepository $expertiseRepository): Response
    {
        return $this->render('expertise.html.twig', [
            'expertises' => $expertiseRepository->findAll(),
        ]);
    }


}
