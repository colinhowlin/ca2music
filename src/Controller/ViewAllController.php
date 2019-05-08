<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ViewAllController extends AbstractController
{
    /**
     * @Route("/viewall", name="viewall")
     */
    public function index()
    {
       
        return $this->render('viewall.html.twig');
    }
}
