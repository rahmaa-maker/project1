<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
final class ServiceController extends AbstractController
{
    #[Route('/service/show/{name}', name: 'app_service')]
    public function showService(string $name): Response
    {
        return $this->render('service/index.html.twig', [
            'controller_name' => 'ServiceController',
            'name' => $name,
        ]);
    }

    #[Route('/service/goto', name: 'app_service_goto')]
    public function goToIndex(): Response
    {
        // Redirect to HomeController@index
        return $this->redirectToRoute('app_home');
    }
}
