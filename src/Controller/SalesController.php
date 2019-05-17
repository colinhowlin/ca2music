<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Sales;
use Symfony\Component\HttpFoundation\Response;



class SalesController extends AbstractController
{
    /**
     * @Route("/sales", name="sales")
     */
    public function sales(SessionInterface $session){

         // check to see if the user should actually be here.
         
         // checking the "auth" variable in the session.

        if ($session->get('auth') == '1') {
            // Get all sales records
            $repo = $this->getDoctrine()
                ->getRepository(Sales::class); // the type of the entity

            $allRecords = $repo->findAll();

            return $this->render('sales.html.twig', array("all" => $allRecords));
        } else {
            return $this->redirectToRoute('index', ['error'=> 'You are not authorised to view that page']);
        }
    }
}
