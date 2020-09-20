<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AlbumsController extends AbstractController
{
    /**
     * @Route("/albums", name="albums")
     */
    public function index()
    {
        return $this->render('albums/index.html.twig', [
            'controller_name' => 'AlbumsController',
        ]);
    }
}
