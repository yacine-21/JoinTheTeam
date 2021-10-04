<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name = "HomePage")
     */
    public function showHomePage(): Response
    {


        return $this->render("Home/Home.html.twig");
    }

}
