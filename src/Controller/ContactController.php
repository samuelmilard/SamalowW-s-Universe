<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\MailType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{



    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();

            $message = (new \Swift_Message('Message de mon site'))
            ->setFrom($contact['email'])
            ->setTo('sam.aloww@gmail.com')
            ->setBody(
                $this->renderView(
                    'emails/contact.html.twig', [
                        'contact' => $contact
                    ]
                ),
                'text/html'
            );
            $mailer->send($message);
            // Redirection ici : return $this->redirectToRoute('taroute');
        }

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form->createView()
        ]);
    }

}
