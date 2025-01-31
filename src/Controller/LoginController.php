<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\VarExporter\Exception\LogicException;

 class LoginController extends AbstractController
{
    #[Route('/connexion', name: 'app_login')]
    //AuthenticationUtils c'est un composant qui me permet gerer les erreur / dernier connexion
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        //gestion erreur
        $error = $authenticationUtils->getLastAuthenticationError();

        //Dernier user (email) pour eviter de récrire le mail en cas d'erreur
        $lastUsername = $authenticationUtils->getLastAuthenticationError();
        return $this->render('login/index.html.twig', [
            'error' => $error,
            'last_username' => $lastUsername,
        ]);
    }

    #[Route('/deconnexion', name: 'app_logout', methods:['GET'])]
    public function logout(): never
    {
        throw new LogicException('Don\'t forget to activate logout in security yaml');
    }
}
