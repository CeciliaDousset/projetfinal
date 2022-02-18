<?php

namespace App\Controller;
use App\Entity\User;
use App\Entity\Reservation;
use App\Form\ReservationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;





class ReservationController extends AbstractController
{
  
    
#[Route('reservation', name:'reservation')]

    public function reservation(Request $request,EntityManagerInterface $em){
        $form = $this->createForm(ReservationFormType::class);
        $form->handleRequest($request);
        $data = $form-> getData();

        
        if ($form->isSubmitted() && $form->isValid()) {
           

           $reservation = new Reservation();
           $reservation->setNom($data['type_nom']);
           $reservation->setDatetime($data['RDV']);
           $reservation->setTelephone($data['telephone_customer']);


           
           
            
            $em->persist($reservation);
            $em->flush();
            $this->addFlash('success', 'Vouz avez bien faite votre reservation');

            return $this->redirectToRoute('customer_home',['id'=>$reservation->getId()]);
            

        }
        
        return $this->render('customer/reservation/index.html.twig', [
            'form' => $form->createView(),
        ]);




    }
}