<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Reservation;
use App\Form\ReservationType;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

class ReservationController extends AbstractController
{
    private $entityManager;
    public function __construct(
        EntityManagerInterface $entityManager
        )
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/reservation", name="reservation")
     */
    public function index(Request $request)
    {
        $r = new Reservation();
        $form = $this->createForm(ReservationType::class, $r);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            
            //$hash = $encoder->encodePassword($p, $user->getPassword());
            //$user->setPassword($hash);
            $this->entityManager->persist($r);
            $this->entityManager->flush();  
            
            
            //return $this->redirectToRoute('security_registration'); 
            $this->addFlash('success', 'reservation est validé avec succée'); 
        }
        return $this->render('/reservation/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
    
}
