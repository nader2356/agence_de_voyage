<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

class ContactController extends AbstractController
{
    private $entityManager;
    public function __construct(
        EntityManagerInterface $entityManager
        )
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request)
    {
        $c = new Contact();
        $form = $this->createForm(ContactType::class, $c);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            
            //$hash = $encoder->encodePassword($p, $user->getPassword());
            //$user->setPassword($hash);
            $this->entityManager->persist($c);
            $this->entityManager->flush();  
            
            
            //return $this->redirectToRoute('security_registration'); 
            $this->addFlash('success', 'Votre demande est envoyé avec succée'); 
        }
        return $this->render('/agence/contact.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
