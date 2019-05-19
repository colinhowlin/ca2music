<?php
namespace App\Controller;

use App\Entity\Login;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function register()
    {
       
        return $this->render('register.html.twig');
    }

    /**
     * @Route("/registernew", name="registernew")
     *
     */
    public function registerNew(){
        $request = Request::createFromGlobals(); // the envelope, and were looking inside it.
        // get the username and password
        $username = $request->request->get('username', 'none');
        $password = $request->request->get('password', 'none');

        //1. Validation

        //2. Check if username already taken
        $repo = $this->getDoctrine()->getRepository(Login::class);

        if($repo->findOneBy(['username' => $username,'password' => $password]) != null){
            return $this->redirectToRoute('register', ['error' => 'Username is already taken']);
        }

        //3. Input new user into the database
        $user = new Login();
        $user->setUsername($username);
        $user->setPassword($password);

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return $this->redirectToRoute('login', ['error'=>'Successfully Registered! Please login to continue.']);
    }
}
