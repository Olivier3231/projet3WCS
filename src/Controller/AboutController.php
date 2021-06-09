<?php

namespace App\Controller;

use App\Entity\About;
use App\Repository\AboutRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Component\HttpFoundation\Request;

class AboutController extends AbstractController
{
    /**
     * @Route("/about/{about_id}", name="about")
     */
    public function index(Request $request, About $about): Response
    {
            return $this->render(
                'about.html.twig', 
                ['about' => $about]
            );
        
    }
}