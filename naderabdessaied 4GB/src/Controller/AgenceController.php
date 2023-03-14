<?php

namespace App\Controller;
use App\Entity\User;
use App\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AgenceController extends AbstractController
{
    
    
    /**
     * @Route("", name="home")
     */
    public function home()
    {
        return $this->render('base.html.twig');
    }

    /**
     * @Route("/agence", name="agence")
     */
    public function index()
    {
        return $this->render('agence/index.html.twig', [
            'controller_name' => 'AgenceController',
        ]);
    }

     

       /**
     * @Route("/offers", name="offers")
     */
    public function offers()
    {
        return $this->render('agence/offers.html.twig', [
            'controller_name' => 'AgenceController',
        ]);
    }

        /**
     * @Route("/news", name="news")
     */
    public function news()
    {
        return $this->render('agence/news.html.twig', [
            'controller_name' => 'AgenceController',
        ]);
    }

         /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('agence/contact.html.twig', [
            'controller_name' => 'AgenceController',
        ]);
    }

      /**
     * @Route("/hotel", name="hotel")
     */
    public function hotel()
    {
        return $this->render('hotel/hotel.html.twig');
    }


      /**
     * @Route("/hotel2", name="hotel2")
     */
    public function hotel2()
    {
        return $this->render('hotel/hotel2.html.twig');
    }



    /**
     * @Route("/hotel3", name="hotel3")
     */
    public function hotel3()
    {
        return $this->render('hotel/hotel3.html.twig');
    }

     /**
     * @Route("/hotel4", name="hotel4")
     */
    public function hotel4()
    {
        return $this->render('hotel/hotel4.html.twig');
    }

     /**
     * @Route("/hotel5", name="hotel5")
     */
    public function hotel5()
    {
        return $this->render('hotel/hotel5.html.twig');
    }


     /**
     * @Route("/hotel6", name="hotel6")
     */
    public function hotel6()
    {
        return $this->render('hotel/hotel6.html.twig');
    }


      /**
     * @Route("/hotel7", name="hotel7")
     */
    public function hotel7()
    {
        return $this->render('hotel/hotel7.html.twig');
    }


      /**
     * @Route("/hotel8", name="hotel8")
     */
    public function hotel8()
    {
        return $this->render('hotel/hotel8.html.twig');
    }

       /**
     * @Route("/hotel9", name="hotel9")
     */
    public function hotel9()
    {
        return $this->render('hotel/istanbul.html.twig');
    }


          /**
     * @Route("/hotel10", name="hotel10")
     */
    public function hotel10()
    {
        return $this->render('hotel/laico.html.twig');
    }


}
