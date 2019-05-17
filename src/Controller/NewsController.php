<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    /**
     * @Route("/news", name="news")
     */
    public function index(SessionInterface $session)
    {
        if ($session->get('auth') == '1') {
            return $this->render('news/index.html.twig', [
                'controller_name' => 'NewsController',
            ]);
        } else {
            return $this->redirectToRoute('index', ['error'=> 'You are not authorised to view that page']);
        }
    }
}
