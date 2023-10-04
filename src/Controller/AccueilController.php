<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/')]
    public function accueil()
    {
        return $this->render('accueil.html.twig', ['contenu' => "Bienvenue"]);
        //return new Response(" Bienvenue sur la page d'accueil ! ");
    }
}