<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{



    private $entityManager;
    public function __construct(
        EntityManagerInterface $entityManager
        )
    {
        $this->entityManager = $entityManager;
    }

    
      /**
     * @Route("/inscri", name="security_registration")
     */
    public function registration(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $this->entityManager->persist($user);
            $this->entityManager->flush();  
            
            
            //return $this->redirectToRoute('security_registration'); 
            $this->addFlash('success', 'inscription est validé avec succée'); 
        }
        return $this->render('/agence/inscri.html.twig', [
            'form' => $form->createView()
        ]);
        
    }

       /**
     * @Route("/connexion", name="security_login")
     */
    public function login() {
        return $this->redirectToRoute('agence');      
    }

        /**
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout() {
        //throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
