<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CineController extends AbstractController
{
    /**
     * @Route("/cine", name="cine")
     */
    public function index()
    {
        return $this->render('cine/index.html.twig', [
            'controller_name' => 'CineController',
        ]);
    }
}
