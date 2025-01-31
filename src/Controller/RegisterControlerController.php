<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterUserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RegisterControlerController extends AbstractController
{
    #[Route('/inscription', name: 'app_register_controler')]
    //Ici je vais injecter une dépandance (Request) qui me permetra de savoir si mon formulaire en sumbit
    //Grace  L'ORM Doctrine qui me fornit cett depandance (EntityManagerInterface) permet faire les insert en BDD -> $entityManager
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegisterUserType::class, $user);

        //Methode
        $form->handleRequest($request);

        //Dans cette condition on verifier si le formulaire est sumbit ET s'il est valide
        if ($form->isSubmitted() && $form->isValid()) {
            //L'entityManager va persister un Objet USer qui contien le resultat du formulare 
            $entityManager->persist($user);
            //On engresistre l'info en BDD
            $entityManager->flush();
        }
        //Si le formulaire est soumis alors : 
        //j'eentristre les datasen BDD
        //j'envoie un messa de confirmation conmpte crée
        return $this->render(
            'register_controler/index.html.twig',
            ['registerForm' => $form->createView()]
        );
    }
}
