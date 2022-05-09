<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    /**
     * @Route("/proj", name="proj")
     */
    public function proj(): Response
    {
        return $this->render('project/proj.html.twig');
    }

    /**
     * @Route("/proj/about", name="proj_about")
     */
    public function projAbout(): Response
    {
        return $this->render('project/proj-about.html.twig');
    }
}
