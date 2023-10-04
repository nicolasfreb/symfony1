<?php

    namespace App\Controller;

    use App\Entity\Blog;
    use App\Entity\Poste;
    use DateTime;
    use DateTimeZone;
    use Doctrine\Persistence\ManagerRegistry;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class PosteController extends AbstractController
    {

        /**
         * @Route("post/new")
         */
        public function newPoste(Request $request, ManagerRegistry $doctrine) : Response
        {
            $poste = new Poste();
            $dateTime = new DateTime();
            $dateTime->setTimezone(new DateTimeZone("Europe/Paris"));

            $poste->setDate($dateTime);
            $poste->setAuteur('Nico');
            $poste->setBlogId($request->request->get('idBlog'));
            $poste->setContenu($request->request->get('contenu'));
            $em = $doctrine->getManager();

            $em->persist($poste);
            $em->flush();
            return $this->redirectToRoute('app_blog_blog', ['id' => $request->request->get('idBlog')]);

        }
    }