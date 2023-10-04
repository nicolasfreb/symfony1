<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    public $listBlog;
    function __construct()
    {
        $this->listBlog = array(
            3 => 'Le blog des éléphants',
            5 => 'Tous avec les tigres',
            7 => 'La grande cambrousse'
        );
    }

    #[Route('/blog/{id}')]
    public function blog($id)
    {
        return $this->render(
            'blog.html.twig',
            [
                'titre' => $this->listBlog[$id],
                'contenu' => "Voici la liste des blogs:"
            ]
        );
    }
}