<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SocialNetworksController extends AbstractController
{
    /**
     * @Route("/social", name="social")
     */
    public function index()
    {
        return $this->render('social_networks/index.html.twig', [
            'controller_name' => 'SocialNetworksController',
        ]);
    }
}
