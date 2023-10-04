<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Blog;
use App\Form\BlogType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;

class BlogController extends AbstractController
{
    /**
     * @Route("/blogs")
     */
    public function blogs(ManagerRegistry $doctrine)
    {
        $repository = $doctrine->getRepository(Blog::class);

        $listBlog = $repository->findAll();
        return $this->render
        (
            'blogs.html.twig',
            [
                'titre' => 'Blogs',
                'contenu' => 'Voici la liste des blogs:'
                ,'ListBlogs' => $listBlog
            ]
        );
    }


    /**
     * @Route("/blog/{id}")
     */
    public function blog($id, ManagerRegistry $doctrine)
    {
        $repository = $doctrine->getRepository(Blog::class);
        $listBlog = $repository->find($id);

        return $this->render(
            'blog.html.twig',
            [
                'blog' => $listBlog
            ]
        );
    }

    /**
     * @Route("/form")
     */
    public function form(Request $request, ManagerRegistry $doctrine)
    {
        $blog = new Blog();
        $blog->setTitre('');
        $form = $this->createForm(BlogType::class, $blog);

        return $this->render(
            'form/newBlog.html.twig',
            [
                'form' => $form->createView(),
                'titre' => 'Nouveau Blog'
            ]
        );
    }

    /**
     * @Route("/form/new")
     */
    public function new(Request $request, ManagerRegistry $doctrine)
    {
        $blog = new Blog();
        $blog->setTitre('');
        $form = $this->createForm(BlogType::class, $blog);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();

            $em->persist($blog);
            $em->flush();
            return $this->redirectToRoute('app_blog_blogs');
        }
    }
    /**
     * @Route("/form/edit/{id<\d+>}")
     */
    public function edit(Request $request, Blog $blog, ManagerRegistry $doctrine)
    {
        $form = $this->createForm(BlogType::class, $blog);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $doctrine->getManager()->flush();
        }

        return $this->redirectToRoute('app_blog_blogs');
    }

    /**
     * @Route("/form/delete/{id<\d+>}", methods={"POST"})
     */
    public function delete($id, ManagerRegistry $doctrine)
    {
        $repository = $doctrine->getRepository(Blog::class);
        $blog = $repository->find($id);

        $em = $doctrine->getManager();

        $em->remove($blog);
        $em->flush();

        return $this->redirectToRoute('app_blog_blogs');
    }


}