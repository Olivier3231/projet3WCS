<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Expertise;
use App\Form\ContactType;
use App\Repository\ExpertiseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\About;
use App\Repository\AboutRepository;
use App\Repository\FooterRepository;
use App\Repository\NewsRepository;

class DefaultController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function getAllExpertises(ExpertiseRepository $expertiseRepository): Response
    {
        $expertises = new Expertise();
        return $this->render('default/index.html.twig', [
            'expertises' => $expertiseRepository->findAll(),
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function index(Request $request, EntityManagerInterface $manager,
    AboutRepository $aboutRepository,
    ExpertiseRepository $expertiseRepository,
    NewsRepository $newsRepository,
    FooterRepository $footerRepository): Response
    {
        $contact = new Contact();
        $contactForm = $this->createForm(ContactType::class, $contact);
        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $manager = $this->getDoctrine()->getManager();

            $manager->persist($contact);
            $manager->flush();

            return $this->redirectToRoute('home');
        }
        return $this->render('default/index.html.twig', [
            'about' => $this->$aboutRepository->findAll()[2],
            'expertise' => $this->$expertiseRepository->findAll(), 
            'news' => $this->$newsRepository->findAll(), 
            'footer' => $this->$footerRepository->findAll(),
            'form' => $contactForm->createView(),
        ]);
    }
    
    /**
     * @Route("/", name="home")
     */
    /*public function showExpertise(ExpertiseRepository $expertiseRepository): Response
    {

        return $this->render('default/index.html.twig', [
            'expertise' => $expertiseRepository ->findOneBy(['expertiseList' => ''])
        ]);
    }*/
}
