<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SitemapController extends AbstractController
{
    /**
     * @Route("/sitemap.xml", name="sitemap")
     */
    public function index(Request $request): Response
    {
        $hostname = $request->getSchemeAndHttpHost();

        $urls = [];

        $urls[] = ['loc' => $this->generateUrl('home')];
        $urls[] = ['loc' => $this->generateUrl('recent_actualities')];
        $urls[] = ['loc' => $this->generateUrl('newspaper')];
        $urls[] = ['loc' => $this->generateUrl('important_actualities')];
        $urls[] = ['loc' => $this->generateUrl('actualities')];
        $urls[] = ['loc' => $this->generateUrl('legal_mention')];
        $urls[] = ['loc' => $this->generateUrl('data_protection')];

        $response = new Response(
            $this->renderView('sitemap/sitemap.html.twig', [
                'urls' => $urls,
                'hostname' => $hostname
            ]),
            200
        );

        $response->headers->set('Content-Type', 'text/xml');

        return $response;
    }
}
