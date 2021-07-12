<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ExpertiseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AboutRepository;
use App\Repository\NewsRepository;
use App\Repository\NewsCategoryRepository;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(
        Request $request,
        EntityManagerInterface $manager,
        AboutRepository $aboutRepository,
        ExpertiseRepository $expertiseRepository,
        NewsRepository $newsRepository,
        NewsCategoryRepository $newsCategoryRepository

    ): Response {
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
            'abouts' => $aboutRepository->findAll(),
            'expertises' => $expertiseRepository->findAll(),
            'form' => $contactForm->createView(),
            'news' => $newsRepository->findBy([], ['id' => 'DESC'], 4),
            'newscategory' => $newsCategoryRepository->findOneBy([], ['id' => 'ASC']),
            ]);
    }

    /**
     * @Route("/recent", name="recent")
     */
   public function recent(
        EntityManagerInterface $manager,
        NewsRepository $newsRepository,
        AboutRepository $aboutRepository,

        NewsCategoryRepository $newsCategoryRepository
   ): Response{
       return $this->render('default/recent.html.twig', [
        'abouts' => $aboutRepository->findAll(),
        'news' => $newsRepository->findBy([], ['id' => 'DESC'], 2),
        'news' => $newsRepository->findBy([], ['id' => 'DESC'], 2),
            ]);
   }


    /**
     * @Route("/journal", name="journal")
     */
    public function journal(
        EntityManagerInterface $manager,
        NewsRepository $newsRepository,
        AboutRepository $aboutRepository,

        NewsCategoryRepository $newsCategoryRepository
   ): Response{
       return $this->render('default/journal.html.twig', [
        'abouts' => $aboutRepository->findAll(),
            'news' => $newsRepository->findAll(),
            'newscategory' => $newsCategoryRepository->findAll(),

            ]);
   }
    
    /**
     * @Route("/importante", name="importante")
     */
    public function importante(
        EntityManagerInterface $manager,
        NewsRepository $newsRepository,
        AboutRepository $aboutRepository,

        NewsCategoryRepository $newsCategoryRepository
   ): Response{
       return $this->render('default/importante.html.twig', [
        'abouts' => $aboutRepository->findAll(),
            'news' => $newsRepository->findAll(),
            'newscategory' => $newsCategoryRepository->findAll(),

            ]);
   }
     /**
     * @Route("/actualites", name="actualites")
     */
    public function actualites(
        EntityManagerInterface $manager,
        NewsRepository $newsRepository,
        AboutRepository $aboutRepository,

        NewsCategoryRepository $newsCategoryRepository
   ): Response{
       return $this->render('default/actualites.html.twig', [
        'abouts' => $aboutRepository->findAll(),
            'news' => $newsRepository->findAll(),
            'newscategory' => $newsCategoryRepository->findAll(),

            ]);
   }
}

