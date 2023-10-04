<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogsController extends AbstractController
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
    #[Route('/blogs')]
    public function blogs()
    {

        return $this->render
        (
            'blogs.html.twig',
            [
                'titre' => 'Blogs',
                'contenu' => 'Voici la liste des blogs:',
                'ListBlogs' => $this->listBlog
            ]
        );
    }
}