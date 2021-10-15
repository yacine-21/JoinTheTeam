<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Category;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
               // get all categories !
               $AllCategory = $this->getDoctrine()
               ->getRepository(Category::class)
               ->findAll();
       
               dump($AllCategory);
       
        return $this->render('home/index.html.twig',[
            "categories" => $AllCategory
        ]);
    }


    /**
     * @Route("show/{id}", name="category")
     */
    public function showCategoryDetail(Request $request):Response
    {        
        $id  =  $request->attributes->get("id");

        // definit notre entité manager
        $em = $this->getDoctrine()->getManager();

        // add a category
        // $category = new Category();
        $category = $em->getRepository(Category::class)->find(1);

        $category->setImage("art_design-icon.png");

        $em->persist($category);
        $em->flush();

        return $this->renderForm("Category/index.html.twig",[
            "id" => $id,
        ]);
    }
}
