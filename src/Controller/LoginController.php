<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Login;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;   


use Symfony\Component\HttpFoundation\Session\SessionInterface;


class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login") methods={"GET"}
     */
    public function login(SessionInterface $session, Request $request)
    {
          
        return $this->render('login.html.twig');
    }
    /**
     * @Route("/validatelogin", name="validatelogin") methods={"POST"}
     */
    public function validatelogin(SessionInterface $session)
    {
             $request = Request::createFromGlobals(); // the envelope, and were looking inside it.
             // get the username and password
            $username = $request->request->get('username', 'none');
            $password = $request->request->get('password', 'none');
            
            
             $repo = $this->getDoctrine()->getRepository(Login::class); // the type of the entity
             
             
             $person = $repo->findOneBy([

                'username' => $username,
                'password' => $password,
                ]);
                
                
                if($person){ // if we find the record, then we can redirect them to the homepage
                        $session->set('username', $username);
                        $session->set('auth', '1'); // 1 is basically true, 0 is false.
                    
                        return $this->redirectToRoute('homepage');

                    
                } else { // if we don't then, throw an error back
                    
                    return $this->redirectToRoute('login', ['error' => 'Invalid username or password']);

                    
                }
                // save the user ID to the session
                // KEY-VALUE
                
                // KEY - IS the name we give it
                // $variable - is what we want to save.
           
       
        //return $this->render('login.html.twig');
    }
        
    
}
