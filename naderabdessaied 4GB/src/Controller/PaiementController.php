<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Paiement;
use App\Form\PaiementType;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

class PaiementController extends AbstractController
{
    private $entityManager;
    public function __construct(
        EntityManagerInterface $entityManager
        )
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/paiement", name="paiement")
     */
    public function index(Request $request)
    {
        $p = new Paiement();
        $form = $this->createForm(PaiementType::class, $p);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            
            //$hash = $encoder->encodePassword($p, $user->getPassword());
            //$user->setPassword($hash);
            $this->entityManager->persist($p);
            $this->entityManager->flush();  
            
            
            return $this->redirectToRoute('reservation'); 
            //$this->addFlash('success', 'paiement est validé avec succée'); 
        }
        return $this->render('/paiement/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
