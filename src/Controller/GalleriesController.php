<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GalleriesController extends AbstractController
{
    /**
     * @Route("/galleries", name="galleries")
     */
    public function index()
    {
        return $this->render('galleries/index.html.twig', [
            'controller_name' => 'GalleriesController',
        ]);
    }
}
