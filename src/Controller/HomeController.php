<?php

namespace App\Controller;

use App\Entity\Addresses;
use App\Form\AddressesFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mime\Address;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        // Create new Addresse email
        $addresseEmail = new Addresses();
        $addresseEmail->setEmail('');

        // Create form
        $addresseEmailForm = $this->createForm(AddressesFormType::class, $addresseEmail);

        // Form via request
        $addresseEmailForm->handleRequest($request);

        //Check form
        if($addresseEmailForm->isSubmitted() && $addresseEmailForm->isValid()) {

            $entityManagerInterface->persist($addresseEmail);
            // Persist object in Bdd
            $entityManagerInterface->flush();

            $this->addFlash('success', 'Bravo! Votre email a bien été enregistré.');
            $addresseEmail->setEmail('');
            return $this->redirectToRoute('home');
        }

        return $this->render('home/index.html.twig', [
            'addresseEmailForm' => $addresseEmailForm->createView()
        ]);
    }
}
