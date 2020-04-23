<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;

use App\Repository\FilmRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CineController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration(Request $request, EntityManagerInterface $manager)
    {
        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);
        
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($user);
            $manager->flush();

            //return $this->redirectToRoute('cine', ['id' => $user.getId()]);
        }

        return $this->render('security/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/cine", name="cine")
     */
    public function index(FilmRepository $rfilm)
    {
        
        return $this->render('cine/index.html.twig', [
            'controller_name' => 'CineController',
        ]);
    }
}
