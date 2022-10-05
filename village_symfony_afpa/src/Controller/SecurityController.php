<?php

namespace App\Controller;

use App\Entity\Actualites;
use App\Entity\Contact;
use App\Entity\Evenements;
use App\Entity\Login;
use App\Form\ActualitesType;
use App\Form\EvenementType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactType;
use App\Repository\ActualitesRepository;
use App\Repository\EvenementsRepository;
use App\service\CallApi;
use DateTime;


class SecurityController extends AbstractController
{
    /**
     * @Route("/contact", name="security_contact")
     */
    public function index(Request $request, EntityManagerInterface $manager, ?Contact $user): Response
    {
        // on instancie  un nouveau contact
        $user = new Contact();
        // On relie les champs du form avec l'entité Contact
        $form = $this->createForm(ContactType::class, $user);
        // on analise la requête http passé en paramètre
        $form->handleRequest($request);
        // On vérifie que le form soit valide
        if($form->isSubmitted() && $form->isValid()) {
 
            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute('accueil');
        }
        return $this->render('village/contact.html.twig', [
            'titre' => 'Formulaire de contact',
            'formContact' => $form->createView(),

        ]);
    }

    /**
     * @Route("/login", name="security_login")
     */
    public function login(): Response
    {
        
        return $this->render('village/login.html.twig', [
        ]);
    }

    /**
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout() {

    }

    /**
     * @Route("/admin", name="security_admin")
     */
    public function Ad_actualites(EvenementsRepository $repoEvent, ActualitesRepository $repoActu): Response
    {

        $actualites = $repoActu->findAll();
        $evenements = $repoEvent->findAll();


        return $this->render('village/admin.html.twig', [
            'titre' => 'Espace Admin',
            'evenements' => $evenements,      
            'actualites' => $actualites

        ]);
    }

     /**
     * @Route("/admin/newActu", name="createActu")
     */
    public function newActu(EntityManagerInterface $manager, ?Actualites $actualites, Request $request): Response
    {
        
        if(!$actualites) {
            $actualites = new Actualites();
        }

        $form = $this->createForm(ActualitesType::class, $actualites);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            if(!$actualites->getId()) {
                $actualites->setCreatedAt(new DateTime());
            }
            $manager->persist($actualites);
            $manager->flush();
            return $this->redirectToRoute('security_admin', [
                'id' => $actualites->getId()
            ]);
        }
        return $this->render("security/formActu.html.twig", [
            'titre' => 'Créer une actualité',
            "formActu" => $form->createView(),
            'editMode' => $actualites->getId() !== null                       
        ]);
    }  

    /**
     * @Route("/admin/newEvent", name="createEvent")
     */
    public function newEvent(EntityManagerInterface $manager, ?Evenements $evenements, Request $request): Response
    {
        if(!$evenements) {
            $evenements = new Evenements();
        }

        $form2 = $this->createForm(EvenementType::class, $evenements);

        $form2->handleRequest($request);

        if($form2->isSubmitted() && $form2->isValid()) {
            if(!$evenements->getId()) {
                $evenements->setCreatedAt(new DateTime());
            }
            $manager->persist($evenements);
            $manager->flush();
            return $this->redirectToRoute('security_admin', [
                'id' => $evenements->getId()
            ]);
        }    

        return $this->render("security/formEvent.html.twig", [
            'titre' => 'Créer un événement',
            "formEv" => $form2->createView(),
            'editMode' => $evenements->getId() !== null

        ]);   
    } 


    /**
     * @Route("/admin/{id}/editActu", name="editActu")
     */
    public function editActu(?Actualites $actualite, Request $request): Response
    {
        $form = $this->createForm(ActualitesType::class, $actualite);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->flush();
            

            return $this->redirectToRoute('security_admin');
        
        }
        return $this->render("security/editActu.html.twig", [
            'titre' => 'Modifier une acutalité',
            "formActu" => $form->createView(),
            'editMode' => $actualite->getId() !== null            
        ]);
    }  
    
    /**
     * @Route("/admin/{id}/editEvent", name="editEvent")
     */
    public function editEvent(?Evenements $evenement, Request $request): Response
    {
        $form2 = $this->createForm(EvenementType::class, $evenement);
        $form2->handleRequest($request);

        if($form2->isSubmitted() && $form2->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
        

        return $this->redirectToRoute('security_admin');
        }

        return $this->render("security/editEvent.html.twig", [
            'titre' => 'Modifier un événement',
            "formEv" => $form2->createView(),
            'editMode' => $evenement->getId() !== null
        ]);
    } 

     /**
     * @Route("admin/{id}/deleteEvent", name="deleteEvent")
     */
    public function deleteEvent(?Evenements $evenement): Response
    {
        $em = $this->getDoctrine()->getManager();
        
        $em->remove($evenement);

        $em->flush();

        return $this->redirectToRoute('security_admin');

    } 

     /**
     * @Route("admin/{id}/deleteActu", name="deleteActu")
     */
    public function deleteActu(?Actualites $actualite): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($actualite);
        $em->flush();

        return $this->redirectToRoute('security_admin') ;

    } 

}