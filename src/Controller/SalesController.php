<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Sales;
use Symfony\Component\HttpFoundation\Response;



class SalesController extends AbstractController
{
    /**
     * @Route("/sales", name="sales")
     */
    public function sales()
    {
        
        
         // check to see if the user should actually be here.
         
         // checking the "auth" variable in the session.
         
         
         
        // Get all sales records
       $repo = $this->getDoctrine()
        ->getRepository(Sales::class); // the type of the entity
        
        $allRecords = $repo->findAll();
        
        
        
        return $this->render('sales.html.twig', array("all" => $allRecords) );
    }
}
