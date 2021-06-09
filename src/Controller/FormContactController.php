<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormTypeInterface;

class FormContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, EntityManagerInterface $manager): Response
    {
        $contact = new Contact();
        
        $contactForm = $this->createForm(ContactType::class, $contact);
        $contactForm->handleRequest($request);
        $this->created_at = $this->date_time_set;

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $manager = $this->getDoctrine()->getManager();

            $manager->persist($contact);
            $manager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('form.html.twig', [
            'form' => $contactForm->createView(),
        ]);
    }
}