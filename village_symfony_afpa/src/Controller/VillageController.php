<?php

namespace App\Controller;

use App\Repository\ActualitesRepository;
use App\Repository\EvenementsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VillageController extends AbstractController
{
    /**
     * @Route("/accueil", name="accueil")
     */
    public function accueil(): Response
    {
        return $this->render('village/accueil.html.twig', [
            'titre' => 'Accueil du village',
        ]);
    }

    /**
     * @Route("/histoire", name="histoire")
     */
    public function histoire(): Response
    {
        return $this->render('village/histoire.html.twig', [
            'titre' => 'Histoire du village',
        ]);
    }

    /**
     * @Route("/evenements", name="evenements")
     */
    public function evenements(EvenementsRepository $repo): Response
    {
        $evenements = $repo->findAll();
        return $this->render('village/evenements.html.twig', [
            'titre' => 'Evenements du village',
            'evenements' => $evenements,
        ]);
    }

    /**
     * @Route("/actualites", name="actualites")
     */
    public function actualites(ActualitesRepository $repo): Response
    {
        // L'injection de dépendance permet de ne plus écrire cette ligne
        //$repo = $this->getDoctrine()->getRepository(Article::class);
        $actualites = $repo->findAll();
        return $this->render('village/actualites.html.twig', [
            'titre' => 'Actualités du village',
            'actualites' => $actualites,
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('village/contact.html.twig', [
            'titre' => 'Contact',
        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function login(): Response
    {
        return $this->render('village/login.html.twig', [
            'titre' => 'Connexion',
        ]);
    }
}