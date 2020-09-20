<?php

namespace App\Controller;

use App\Form\MessageType;
use App\Entity\Commentaire;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CommentaireRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    /**
     * @Route("/global", name="global")
     */


    public function index(EntityManagerInterface $manager, Request $request, CommentaireRepository $commentairerepo )
    {

        
        $comments = $commentairerepo -> FindAll();

        $form = $this->createForm(MessageType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $test = $form->getData();
            $test->setDate(new \DateTime());
            $test->setUser($this->getUser());
            $manager->persist($test);
            $manager->flush();
        }


        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'content' => $comments,
            'form' => $form->createView()
        ]);
    }
}
