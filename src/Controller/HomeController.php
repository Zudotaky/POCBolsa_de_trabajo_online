<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController{
  
  /**
   * @Route("/", name="app_homepage")
   */
  public function HomePage()  {
      return $this->render('BolsaDeTrabajo/HomePage.html.twig');
  }

}
