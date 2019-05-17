<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ViewAllController extends AbstractController
{
    /**
     * @Route("/viewall", name="viewall")
     */
    public function index(SessionInterface $session)
    {
        if ($session->get('auth') == '1') {
            return $this->render('viewall.html.twig');
        } else {
            return $this->redirectToRoute('index', ['error'=> 'You are not authorised to view that page']);
        }
    }
}
