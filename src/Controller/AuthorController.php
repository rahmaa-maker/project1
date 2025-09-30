<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AuthorController extends AbstractController
{
    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }

   #[Route('/Showauthor/{name}', name: 'app_showauthor')]
    public function showAuthor($name):Response {

      return $this->render('author/show.html.twig',['nom'=>$name]);
    }
    //? est utilisée pour rendre lae parametre facultatif//


#[Route('/listauthors/{id}', name: 'app_listauthors')]
public function listAuthors($id): Response
{
    $authors = array(
        array(
            'id' => 1,
            'picture' => 'assets\images\docker.jpg',
            'username' => 'Victor Hugo',
            'email' => 'victor.hugo@gmail.com',
            'nb_books' => 100
        ),
        array(
            'id' => 2,
            'picture' => 'assets\images\esp8266.png',
            'username' => 'William Shakespeare',
            'email' => 'william.shakespeare@gmail.com',
            'nb_books' => 200
        ),
        array(
            'id' => 3,
            'picture' => 'assets\images\firebase.png',
            'username' => 'Taha Hussein',
            'email' => 'taha.hussein@gmail.com',
            'nb_books' => 300
        )
    );


    $author = $authors[$id] ?? null;

    if (!$author) {
        throw $this->createNotFoundException("Auteur introuvable !");
    }

    return $this->render('author/details.html.twig', [
        'author' => $author,
    ]);



 }
#[Route('/author/details/{id}', name: 'app_author_details')]
    public function authorDetails(int $id): Response
    {
        $authors = $this->getAuthors();
        $author = $authors[$id] ?? null;

        if (!$author) {
            throw $this->createNotFoundException("Auteur introuvable !");
        }

        return $this->render('author/showAuthor.html.twig', [
            'author' => $author
        ]);
    }

}
 
