<?php

namespace App\Controller;
use App\Entity\News;
use App\Entity\About;

use App\Entity\Footer;
use App\Entity\Contact;
use App\Entity\Expertise;
use App\Form\ContactType;
use App\Entity\NewsCategory;
use App\Entity\UploadCarrousel;
use App\Entity\UploadBackground;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\ContactRepository;

use App\Repository\NewsRepository;
use App\Repository\AboutRepository;
use App\Repository\FooterRepository;
use App\Repository\ExpertiseRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\NewsCategoryRepository;
use Symfony\Component\Validator\Validation;
use App\Repository\UploadCarrouselRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\UploadBackgroundRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(
        UploadBackgroundRepository $uploadBackgroundRepository,
        UploadCarrouselRepository $uploadCarrouselRepository,
        Request $request,
        EntityManagerInterface $manager,
        AboutRepository $aboutRepository,
        ExpertiseRepository $expertiseRepository,
        NewsRepository $newsRepository,
        NewsCategoryRepository $newsCategoryRepository,
        ContactType $contactType
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
            'carrouselle' => $uploadCarrouselRepository->findAll([], ['id' => 'DESC'],1 ),
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
        'abouts' => $aboutRepository->findAll([], ['id' => 'DESC'], 3),
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

